<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\desa\DesaRequest;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Ui\Presets\React;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatans = Kecamatan::get();
        
        if(Request('q')){
            $desas = Desa::with('kecamatan')->where('desa', 'like', '%'.Request('q').'%')->paginate(20);
        }
        else{
            $desas = Desa::with('kecamatan')->orderBy('kecamatan_id', 'asc')->paginate(20);
        }
        
        return view('wilayah.desa.index', compact('kecamatans','desas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesaRequest $request)
    {        
        Kecamatan::find($request->kecamatan)->desas()->create([
            'hash'  => Str::random(20) . strtotime(date('Ymd h:i:s')),
            'desa' => ucwords($request->desa),
        ]);        
        
        return back()->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Desa $desa)
    {
        $kecamatans = Kecamatan::get();
        return view('wilayah.desa.edit', compact('kecamatans','desa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desa $desa)
    {
        $request->validate([
            'kecamatan'  => 'required',
            'desa'  => 'required|unique:desas,desa,' . $desa->id
        ]);

        $desa->update([
            'kecamatan_id'  => $request->kecamatan,
            'desa'  => $request->desa
        ]);

        return redirect()->route('admin.desa.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa)
    {
        $desa->delete();
        return back()->with('success', 'Data Berhasil Dihapus');        
    }

    public function getDesaByIdKecamatan($id)
    {
        $kecamatan = Desa::where('kecamatan_id', $id)->pluck('desa', 'id');
        return response()->json($kecamatan);
    }
}
