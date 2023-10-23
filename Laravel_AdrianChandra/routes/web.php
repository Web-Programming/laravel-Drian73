<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
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
// Route::get("/mahasiswa/{nama}", function ($nama = "Adrian"){
//     echo "<h1>Halo nama saya $nama</h1>";
// });

//ROUTE DGN PARAMETER (TDK WAJIB)
// Route::get("/mahasiswa2/{nama?}", function ($nama = "Adrian"){
//     echo "<h1>Halo nama saya $nama</h1>";
// });

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

//Membuat view(1)
Route::get('dosen', function () {
    return view('dosen');
});

//Membuat view(2)
Route::get('/dosen/index', function () {
    return view('dosen.index');
});

//Mengirim data ke view menggunakan argumen (1)
Route::get('fakultas', function () {
    return view('fakultas.index', ["ilkom" => "Fakultas Ilmu Komputer dan Rekayasa"]);
});

//Mengirim data ke view menggunakan argumen (2)
Route::get('/fakultas', function () {
    return view('fakultas.index', ["fakultas" => ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]]);
});

//Mengirim data ke view menggunakan view (2)
Route::get('/fakultas', function () {
    return view('fakultas.index')->with("fakultas", ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]);
});

//Mengirim data ke view menggunakan compact (3)
Route::get('/fakultas', function () {
    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    return view('fakultas.index', compact('fakultas'));
});

//Struktur kontrol pada blade
Route::get('/fakultas', function () {
    $fakultas = [];
    return view('fakultas.index', compact('fakultas'));
});

//Pembuatan Layout (1) include -- Pembuatan Layout (2) extends
Route::get('/fakultas', function () {
    $kampus = "Universitas Multi Data Palembang";
    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    return view('fakultas.index', compact('fakultas', 'kampus'));
});

Route::get('/prodi', [ProdiController::class, 'index']);

Route::resource('/kurikulum', KurikulumController::class);

Route::apiResource('/dosen', DosenController::class);

Route::get('/mahasiswa/insert-elq', [MahasiswaController::class, 'insertElq']);
Route::get('/mahasiswa/update-elq', [MahasiswaController::class, 'updateElq']);
Route::get('/mahasiswa/delete-elq', [MahasiswaController::class, 'deleteElq']);
Route::get('/mahasiswa/select-elq', [MahasiswaController::class, 'selectElq']);

