<?php
return [
    'setShouldRegenerateHeaders' => [
        'config' => [
            'channel_secret' => 'channel_secret',
            'time' => 100,
            'uniq' => 250
        ],
        'expected' => [
            'headers' => [
                'before' => [],
                'after' => [
                    'X-LINE-ChannelId' => null,
                    'X-LINE-ChannelSecret' => 'channel_secret',
                    'Content-Type' => 'application/json',
                    'X-LINE-Authorization' => '9zHuLOJz1Dd+XWKMdiecwCUCY+jUDFzPcHXMQzIRe+Q=',
                    'X-LINE-Authorization-Nonce' => '100250'
                ]
            ]
        ]
    ]
];