<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Visitors\VisitorsInfoController;

Route::get('/invitations', [VisitorsInfoController::class, 'showInvitations'])->name('invitations.index');

Route::get('/', [VisitorsInfoController::class, 'showForm'])->name('visitors.form');
Route::post('/visitors/store', [VisitorsInfoController::class, 'handleForm'])->name('visitors.store');

