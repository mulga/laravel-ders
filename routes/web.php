<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
// use Illuminate\Database\Query\Builder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    // return view('welcome');

    // fetch all users

    // $users = DB::select("SELECT * FROM users ");
    // $users = DB::select("SELECT * FROM users WHERE id =2");
    // $users = DB::select("SELECT * FROM users WHERE email =?", ['mehmet@thinbold.com']);

    // $users = DB::table('users')->WHERE('id', 1)->first();
    $user = User::find(20);


    // ---------- //
    // CREATE USER //
    // ---------- //

    // YONTEM 1

    // $user =
    //     DB::insert('insert into users ( name, email, password) values (?, ?,?)', [
    //         'Kamil',
    //         'mail@mail.com',
    //         'Nokia6110'
    //     ]);

    // YONTEM 2

    // $user = DB::table('users')->insert([
    //     'name' => 'Kamil Osman',
    //     'email' => 'kayla@example.com',
    //     'password' => 'Nokia6110'

    // ]);


    // YONTEM 3

    // $user = User::create([
    //     'name' => 'Batman',
    //     'email' => 'batman@mail.com',
    //     'password' => '12345',
    // ]);



    // ------------ //
    // UPDATE USER //
    // ------------ //

    // YONTEM 1

    // $user = DB::update("UPDATE users SET email =? WHERE id=?", ['mail@mail.com', 3]);

    // YONTEM 2

    // $user = DB::table('users')
    //     ->where('id', 4)
    //     ->update(
    //         ['email' => 'john@example.com', 'name' => 'Baris Manco'],


    //     );


    // YONTEM 3

    // $user = User::find(9);

    // $user->update(
    //     [
    //         'name' => 'Kara Dul',
    //         'email' => 'kara@dul.com'
    //     ]
    // );

    // ------------ //
    // DELETE USER //
    // ------------ //

    // YONTEM 1

    // $user = DB::delete('DELETE FROM users WHERE id=?', ["3"]);

    // YONTEM 2

    // $user = DB::table('users')
    //     ->where('id', 2);



    // YONTEM 3

    // $user->delete();

    dd($user->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
