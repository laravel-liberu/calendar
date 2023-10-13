<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Calendar\Http\Controllers\Events\Create;
use LaravelLiberu\Calendar\Http\Controllers\Events\Destroy;
use LaravelLiberu\Calendar\Http\Controllers\Events\Edit;
use LaravelLiberu\Calendar\Http\Controllers\Events\Index;
use LaravelLiberu\Calendar\Http\Controllers\Events\Store;
use LaravelLiberu\Calendar\Http\Controllers\Events\Update;

Route::prefix('events')
    ->as('events.')
    ->group(function () {
        Route::get('', Index::class)->name('index');
        Route::get('create', Create::class)->name('create');
        Route::post('', Store::class)->name('store');
        Route::get('{event}/edit', Edit::class)->name('edit');
        Route::patch('{event}', Update::class)->name('update');
        Route::delete('{event}', Destroy::class)->name('destroy');
    });
