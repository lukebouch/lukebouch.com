---
title: Migrating from Laravel's Token Guard to Sanctum
publish_date: 2022-10-13T16:01:35+00:00
---

In an application I was working on today, I had to migrate from Laravel token authentication to [Sanctum](https://laravel.com/docs/9.x/sanctum). The process went relatively smoothly but just in case someone else has trouble, I thought I would layout the migration process.

## Installing Sanctum
I’m going to direct you to the [official documentation](https://laravel.com/docs/9.x/sanctum#installation) for instructions on installing Sanctum. It’s very straight forward and should be easy for anyone follow.

## Migrating Api Keys
In this application, we had a `ApiUser` model to distinguish between regular users and other applications that talk to our api. While Sanctum uses a second table to store the access tokens (`personal_access_tokens`), with the Laravel token authentication guard, we were storing the token directly on the `ApiUser` model itself. We did not want to invalidate all of the api keys we already had in the database so migrating them all over to Sanctum’s `personal_access_tokens` table was essential.

Following the documentation, I added the `HasApiTokens` trait to the model I was going to be associating the tokens with. This provides all of the necessary methods and relationships in order to both create tokens for the model and to authenticate the incoming request against the model.

To migrate the tokens from the old table to the new one was a little bit tricky and I had to do some digging in the source code of Sanctum in order to come up with a solution. You see, we were storing our tokens in plain text in the database, but Sanctum hashes the token before storing them. This meant it was not just as simple as coping the tokens from one table to the next.

I first tried using the `createToken()` method the `HasApiTokens` trait provides. The problem with this is was, it generates the token for you and does not allow you to actually specify you own string to use as the token (which is what I needed to do in order to migrate the old tokens over).

I was able to dive into the source code for `createToken()`  and realized all it was doing was creating a `PersonalAccessToken`  with a randomly generated string and saving it to the model. I copied and pasted this function and with a little modification, was able to create this migration that would work.

```php
return new class extends Migration
{
    public function up()
    {
        ApiUser::all()->each(function (ApiUser $apiUser) {
            $plainTextToken = $apiUser->api_token;

            $apiUser->tokens()->create([
                ‘name’ => ‘Migrated Token’,
                ‘token’ => hash(‘sha256’, $plainTextToken),
                ‘abilities’ => [‘*’],
                ‘expires_at’ => null,
            ]);
        });
    }
};
```

## Changing the Authentication Middleware
I had to then instruct Laravel to use Sanctum as opposed to the token guard for authentication to our api. I did a search for `->middleware([‘auth:api’])` and replaced all instances of `auth:api` with `auth:sanctum`.

## Updating Tests
With the all of the tokens successfully migrated over to the `personal_access_tokens` table and our `api.php` routes file updated to use the new middleware, the last thing to do was to update all of our tests that were manually passing a bearer token in the `authorization` header with every request to using this snippet that I found and modified from the documentation: `Sanctum::actingAs(ApiUser::factory()->create(), [‘*’]);`.

## Conclusion
In conclusion, migrating to Laravel Sanctum is not as hard as I expect it would be. It’s fairly straight forward with the hardest part being the migration of old api tokens.

I hope this article will be helpful to you as a guide for the process of migrating to Sanctum.
