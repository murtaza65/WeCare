<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\GoalsController;
use App\Http\Controllers\HuggingFaceController;
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

    Route::get('goals', [GoalsController::class, 'index']);
    Route::post('goals', [GoalsController::class, 'store']);
    Route::put('goals/{id}', [GoalsController::class, 'update']);
    Route::delete('goals/{id}', [GoalsController::class, 'destroy']);

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

// Create a new chat
    Route::post('/chats', [ChatController::class, 'createChat']);

// Send a message in a chat
    Route::post('/chats/{chatId}/messages', [ChatController::class, 'sendMessage']);

// Get the chat history (messages) for a specific chat
    Route::get('/chats/{chatId}/history', [ChatController::class, 'getChatHistory']);

// Update message status (sent, delivered, read)
    Route::put('/messages/{messageId}/status', [ChatController::class, 'updateMessageStatus']);

});

Route::post('/huggingface/query', [HuggingFaceController::class, 'queryModel'])->name('queryModel');
