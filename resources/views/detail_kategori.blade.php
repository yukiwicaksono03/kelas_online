@extends('layout')
@section('content')


<script type="text/javascript">

function send_transaksi(id){
    // var input1 = $("#input1").val(); //Tgl
    // var input2 = $("#input2").val(); //Jam
    // var input3 = $("#input3").val(); //Jml org
    // var input4 = $("#input4").val(); //Nama
    // var list_item = $("#list_item").val();
    // var list_item_json = $("#list_item_json").val();
    // // var token = $('input[name="_token"]').val();

    // if(!input1){
    //     alert('Mohon masukkan tanggal booking !');
    //     return false;
    // }
    // if(!input2){
    //     alert('Mohon masukkan jam booking !');
    //     return false;
    // }
    // if(!input3){
    //     alert('Mohon masukkan jumlah pengunjung !');
    //     return false;
    // }
    // if(!input4){
    //     alert('Mohon isi Nama pengunjung !');
    //     return false;
    // }

    // var parts = input1.split("/");
    // var formattedDate = `${parts[2]}-${parts[0]}-${parts[1]}`;


      if (confirm("Yakin dengan pesanan anda ?") == true) {

        $.post("/save_trans",
        {
          // token: token,
            "_token": "{{ csrf_token() }}",
            gid : id,
            // notes : list_item,
            // jml_org : input3,
            // tgl_booking : formattedDate+' '+input2,
            // tipe_order : 'resto',
            // "data_json": list_item_json
        },
        function(data,status){
            
            
            if(data == 't'){
                alert('Item berhasil ditambahkan.');
                location.replace("/cart");
            }
          // alert("Data: " + data + "\nStatus: " + status);
        });
        return false;
      } else {
        return false;
      }

}
</script>



    <main>

        <!-- ==================== Start Slider ==================== -->

        <header class="work-header section-padding pb-0">
            <div class="container mt-80">
                <div class="row">
                    <div class="col-12">
                        <div class="caption">
                            <h6 class="sub-title">Our Works</h6>
                            @if($product_kolaborasi)
                            <h1>{{$product_kolaborasi->nama}}</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ==================== End Slider ==================== -->



        <!-- ==================== Start Portfolio ==================== -->

        <section class="portfolio section-padding pb-70">
            <div class="container-xxl">

               

                <div class="gallery">

                    <div class="row grid md-marg">
                        @foreach($gambar as $item)
                        <div class="col-lg-4 col-md-6 items web info-overlay mb-50">
                            <div class="item-img o-hidden">
                                <a href="/detail_item/{{$item->gid}}" class="imago wow">
                                    <div class="inner wow">
                                        <img src="{{ asset('images/') }}/{{$item->lokasi}}" alt="image">
                                    </div>
                                </a>
                                <div class="info">
                                    <span class="mb-15">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.922 4.5V11.8125C13.922 11.9244 13.8776 12.0317 13.7985 12.1108C13.7193 12.1899 13.612 12.2344 13.5002 12.2344C13.3883 12.2344 13.281 12.1899 13.2018 12.1108C13.1227 12.0317 13.0783 11.9244 13.0783 11.8125V5.51953L4.79547 13.7953C4.71715 13.8736 4.61092 13.9176 4.50015 13.9176C4.38939 13.9176 4.28316 13.8736 4.20484 13.7953C4.12652 13.717 4.08252 13.6108 4.08252 13.5C4.08252 13.3892 4.12652 13.283 4.20484 13.2047L12.4806 4.92188H6.18765C6.07577 4.92188 5.96846 4.87743 5.88934 4.79831C5.81023 4.71919 5.76578 4.61189 5.76578 4.5C5.76578 4.38811 5.81023 4.28081 5.88934 4.20169C5.96846 4.12257 6.07577 4.07813 6.18765 4.07812H13.5002C13.612 4.07813 13.7193 4.12257 13.7985 4.20169C13.8776 4.28081 13.922 4.38811 13.922 4.5Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <h6 class="sub-title tag"><a href="#" style="font-weight: bold;"> View Detail <br></a></h6>
                                    <!-- <h6 class="sub-title tag"><a href=""> itemku <br> makeup <br> barang lain</a></h6> -->
                                    <h5><a href="/detail_item/{{$item->gid}}">{{$item->nama}}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>

                </div>

            </div>
        </section>

        <!-- ==================== End Portfolio ==================== -->


    </main>


@endsection