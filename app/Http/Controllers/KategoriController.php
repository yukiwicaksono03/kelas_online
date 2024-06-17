<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

// use App\kategori;
use App\Gambar;


use App\Models\Product;
use App\Models\ProductCafe;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Proposal;

class KategoriController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
    	$kategori = Gambar::select('*')
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
    	return view('home_admin', ['kategori' => $kategori], ['top_sales' => $top_sales]);
        // return view('kategori', compact('kategori'));
    }

    public function list_kategori()
    {
        
        $list_kategori = Gambar::select('gambar.gid','gambar.lokasi','gambar.nama','gambar.deskripsi','gambar.sub_kategori','gambar.is_aktif', DB::raw('b.nama as nama_kat, case when gambar.kategori > 0 then \'Kategori\' else \'Vendor\' end as tipe'))
                    ->where('gambar.kategori', '>', 0)
                    ->leftjoin(DB::raw('gambar b'), 'gambar.sub_kategori', '=', 'b.kategori')
                    ->orderby('gambar.sub_kategori', 'asc')
                    ->get();
        
        return view('list_kategori', compact('list_kategori'));

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
        
        return view('kategori_tambah', compact('list_kat'));
        // return view('kategori_tambah');
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
                'kategori' => $gid, //($request->is_kategori == 't') ? $gid : null,
                'sub_kategori' => null, //($request->is_kategori == 't') ? null : $request->kategori,
                'is_aktif' => $request->is_aktif
                
            ]);
        	return redirect('/admin/kat/list_kategori');
        // }else{
        //     echo '<script type="text/javascript">
        //             alert("Simpan Gagal. Mohon hubungi teknisi terkait.");
        //         </script>';
        //     return view('kategori_tambah');
        // }
    }

    public function edit($id)
    {

        $list_kat = Gambar::select('nama', 'kategori')
                    ->where('kategori', '!=', '')
                    ->get();
        $kategori = Gambar::find($id);
        
        return view('kategori_edit', compact('list_kat','kategori'));
    		// return view('kategori_edit', ['kategori' => $kategori]);
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
        
        $kategori = Gambar::find($id);
                

        // dd($request->gid);
        $kategori->nama = $request->nama;
        $kategori->lokasi = ($ok) ? $imageName : $kategori->lokasi;
        $kategori->lokasi2 = ($ok2) ? $imageName2 : $kategori->lokasi2;
        $kategori->lokasi3 = ($ok3) ? $imageName3 : $kategori->lokasi3;
        $kategori->lokasi4 = ($ok4) ? $imageName4 : $kategori->lokasi4;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->kategori = $request->gid; //($request->is_kategori == 't') ? $request->gid : null;
        $kategori->sub_kategori = null; //($request->is_kategori == 't') ? null : $request->kategori;
        $kategori->is_aktif = $request->is_aktif;
                
        $kategori->save();
        return redirect('/admin/kat/list_kategori');
    }


     public function delete($id)
    {
    		$kategori = Gambar::find($id);
    		$kategori->delete();
    		return redirect('/admin/kat/list_kategori');
    }

}
