<?php
return [
    'setShouldRegenerateHeaders' => [
        'config' => [
            'channel_id' => 'channel_id',
            'time' => 100,
            'uniq' => 250
        ],
        'expected' => [
            'headers' => [
                'before' => [],
                'after' => [
                    'X-LINE-ChannelId' => 'channel_id',
                    'X-LINE-ChannelSecret' => null,
                    'Content-Type' => 'application/json',
                    'X-LINE-Authorization' => 'OoKjYnXkFOftE9M5WVp3xtkK3ud7NB8WSYgAVvDQR4Q=',
                    'X-LINE-Authorization-Nonce' => '100250'
                ]
            ]
        ]
    ]
];