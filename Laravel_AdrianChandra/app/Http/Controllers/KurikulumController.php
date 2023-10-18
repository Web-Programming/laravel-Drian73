<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo "Halaman Index Kurikulum";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo "Halaman Create Kurikulum";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo "Halaman Show Kurikulum dengan id " .$id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        echo "Halaman Edit Kurikulum dengan id " .$id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
