<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\kecamatan\StoreRequest;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Request('q')){
            $kecamatans = Kecamatan::where('kecamatan', 'like', '%'.Request('q').'%')->paginate();
        }
        else {
            $kecamatans = Kecamatan::paginate(15);
        };
        return view('wilayah.kecamatan.index', compact('kecamatans'));
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
    public function store(StoreRequest $request)
    {
        Kecamatan::create([
            'hash'  => Str::random(20) . strtotime(date('Y-m-d H:i:s')),
            'kecamatan' => ucwords($request->kecamatan)
        ]);

        return redirect()->route('admin.kecamatan.index')->with('success', 'Data Berhasil Disimpan');
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
    public function edit(Kecamatan $kecamatan)
    {
        return view('wilayah.kecamatan.edit', compact('kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $request->validate([
            'kecamatan' => 'required|unique:kecamatans,kecamatan,' . $kecamatan->id
        ]);

       $kecamatan->update([
            'kecamatan' => $request->kecamatan
       ]);

       return redirect()->route('admin.kecamatan.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
