<?php
use App\Http\Controllers\ProfileController;//9.43.x~
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BookController; //Add
use App\Models\Book; //Add
use App\Http\Controllers\ProposeController; //Add
use App\Models\Propose; //Add

Route::get('/employee', 'App\Http\Controllers\EmployeeController@csvEmployee');

Route::get('/dataViz', 'App\Http\Controllers\DataVizController@csvDataViz');
Route::get('/prediction', 'App\Http\Controllers\PredictionController@csvPrediction');

Route::get('/', function () {
    return view('menu');
})->middleware(['auth'])->name('menu');

//企画：ダッシュボード表示(proposes.blade.php)
Route::get('/dashboard', [ProposeController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('/proposes', [ProposeController::class,'index'])->middleware(['auth'])->name('propose_index');

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