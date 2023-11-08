<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class ProdiController extends Controller
{
    public function index() {
        $kampus = "Universitas Multi Data Palembang";
        return view('prodi.index')->with('kampus', $kampus);
    }

    public function allJoinFacade() {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select mahasiswas.*, prodis.nama as nama_prodi from prodis, mahasiswas
        where prodis.id = mahasiswas.prodi_id');
        return view('prodi.index', ['allmahasiswaprodi' => $result, 'kampus' => $kampus]);
    }

    public function allJoinElq() {
        //$prodi = Prodi::all();
        $prodis = Prodi::with('mahasiswas')->get();
        foreach ($prodis as $prodi) {
            echo "<h3>{$prodi->nama}</h3>";
            echo "<hr>Mahasiswa: ";
            foreach ($prodi->mahasiswas as $mhs){
                echo $mhs->nama . ",";
            }
            echo "<hr>";
        }
    }

    public function create() {
        return view('prodi.create');
    }

    public function store(Request $request) {
        //dump ($request);
        //echo $request->nama;

        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
        ]);
        //dump($validateData);
        //echo $validateData['nama'];

        $prodi = new Prodi(); //buat object prodi
        $prodi->nama = $validateData['nama']; //simpan nilai input ($validateData['nama]) ke dalam property nama prodi ($prodi->nama)
        $prodi->save(); //simpan ke dalam tabel prodis

        //return "Data prodi $prodi->nama berhasil disimpan ke database"; //tampilkan pesan berhasil
        session()->flash('info', "Data prodi $prodi->nama berhasil disimpan ke database");
        return redirect()->route('prodi.create');

    }

}
