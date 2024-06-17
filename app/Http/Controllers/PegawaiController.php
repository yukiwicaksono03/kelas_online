<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

// use App\Pegawai;
use App\Gambar;


use App\Models\Product;
use App\Models\ProductCafe;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Proposal;

class PegawaiController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
    	$pegawai = Gambar::select('*')
                    ->where('sub_kategori', '!=', '')
                    ->get();
        
        // $trans = Transaksi::all();
        $trans_d = TransaksiDetail::all();

        $top_sales = TransaksiDetail::select('list_transaksi.tipe_order','list_transaksi_d.id', DB::raw('DATE(list_transaksi.created_at) as trans_date'), 'products.name', 'products.price', DB::raw('SUM(list_transaksi_d.jml) as jml'))
                                    ->join('products', 'products.id', '=', 'list_transaksi_d.id')
                                    ->join('list_transaksi', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->groupBy('list_transaksi.tipe_order','list_transaksi_d.id', DB::raw('DATE(list_transaksi.created_at)'), 'products.name', 'products.price')
                                    ->orderby(DB::raw('SUM(list_transaksi_d.jml)'),'desc')
                                    ->limit('10')
                                    ->get();

                                    // ->get(['list_transaksi_d.id', 'list_transaksi.created_at', 'products.name', 'products.price', 
                                    //     TransaksiDetail::raw('sum(list_transaksi_d.jml) as jml')])
                                    
        // echo $trans_d->toRawSql(); 
        // die('<pre>'.print_r($top_sales).'</pre>');
    	return view('home_admin', ['pegawai' => $pegawai], ['top_sales' => $top_sales]);
        // return view('pegawai', compact('pegawai'));
    }

    public function list_item()
    {
        
        $list_item = Gambar::select('gambar.gid','gambar.lokasi','gambar.nama','gambar.deskripsi','gambar.sub_kategori','gambar.is_aktif', DB::raw('b.nama as nama_kat, case when gambar.kategori > 0 then \'Kategori\' else \'Vendor\' end as tipe'))
                    ->where('b.kategori', '>', 0)
                    ->leftjoin(DB::raw('gambar b'), 'gambar.sub_kategori', '=', 'b.kategori')
                    ->orderby('gambar.sub_kategori', 'asc')
                    ->get();
        
        return view('list_item', compact('list_item'));

    }

    public function list_proposal()
    {
        
        $list_proposal = Proposal::select('list_proposal.nama', 'list_proposal.phone', 'list_proposal.email', DB::raw('DATE(list_proposal.created_at) as trans_date'), 'list_proposal.status')
                        // ->join('list_transaksi', 'list_proposal.ltid', '=', 'list_proposal.ltid')
                        ->get();
        
        return view('list_proposal', compact('list_proposal'));

    }

    public function adminlte()
    {
    	return view('admin');
    }

    public function tambah()
    {

        $list_kat = Gambar::select('nama', 'kategori')
                    ->where('kategori', '!=', '')
                    ->get();
        
        return view('pegawai_tambah', compact('list_kat'));
        // return view('pegawai_tambah');
    }

    public function store(Request $request)
    {
    	// $this->validate($request,[
    	// 	'nama' => 'required',
    	// 	'alamat' => 'required'
    	// ]);

    	// Gambar::create([
    	// 	'nama' => $request->nama,
    	// 	'alamat' => $request->alamat
    	// ]);

        $imageName = $imageName2 = $imageName3 = $imageName4 = null;
        $ok = $ok2 = $ok3 = $ok4 = false;
        
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $uniqueId = md5(uniqid(rand(), true));
            $imageName = time() .$uniqueId. '.' . $request->file('image')->extension();  
            $ok = $request->file('image')->move(public_path('images'), $imageName);
        }

        if ($request->hasFile('image2')) {
            $request->validate([
                'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $uniqueId = md5(uniqid(rand(), true));
            $imageName2 = time() .$uniqueId. '.' . $request->file('image2')->extension();  
            $ok2 = $request->file('image2')->move(public_path('images'), $imageName2);
        }

        if ($request->hasFile('image3')) {
            $request->validate([
                'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $uniqueId = md5(uniqid(rand(), true));
            $imageName3 = time() .$uniqueId. '.' . $request->file('image3')->extension();  
            $ok3 = $request->file('image3')->move(public_path('images'), $imageName3);
        }
        
        if ($request->hasFile('image4')) {
            $request->validate([
                'image4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $uniqueId = md5(uniqid(rand(), true));
            $imageName4 = time() .$uniqueId. '.' . $request->file('image4')->extension();  
            $ok4 = $request->file('image4')->move(public_path('images'), $imageName4);
        }

        $gid = Gambar::max('gid');
        $gid = ($gid) ? $gid : 0;
        $gid = $gid+1;
        // dd($gid);
        
        // dd($imageName.' -- '.$imageName2.' -- '.$imageName3.' -- '.$imageName4);
        // if($ok){
        // dd(($request->is_kategori == 't') ? null : $request->kategori);
            Gambar::create([
                'nama' => $request->nama,
                'lokasi' => ($ok) ? $imageName : null,
                'lokasi2' => ($ok2) ? $imageName2 : null,
                'lokasi3' => ($ok3) ? $imageName3 : null,
                'lokasi4' => ($ok4) ? $imageName4 : null,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'kategori' => null, //($request->is_kategori == 't') ? $gid : null,
                'sub_kategori' => $request->kategori, //($request->is_kategori == 't') ? null : $request->kategori,
                'is_aktif' => $request->is_aktif
                
            ]);
        	return redirect('/admin/list_item');
        // }else{
        //     echo '<script type="text/javascript">
        //             alert("Simpan Gagal. Mohon hubungi teknisi terkait.");
        //         </script>';
        //     return view('pegawai_tambah');
        // }
    }

    public function edit($id)
    {

        $list_kat = Gambar::select('nama', 'kategori')
                    ->where('kategori', '!=', '')
                    ->get();
        $pegawai = Gambar::find($id);
        
        return view('pegawai_edit', compact('list_kat','pegawai'));
    		// return view('pegawai_edit', ['pegawai' => $pegawai]);
    }

     public function update($id, Request $request)
    {
        $imageName = $imageName2 = $imageName3 = $imageName4 = null;
        $ok = $ok2 = $ok3 = $ok4 = false;
        
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $uniqueId = md5(uniqid(rand(), true));
            $imageName = time() .$uniqueId. '.' . $request->file('image')->extension();  
            $ok = $request->file('image')->move(public_path('images'), $imageName);
        }

        if ($request->hasFile('image2')) {
            $request->validate([
                'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $uniqueId = md5(uniqid(rand(), true));
            $imageName2 = time() .$uniqueId. '.' . $request->file('image2')->extension();  
            $ok2 = $request->file('image2')->move(public_path('images'), $imageName2);
        }

        if ($request->hasFile('image3')) {
            $request->validate([
                'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $uniqueId = md5(uniqid(rand(), true));
            $imageName3 = time() .$uniqueId. '.' . $request->file('image3')->extension();  
            $ok3 = $request->file('image3')->move(public_path('images'), $imageName3);
        }
        
        if ($request->hasFile('image4')) {
            $request->validate([
                'image4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $uniqueId = md5(uniqid(rand(), true));
            $imageName4 = time() .$uniqueId. '.' . $request->file('image4')->extension();  
            $ok4 = $request->file('image4')->move(public_path('images'), $imageName4);
        }
        
        $pegawai = Gambar::find($id);
                

        // dd($request->gid);
        $pegawai->nama = $request->nama;
        $pegawai->lokasi = ($ok) ? $imageName : $pegawai->lokasi;
        $pegawai->lokasi2 = ($ok2) ? $imageName2 : $pegawai->lokasi2;
        $pegawai->lokasi3 = ($ok3) ? $imageName3 : $pegawai->lokasi3;
        $pegawai->lokasi4 = ($ok4) ? $imageName4 : $pegawai->lokasi4;
        $pegawai->deskripsi = $request->deskripsi;
        $pegawai->harga = $request->harga;
        $pegawai->kategori = null; //($request->is_kategori == 't') ? $request->gid : null;
        $pegawai->sub_kategori = $request->kategori; //($request->is_kategori == 't') ? null : $request->kategori;
        $pegawai->is_aktif = $request->is_aktif;
                
        $pegawai->save();
        return redirect('/admin/list_item');
    }


     public function delete($id)
    {
    		$pegawai = Gambar::find($id);
    		$pegawai->delete();
    		return redirect('/admin/list_item');
    }

}
