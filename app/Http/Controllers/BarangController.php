<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Barang;
use PDF;

/**
 * 
 */
class BarangController extends Controller
{
	
	public function Barang(){
		$data = array(
			'menu'=>'Barang',
			'submenu'=>''
		);
		return view('pages.dataBarang',$data);
	}

	public function indexBarang(){
		$barang = DB::table('barang')
		->get();
		$data = array(
			'menu'=>'Barang',
			'submenu'=>'barang',
			'barang'=>$barang
		);
		return view('pages.dataBarang',$data);
        // return view('pages.barangTest',$data);
	}
	
	public function barcode(){
		
		return view('pages.dataBarang',$data);
	}

	public function tambahBarang(){
		return view('pages.tambahBarang');
	}

	public function inputBarang(Request $post){
		DB::table('barang')->insert([
		// 'id_barang' => $post->id_barang,
		'nama' => $post->nama_brg,
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/dataBarang');
	}

	// public function print(){
	// 	$barang = PDF::loadview('pages.dataBarang')->setPaper('A4','potrait');
	// 	return $barang->stream();
	// }
	// public function generatePDF()
 //    {
 //        $barang = Barang::all();
 //        $no = 1;
 //        // share data to view
      
 //      $pdf = PDF::loadView('pages.PDF_view',compact('barang', 'no'));
 //      $pdf -> setPaper('a4', 'landscape');

 //      // download PDF file with download method
 //      return $pdf->stream('Daftar_Barang.pdf');
 //    }

    public function scanbarcode(){
    	return view ('/pages/scanBarcode');
    }

    public function generatePDF(Request $request)
    {
        $dataa = $request->id_barang;
        $datab = explode(",", $dataa);
        $barang = DB::table('barang')->whereIn('id_barang', $datab)->get();
        $no = 1;
        $x = 1;
        $col = $request->col;
        $row = $request->row;
        $panjang=(($row-1)*5)+($col-1);
        $data = array(
            'menu' => 'Barcode',
            'barang' => $barang,
            'no' => $no,
            'x' => $x,
            'col' => $col,
            'row' => $row,
            'panjang' => $panjang,
            'submenu' => '',
        );
          
        $customPaper = array(0,0,611.7,469.47);
        return PDF::loadView('pages.scan', $data)->setPaper($customPaper)->stream('barcode_barang.pdf');
    }

    
}