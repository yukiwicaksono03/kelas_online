<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use File;
use Response;
// use App\proposal;
use App\Gambar;


use App\Models\Product;
use App\Models\ProductCafe;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Proposal;

use Codedge\Fpdf\Fpdf\Fpdf;


class ProposalController extends Controller
{

    protected $fpdf;


    public function __construct()
    {
        $this->middleware('auth');
        $this->fpdf = new Fpdf;
    }

    public function index()
    {
        
    	$proposal = Gambar::select('*')
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
    	return view('home_admin', ['proposal' => $proposal], ['top_sales' => $top_sales]);
        // return view('proposal', compact('proposal'));
    }

    public function list_item()
    {
        
        $list_item = Gambar::select('*')
                    ->where('sub_kategori', '!=', '')
                    ->get();
        
        return view('list_item', compact('list_item'));

    }

    public function list_proposal()
    {
        
        $list_proposal = Proposal::select('list_proposal.ltid','list_proposal.lpid','list_proposal.nama', 'list_proposal.phone', 'list_proposal.email', DB::raw('DATE(list_proposal.created_at) as trans_date'), 'list_proposal.status')
                        // ->join('list_transaksi', 'list_proposal.ltid', '=', 'list_proposal.ltid')
                        ->orderBy('list_proposal.created_at', 'DESC')
                        ->get();
        
        return view('list_proposal', compact('list_proposal'));

    }

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

        //JALAN
        // $this->fpdf->SetFont('Arial', 'B', 15);
        // $this->fpdf->AddPage("L", ['100', '100']);
        // $this->fpdf->Text(10, 10, "Hello World!");       

        // $this->fpdf->Output();
        // exit;
        //JALAN

    public function pdf_ori($id)
    {
        $list_item = Proposal::select('a.nama', DB::raw('a.lokasi, b.nama as kategorinya'))
                    ->leftjoin('list_transaksi', 'list_transaksi.ltid', '=', 'list_proposal.ltid')
                    ->join('list_transaksi_d', 'list_transaksi_d.ltid', '=', 'list_transaksi.ltid')
                    ->join(DB::raw('gambar a '), 'a.gid', '=', 'list_transaksi_d.id')
                    ->leftjoin(DB::raw('gambar b '), 'a.sub_kategori', '=', 'b.kategori')
                    ->where('list_proposal.lpid', '=', $id)
                    ->get();

        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->AddPage("P", 'A4');
        // $this->fpdf->setPrintHeader(false);
        // $this->fpdf->SetPrintFooter(false);
        // $this->fpdf->SetMargins(0, 0, 0);

        $this->fpdf->SetAutoPageBreak(false, 0);


        $this->fpdf->Cell(100,5,'Proposal','LR',1,'C',0);
        $this->fpdf->ln(10);
        
        $this->fpdf->Cell(15,5,'No.',1,0,'L',0);
        $this->fpdf->Cell(40,5,'Gambar',1,0,'L',0);
        $this->fpdf->Cell(40,5,'Nama Item',1,0,'L',0);
        $this->fpdf->Cell(40,5,'Kategori',1,0,'L',0);
    

        $no=1;
        $hg=30;
        

        foreach($list_item as $item){
            $this->fpdf->ln(30);
            $this->fpdf->Cell(10,5,$no++,1,0,'L',0);

            $imagePath = public_path().'/images/'.$item->lokasi;
            
            // Get image dimensions
            list($width, $height) = getimagesize($imagePath);

            // Calculate square crop dimensions
            $cropSize = min($width, $height);
            $x = ($width - $cropSize) / 2;
            $y = ($height - $cropSize) / 2;

            // $this->fpdf->Cell(100,5,$width.' -- '.$height.' | '.$x.' -- '.$y,1,0,'L',0);

            // Specify the crop area and add the cropped image to the PDF
            $this->fpdf->Image($imagePath, 20, $hg, 20, 20, '', '', '', false, 300, '', false, false, $x, $y);

            // Output the PDF

            // $this->fpdf->Image($imagePath, 10, $hg, 30);
            
            $this->fpdf->Cell(20);
            $this->fpdf->Cell(100,0,$item->nama,1,0,'L',0);
            $this->fpdf->Cell(50,0,$item->kategorinya,1,0,'L',0);
            $hg += 25;
        }


        $this->fpdf->Output();

        exit;

    }


public function pdf($id)
{

    $list_item = Proposal::select('a.nama', DB::raw('a.lokasi, b.nama as kategorinya'), 'a.deskripsi')
                ->leftjoin('list_transaksi', 'list_transaksi.ltid', '=', 'list_proposal.ltid')
                ->join('list_transaksi_d', 'list_transaksi_d.ltid', '=', 'list_transaksi.ltid')
                ->join(DB::raw('gambar a '), 'a.gid', '=', 'list_transaksi_d.id')
                ->leftjoin(DB::raw('gambar b '), 'a.sub_kategori', '=', 'b.kategori')
                ->where('list_proposal.lpid', '=', $id)
                ->get();

    $this->fpdf->SetFont('Arial', 'B', 17);
    $this->fpdf->AddPage("P", 'A4');
    $this->fpdf->SetAutoPageBreak(false, 0);

    $this->fpdf->Cell(180, 10, 'Proposal', '', 1, 'C', 0);
    $this->fpdf->ln(10);
    $this->fpdf->SetFont('Arial', 'B', 13);
    
    $this->fpdf->Cell(15, 10, 'No.', 1, 0, 'L', 0);
    $this->fpdf->Cell(40, 10, 'Kategori', 1, 0, 'L', 0);
    $this->fpdf->Cell(80, 10, 'Item', 1, 0, 'L', 0);
    $this->fpdf->Cell(55, 10, 'Detail', 1, 1, 'L', 0); // Adjusted the last parameter to 1 for line break
    
    $no = 1;
    $hg = 45;
    
    foreach ($list_item as $item) {
        $this->fpdf->SetFont('Arial', 'B', 13);
        $this->fpdf->Cell(15, 30, $no++, 1, 0, 'L', 0);
        
        $imagePath = public_path() . '/images/' . $item->lokasi;
        
        
        
        $this->fpdf->Cell(40, 30, $item->kategorinya, 1, 0, 'L', 0);
        // $this->fpdf->Cell(40);
        $this->fpdf->Cell(80, 30, '                     '.$item->nama, 1, 0, 'L', 0); // Adjusted the last parameter to 1 for line break
        $this->fpdf->Image($imagePath, 68, $hg , 20, 20); // Adjusted image positioning
        $this->fpdf->SetFont('Arial', 'B', 7);
        $this->fpdf->Cell(55, 30, $item->deskripsi , 1, 1, 'L', 0);
        // $this->fpdf->MultiCell(55, 10, $item->deskripsi, 1, 'L');
        // $this->fpdf->MultiCell(55, 2, $item->deskripsi, 0, 'L');


        $hg += 30;
    }

    $this->fpdf->Output();
    exit;
}




    public function pdfnew()
    {
        // $pdf = new PDF(); // Create PDF instance
        $this->fpdf->SetFont('Arial', 'B', 15);

        $this->fpdf->AddPage("P", 'A4');

        // Set table headers and data
        $headers = ['Name', 'Age', 'Country'];
        $data = [
            ['John Doe', '30', 'USA'],
            ['Jane Smith', '25', 'Canada'],
            ['Alice Johnson', '28', 'UK']
            // Add more data rows as needed
        ];

        // Set column widths
        $colWidths = [50, 30, 40]; // Adjust column widths as needed

        // Add table headers
        foreach ($headers as $header) {
            $this->fpdf->Cell($colWidths[key($colWidths)], 10, $header, 1);
            next($colWidths);
        }
        $this->fpdf->Ln(); // Move to the next line

        // Add table rows
        foreach ($data as $row) {
            foreach ($row as $column) {
                $this->fpdf->Cell($colWidths[key($colWidths)], 10, $column, 1);
                next($colWidths);
            }
            $this->fpdf->Ln(); // Move to the next line after each row
        }

        // Output the PDF
        return $this->fpdf->Output();
    }


    public function adminlte()
    {
    	return view('admin');
    }

    public function tambah()
    {
        return view('proposal_tambah');
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

        // dd($imageName.' -- '.$imageName2.' -- '.$imageName3.' -- '.$imageName4);
        // if($ok){
            Gambar::create([
                'nama' => $request->nama,
                'lokasi' => ($ok) ? $imageName : null,
                'lokasi2' => ($ok2) ? $imageName2 : null,
                'lokasi3' => ($ok3) ? $imageName3 : null,
                'lokasi4' => ($ok4) ? $imageName4 : null,
                'deskripsi' => $request->deskripsi,
                'sub_kategori' => $request->kategori,
                'is_aktif' => $request->is_aktif
                
            ]);
        	return redirect('/admin/list_item');
        // }else{
        //     echo '<script type="text/javascript">
        //             alert("Simpan Gagal. Mohon hubungi teknisi terkait.");
        //         </script>';
        //     return view('proposal_tambah');
        // }
    }

    public function edit(Request $request){

            $is_done = 'f';
            if($request->id){
            $edit = DB::table('list_proposal')
                    ->where('lpid', '=', $request->id)
                    ->update(array('status' => '1'));
            }
            // dd($edit);
            // die($del);
            if($edit){
                $is_done = 't';
            }
            die($is_done);
        // }
    }

    public function hapus(Request $request){

            $is_done = 'f';

            if($request->id){
            $edit = DB::table('list_proposal')
                    ->where('lpid', '=', $request->id)
                    ->update(array('status' => '2'));
            }
            
            if($edit){
                $is_done = 't';
            }

            die($is_done);
        // }
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
        
        $proposal = Gambar::find($id);
                
        $proposal->nama = $request->nama;
        $proposal->lokasi = ($ok) ? $imageName : $proposal->lokasi;
        $proposal->lokasi2 = ($ok2) ? $imageName2 : $proposal->lokasi2;
        $proposal->lokasi3 = ($ok3) ? $imageName3 : $proposal->lokasi3;
        $proposal->lokasi4 = ($ok4) ? $imageName4 : $proposal->lokasi4;
        $proposal->deskripsi = $request->deskripsi;
        $proposal->sub_kategori = $request->kategori;
                
        $proposal->save();
        return redirect('/admin/list_item');
    }


     public function delete($id)
    {
    		$proposal = Gambar::find($id);
    		$proposal->delete();
    		return redirect('/admin/list_item');
    }

     public function test_pdf()
    {
        $body_old = '<body>
        <div class="conteiner">
            <div class="row justify-content-center">
                <div class="col">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td colspan="6" class="text-center" style="font-family:\'courier\'; font-size:12px;">TEST HEADERS</td>
                            </tr>
                            <tr>
                                <td style="font-family:\'courier\'; font-size:12px;">Name  </td>
                                <td style="font-family:\'courier\'; font-size:12px;;">:</td>
                                <td style="font-family:\'courier\'; font-size:12px;;">John Doe</td>
                                <td style="font-family:\'courier\'; font-size:12px;;">Email</td>
                                <td style="font-family:\'courier\'; font-size:12px;;">:</td>
                                <td style="font-family:\'courier\'; font-size:12px;;">john_doe@gmail.com</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-center" style="font-family:\'courier\'; font-size:12px;">TEST FOOTER</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    ';


//     $htmlnya = view('file');
//     // dd($htmlnya);
// echo "string : ".$htmlnya;
//     $html = file_get_contents($htmlnya);
    $header = '<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="Sukabumi Wedding">
    <meta name="description" content="Sukabumi Wedding">
    <meta name="author" content="">

    <!-- Plugins -->
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Core Style Css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    </head>';

    $body = '
    <main class="main-bg">

                <!-- ==================== Start Slider ==================== -->

                <header class="work-header section-padding pb-0">
                    <div class="container mt-80">
                        <div class="row">
                            <div class="col-12">
                                <div class="caption">
                                    <h6 class="sub-title">Shopping</h6>
                                    <h1>Cart.</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Slider ==================== -->



                <!-- ==================== Start cart ==================== -->

                <section class="shop-cart section-padding">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <div>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <!-- <th>Quantity</th> -->
                                                <th>Subtotal</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td data-column="Product">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="img icon-img-80">
                                                                <img src="assets/imgs/shop/5.jpg" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="ml-30">
                                                            <h6>Men Hooded</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-column="price">
                                                    <h5 class="main-color4 fz-18">$130.00</h5>
                                                </td>
                                                
                                                <td data-column="Subtotal">
                                                    <h5 class="main-color4 fz-18">$130.00</h5>
                                                </td>
                                                <td class="remove">
                                                    <a href="#0">
                                                        <span class="pe-7s-close"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td data-column="Product">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="img icon-img-80">
                                                                <img src="assets/imgs/shop/5.jpg" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="ml-30">
                                                            <h6>Men Hooded</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-column="price">
                                                    <h5 class="main-color4 fz-18">$130.00</h5>
                                                </td>
                                                
                                                <td data-column="Subtotal">
                                                    <h5 class="main-color4 fz-18">$130.00</h5>
                                                </td>
                                                <td class="remove">
                                                    <a href="#0">
                                                        <span class="pe-7s-close"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row mt-80">
                                    <div class="col-lg-6">
                                        <div class="coupon mt-40">
                                            <h4>Discount</h4>
                                            <p class="fz-13">Enter your coupon code if you have one.</p>
                                            <form action="contact.php">
                                                <div class="form-group d-flex mt-30">
                                                    <input type="text" name="coupon_code">
                                                    <button type="submit" class="butn butn-md butn-bord">
                                                        <span>Apply</span>
                                                    </button>
                                                </div>
                                                <span class="fz-13 opacity-7 mt-10">Coupon code</span>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 offset-lg-2">
                                        <div class="total mt-40">
                                            <h4>Cart totals</h4>
                                            <ul class="rest mt-30">
                                                <li class="mb-5">
                                                    <h6>Subtotal : <span class="fz-16 main-color4 ml-10">$130.00</span></h6>
                                                </li>
                                                <li>
                                                    <h6>Total : <span class="fz-16 main-color4 ml-10">$260.00</span></h6>
                                                </li>
                                            </ul>
                                            <a href="shop-checkout.html" class="butn butn-md butn-bg main-colorbg4 mt-30">
                                                <span class="text-u fz-13 fw-600">Proceed to checkout</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ==================== End cart ==================== -->


            </main>';

    // dd($html);
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'margin_left' => 15, 'margin_right' => 15, 'margin_top' => 10, 'margin_bottom' => 25, 'margin_header' => 0, 'margin_footer' => 0]);

    $html = $body;


    // $mpdf->SetFooter($footer);
    //  $path = public_path('assets/css/bootstrap.min.css');
    // $file = fopen($path, 'r');
    // $mpdf->WriteHTML($this->stylesheet, fread($file, filesize($path)));
    $mpdf->WriteHTML($header, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

    $filename = 'assets/test_pdf.pdf';
    $mpdf->Output("$filename", \Mpdf\Output\Destination::FILE);
    $return = $filename;
    }

    public function pdfile($id){
        // dd($id);
        // return public_path('pdf/').'PDF-PROPOSAL-'.$id.'.pdf';
        // return File(stream, public_path('pdf/').'PDF-PROPOSAL-'.$id.'.pdf', "application/pdf");

        $file = File::get(public_path('pdf/').'PDF-PROPOSAL-'.$id.'.pdf');
       $response = Response::make($file, 200);
       $response->header('Content-Type', 'application/pdf');
       return $response;

    }


}
