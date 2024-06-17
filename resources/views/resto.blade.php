@extends('layout')
@section('content')


<style type="text/css">
body{margin-top:20px;}
/*
Foods menu
*/

.food-menu-card {
    padding: 30px 20px;
    background-color: #F9F9F7;
    border-radius: 8px;
}

.food-menu-card .media {
    margin-bottom: 20px;
}

.food-menu-card .media .img-fluid {
    border-radius: 3px;
    width: 80px;
}

.food-menu-card .media .d-flex {
    position: relative;
}

.food-menu-card .media .d-flex:before {
    content: "";
    position: absolute;
    left: auto;
    right: 0;
    width: 100%;
    height: 1px;
    background-color: rgba(255, 255, 255, 0.2);
    top: 50%;
}

.food-menu-card .media h3 {
    position: relative;
    display: inline-block;
    margin-bottom: 0;
    padding-right: 1.07143rem;
    background-color: #F9F9F7;
    z-index: 2;
}

.food-menu-card .media strong {
    background-color: #F9F9F7;
    display: block;
    padding-left: 15px;
    z-index: 2;
    position: relative;
}

.tabs-menu-nav > li > a {
    color: #000;
    display: block;
    font-size: 16px;
    border-bottom: 3px solid transparent;
    opacity: 0.5;
}

.tabs-menu-nav > li > a.active {
    opacity: 1;
    border-bottom-color: #63AB45;
}
.media-body, p {
    color: #ece7e7;
}
</style>

<script type="text/javascript">

function send_wa(){
    var input1 = $("#input1").val(); //Tgl
    var input2 = $("#input2").val(); //Jam
    var input3 = $("#input3").val(); //Jml org
    var input4 = $("#input4").val(); //Nama
    var list_item = $("#list_item").val();
    var list_item_json = $("#list_item_json").val();
    // var token = $('input[name="_token"]').val();

    if(!input1){
        alert('Mohon masukkan tanggal booking !');
        return false;
    }
    if(!input2){
        alert('Mohon masukkan jam booking !');
        return false;
    }
    if(!input3){
        alert('Mohon masukkan jumlah pengunjung !');
        return false;
    }
    if(!input4){
        alert('Mohon isi Nama pengunjung !');
        return false;
    }

    var parts = input1.split("/");
    var formattedDate = `${parts[2]}-${parts[0]}-${parts[1]}`;


      if (confirm("Yakin dengan pesanan anda ?") == true) {

        $.post("/save_trans",
        {
          // token: token,
            "_token": "{{ csrf_token() }}",
            nama : input4,
            notes : list_item,
            jml_org : input3,
            tgl_booking : formattedDate+' '+input2,
            tipe_order : 'resto',
            "data_json": list_item_json
        },
        function(data,status){
            // alert(data);
            if(data == '1'){
                window.open("https://wa.me/6281359009200?text=Halo,+saya+ingin+melakukan+reservasi Atas+nama+"+input4+"+pada+tanggal+"+input1+"+ Jam+:+"+input2+"+untuk+"+input3+"+orang, Dengan+menu+sbb+:+\n+"+list_item+"+Terimakasih!");
            }
          // alert("Data: " + data + "\nStatus: " + status);
        });
        return false;
      } else {
        return false;
      }

}

function input_item(id, name_item, jml_item){

    if(jml_item == ''){
        alert('Mohon isi jumlah pesanan !')
        return false;
    }

    const string = document.getElementById("list_item").value;
    var result = string.includes(name_item);

    if(result){
        alert('Item sudah ditambahkan, silahkan edit Result dibawah !');
    }else{
        // var data = {
        //         jenis: 'resto',
        //         id: id,
        //         jml: jml_item
        //     };

        // var jsonString = JSON.stringify(data);


        document.getElementById("list_item").value += name_item+' ('+jml_item+'), ';
        document.getElementById("list_item_json").value += '{"id":"'+id+'", "jml":"'+jml_item+'"}, ';
    }
    
}

</script>

        <!--====== Start Place Details Section ======-->
        <section class="place-details-section">
            <!--=== Place Slider ===-->
            <div class="place-slider-area overflow-hidden wow fadeInUp">
                <div class="place-slider">
                    <div class="place-slider-item">
                        <div class="place-img">
                            <img src="assets/images/place/three-place-1.jpg" alt="Place Image">
                        </div>
                    </div>
                    <div class="place-item">
                        <div class="place-img">
                            <img src="assets/images/place/three-place-2.jpg" alt="Place Image">
                        </div>
                    </div>
                    <div class="place-slider-item">
                        <div class="place-img">
                            <img src="assets/images/place/three-place-3.jpg" alt="Place Image">
                        </div>
                    </div>
                    <div class="place-slider-item">
                        <div class="place-img">
                            <img src="assets/images/place/three-place-4.jpg" alt="Place Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <!--=== Tour Details Wrapper ===-->
                <div class="tour-details-wrapper pt-80">
                    <!--=== Tour Title Wrapper ===-->
                    <div class="tour-title-wrapper pb-30 wow fadeInUp">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="tour-title mb-20">
                                    <h3 class="title">Gunung Walat Resto</h3>
                                    <p><i class="far fa-map-marker-alt"></i>Batununggal, Kec. Cibadak, Kabupaten Sukabumi, Jawa Barat</p>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="tour-widget-info">
                                    <div class="info-box mb-20">
                                        <div class="icon">
                                            <i class="fal fa-box-usd"></i>
                                        </div>
                                        <div class="info">
                                            <h4><span>Mulai Dari</span>10K-60K</h4>
                                        </div>
                                    </div>
                                    <div class="info-box mb-20">
                                        <div class="icon">
                                            <i class="fal fa-clock"></i>
                                        </div>
                                        <div class="info">
                                            <h4><span>Jam Buka</span>Senin-Sabtu: 13.00-22.00<br> Minggu : 09.00-22.00 <br></h4>
                                        </div>
                                    </div>
                                    <div class="info-box mb-20">
                                        <div class="icon">
                                            <i class="fal fa-planet-ringed"></i>
                                        </div>
                                        <div class="info">
                                            <h4><span>Tipe Tempat</span>Private & Nyaman</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=== Tour Area Nav ===-->
                    <div class="row">
                        <div class="col-xl-8">
                            <!--=== Place Content Wrap ===-->
                            <div class="place-content-wrap pt-45 wow fadeInUp">
                                <h3 class="title">Tentang Resto</h3>
                                <p>Adalah tempat yang menyajikan makanan dan minuman kepada pelanggan yang datang untuk makan atau minum. 
                                    Restoran biasanya memiliki beragam menu makanan  yang lebih bervarian dan minuman yang pelanggan bisa pesan, 
                                    dan mereka menyediakan layanan untuk makan di tempat (dine-in), pengambilan (takeout),</p>
                                <h4>Fasilitas</h4>
                                <p>Kita Memiliki Berbagai Fasilitas Yang Bisa Digunakan Antara Lain.</p>
                                <div class="row align-items-lg-center">
                                    <div class="col-lg-5">
                                        <ul class="check-list">
                                            <li><i class="fas fa-badge-check"></i>Tempat Rapat</li>
                                            <li><i class="fas fa-badge-check"></i>Wedding</li>
                                            <li><i class="fas fa-badge-check"></i>Lamaran</li>
                                            <li><i class="fas fa-badge-check"></i>Perayaan Ulang Tahun</li>
                                            <li><i class="fas fa-badge-check"></i>Spot Foto Instagramable</li>
                                            <li><i class="fas fa-badge-check"></i>Tempat Makan & Minum</li>
                                            <li><i class="fas fa-badge-check"></i>Tempat Event</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-7">
                                        <img src="assets/images/place/fasilitas-1.jpg" class="mb-20 w-100" alt="place image">
                                    </div>
                                </div>
                            </div>
                        


<!-- ====== MENU ITEM ====== -->
<div class="container">
                <div class="center-title">
                    <br>
                    <h3 class="widget-title">List Menu : </h3>
                </div>
                <div class="food-menu-card">
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav  tabs-menu-nav justify-content-center mb30" role="tablist">
                            <li class="nav-item" role="presentation"><a class="nav-link active show" href="#breakfast" aria-controls="breakfast" role="tab" data-toggle="tab" aria-selected="true">Makanan</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#lunch" aria-controls="lunch" role="tab" data-toggle="tab" aria-selected="false"> Minuman</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#dinner" aria-controls="dinner" role="tab" data-toggle="tab" aria-selected="false">Cemilan</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active show" id="breakfast">
                                <div class="row">
                                    <div class="col-md-6 mb20">
                                        <article class="media">
                                            <!-- Article Image -->
                                            <a class="g-width-100" href="#">
                                                <img class="img-fluid mr-4" width="80" src="http://bootstraplovers.com/assan-kit-3.8/bootstrap4/website-templates/classic-template/html/images/resto/food1.jpg" alt="Menu title">
                                            </a>
                                            <!--Image -->


                                    @foreach($products as $product)

                                            @if($product->kategori == 1)
                                            @if($product->part == 1)
                                            <!--Content -->
                                            <div class="media-body align-self-center g-pl-10">
                                                <div class="d-flex justify-content-between mb10">
                                                    <h3 class="align-self-center text-capitalize mb0 h6 text-black font400" style="font-size: 15px !important;">{{ $product->name }}</h3>
                                                    <div class="align-self-center">
                                                        <strong class="text-black" style="font-size: 12px !important;"> Rp. {{ $product->price }}</strong>
                                                    </div>
                                                </div>

                                                    <div class="booking-item">
                                                        <label>Jumlah : &nbsp;<input type="text" name="jml_item_{{ $product->id }}" id="jml_item_{{ $product->id }}" size="3" style="height: 26px !important; font-size: 15px !important; text-align: center;"></label>
                                                        
                                                        <div style="float: right;">
                                                            <a onclick="input_item('{{ $product->id }}','{{ $product->name }}', document.getElementById('jml_item_{{ $product->id }}').value);" class="btn btn-warning text-center" role="button">Pesan</a>
                                                        </div>
                                                    </div>
                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                            @endif
                                            @endif
                                    @endforeach

                                    </div>
                                      <div class="col-md-6 mb20">
                                        <article class="media">
                                            <!-- Article Image -->
                                            <a class="g-width-100" href="#">
                                                <img class="img-fluid mr-4" width="80" src="http://bootstraplovers.com/assan-kit-3.8/bootstrap4/website-templates/classic-template/html/images/resto/food6.jpg" alt="Menu title">
                                            </a>
                                            <!--Image -->
                                            <!--Content -->

                                    @foreach($products as $product)
                                        @if($product->kategori == 1)
                                            @if($product->part == 2)
                                            <!--Content -->
                                            <div class="media-body align-self-center g-pl-10">
                                                <div class="d-flex justify-content-between mb10">
                                                    <h3 class="align-self-center text-capitalize mb0 h6 text-black font400" style="font-size: 15px !important;">{{ $product->name }}</h3>
                                                    <div class="align-self-center">
                                                        <strong class="text-black" style="font-size: 12px !important;"> Rp. {{ $product->price }}</strong>
                                                    </div>
                                                </div>

                                                    <div class="booking-item">
                                                        <label>Jumlah : &nbsp;<input type="text" name="jml_item_{{ $product->id }}" id="jml_item_{{ $product->id }}" size="3" style="height: 26px !important; font-size: 15px !important; text-align: center;"></label>
                                                        
                                                        <div style="float: right;">
                                                            <a onclick="input_item('{{ $product->id }}', '{{ $product->name }}', document.getElementById('jml_item_{{ $product->id }}').value);" class="btn btn-warning text-center" role="button">Pesan</a>
                                                        </div>
                                                    </div>
                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                        @endif
                                        @endif
                                    @endforeach

                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="lunch">
                                <div class="row">
                                    <div class="col-md-6 mb20">
                                        <article class="media">
                                            <!-- Article Image -->
                                            <a class="g-width-100" href="#">
                                                <img class="img-fluid mr-4" width="80" src="http://bootstraplovers.com/assan-kit-3.8/bootstrap4/website-templates/classic-template/html/images/resto/food1.jpg" alt="Menu title">
                                            </a>
                                            <!--Image -->


                                    @foreach($products as $product)

                                            @if($product->kategori == 3)
                                            @if($product->part == 1)
                                            <!--Content -->
                                            <div class="media-body align-self-center g-pl-10">
                                                <div class="d-flex justify-content-between mb10">
                                                    <h3 class="align-self-center text-capitalize mb0 h6 text-black font400" style="font-size: 15px !important;">{{ $product->name }}</h3>
                                                    <div class="align-self-center">
                                                        <strong class="text-black" style="font-size: 12px !important;"> Rp. {{ $product->price }}</strong>
                                                    </div>
                                                </div>

                                                    <div class="booking-item">
                                                        <label>Jumlah : &nbsp;<input type="text" name="jml_item_{{ $product->id }}" id="jml_item_{{ $product->id }}" size="3" style="height: 26px !important; font-size: 15px !important; text-align: center;"></label>
                                                        
                                                        <div style="float: right;">
                                                            <a onclick="input_item('{{ $product->id }}', '{{ $product->name }}', document.getElementById('jml_item_{{ $product->id }}').value);" class="btn btn-warning text-center" role="button">Pesan</a>
                                                        </div>
                                                    </div>
                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                            @endif
                                            @endif
                                    @endforeach

                                    </div>
                                      <div class="col-md-6 mb20">
                                        <article class="media">
                                            <!-- Article Image -->
                                            <a class="g-width-100" href="#">
                                                <img class="img-fluid mr-4" width="80" src="http://bootstraplovers.com/assan-kit-3.8/bootstrap4/website-templates/classic-template/html/images/resto/food6.jpg" alt="Menu title">
                                            </a>
                                            <!--Image -->
                                            <!--Content -->

                                    @foreach($products as $product)
                                        @if($product->kategori == 3)
                                            @if($product->part == 2)
                                            <!--Content -->
                                            <div class="media-body align-self-center g-pl-10">
                                                <div class="d-flex justify-content-between mb10">
                                                    <h3 class="align-self-center text-capitalize mb0 h6 text-black font400" style="font-size: 15px !important;">{{ $product->name }}</h3>
                                                    <div class="align-self-center">
                                                        <strong class="text-black" style="font-size: 12px !important;"> Rp. {{ $product->price }}</strong>
                                                    </div>
                                                </div>

                                                    <div class="booking-item">
                                                        <label>Jumlah : &nbsp;<input type="text" name="jml_item_{{ $product->id }}" id="jml_item_{{ $product->id }}" size="3" style="height: 26px !important; font-size: 15px !important; text-align: center;"></label>
                                                        
                                                        <div style="float: right;">
                                                            <a onclick="input_item('{{ $product->id }}', '{{ $product->name }}', document.getElementById('jml_item_{{ $product->id }}').value);" class="btn btn-warning text-center" role="button">Pesan</a>
                                                        </div>
                                                    </div>
                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                        @endif
                                        @endif
                                    @endforeach

                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="dinner">
                                <div class="row">
                                    <div class="col-md-6 mb20">
                                        <article class="media">
                                            <!-- Article Image -->
                                            <a class="g-width-100" href="#">
                                                <img class="img-fluid mr-4" width="80" src="http://bootstraplovers.com/assan-kit-3.8/bootstrap4/website-templates/classic-template/html/images/resto/food1.jpg" alt="Menu title">
                                            </a>
                                            <!--Image -->


                                    @foreach($products as $product)

                                            @if($product->kategori == 2)
                                            @if($product->part == 1)
                                            <!--Content -->
                                            <div class="media-body align-self-center g-pl-10">
                                                <div class="d-flex justify-content-between mb10">
                                                    <h3 class="align-self-center text-capitalize mb0 h6 text-black font400" style="font-size: 15px !important;">{{ $product->name }}</h3>
                                                    <div class="align-self-center">
                                                        <strong class="text-black" style="font-size: 12px !important;"> Rp. {{ $product->price }}</strong>
                                                    </div>
                                                </div>

                                                    <div class="booking-item">
                                                        <label>Jumlah : &nbsp;<input type="text" name="jml_item_{{ $product->id }}" id="jml_item_{{ $product->id }}" size="3" style="height: 26px !important; font-size: 15px !important; text-align: center;"></label>
                                                        
                                                        <div style="float: right;">
                                                            <a onclick="input_item('{{ $product->id }}', '{{ $product->name }}', document.getElementById('jml_item_{{ $product->id }}').value);" class="btn btn-warning text-center" role="button">Pesan</a>
                                                        </div>
                                                    </div>
                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                            @endif
                                            @endif
                                    @endforeach

                                    </div>
                                      <div class="col-md-6 mb20">
                                        <article class="media">
                                            <!-- Article Image -->
                                            <a class="g-width-100" href="#">
                                                <img class="img-fluid mr-4" width="80" src="http://bootstraplovers.com/assan-kit-3.8/bootstrap4/website-templates/classic-template/html/images/resto/food6.jpg" alt="Menu title">
                                            </a>
                                            <!--Image -->
                                            <!--Content -->

                                    @foreach($products as $product)
                                        @if($product->kategori == 2)
                                            @if($product->part == 2)
                                            <!--Content -->
                                            <div class="media-body align-self-center g-pl-10">
                                                <div class="d-flex justify-content-between mb10">
                                                    <h3 class="align-self-center text-capitalize mb0 h6 text-black font400" style="font-size: 15px !important;">{{ $product->name }}</h3>
                                                    <div class="align-self-center">
                                                        <strong class="text-black" style="font-size: 12px !important;"> Rp. {{ $product->price }}</strong>
                                                    </div>
                                                </div>

                                                    <div class="booking-item">
                                                        <label>Jumlah : &nbsp;<input type="text" name="jml_item_{{ $product->id }}" id="jml_item_{{ $product->id }}" size="3" style="height: 26px !important; font-size: 15px !important; text-align: center;"></label>
                                                        
                                                        <div style="float: right;">
                                                            <a onclick="input_item('{{ $product->id }}', '{{ $product->name }}', document.getElementById('jml_item_{{ $product->id }}').value);" class="btn btn-warning text-center" role="button">Pesan</a>
                                                        </div>
                                                    </div>
                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                        @endif
                                        @endif
                                    @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- ====== MENU ITEM ====== -->

                            <!--=== Map Box ===-->
                            <!-- <div class="map-box mb-60 wow fadeInUp">
                                <iframe src="https://maps.google.com/maps?q=new%20york&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div> -->
                        </div>
                        <div class="col-xl-4">
                            <!--=== Sidebar Widget Area ===-->
                            <div class="sidebar-widget-area pt-60 pl-lg-30">
                                <!--=== Booking Widget ===-->
                                <div class="sidebar-widget booking-form-widget wow fadeInUp mb-40">
                                    <h4 class="widget-title">Booking Table</h4>
                                    <form class="sidebar-booking-form">
                                        <div class="booking-date-time mb-20">
                                            <div class="booking-item">
                                                <label>Atas Nama</label>
                                                <div class="bk-item booking-text">
                                                    <input type="text" id="input4" name="input4" placeholder="Nama">
                                                </div>
                                            </div>
                                            <div class="booking-item">
                                                <label>Tanggal</label>
                                                <div class="bk-item booking-time">
                                                    <i class="far fa-calendar-alt"></i>
                                                    <input type="text" id="input1" name="input1" placeholder="Select Date" class="datepicker">
                                                </div>
                                            </div>
                                            <div class="booking-item">
                                                <label>Jam</label>
                                                <div class="bk-item booking-date">
                                                    <i class="far fa-calendar-alt"></i>
                                                    <select class="wide" id="input2" name="input2">
                                                        <option value="07:00">07.00</option>
                                                        <option value="08:00">08.00</option>
                                                        <option value="09:00">09.00</option>
                                                        <option value="10:00">10.00</option>
                                                        <option value="11:00">11.00</option>
                                                        <option value="12:00">12.00</option>
                                                        <option value="13:00">13.00</option>
                                                        <option value="14:00">14.00</option>
                                                        <option value="15:00">15.00</option>
                                                        <option value="16:00">16.00</option>
                                                        <option value="17:00">17.00</option>
                                                        <option value="18:00">18.00</option>
                                                        <option value="19:00">19.00</option>
                                                        <option value="20:00">20.00</option>
                                                        <option value="21:00">21.00</option>
                                                        <option value="22:00">22.00</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="booking-guest-box mb-20">
                                            <h6 class="mb-20">Pengunjung</h6>
                                            <div class="booking-item">
                                                <label>Orang </label>
                                                <div class="bk-item booking-user">
                                                    <i class="far fa-user"></i>
                                                    <script type="text/javascript">
                                                        function hitung(val){
                                                            var hasil = val*20000;
                                                            // console.log(hasil);
                                                            // $("#total").innerHTML = hasil;
                                                            document.getElementById("total").innerHTML = hasil;
                                                        }
                                                    </script>
                                                    <select class="wide" onchange="hitung(this.value);" id="input3" name="input3">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="booking-item">
                                                <label>Youth (13-17 years) $29</label>
                                                <div class="bk-item booking-user">
                                                    <i class="far fa-user"></i>
                                                    <select class="wide">
                                                        <option value="01">1</option>
                                                        <option value="02">2</option>
                                                        <option value="03">3</option>
                                                        <option value="04">4</option>
                                                        <option value="05">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="booking-item">
                                                <label>Child (0-12 years) $0</label>
                                                <div class="bk-item booking-user">
                                                    <i class="far fa-user"></i>
                                                    <select class="wide">
                                                        <option value="01">1</option>
                                                        <option value="02">2</option>
                                                        <option value="03">3</option>
                                                        <option value="04">4</option>
                                                        <option value="05">5</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                        </div>

                                        <!-- PRODUK -->

                                        <div class="booking-guest-box mb-20">
                                            <input type="hidden" name="list_item_json" id="list_item_json">
                                            <textarea name="list_item" id="list_item" placeholder="List Items" class="form_control" style="border-radius: 7px;" cols="8" rows="3"></textarea>
                                    
                                        </div>

                                        <!-- PRODUK -->
                                        <div class="booking-extra mb-15 wow fadeInUp">
                                            <h6 class="mb-10">Aditional Services</h6>
                                            <div class="extra">
                                                <i class="fas fa-check-circle"></i>Service Per Boooking <span>Rp 50.000</span>
                                            </div>
                                            <div class="extra">
                                                <i class="fas fa-check-circle"></i>Service Per Person <span>Rp 20.000</span>
                                            </div>
                                        </div>
                                        <div class="booking-total mb-20">
                                            <div class="total">
                                                <label>Total</label>
                                                <span class="price">Rp <font id="total"></font></span>
                                            </div>
                                        </div>
                                        <div class="submit-button">
                                            <button class="main-btn primary-btn" onclick="return send_wa();">Booking Now<i class="far fa-paper-plane"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <!--=== Banner Widget ===-->
                                <!-- <div class="sidebar-widget sidebar-banner-widget wow fadeInUp mb-40">
                                    <div class="banner-widget-content">
                                        <div class="banner-img">
                                            <img src="assets/images/blog/banner-1.jpg" alt="Post Banner">
                                            <div class="hover-overlay">
                                                <div class="hover-content">
                                                    <h4 class="title"><a href="#">Swimming Pool</a></h4>
                                                    <p><i class="fas fa-map-marker-alt"></i>Marrakesh, Morocco</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--====== End Place Details Section ======-->

        <!--====== Start Gallery Section ======-->
        <section class="gallery-section mbm-150">
            <div class="container-fluid">
                <div class="slider-active-5-item wow fadeInUp">
                    <!--=== Single Gallery Item ===-->


                    <!--=== Features Image Item ===-->
                    @foreach($gambar as $item)
                    @if($item->is_aktif == 1)
                    @if($item->kategori == 3)
                    <div class="single-gallery-item">
                        <div class="gallery-img">
                            <img src="{{ asset('images/') }}/{{$item->lokasi}}" alt="Gallery Image">
                            <div class="hover-overlay">
                                <a href="{{ asset('images/') }}/{{$item->lokasi}}" class="icon-btn img-popup"><i class="far fa-plus"></i></a>
                            </div>
                        </div>
                    </div>

                    @endif
                    @endif
                    @endforeach
                </div>
            </div>
        </section>
        <!--====== End Gallery Section ======-->
@endsection