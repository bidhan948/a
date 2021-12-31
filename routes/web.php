<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function (Request $request) {
    return Inertia::render(
        'Welcome',
        [
            'time' => now()->toTimeString(),
            'users' => User::query()
                ->when(request('search'), function ($q, $search) {
                    $q->where('name', 'like', "%{$search}%");
                })
                ->paginate(25)
                ->withQueryString(),
            'filters' => $request->only(['search'])
        ]
    );
});
Route::get('/user', function () {
    sleep(1);
    return Inertia::render(
        'User'
    );
});

Route::get('user/create', function () {
    return Inertia::render('Create');
});

Route::post('users', function (Request $request) {
    $validate = $request->validate(['name' => 'required', 'email' => 'required', 'password' => 'required']);
    User::create($validate);
    return redirect('user');
});

Route::post('/logout', function () {
    dd(request('id'));
});
