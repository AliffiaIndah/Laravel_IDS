<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Kabkot;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use Illuminate\Support\Facades\Storage;

/**
 * 
 */
class CustomerController extends Controller
{
	
	public function home(){
		$data = array(
			'menu'=> 'home',
			'submenu'=>''
		);
		return view('index',$data);
	}

	public function Customer(){
		$data = array(
			'menu'=>'Customer',
			'submenu'=>''
		);
		return view('pages.dataCustomer',$data);
	}

	public function indexCustomer(){
		$customer = DB::table('customer')->join('kelurahan','customer.id_kelurahan','=','kelurahan.id_kelurahan')
		->get();
		$data = array(
			'menu'=>'Customer',
			'submenu'=>'customer',
			'customer'=>$customer
		);
		return view('pages.dataCustomer',$data);
	}

	public function list(){
		$provinsi = Provinsi::all();
		$kota = Kabkot::all();
		$kecamatan = Kecamatan::all();
		$kelurahan = Kelurahan::all();
		$kodepos = Kelurahan::all();
		return view('pages.tambahCustomer',compact('provinsi','kota','kecamatan','kelurahan','kodepos'));

	}

	public function findKota(Request $request)
	{
		$data = Kabkot::select('id_kabkot','nama_kabkot')
		->where('id_provinsi',$request->prov_id)
		->get();
		return response()->json($data);
	}

	public function findKecamatan(Request $request)
	{
		$data = Kecamatan::select('id_kecamatan','nama_kecamatan')
		->where ('id_kabkot',$request->kota_id)
		->get();
		return response()->json($data);
	}
	
	public function findKelurahan(Request $request)
	{
		$data = Kelurahan::select('id_kelurahan','nama_kelurahan')
		->where ('id_kecamatan',$request->kec_id)
		->get();
		return response()->json($data);
	}

	public function findKodepos(Request $request)
	{
		$data = Kelurahan::select('id_kelurahan','kodepos')
		->where ('id_kelurahan',$request->kel_id)
		->get();
		return response()->json($data);
	} 

	public function inputCustomer(Request $post){
		DB::table('customer')->insert([
			// 'id_customer' =>$post->id_cust,
			'nama_customer' => $post->nama,
			'alamat_customer'=> $post->alamat,
			'foto'=> $post->imagecam,
			'id_kelurahan' => $post->kel_s
		]);
		return redirect ('/dataCustomer');
	}

	public function list2(){
		$provinsi = Provinsi::all();
		$kota = Kabkot::all();
		$kecamatan = Kecamatan::all();
		$kelurahan = Kelurahan::all();
		$kodepos = Kelurahan::all();
		return view('pages.tambahCustomer2',compact('provinsi','kota','kecamatan','kelurahan','kodepos'));

	}

	public function inputCustomer2(Request $post){
		$imagecam = str_replace('data:image/png;base64,','',$post->imagecam);
		$imagecam = str_replace(' ','+',$imagecam);
		$imageName = $post->nama.time().'.png';
		Storage::disk('local')->put($imageName,base64_decode($imagecam));
		DB::table('customer')->insert([
			// 'id_customer' =>$post->id_cust,
			'nama_customer' => $post->nama,
			'alamat_customer'=> $post->alamat,
			'file_path'=> $imageName,
			'id_kelurahan' => $post->kel_s
		]);
		return redirect ('/dataCustomer');
	}
}