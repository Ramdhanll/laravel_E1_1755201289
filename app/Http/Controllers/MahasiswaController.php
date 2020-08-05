<?php

namespace App\Http\Controllers;

use App\Prodi;
use DataTables;
use App\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('prodi'));
    }

    public function list_mhs() {
        $mahasiswa = Mahasiswa::with('Prodi')->get();
        return DataTables::of($mahasiswa)
        ->addIndexColumn()
        ->addColumn('action', function ($mahasiswa) {
            $action = '<a href="/mhs/edit/'.$mahasiswa->nim.'" class="text-warning mr-1"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            $action .= '| <a href="/mhs/delete/'.$mahasiswa->id.'" class="text-danger mr-1"><i class="glyphicon glyphicon-edit"></i> Hapus</a>';
            
            return $action;
        })
        ->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim'   => 'required',
            'nama_lengkap' => 'required',
            'prodi_id' => 'required',
            'alamat' => 'required',
        ]);

        Mahasiswa::create($request->all());
        return redirect('/mhs')->with(['success' => 'Data berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodi = Prodi::all();
        $mhs = Mahasiswa::where('nim', $id)->first();
        return view('mahasiswa.edit', compact('mhs', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim'   => 'required',
            'nama_lengkap' => 'required',
            'prodi_id' => 'required',
            'alamat' => 'required',
          ]);
          $mahasiswa = Mahasiswa::find($id);
          $mahasiswa->update($request->all());
    
          return redirect('/mhs')->with(['success' => 'Data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::destroy($id);

        return redirect('/mhs')->with(['success' => 'Data berhasil dihapus']);
    }
}
