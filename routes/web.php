<?php
use Illuminate\Support\Facades\Route;
use App\Http\livewire\Admin\Users\UserList;
use App\Http\Controllers\admin\DashboardController;



Route::get('admin/dashboard', DashboardController::class);
Route::get('admin/users', UserList::class)->name('admin.users');

