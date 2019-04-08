<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BarangController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data_barang = \App\Barang::all();
        return view('barang.index', ['data_barang' => $data_barang]);
    }

    public function indexApi(){
        $data_barang = \App\Barang::all();
        return $data_barang;
    }

    public function create(Request $request){
        \App\Barang::create($request->all());
        return redirect('/barang')->with('sukses','Data berhasil disimpan...');
    }

    public function edit($id){
        $barang = \App\barang::find($id);
        return view('/barang/edit', ['barang' => $barang]);
    }

    public function update(Request $request,$id){
        $barang = \App\barang::find($id);
        $barang->update($request->all());
        return redirect('/barang')->with('sukses', 'Data berhasil dirubah...');
    }

    public function delete($id){
        $barang = \App\Barang::find($id);
        $barang->delete();
        return redirect('/barang')->with('sukses', 'Data berhasil dihapus...');
    }

    public function search(Request $request){
        $search = $request->get('search');
        $barang = DB::table('barang')->where('name','like',"%". $search ."%")->paginate(5);
        
        return view('barang.index', ['data_barang' => $barang]);
    }

    public function table(){
        return view('barang.table');
    }
}
