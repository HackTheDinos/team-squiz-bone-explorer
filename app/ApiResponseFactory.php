<?php

namespace App;

class ApiResponseFactory
{
    public static function MakeEnvelope(array $data = [], array $meta = [])
    {
        return [
            'meta' => $meta,
            'data' => $data,
        ];
    }
}
