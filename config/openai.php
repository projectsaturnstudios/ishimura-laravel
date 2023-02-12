<?php

return [

    /*
    |--------------------------------------------------------------------------
    | OpenAI API Key and Organization
    |--------------------------------------------------------------------------
    |
    | Here you may specify your OpenAI API Key and organization. This will be
    | used to authenticate with the OpenAI API - you can find your API key
    | and organization on your OpenAI dashboard, at https://openai.com.
    |
    | Alternatively you can use goose for Goose AI, https://goose.ai.
    */

    'openai_api_key' => env('OPENAI_API_KEY'),
    'goose_api_key' => env('GOOSE_API_KEY'),
    'organization' => env('OPENAI_ORGANIZATION'),
    /*'drivers' => [
        'openai' => [
            [
                'completions' => true,
                'edits' => true,
                'embeddings' => true,
                'files' => true,
                'fine_tunes' => true,
                'images' => true,
                'models' => true,
                'engines' => false,
                'moderations' => true,
            ]
        ],
        'goose' => [
            [
                'completions' => true,
                'edits' => false,
                'embeddings' => false,
                'files' => false,
                'fine_tunes' => false,
                'images' => false,
                'models' => false,
                'engines' => true,
                'moderations' => false,
            ]
        ],
    ],*/

];
