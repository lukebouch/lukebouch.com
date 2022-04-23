<?php

return [
    "production" => false,
    "baseUrl" => "",
    "title" => "Luke Bouch",
    "description" => "The personal blog of Luke Bouch.",
    "collections" => [
        "posts" => [
            "path" => "blog/{date|Y-m-d}/{slug}",
            "sort" => "date",
            "items" => function ($config) {
                $context = stream_context_create([
                    "http" => [
                        "header" => "Authorization: Bearer " . env("API_TOKEN"),
                    ],
                ]);

                $response = json_decode(
                    file_get_contents(
                        "https://" . getenv("API_URL") . "/posts",
                        false,
                        $context
                    )
                );
                $posts = $response->data;

                return collect($posts)->map(function ($post) {
                    return [
                        "title" => $post->title,
                        "slug" => $post->slug,
                        "date" => $post->published_at,
                        "html" => $post->html_content,
                    ];
                });
            },
        ],
    ],
];
