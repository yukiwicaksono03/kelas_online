@extends('layout')
  
@section('content')

<script type="text/javascript">
    window.onload = function(){
        // console.log('test : {{$data_kat_belum}}');
        if('{{$status}}' != '1'){
            var kat_belum = '{{$data_kat_belum}}';

            alert('Kategori : \n'+kat_belum.replace(/&amp;/g, '&')+' belum dipilih !\nMohon lengkapi semua kategori terlebih dahulu !');
            document.getElementById("datadiri").style.display = "none";
            // location.replace("/kolaborasi");
        }else{
            document.getElementById("datadiri").style.display = "";
        }
    }

    function edit(kat, id){
        if (confirm("Yakin edit data ?") == true) {

            $.post("/edit_bill",
            {
              // token: token,
                "_token": "{{ csrf_token() }}",
                id : id,
            },
            function(data,status){
                if(data == 't'){
                    // alert('Item berhasil dihapus.');
                    location.replace('/detail_kategori/'+kat);
                }
              // alert("Data: " + data + "\nStatus: " + status);
            });
        }else{
            return false;
        }
    }

    function del(id){
        if (confirm("Yakin hapus data ?") == true) {
            
            $.post("/del_bill",
            {
              // token: token,
                "_token": "{{ csrf_token() }}",
                id : id,
            },
            function(data,status){
                if(data == 't'){
                    alert('Item berhasil dihapus.');
                    location.replace("/cart");
                }
              // alert("Data: " + data + "\nStatus: " + status);
            });
        }else{
            return false;
        }
    }
</script>

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
                                                <th align="center">Kategori</th>
                                                <th align="center">Item</th>
                                                <th align="center">Detail</th>
                                                <!-- <th>Quantity</th> -->
                                                <th align="center">Price</th>
                                                <th align="center">Fungsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($billing as $item)
                                            <tr>
                                                <td>
                                                    <h6>
                                                        {{ $item->kat}}
                                                    </h6>
                                                </td>
                                                <td data-column="Product">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="img icon-img-80">
                                                                <img src="{{ asset('images/') }}/{{$item->lokasi}}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="ml-30">
                                                            <h6>{{$item->nama}}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-column="price">
                                                    <h5 class="fz-10"><pre>{!! $item->deskripsi !!}</pre></h5>
                                                </td>
                                                <!-- <td data-column="  Quantity">
                                                    <div class="counter">
                                                        <span class="down" onClick='decreaseCount(event, this)'>-</span>
                                                        <input type="text" value="1">
                                                        <span class="up" onClick='increaseCount(event, this)'>+</span>
                                                    </div>
                                                </td> -->
                                                <td data-column="Subtotal">
                                                    <h5 class="main-color4 fz-18">{{$item->harga}}</h5>
                                                </td>
                                                <td class="remove">
                                                    <center><a href="#" onclick="return edit({{$item->sub_kategori}}, {{$item->id}});">
                                                        <span class="pe-7s-edit"></span>
                                                    </a></center>
                                                    <a class="d-none" href="#" onclick="return del({{$item->id}});">
                                                        <span class="pe-7s-close"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row mt-80">
                                    <div class="col-lg-6">
                                        <div class="coupon mt-40" style="display:none;">
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
                                                <!-- <li class="mb-5">
                                                    <h6>Subtotal : <span class="fz-16 main-color4 ml-10">$130.00</span></h6>
                                                </li> -->
                                                <li>
                                                    <h6>Total : <span class="fz-16 main-color4 ml-10">{{ $total_bill }}</span></h6>
                                                </li>
                                            </ul>
                                            <a href="/checkout" class="butn butn-md butn-bg main-colorbg4 mt-30" id="datadiri">
                                                <span class="text-u fz-13 fw-600">Isi Datadiri > </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ==================== End cart ==================== -->


            </main>

@endsection