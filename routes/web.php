<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs' , [
        'jobs' => [
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
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id){
    $jobs =  [
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

    $job = \Illuminate\Support\Arr::first($jobs , fn($job) => $job['id'] == $id);

    return view('job', ['job' => $job]);
});


Route::get('/contact', function () {
    return view('contact');
});


