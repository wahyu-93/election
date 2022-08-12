<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\tps\TpsRequest;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Tps;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatans = Kecamatan::get();
        $desas = Desa::get();

        if(Request('q')){
            $tpsList = Tps::with(['desa'])->where('tps', Request('q'))->orwhereRelation('desa', 'desa', 'like', '%' .Request('q'). '%')->paginate();
        }
        else {
            $tpsList = Tps::with(['desa'])->paginate(15);
        }

        return view('wilayah.tps.index', compact('kecamatans', 'desas', 'tpsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TpsRequest $request)
    {
        Tps::create([
            'hash' => Str::random(20) . strtotime(date('Ymd h:i:s')),
            'desa_id' => $request->desa,
            'tps' => $request->tps
        ]);

        return back()->with('success', 'Data Berhasil Ditambah');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tps = Tps::whereHash($id);
        $tps->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
