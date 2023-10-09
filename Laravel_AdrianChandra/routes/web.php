<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//BUAT ROUTE KE PROFIL
Route::get("/profil", function (){
    return view("profil");
});

//ROUTE DGN PARAMETER (WAJIB)
Route::get("/mahasiswa/{nama}", function ($nama = "Adrian"){
    echo "<h1>Halo nama saya $nama</h1>";
});

//ROUTE DGN PARAMETER (TDK WAJIB)
Route::get("/mahasiswa2/{nama?}", function ($nama = "Adrian"){
    echo "<h1>Halo nama saya $nama</h1>";
});

//ROUTE DGN PARAMETER > 1
Route::get("/profil2/{nama?}/{pekerjaan?}", function ($nama = "Adrian", $pekerjaan = "Mahasiswa"){
    echo "<h1>Halo nama saya $nama, saya adalah $pekerjaan</h1>";
});

Route::get("/hubungi", function (){
    echo "<h1>Hubungi kami</h1>";
})->name("call");

Route::redirect("/contact", "/hubungi");

Route::get("/halo", function (){
    echo "<a href = '". route('call'). "'>". route('call'). "</a>";
});

Route::prefix("/dosen")->group(function () {
    Route::get("/jadwal", function(){
        echo "<h1> Jadwal Baru </h1>";
    });
    Route::get("/materi", function (){
    echo "<h1>Materi Perkuliahan</h1>";
    });
});
