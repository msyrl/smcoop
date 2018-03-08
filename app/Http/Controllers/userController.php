<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Anggota;
use App\Penjualan;
use App\DetailPenjualan;

class userController extends Controller
{
    
    public function index()
    {
        $cek = session('data');

        $anggota = Anggota::where('no',$cek['no'])->first();

        return view('home')->with('anggota',$anggota);
    }

    public function pembelian()
    {
    	$cek = session('data');
   	
    	$penjualan = DB::table('penjualans as a')
    	->join('anggotas as b','a.anggota_no','b.no')
    	->where('b.no',$cek['no'])
    	->select(
    		'a.no',
    		'a.tanggal',
    		'a.total'
    	)->get();

    	return view('pembelian')->with('penjualan',$penjualan);
    }

    public function detail(Request $request)
    {
        $pembelian = Penjualan::where('no',$request->no)->first();

        $detail = DetailPenjualan::where('penjualan_no',$request->no)->get();

        return view('pembelian_detail')->with('pembelian',$pembelian)->with('detail',$detail);
    }
}