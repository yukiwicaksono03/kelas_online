<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCafe;
use App\Models\ProductForest;
use App\Models\Transaksi;
use App\Models\Proposal;
use App\Models\TransaksiDetail;
use App\Gambar;
use App\GambarDetail;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;
use Carbon\Carbon;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

// use Spatie\Browsershot\Browsershot;
// use Spipu\Html2Pdf\Html2Pdf;


use Illuminate\Support\Facades\Mail;
use App\Mail\ExampleMail;

use Codedge\Fpdf\Fpdf\Fpdf;



class ProductController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('layout');

    }
  
    public function get_tot_bill()
    {
        $session_id = session()->getId();
        $rs_tot_bill = Transaksi::select(DB::raw('count(list_transaksi_d.id) as tot_bill'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->where('session_id', '=', $session_id)
                                    ->first();
        $tot_bill = ($rs_tot_bill) ? $rs_tot_bill->tot_bill : 0;
        return $tot_bill;

    }

    public function home()
    {
        // return view('home');
        // $uniqueId = md5(uniqid(rand(), true));
        // Session::put('session_id1', $uniqueId);
        // Session::put('session_id2', $uniqueId);

        // $is_trans_done = 'f';
        // if(Session::get('session_id1') != Session::get('session_id2')){
        //     $is_trans_done = 't';
        // }

        // $gambar = Gambar::all();

        $gambar = Gambar::select('*')
                    ->where('kategori', '!=', '')
                    ->get();
        return view('home', compact('gambar'));
    }
    
    public function _api_kolaborasi()
    {
        // $gambar = Gambar::all();

        $gambar = Gambar::select('*')
                    ->where('kategori', '!=', '')
                    ->where('is_aktif', '=', true)
                    ->get();
        // $product_kolaborasi = ProductCafe::all();
        // return view('kolaborasi', compact('gambar'));
        return response()->json($gambar);
    }

    public function kolaborasi()
    {
        // $gambar = Gambar::all();

        $gambar = Gambar::select('*')
                    ->where('kategori', '!=', '')
                    ->where('is_aktif', '=', true)
                    ->get();
        // $product_kolaborasi = ProductCafe::all();
        return view('kolaborasi', compact('gambar'));
    }

    public function detail_kategori($id)
    {
        // $gambar = Gambar::all();

        $gambar = Gambar::select('*')
                    ->where('sub_kategori', '=', $id)
                    ->where('is_aktif', '=', true)
                    ->get();
        $product_kolaborasi = Gambar::select('nama')
                    ->where('kategori', '=', $id)
                    ->where('is_aktif', '=', true)
                    ->first();
        return view('detail_kategori', compact('product_kolaborasi','gambar'));
    }

    public function detail_item($id)
    {
        // $gambar = Gambar::all();
        $session_id = session()->getId();

        $gambar = Gambar::select('*')
                    ->where('gid', '=', $id)
                    ->where('is_aktif', '=', true)
                    ->first();
// dd($gambar);
// foreach ($gambar as $val) { 
//     echo '<br>test : '.$val->sub_kategori;
// }
        $gambarrelated = Gambar::select('*')
                    ->where('sub_kategori', '=', $gambar->sub_kategori)
                    ->where('is_aktif', '=', true)
                    ->take(3)
                    ->get();
        // $gambardetail = Gambar::select('gambar_detail.lokasi')
        //             ->join('gambar_detail', 'gambar_detail.gid', '=', 'gambar.gid')
        //             ->where('gambar.gid', '=', $id)
        //             ->get();


        $gambardetail = DB::table('gambar')
            ->select('lokasi')
            ->where('gid', '=', $id)
            ->unionAll(DB::table('gambar')
            ->select(DB::raw('lokasi2 as lokasi'))
            ->where('gid', '=', $id))
            ->unionAll(DB::table('gambar')
            ->select(DB::raw('lokasi3 as lokasi'))
            ->where('gid', '=', $id))
            // ->unionAll(DB::table('gambar')
            // ->select(DB::raw('lokasi4 as lokasi'))
            // ->where('gid', '=', $id))
            ->get();

        $cek_data = Transaksi::select(DB::raw('gambar.sub_kategori'), 'list_transaksi_d.is_edit')
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    ->first();
                                    // dd($cek_data->sub_kategori.' == '.$gambar->sub_kategori);
        $is_sudah = false;
        $kategorinya = '';
        // dd($cek_data->sub_kategori);
        if($cek_data){
            if(($cek_data->sub_kategori == $gambar->sub_kategori) || ($cek_data->is_edit != '1')){
                $is_sudah = true;
                $kategorinya = Gambar::select('nama')->where('kategori', '=', $gambar->sub_kategori)->first()->nama;
            }
        }

        $kategori_id = $gambar->sub_kategori;

        return view('detail_item', compact('gambardetail','gambarrelated','gambar','is_sudah','kategorinya','kategori_id'));
    }
    
    public function checkout()
    {
        // dd(session()->getId());
        // dd(Auth::user()->id);
        // Auth::check();
        // dd($this->middleware('auth'));
        $session_id = session()->getId();

        $billing = Transaksi::select('list_transaksi.tipe_order','list_transaksi_d.id', DB::raw('DATE(list_transaksi.created_at) as trans_date'), 'gambar.nama', 'gambar.lokasi', 'gambar.deskripsi')
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    ->limit('10')
                                    ->get();
        // $gambar = Gambar::all();
        // $product_kolaborasi = ProductCafe::all();
        return view('checkout', compact('billing'));
    }

    public function add_cart()
    {
        session()->flash('success', 'Cart updated successfully');
    }

    public function cafe()
    {
        $gambar = Gambar::all();
        $product_cafes = ProductCafe::all();
        return view('cafe', compact('product_cafes','gambar'));
    }
    
    public function forest()
    {
        $gambar = Gambar::all();
        // $products = Product::all();
        $product_forest = ProductForest::all();
        return view('forest', compact('product_forest','gambar'));
    }
    
    public function resto()
    {
        $gambar = Gambar::all();
        $products = Product::all();
        return view('resto', compact('products','gambar'));
    }

    public function menu_resto()
    {
        $products = Product::all();
        return view('menu_resto', compact('products'));
    }

public function clearCookie()
{
    $response = new Response('Cookie Cleared');
    $response->withCookie(cookie()->forget('cookie_name'));

    return $response;
}

    public function cart()
    {
        
        // session()->flush();
        // session()->regenerate();
        $session_id = session()->getId();
        // echo "string : ".$session_id;
        // dd($session_id);
        // \DB::enableQueryLog(); // Enable query log
        $billing = Transaksi::select(DB::raw('FORMAT(a.harga,0) as harga'), 'list_transaksi.ltid', 'list_transaksi.tipe_order','list_transaksi_d.id', DB::raw('DATE(list_transaksi.created_at) as trans_date'), 'a.nama', 'a.lokasi', 'a.deskripsi', 'a.sub_kategori', DB::raw('b.nama as kat'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar as a', 'a.gid', '=', 'list_transaksi_d.id')
                                    ->join('gambar as b', 'a.sub_kategori', '=', 'b.kategori')
                                    ->where('session_id', '=', $session_id)
                                    // ->limit('10')
                                    ->get();
        $all_kat = Gambar::select(DB::raw('count(gid) as all_kat'))
                            ->where('gambar.kategori', '<>', '')
                            ->first();
                // dd($all_kat->all_kat);
        $done_all_kat = Transaksi::select(DB::raw('1 as ltid'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    ->having(DB::raw('count(distinct sub_kategori)'), '=', $all_kat->all_kat)
                                    ->first();


        $cek_kat = Transaksi::select(DB::raw('GROUP_CONCAT(gambar.sub_kategori) as list_kat'), DB::raw('count(list_transaksi_d.id) as tot_bill'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    ->first();
        $total_bill = 0;                                    
        $total_bill = Transaksi::select(DB::raw('sum(gambar.harga) as total'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    ->first();
        $total_bill = number_format($total_bill->total);
    // dd(\DB::getQueryLog()); // Show results of log
        if($done_all_kat){
            $status = $done_all_kat->ltid;            
        }else{
            $status = 0;
        }

        $data_kat_belum = ''; //masih kosong
        
        if($status == 0){
        $kat_belum = '';
        $kat_udah = '';

            if($cek_kat->list_kat){
                $all_kat = Gambar::select(DB::raw('GROUP_CONCAT(kategori) as kat_id'))
                                ->where('kategori', '!=', '')
                                ->first();
                $arr_kat = explode(',', $all_kat->kat_id);
                foreach ($arr_kat as $key => $value) {
                    $arr_kat_curr = explode(',', $cek_kat->list_kat);
                }
            }

                $result = Gambar::select(DB::raw('GROUP_CONCAT(nama) as final'))->wherenotin('kategori', $arr_kat_curr)->first();

                $data_kat_belum = $result->final;
            
        }
        // dd($data_kat_belum);

        return view('cart', compact('billing','status','data_kat_belum','total_bill'));

    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
          // dd($product);
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function editBill(Request $request){

            // die($request);
            // $ltid = Transaksi::where('session_id', '=', session()->getId());
            $is_done = 'f';
            $session_id = session()->getId();

            $ltdid = Transaksi::select('list_transaksi_d.ltdid')
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->where('list_transaksi.session_id', '=', $session_id)
                                    ->where('list_transaksi_d.id', '=', $request->id)
                                    ->first();
            // die($ltdid);
            if($ltdid){
            $edit = DB::table('list_transaksi_d')
                    ->where('ltdid', '=', $ltdid->ltdid)
                    ->update(array('is_edit' => 1));
            }
            // die($del);
            if($edit){
                $is_done = 't';
            }
        // $gambar = Gambar::find(9);
        // dd($gambar->gid);
            // $is_done = '';
            

            die($is_done);
            // Session::flash('success','Data berhasil ditambahkan.');
            // return redirect('/resto');
        // }
    }


    public function delBill(Request $request){

            // die($request);
            // $ltid = Transaksi::where('session_id', '=', session()->getId());
            $is_done = 'f';
            $session_id = session()->getId();

            $ltdid = Transaksi::select('list_transaksi_d.ltdid')
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->where('list_transaksi.session_id', '=', $session_id)
                                    ->where('list_transaksi_d.id', '=', $request->id)
                                    ->first();
            // die($ltdid);
            if($ltdid){
            $del = DB::table('list_transaksi_d')
                    ->where('ltdid', '=', $ltdid->ltdid)->delete();
            }
            // die($del);
            if($del){
                $is_done = 't';
            }
        // $gambar = Gambar::find(9);
        // dd($gambar->gid);
            // $is_done = '';
            

            die($is_done);
            // Session::flash('success','Data berhasil ditambahkan.');
            // return redirect('/resto');
        // }
    }


    public function saveTrans(Request $request){

            // die($request->tgl_booking);
            // $ltid = Transaksi::where('session_id', '=', session()->getId());
            $is_done = 'f';
            $session_id = session()->getId();
            $ltid = Transaksi::select('ltid')
                     ->where('session_id', '=', $session_id)
                     ->first();
            
            if($ltid){ //kalo ada input detail
                // dd($ltid->ltid);   
                $trans_d = TransaksiDetail::create([
                    // 'user_id' => Auth::user()->id,
                    'ltid' => $ltid->ltid,
                    'id' => $request->gid,
                    // 'jml' => $data[$i]->jml
                ]);         
                $is_done = 't';

            }else{ //kalo ga ada input header
                // dd('casw');
                if(!$ltid){
                    $trans = Transaksi::create([
                        // session()->getId()
                        // 'user_id' => Auth::user()->id,
                        'session_id' => session()->getId(),
                        // 'nama' => $request->nama,
                        // 'notes' => $request->notes,
                        // 'jml_org' => $request->jml_org,
                        // 'tgl_booking' => $request->tgl_booking,
                        // 'tipe_order' => $request->tipe_order
                    ]);
                }

                // dd($trans);
                if($trans->ltid){
                    $trans_d = TransaksiDetail::create([
                        // 'user_id' => Auth::user()->id,
                        'ltid' => $trans->ltid,
                        'id' => $request->gid,
                        // 'jml' => $data[$i]->jml
                    ]); 
                    $is_done = 't';
                }
            }

        // $gambar = Gambar::find(9);
        // dd($gambar->gid);
            // $is_done = '';
            

            die($is_done);
            // Session::flash('success','Data berhasil ditambahkan.');
            // return redirect('/resto');
        // }
    }


    public function saveProposal(Request $request){

            // dd($request);
            // die($request->tgl_booking);
            // $ltid = Transaksi::where('session_id', '=', session()->getId());
            $is_done = 'f';
            $session_id = session()->getId();
            $lpid = Proposal::select('lpid')
                     ->where('session_id', '=', $session_id)
                     ->first();
            $ltid = Transaksi::select('ltid')
                     ->where('session_id', '=', $session_id)
                     ->first();
            
            if($lpid){ //kalo ada input detail
                // dd($ltid->ltid);   
                // $trans_d = TransaksiDetail::create([
                //     // 'user_id' => Auth::user()->id,
                //     'ltid' => $ltid->ltid,
                //     'id' => $request->gid,
                //     // 'jml' => $data[$i]->jml
                // ]);         
                $is_done = 'f';

            }else{ //kalo ga ada input header
                // dd('casw');
                if($ltid){
                    if(!$lpid){
                        $trans = Proposal::create([
                            // session()->getId()
                            'ltid' => $ltid->ltid,
                            'session_id' => session()->getId(),
                            'nama' => $request->nama,
                            'phone' => $request->phone,
                            'email' => $request->email,
                            'alamat' => $request->alamat,
                        ]);
                        $is_done = 't';
                    }
                }
            }

        // $gambar = Gambar::find(9);
        // dd($gambar->gid);
            // $is_done = '';
            if($is_done == 't'){
                $this->generate_pdf($request);
                session()->regenerate();
            }
            die($is_done);
            // $request->session()->flush();
            // Session::flash('success','Data berhasil ditambahkan.');
            // return redirect('/resto');
        // }
    }


    public function berhasil()
    {
        $session_id = session()->getId();
        $proposal = Proposal::select('list_proposal.lpid')
                                    ->join('list_transaksi', 'list_transaksi.ltid', '=', 'list_proposal.ltid')
                                    ->where('list_transaksi.session_id', '=', $session_id)
                                    ->limit('1')
                                    ->first();

            

            // echo '<br>ses '.session()->getId();
            if($proposal){
                if($proposal->lpid != ''){
                    // echo 'cekcok : '.$proposal->lpid;
                    session()->regenerate();
                }
            }
        // echo '<br>ses2 '.session()->getId();
        return view('berhasil');
    }



    public function list_menu()
    {
        $product_cafes = ProductCafe::all();
        $product_forest = ProductForest::all();
        $products = Product::all();
        $gambar = Gambar::all();
 
        return view('list_menu', compact('products','product_cafes','product_forest','gambar'));
        //return view('list_menu', ['products' => $products], ['product_cafes' => $product_cafes], ['gambar' => $gambar]);

    }

    public function detail_blog($id)
    {
            $gambar = Gambar::find($id);
            return view('detail_blog', ['gambar' => $gambar]);
    }

 
     public function generatePDF_old() {
        $data = [
            // Data you want to pass to your HTML view
            'title' => 'Sample PDF Title',
            // ...
        ];

        $pdf = PDF::loadView('testpdf', $data);
        // $pdf = PDF::loadView('testpdf', ['Data' => $data])->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('sample.pdf');
    }
   


    public function generatePDF_oldd() {
        $url = 'http://localhost:8000/kolaborasi'; // URL of the HTML page you want to convert

        Browsershot::url($url)
            ->save('/sample.pdf');

        // return response()->download('/sample.pdf');
    }

    public function generatePDF_olddd() {
        // $html = '<html><body><h1>Your PDF Content</h1><p>Any HTML content you want to convert to PDF.</p></body></html>';
        
$session_id = session()->getId();
        // echo "string : ".$session_id;
        // dd($session_id);
        $billing = Transaksi::select('list_transaksi.tipe_order','list_transaksi_d.id', DB::raw('DATE(list_transaksi.created_at) as trans_date'), 'gambar.nama', 'gambar.lokasi', 'gambar.deskripsi', 'gambar.sub_kategori')
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    // ->limit('10')
                                    ->get();

        $cek_bill_kat = Transaksi::select(DB::raw('1 as ltid'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    ->having(DB::raw('count(distinct sub_kategori)'), '=', 6)
                                    ->first();


        $cek_kat = Transaksi::select(DB::raw('1 as kategori'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    ->having(DB::raw('count(distinct sub_kategori)'), '=', 6)
                                    ->first();
                                    // dd($cek_bill_kat);
        if($cek_bill_kat){
            $status = $cek_bill_kat->ltid;            
        }else{
            $status = 0;
        }
        // echo $trans_d->toRawSql(); 
        // die('<pre>'.print_r($top_sales).'</pre>');
        // return view('cart', ['billing' => $billing]);
        $html = view('cart', compact('billing','status'));



        // $html = view('cart')->render();

    // $html = '<h1>Hello, PDF!</h1><p>This is a test PDF generated from Laravel using wkhtmltopdf.</p>';

    return PDF::loadHTML($html)->download('example.pdf');

        // Alternatively, to force download the PDF:
        // $html2pdf->output('sample.pdf', 'D');

        // Or save the PDF to a specific path:
        // $html2pdf->output('path/to/save/sample.pdf', 'F');

        // Note: 'D' forces download, 'F' saves to file, and 'I' sends inline to browser.

        exit; // Terminate Laravel process after generating the PDF
    }


    public function generatePDF() {

        $session_id = session()->getId();
        // echo "string : ".$session_id;
        // dd($session_id);
        $billing = Transaksi::select('list_transaksi.tipe_order','list_transaksi_d.id', DB::raw('DATE(list_transaksi.created_at) as trans_date'), 'gambar.nama', 'gambar.lokasi', 'gambar.deskripsi', 'gambar.sub_kategori')
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    // ->limit('10')
                                    ->get();

        // $cek_bill_kat = Transaksi::select(DB::raw('1 as ltid'))
        //                             ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
        //                             ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
        //                             ->where('session_id', '=', $session_id)
        //                             ->having(DB::raw('count(distinct sub_kategori)'), '=', 6)
        //                             ->first();


        // $cek_kat = Transaksi::select(DB::raw('1 as kategori'))
        //                             ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
        //                             ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
        //                             ->where('session_id', '=', $session_id)
        //                             ->having(DB::raw('count(distinct sub_kategori)'), '=', 6)
        //                             ->first();
        //                             // dd($cek_bill_kat);
        // if($cek_bill_kat){
        //     $status = $cek_bill_kat->ltid;            
        // }else{
        //     $status = 0;
        // }




        // echo $trans_d->toRawSql(); 
        // die('<pre>'.print_r($top_sales).'</pre>');
        // return view('cart', ['billing' => $billing]);


        // return view('cart', compact('billing','status'));

        $this->fpdf = new Fpdf;

        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->AddPage("L", ['100', '100']);
        $this->fpdf->Text(10, 10, "Hello World!");       

        foreach ($billing as $data) {
            // echo "<br>string : ".$data->nama;
            $this->fpdf->Ln();
            $this->fpdf->Text(10, 10, $data->nama);       
            $this->fpdf->Ln(20);       

        }

        $this->fpdf->Output();

        exit;
    }


public function generatePDFWithTable() {
    $pdf = new FPDFWrapper();
    $pdf->AddPage();

    // Table header
    $header = ['Column 1', 'Column 2', 'Column 3', 'Column 4'];

    // Table data
    $data = [
        ['Data 1.1', 'Data 1.2', 'Data 1.3', 'Data 1.4'],
        ['Data 2.1', 'Data 2.2', 'Data 2.3', 'Data 2.4'],
        // Add more rows as needed
    ];

    $pdf->generateTable($header, $data);

    // Output the PDF (you can save it or output it to the browser)
    $pdf->Output(); // Output to browser
}

    public function cart_test()
    {
        // $data = [
        //     'foo' => 'hello 1',
        //     'bar' => 'hello 2'
        // ];

        $session_id = session()->getId();
        // echo "string : ".$session_id;
        // dd($session_id);
        $billing = Transaksi::select('list_transaksi.tipe_order','list_transaksi_d.id', DB::raw('DATE(list_transaksi.created_at) as trans_date'), 'gambar.nama', 'gambar.lokasi', 'gambar.deskripsi', 'gambar.sub_kategori')
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    // ->limit('10')
                                    ->get();

        // echo $trans_d->toRawSql(); 
        // die('<pre>'.print_r($top_sales).'</pre>');
        // return view('cart', ['billing' => $billing]);
        // return view('cart', compact('billing'));

// dd($billing);
        // $pdf = PDF::loadView('testpdf',$data);
        $pdf = PDF::loadView('cart_test',compact('billing'));

        return $pdf->stream('downloaded_file.pdf');
    }

    public function cetak_pdf()
    {
        // $gambar = Gambar::all();
 
        // dd($gambar);

        $data = [
            'foo' => 'hello 1',
            'bar' => 'hello 2'
        ];
        $pdf = PDF::loadview('gambar_pdf',['gambar'=>$data]);
        return $pdf->stream('gambar-pdf');
    }


    // Inside your method
    public function sendEmail()
    {
        $data = [
            'name' => 'John Doe',
            // Other data you want to pass to the email view
        ];

        Mail::to('yuki.doyle@gmail.com')->send(new ExampleMail($data));

        // Optionally, you can check if the email was sent successfully
        if (Mail::failures()) {
            // Handle failed emails
            return 'Email not sent.';
        }

        return 'Email sent successfully!';
    }


    public function generate_pdf(Request $request)
    {
        $session_id = session()->getId();
        $billing = Transaksi::select('list_transaksi.ltid', 'list_transaksi.tipe_order','list_transaksi_d.id', DB::raw('DATE(list_transaksi.created_at) as trans_date'), 'a.nama', 'a.lokasi', 'a.deskripsi', 'a.sub_kategori', DB::raw('b.nama as kat'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar as a', 'a.gid', '=', 'list_transaksi_d.id')
                                    ->join('gambar as b', 'a.sub_kategori', '=', 'b.kategori')
                                    ->where('session_id', '=', $session_id)
                                    // ->limit('10')
                                    ->get();

                                    

        $cek_bill_kat = Transaksi::select(DB::raw('1 as ltid'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    ->having(DB::raw('count(distinct sub_kategori)'), '=', 6)
                                    ->first();


        // $cek_kat = Transaksi::select(DB::raw('GROUP_CONCAT(gambar.sub_kategori) as list_kat'))
        //                             ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
        //                             ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
        //                             ->where('session_id', '=', $session_id)
        //                             ->first();
        if($cek_bill_kat){
            $status = $cek_bill_kat->ltid;            
        }else{
            $status = 0;
        }

        $data_kat_belum = ''; //masih kosong
        
        // if($status <> 0){
        // if($cek_kat->list_kat){
        //     $kat_belum = '';
        //     if(str_contains($cek_kat->list_kat,'1') == false){
        //         $kat_belum .= Gambar::select('gambar.nama')->where('kategori', '=', '1')->first()->nama.', ';
        //     }
        //     if(str_contains($cek_kat->list_kat,'2') == false){
        //         $kat_belum .= Gambar::select('gambar.nama')->where('kategori', '=', '2')->first()->nama.', ';
        //     }
        //     if(str_contains($cek_kat->list_kat,'3') == false){
        //         $kat_belum .= Gambar::select('gambar.nama')->where('kategori', '=', '3')->first()->nama.', ';
        //     }
        //     if(str_contains($cek_kat->list_kat,'4') == false){
        //         $kat_belum .= Gambar::select('gambar.nama')->where('kategori', '=', '4')->first()->nama.', ';
        //     }
        //     if(str_contains($cek_kat->list_kat,'5') == false){
        //         $kat_belum .= Gambar::select('gambar.nama')->where('kategori', '=', '5')->first()->nama.', ';
        //     }
        //     if(str_contains($cek_kat->list_kat,'6') == false){
        //         $kat_belum .= Gambar::select('gambar.nama')->where('kategori', '=', '6')->first()->nama.', ';
        //     }
        //     $data_kat_belum = rtrim($kat_belum,',');
        // }
        // }

        // return view('cart', compact('billing','status','data_kat_belum'));

        // $data = [
        //     '// Your data to be passed to the PDF view'
        // ];
        
        $proposal = Proposal::select('list_proposal.nama','list_proposal.created_at','list_proposal.alamat')
                            ->join('list_transaksi', 'list_transaksi.ltid', '=', 'list_proposal.ltid')
                            ->where('list_transaksi.session_id', '=', $session_id)
                            ->first();

        $pdf = PDF::loadView('cart_pdf_new', compact('billing','status','data_kat_belum','proposal'));
        // $pdf = PDF::loadView('template', $data);

        $ltidnya = Transaksi::select('list_transaksi.ltid')
                                    ->where('session_id', '=', $session_id)
                                    ->first();

        // return $pdf->download('PDF-PROPOSAL-'.$ltidnya->ltid.'.pdf');
        // $hasil_pdf = $pdf->download('PDF-PROPOSAL-'.$ltidnya->ltid.'.pdf');
// dd(storage_path());
        $pdfContent = $pdf->output();
        $customPath = public_path('pdf/');
        if (!file_exists($customPath)) {
            mkdir($customPath, 0755, true);
        }
        $fileName = 'PDF-PROPOSAL-'.$ltidnya->ltid . '.pdf';

        file_put_contents($customPath . $fileName, $pdfContent);
        // return response()->download($customPath . $fileName, 'generated_pdf.pdf');

        // $hasil_pdf = Storage::disk('local')->put(public_path() . 'PDF-PROPOSAL-'.$ltidnya->ltid, $pdf->output());

        $list_proposal = Proposal::select('list_proposal.lpid','list_proposal.nama', 'list_proposal.phone', 'list_proposal.email', 'list_proposal.alamat', DB::raw('DATE(list_proposal.created_at) as trans_date'))
                        ->where('ltid', '=', $ltidnya->ltid)
                        ->first();

        $data["email"] = "yuki.doyle@gmail.com"; //"aatmaninfotech@gmail.com";
        $data["title"] =  "SMI WEDDING - NEW PROPOSAL";
        $data["body"] =  "This is Demo";
        $data["nama"] =  $list_proposal->nama;
        $data["phone"] =  $list_proposal->phone;
        $data["email_user"] =  $list_proposal->email;
        $data["alamat"] =  $list_proposal->alamat;
        $data["trans_date"] =  $list_proposal->trans_date;
 
 // dd($request->email);
        // $this->sendRequest($uri);
        $file = public_path('pdf/'.$fileName);
        // dd($files);    
        Mail::send('email_page', $data, function($message)use($data, $file) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);
 
            // foreach ($files as $file){
                $message->attach($file);
            // }
            
        });

        return 'pdf done!';
    }


    public function about()
    {
        return view('about');
    }

    public function pdf_new(Request $request){

        $session_id = session()->getId();
        $billing = Transaksi::select('list_transaksi.ltid', 'list_transaksi.tipe_order','list_transaksi_d.id', DB::raw('DATE(list_transaksi.created_at) as trans_date'), 'a.nama', 'a.lokasi', 'a.deskripsi', 'a.sub_kategori', DB::raw('b.nama as kat'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar as a', 'a.gid', '=', 'list_transaksi_d.id')
                                    ->join('gambar as b', 'a.sub_kategori', '=', 'b.kategori')
                                    ->where('session_id', '=', $session_id)
                                    // ->limit('10')
                                    ->get();

                                    

        $cek_bill_kat = Transaksi::select(DB::raw('1 as ltid'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    ->having(DB::raw('count(distinct sub_kategori)'), '=', 6)
                                    ->first();


        // $cek_kat = Transaksi::select(DB::raw('GROUP_CONCAT(gambar.sub_kategori) as list_kat'))
        //                             ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
        //                             ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
        //                             ->where('session_id', '=', $session_id)
        //                             ->first();
        if($cek_bill_kat){
            $status = $cek_bill_kat->ltid;            
        }else{
            $status = 0;
        }

        $data_kat_belum = ''; //masih kosong
        

        $proposal = Proposal::select('list_proposal.nama','list_proposal.created_at','list_proposal.alamat')
                            ->join('list_transaksi', 'list_transaksi.ltid', '=', 'list_proposal.ltid')
                            ->where('list_transaksi.session_id', '=', $session_id)
                            ->first();

        $pdf = PDF::loadView('cart_pdf_new', compact('billing','status','data_kat_belum','proposal'));
        // $pdf = PDF::loadView('template', $data);

        $ltidnya = Transaksi::select('list_transaksi.ltid')
                                    ->where('session_id', '=', $session_id)
                                    ->first();

        // return $pdf->download('PDF-PROPOSAL-'.$ltidnya->ltid.'.pdf');
        // $hasil_pdf = $pdf->download('PDF-PROPOSAL-'.$ltidnya->ltid.'.pdf');
// dd(storage_path());
        $pdfContent = $pdf->output();
        $customPath = public_path('pdf/');
        if (!file_exists($customPath)) {
            mkdir($customPath, 0755, true);
        }
        $fileName = 'PDF-PROPOSAL-'.$ltidnya->ltid . '.pdf';

        file_put_contents($customPath . $fileName, $pdfContent);
    }

function cart_pdf_new(){

        
        // session()->flush();
        // session()->regenerate();
        $session_id = session()->getId();
        // echo "string : ".$session_id;
        // dd($session_id);
        // \DB::enableQueryLog(); // Enable query log
        $billing = Transaksi::select(DB::raw('FORMAT(a.harga,0) as harga'), 'list_transaksi.ltid', 'list_transaksi.tipe_order','list_transaksi_d.id', DB::raw('DATE(list_transaksi.created_at) as trans_date'), 'a.nama', 'a.lokasi', 'a.deskripsi', 'a.sub_kategori', DB::raw('b.nama as kat'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar as a', 'a.gid', '=', 'list_transaksi_d.id')
                                    ->join('gambar as b', 'a.sub_kategori', '=', 'b.kategori')
                                    ->where('session_id', '=', $session_id)
                                    // ->limit('10')
                                    ->get();
        $all_kat = Gambar::select(DB::raw('count(gid) as all_kat'))
                            ->where('gambar.kategori', '<>', '')
                            ->first();
                // dd($all_kat->all_kat);
        $done_all_kat = Transaksi::select(DB::raw('1 as ltid'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    ->having(DB::raw('count(distinct sub_kategori)'), '=', $all_kat->all_kat)
                                    ->first();


        $cek_kat = Transaksi::select(DB::raw('GROUP_CONCAT(gambar.sub_kategori) as list_kat'), DB::raw('count(list_transaksi_d.id) as tot_bill'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    ->first();
        $total_bill = 0;                                    
        $total_bill = Transaksi::select(DB::raw('sum(gambar.harga) as total'))
                                    ->join('list_transaksi_d', 'list_transaksi.ltid', '=', 'list_transaksi_d.ltid')
                                    ->join('gambar', 'gambar.gid', '=', 'list_transaksi_d.id')
                                    ->where('session_id', '=', $session_id)
                                    ->first();
        $total_bill = number_format($total_bill->total);
    // dd(\DB::getQueryLog()); // Show results of log
        if($done_all_kat){
            $status = $done_all_kat->ltid;            
        }else{
            $status = 0;
        }

        $data_kat_belum = ''; //masih kosong
        
        if($status == 0){
        $kat_belum = '';
        $kat_udah = '';

            if($cek_kat->list_kat){
                $all_kat = Gambar::select(DB::raw('GROUP_CONCAT(kategori) as kat_id'))
                                ->where('kategori', '!=', '')
                                ->first();
                $arr_kat = explode(',', $all_kat->kat_id);
                foreach ($arr_kat as $key => $value) {

                    $arr_kat_curr = explode(',', $cek_kat->list_kat);
                    foreach ($arr_kat_curr as $key2 => $value2) {
                        // echo '<br>test : '.$value.' === '.$value2;
                        if($value != $value2){
                            $kat_belum .= ', '.$value; 
                        }
                    }
                }
            }

                $arr_kat_belum = explode(', ', $kat_belum);

                // Count occurrences of each element
                $counts = array_count_values($arr_kat_belum);

                // Filter elements that appear more than once
                $duplicates = array_filter($counts, function ($count) {
                    return $count > 1;
                });

                // Extract keys of the filtered array
                if($cek_kat->tot_bill > 1){
                    $filtered_array = array_keys($duplicates);
                }else{
                    $filtered_array = $arr_kat_belum;
                }

                // Implode the filtered array into a string
                $kat_belum_nya = implode(', ', $filtered_array);

                $result = Gambar::select(DB::raw('GROUP_CONCAT(nama) as final'))->wherein('kategori', $filtered_array)->first();

                // echo "asdawd ".print_r($filtered_array);
                $data_kat_belum = $result->final;
            
        }

        $proposal = Proposal::select('list_proposal.nama','list_proposal.created_at','list_proposal.alamat')
                            ->join('list_transaksi', 'list_transaksi.ltid', '=', 'list_proposal.ltid')
                            ->where('list_transaksi.session_id', '=', $session_id)
                            ->first();

                        // echo 'ces' .$proposal;


        return view('cart_pdf_new', compact('billing','status','data_kat_belum','total_bill','proposal'));

}

}