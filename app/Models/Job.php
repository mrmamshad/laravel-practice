<?php

namespace App\Models;

use Illuminate\Support\Arr;
use phpDocumentor\Reflection\Types\Static_;

class Job
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'programmer',
                'income' => '$2000',
            ],
            [
                'id' => 2,
                'title' => 'teacher',
                'income' => '$3000',
            ],
            [
                'id' => 3,
                'title' => 'student',
                'income' => '$0',
            ],
        ];
    }

    public static function find(int $id): array
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);
        if (! $job){
            abort(404);
        }
        return  $job;
    }

}
