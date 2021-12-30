<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render(
        'Welcome',[
            'time'=> now()->toTimeString(),
            'users' => User::query()->paginate(25)
        ]
    );
});
Route::get('/user', function () {
    sleep(1);
    return Inertia::render(
        'User'
    );
});

Route::post('/logout', function () {
    dd(request('id'));
});
