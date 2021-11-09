<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi_toko;
use DB;
use PDF;
class GeolocationController extends Controller 
{
	public function list_toko () {
		$lokasi_toko = DB::table('lokasi_toko')-> get();
		return view ('/pages/list_toko',['lokasi_toko'=>$lokasi_toko]);
	}

	public function toko_barcode($id)
    {
        $toko = DB::table('lokasi_toko')->where('barcode',$id)->get();
        $id_toko=$id;
        $pdf = PDF::loadview('pages/toko-barcode',['toko'=>$toko,'id_toko'=>$id_toko])->setPaper('a4');
        return $pdf->stream();
        // return view('geolocation/toko-barcode',['toko'=>$toko,'id_toko'=>$id_toko]);
    }

	public function input_titik()
	{
		return view('pages.input_titik_awal');
	}

	public function input_toko(Request $post)
	{
		DB::table('lokasi_toko')->insert([
			'nama_toko' => $post->nama,
			'latitude' => $post->latitude,
			'longitude' => $post->longitude,
			'accuracy' => $post->accuracy,
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/list_toko');
	}

	public function scan_toko()
	{
        
		return view('pages.scanToko');
	}

     public function findToko(Request $request){
        $data = Lokasi_toko::select('barcode', 'nama_toko', 'latitude', 'longitude', 'accuracy')
        ->where('barcode', $request->tk_id)
        ->get();
        return response()->json($data);
    }
}
	