<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin'       => Route::has('login'),
        'canRegister'    => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion'     => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/chat', function () {
        return Inertia::render('Messages');
    })->name('messages');
    Route::get('/goals-progress', function () {
        return Inertia::render('GoalsProgress');
    })->name('goals-progress');
    Route::get('/reminders', function () {
        return Inertia::render('Reminders');
    })->name('reminders');
    Route::get('/community/support', function () {
        return Inertia::render('CommunitySupport');
    })->name('community-support');
    Route::get('/goals/add-goal', function () {
        return Inertia::render('AddGoal');
    })->name('add-goal');

    Route::get('/community/add-members', function () {
        return Inertia::render('AddCommunityMembers');
    })->name('add-community-members');
});
