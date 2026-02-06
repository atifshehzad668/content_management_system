<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Dashboard (Protected)
Route::get('/dashboard', function () {
    $servicesCount = \App\Models\Service::count();
    $contactsCount = \App\Models\ContactSubmission::count();
    $unreadCount = \App\Models\ContactSubmission::unread()->count();
    $pageContentsCount = \App\Models\PageContent::count();
   $recentContacts = \App\Models\ContactSubmission::latest()->limit(5)->get();
    $services = \App\Models\Service::latest()->limit(6)->get();
    
    return view('admin.dashboard', compact(
        'servicesCount',
        'contactsCount',
        'unreadCount',
        'pageContentsCount',
        'recentContacts',
        'services'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes (Protected)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Services Management
    Route::resource('services', ServiceController::class);
    
    // Page Content Management
    Route::resource('page-contents', PageContentController::class);
    
    // Contact Submissions
    Route::get('contacts', [ContactSubmissionController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [ContactSubmissionController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [ContactSubmissionController::class, 'destroy'])->name('contacts.destroy');
    Route::post('contacts/{contact}/mark-read', [ContactSubmissionController::class, 'markAsRead'])->name('contacts.mark-read');
});

require __DIR__.'/auth.php';
