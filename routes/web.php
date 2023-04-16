<?php
use App\Http\Controllers\ProfileController;//9.43.x~
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BookController; //Add
use App\Models\Book; //Add
use App\Http\Controllers\ProposeController; //Add
use App\Models\Propose; //Add


// //本：ダッシュボード表示(books.blade.php)
// Route::get('/', [BookController::class,'index'])->middleware(['auth'])->name('book_index');
// Route::get('/dashboard', [BookController::class,'index'])->middleware(['auth'])->name('dashboard');

// //本：追加 
// Route::post('/books',[BookController::class,"store"])->name('book_store');

// //本：削除 
// Route::delete('/book/{book}', [BookController::class,"destroy"])->name('book_destroy');

// //本：更新画面
// Route::post('/booksedit/{book}',[BookController::class,"edit"])->name('book_edit'); //通常
// Route::get('/booksedit/{book}', [BookController::class,"edit"])->name('edit');      //Validationエラーありの場合

// //本：更新画面
// Route::post('/books/update',[BookController::class,"update"])->name('book_update');

//企画：ダッシュボード表示(books.blade.php)
Route::get('/', [ProposeController::class,'index'])->middleware(['auth'])->name('propose_index');
Route::get('/dashboard', [ProposeController::class,'index'])->middleware(['auth'])->name('dashboard');

//企画：追加 
Route::post('/proposes',[ProposeController::class,"store"])->name('propose_store');

//企画：削除 
Route::delete('/propose/{propose}', [ProposeController::class,"destroy"])->name('propose_destroy');

//企画：更新画面
Route::post('/proposesedit/{propose}',[ProposeController::class,"edit"])->name('propose_edit'); //通常
Route::get('/proposesedit/{propose}', [ProposeController::class,"edit"])->name('edit');      //Validationエラーありの場合

//企画：更新画面
Route::post('/proposes/update',[ProposeController::class,"update"])->name('propose_update');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';