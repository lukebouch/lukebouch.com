<?php

date_default_timezone_set('America/New_York');

return [
    'production' => false,
    'baseUrl' => '',
    'title' => 'Luke Bouch',
    'description' => 'The personal blog of Luke Bouch.',
    'collections' => [
        'posts' => [
            'extends' => '_layouts.post',
            'path' => 'blog/{date|Y-m-d}/{slug}',
            'sort' => '-date',
            'items' => function ($config) {
                $context = stream_context_create([
                    'http' => [
                        'header' => 'Authorization: Bearer ' . env('API_TOKEN'),
                    ]
                ]);

                $response = json_decode(file_get_contents('https://' . getenv('API_URL') . '/posts', false, $context));
                $posts = $response->data;

                if ($posts) {
                    return collect($posts)->map(function ($post) {
                        return [
                            'id' => $post->id,
                            'name' => $post->title,
                            'slug' => $post->slug,
                            'date' => $post->published_at,
                            'updated' => $post->updated_at,
                            'markdown' => $post->content,
                            'html' => $post->html_content,
                        ];
                    });
                }

                return [[]];
            }
        ]
    ],
    'getExcerpt' => function ($string, $length = 255) {
        return substr($string, 0, $length);
    },
];
