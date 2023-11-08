<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Prodi;

class MahasiswaController extends Controller
{
    public function insertElq() {
        // $mhs = new Mahasiswa();
        // $mhs->nama = "Adrian Chandra";
        // $mhs->npm = "2226250081";
        // $mhs->tempat_lahir = "Palembang";
        // $mhs->tanggal_lahir = date("Y-m-d"); //tanggal hari ini
        // $mhs->save();


        //Mass Assignment
        $mhs =  Mahasiswa::insert(
        [
            [
            'nama' => 'Hocwin',
            'npm' => '2226250078',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => date("Y-m-d"),
            'prodi_id' => '1'
            ],
            [
            'nama' => 'Satria',
            'npm' => '2226250082',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => date("Y-m-d"),
            'prodi_id' => '1'
            ],
        ]
        );
        dump($mhs);
    }

    public function updateElq() {
        $mahasiswa = Mahasiswa::where('npm', '2226250080')->first(); //cari data tabel mahasiswas berdasarkan npm
        $mahasiswa->nama = 'Nicholas';
        $mahasiswa->save(); //menyimpan data ke tabel mahasiswas
        dump($mahasiswa);

    }

    public function deleteElq() {
        $mahasiswa = Mahasiswa::where('npm', '2226250080')->first();//cari data tabel mahasiswas berdasarkan npm
        $mahasiswa->delete(); //hapus data npm 80
        dump($mahasiswa);
    }

    public function selectElq(){
        $tempat_lahir = 'Jakarta';
        $mahasiswa = Mahasiswa::all();
        //dump($allmahasiswa);
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswa, 'tempat_lahir' => $tempat_lahir]);
    }

    public function allJoinElq() {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::has('prodi')->get();
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswa, 'kampus' => $kampus]);
    }
}
