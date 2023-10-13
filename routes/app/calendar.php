<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Calendar\Http\Controllers\Calendar\Create;
use LaravelLiberu\Calendar\Http\Controllers\Calendar\Destroy;
use LaravelLiberu\Calendar\Http\Controllers\Calendar\Edit;
use LaravelLiberu\Calendar\Http\Controllers\Calendar\Index;
use LaravelLiberu\Calendar\Http\Controllers\Calendar\Options;
use LaravelLiberu\Calendar\Http\Controllers\Calendar\Store;
use LaravelLiberu\Calendar\Http\Controllers\Calendar\Update;

Route::get('', Index::class)->name('index');
Route::get('create', Create::class)->name('create');
Route::post('', Store::class)->name('store');
Route::get('{calendar}/edit', Edit::class)->name('edit');
Route::patch('{calendar}', Update::class)->name('update');
Route::delete('{calendar}', Destroy::class)->name('destroy');
Route::get('options', Options::class)->name('options');
