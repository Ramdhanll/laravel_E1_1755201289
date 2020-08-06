<?php

namespace App\Http\Controllers;

use App\Matkul;
use DataTables;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('matkul.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('matkul.create');
    }

    public function list_matkul() {
        $matkul = Matkul::all();
        return DataTables::of($matkul)
        ->addIndexColumn()
        ->addColumn('action', function ($matkul) {
            $action = '<a href="/mata-kuliah/edit/'.$matkul->kode_matkul.'" class="text-warning mr-1"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            $action .= '| <a href="/mata-kuliah/delete/'.$matkul->kode_matkul.'" class="text-danger mr-1"><i class="glyphicon glyphicon-edit"></i> Hapus</a>';
            
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
            'kode_matkul'   => 'required',
            'nama_matkul' => 'required',
            'sks' => 'required',
            'semester' => 'required',
        ]);

        Matkul::create($request->all());
        return redirect('/mata-kuliah')->with(['success' => 'Data berhasil ditambah']);
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
        $matkul = Matkul::where('kode_matkul', $id)->first();
        return view('matkul.edit', compact('matkul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_matkul)
    {
      $request->validate([
            'nama_matkul' => 'required',
            'sks' => 'required',
            'semester' => 'required',
      ]);
      Matkul::where('kode_matkul',$kode_matkul)
        ->update([
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
        'semester' => $request->semester,
            ]);
    
      return redirect('/mata-kuliah')->with(['success' => 'Data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matkul::where('kode_matkul', $id)->delete();
        return redirect('/mata-kuliah')->with(['success' => 'Data berhasil dihapus']);
    }
}
