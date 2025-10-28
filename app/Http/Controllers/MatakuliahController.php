<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Menampilkan data matakuliah';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'membuat ghjfgjgj matakuliah';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'Store';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $param1 = '')
    {
       if ($param1 == 'ST445'){
            return view('halaman-matakuliah');
        }else{
            return view('halaman-matakuliah-null');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'destroy';
    }
}
