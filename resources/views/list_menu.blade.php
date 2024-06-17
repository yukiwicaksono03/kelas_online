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
    color: #000;
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
            <div class="container">
                <!--=== Tour Details Wrapper ===-->
                <div class="tour-details-wrapper pt-80">
                    
                    <!--=== Tour Area Nav ===-->
                    
                            <!--=== Place Content Wrap ===-->
                        


<!-- ====== MENU ITEM ====== -->
<div class="container">
                <center>
                <div class="center-title">
                    <br>
                    <h3 class="widget-title">List Menu Resto : </h3>
                </div>
                <div class="food-menu-card" style="width:80% !important">
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

                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                            @endif
                                            @endif
                                    @endforeach

                                    </div>
                                      <div class="col-md-6 mb20">
                                        <article class="media">
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

                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                            @endif
                                            @endif
                                    @endforeach

                                    </div>
                                      <div class="col-md-6 mb20">
                                        <article class="media">
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

                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                            @endif
                                            @endif
                                    @endforeach

                                    </div>
                                      <div class="col-md-6 mb20">
                                        <article class="media">
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
            </center>
            </div>
<!-- ====== MENU ITEM ====== -->




<!-- ====== MENU ITEM ====== -->
<div class="container">
                <center>
                <div class="center-title">
                    <br>
                    <h3 class="widget-title">List Menu Cafe : </h3>
                </div>
                <div class="food-menu-card" style="width:80% !important">
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


                                    @foreach($product_cafes as $product)

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

                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                            @endif
                                            @endif
                                    @endforeach

                                    </div>
                                      <div class="col-md-6 mb20">
                                        <article class="media">
                                            <!--Content -->

                                    @foreach($product_cafes as $product)
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


                                    @foreach($product_cafes as $product)

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

                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                            @endif
                                            @endif
                                    @endforeach

                                    </div>
                                      <div class="col-md-6 mb20">
                                        <article class="media">
                                            <!--Content -->

                                    @foreach($product_cafes as $product)
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


                                    @foreach($product_cafes as $product)

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

                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                            @endif
                                            @endif
                                    @endforeach

                                    </div>
                                      <div class="col-md-6 mb20">
                                        <article class="media">
                                            <!--Content -->

                                    @foreach($product_cafes as $product)
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
            </center>
            </div>
<!-- ====== MENU ITEM ====== -->


<!-- ====== MENU ITEM ====== -->
<div class="container">
                <center>
                <div class="center-title">
                    <br>
                    <h3 class="widget-title">List Menu Forest : </h3>
                </div>
                <div class="food-menu-card" style="width:80% !important">
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav  tabs-menu-nav justify-content-center mb30" role="tablist">
                            <li class="nav-item" role="presentation"><a class="nav-link active show" href="#makanan" aria-controls="makanan" role="tab" data-toggle="tab" aria-selected="true">Makanan</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#liwet" aria-controls="liwet" role="tab" data-toggle="tab" aria-selected="false">Liwet</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#sambakar" aria-controls="sambakar" role="tab" data-toggle="tab" aria-selected="false">Sambal Bakar</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active show" id="makanan">
                                <div class="row">
                                    <div class="col-md-6 mb20">
                                        <article class="media">


                                    @foreach($product_forest as $product)

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

                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                            @endif
                                            @endif
                                    @endforeach

                                    </div>
                                      <div class="col-md-6 mb20">
                                        <article class="media">
                                            <!--Content -->

                                    @foreach($product_forest as $product)
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

                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                        @endif
                                        @endif
                                    @endforeach

                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="liwet">
                                <div class="row">
                                    <div class="col-md-6 mb20">
                                        <article class="media">


                                    @foreach($product_forest as $product)

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

                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                            @endif
                                            @endif
                                    @endforeach

                                    </div>
                                      <div class="col-md-6 mb20">
                                        <article class="media">
                                            <!--Content -->

                                    @foreach($product_forest as $product)
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

                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                        @endif
                                        @endif
                                    @endforeach

                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="sambakar">
                                <div class="row">
                                    <div class="col-md-6 mb20">
                                        <article class="media">


                                    @foreach($product_forest as $product)

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

                                                <!-- <p class="mb-0">{{ $product->description }}</p> -->    
                                            </div><br>
                                            <!--/Content -->
                                            @endif
                                            @endif
                                    @endforeach

                                    </div>
                                      <div class="col-md-6 mb20">
                                        <article class="media">
                                            <!--Content -->

                                    @foreach($product_forest as $product)
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
            </center>
            </div>
<!-- ====== MENU ITEM ====== -->


                            <!--=== Map Box ===-->
                            <!-- <div class="map-box mb-60 wow fadeInUp">
                                <iframe src="https://maps.google.com/maps?q=new%20york&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div> -->
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