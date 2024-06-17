@extends('layouts.app')
@section('content')

<script src="{!! asset('assets/js/jquery-3.6.0.min.js') !!}"></script>
<script type="text/javascript">

$( document ).ready(function() {

    @php
    $check = '';
    if($kategori->kategori != ''){
        $check = 'checked';
    @endphp
        dis_kategori(true);
    @php
    }
    @endphp

    console.log( "ready!" );
    
});


    function dis_kategori(cek){
        if(cek == true){
            document.getElementById('kategori').disabled = true;
        }else{
            document.getElementById('kategori').disabled = false;
        }
    }
</script>

        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>EDIT KATEGORI</strong>
                </div>
                <div class="card-body">
                    <a href="/admin/kat/list_kategori" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    

                    <form method="post" action="/admin/kat/update/{{ $kategori->gid }}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

            <div class="row">  
                <div class="col-md-6 form-group">
                <input type="hidden" name="gid" value="{{$kategori->gid}}">
                <label>Nama Kategori</label>
                    <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}">
                </div>

                <div class="col-md-6 form-group">
                <label>Aktifkan</label><br>
                    <input type="checkbox" value="1" name="is_aktif" @if($kategori->is_aktif == '1') checked @endif > Ya
                </div>
                
                <!-- <div class="col-md-6 form-group">
                <label>Kategori</label><br>
                    <select name="kategori" id="kategori" class="custom-select" autocomplete="off" style="width:50%">
                        @foreach($list_kat as $kat)

                        @php
                        $select = '';
                        if($kategori->kategori == ''){
                            if($kategori->sub_kategori == $kat->kategori){
                                $select = 'selected';
                            }
                        }
                        @endphp
                        <option value="{{$kat->kategori}}" {{$select}}>{{$kat->nama}}</option>
                        @endforeach
                    </select>
                    &nbsp;&nbsp;&nbsp;<input type="checkbox" name="is_kategori" id="is_kategori" value="t" onclick="dis_kategori(this.checked);" {{$check}}> Is Kategori
                </div> -->



                <div class="col-md-6 form-group">
                <label>Deskripsi</label>
                 <!-- style="height: 201px; width:536px;" -->
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Uraian Deskripsi ...">{{ $kategori->deskripsi }}</textarea>
                </div>
                <div class="col-md-6 form-group">
                </div>



                <div class="col-md-3 form-group">
                    <label>Pilih Gambar 1</label>
                    <div class="card mb-2" style="max-width: 200px;">
                        <img class="img-fluid mb-2" src="{{ url('/images').'/'.$kategori->lokasi }}">
                    </div>
                    <input type="file" name="image" class="form-control" style="width: 230px;">
                </div>
                <div class="col-md-3 form-group">
                    <label>Pilih Gambar 2</label>
                    <div class="card mb-2" style="max-width: 200px;">
                        <img class="img-fluid mb-2" src="{{ url('/images').'/'.$kategori->lokasi2 }}">
                    </div>
                    <input type="file" name="image2" class="form-control" style="width: 230px;">
                </div>
                <div class="col-md-3 form-group">
                    <label>Pilih Gambar 3</label>
                    <div class="card mb-2" style="max-width: 200px;">
                        <img class="img-fluid mb-2" src="{{ url('/images').'/'.$kategori->lokasi3 }}">
                    </div>
                    <input type="file" name="image3" class="form-control" style="width: 230px;">
                </div>
                <div class="col-md-3 form-group">
                    <label>Pilih Gambar 4</label>
                    <div class="card mb-2" style="max-width: 200px;">
                        <img class="img-fluid mb-2" src="{{ url('/images').'/'.$kategori->lokasi4 }}">
                    </div>
                    <input type="file" name="image4" class="form-control" style="width: 230px;">
                </div>

            </div>

                        <!-- <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama kategori .." value=" {{ $kategori->nama }}">

                            @if($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" placeholder="Alamat kategori .."> {{ $kategori->alamat }} </textarea>

                             @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                            @endif

                        </div> -->

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
        </div>



<!-- <script type="text/javascript">
    // $(".blog_date").hide();
    // document.getElementsByClassName("blog_date").style.display = "none";
    if({{ $kategori->kategori }} == '5'){
        document.getElementById("blog_date1").style.display = ""; 
        document.getElementById("blog_date2").style.display = ""; 
        document.getElementById("blog_date3").style.display = ""; 
    }else{
        document.getElementById("blog_date1").style.display = "none"; 
        document.getElementById("blog_date2").style.display = "none"; 
        document.getElementById("blog_date3").style.display = "none"; 
    }
    


function show_blog_date(val){
    // console.log(val);
    if(val == '5'){
        document.getElementById("blog_date1").style.display = ""; 
        document.getElementById("blog_date2").style.display = ""; 
        document.getElementById("blog_date3").style.display = ""; 
    }else{
        document.getElementById("blog_date1").style.display = "none"; 
        document.getElementById("blog_date2").style.display = "none"; 
        document.getElementById("blog_date3").style.display = "none"; 
    }
}

</script> -->


@endsection
