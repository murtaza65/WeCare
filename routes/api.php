<?php

use App\Http\Controllers\HuggingFaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/huggingface/query', [HuggingFaceController::class, 'queryModel'])->name('queryModel');

Route::post('/huggingface/query/answer', [HuggingFaceController::class, 'queryQuestionAnswer'])->name('queryAnswerModel');

Route::post('/huggingface/question-answer', [HuggingFaceController::class, 'queryPretrainedQuestionAnswer']);
