<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Prodi;
class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prodi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('prodi.create');
    }

    public function list_prodi() {
        $prodi = Prodi::all();
        return DataTables::of($prodi)
        ->addIndexColumn()
        ->addColumn('action', function ($prodi) {
            $action = '<a href="/prodi/edit/'.$prodi->kode_prodi.'" class="text-warning mr-1"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            $action .= '| <a href="/prodi/delete/'.$prodi->id.'" class="text-danger mr-1"><i class="glyphicon glyphicon-edit"></i> Hapus</a>';
            
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
            'kode_prodi'   => 'required',
            'nama_prodi' => 'required',
            'kaprodi' => 'required',
        ]);

        Prodi::create($request->all());
        return redirect('/prodi')->with(['success' => 'Data berhasil ditambah']);
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
        $prodi = Prodi::where('kode_prodi', $id)->first();
        return view('prodi.edit', compact('prodi'));
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
        'kode_prodi'   => 'required',
        'nama_prodi' => 'required',
        'kaprodi' => 'required',
      ]);
      $prodi = Prodi::find($id);
      $prodi->update($request->all());

      return redirect('/prodi')->with(['success' => 'Data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prodi::destroy($id);

        return redirect('/prodi')->with(['success' => 'Data berhasil dihapus']);
    }
}
