@extends('layouts.app')

@section('content')

<script type="text/javascript">

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
                    <strong>TAMBAH KATEGORI BARU</strong>
                </div>
                <div class="card-body">
                    <a href="/admin/kat/list_kategori" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form method="post" action="/admin/kat/store" enctype="multipart/form-data">

                        {{ csrf_field() }}


            <div class="row">  
                <div class="col-md-6 form-group">
                <label>Nama Kategori</label>
                    <input type="text" name="nama" class="form-control">
                </div>

                <div class="col-md-6 form-group">
                <label>Aktifkan</label><br>
                    <input type="checkbox" value="1" name="is_aktif"> Ya
                </div>
                <!-- 
                <div class="col-md-6 form-group">
                <label style="display: none;">Kategori</label><br>
                    <select style="display: none;" name="kategori" id="kategori" class="custom-select" autocomplete="off" style="width:50%">
                        @foreach($list_kat as $kat)
                        <option value="{{$kat->kategori}}">{{$kat->nama}}</option>
                        @endforeach
                    </select>
                    &nbsp;&nbsp;&nbsp;<input style="display: none;" type="checkbox" name="is_kategori" id="is_kategori" value="t" checked> Is Kategori
                </div> -->

                <div class="col-md-6 form-group">
                <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Uraian Deskripsi ..."></textarea>
                </div>
                <div class="col-md-6 form-group">
                </div>

                <div class="col-md-3 form-group">
                    <label>Pilih Gambar 1</label>
                    <div class="card mb-2" style="max-width: 200px;">
                        <img class="img-fluid mb-2" src="">
                    </div>
                    <input type="file" name="image" class="form-control" style="width: 230px;">
                </div>
                <div class="col-md-3 form-group">
                    <label>Pilih Gambar 2</label>
                    <div class="card mb-2" style="max-width: 200px;">
                        <img class="img-fluid mb-2" src="">
                    </div>
                    <input type="file" name="image2" class="form-control" style="width: 230px;">
                </div>
                <div class="col-md-3 form-group">
                    <label>Pilih Gambar 3</label>
                    <div class="card mb-2" style="max-width: 200px;">
                        <img class="img-fluid mb-2" src="">
                    </div>
                    <input type="file" name="image3" class="form-control" style="width: 230px;">
                </div>
                <div class="col-md-3 form-group">
                    <label>Pilih Gambar 4</label>
                    <div class="card mb-2" style="max-width: 200px;">
                        <img class="img-fluid mb-2" src="">
                    </div>
                    <input type="file" name="image4" class="form-control" style="width: 230px;">
                </div>

            </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>


<script type="text/javascript">

        document.getElementById("blog_date1").style.display = "none"; 
        document.getElementById("blog_date2").style.display = "none"; 
        document.getElementById("blog_date3").style.display = "none"; 

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

</script>


@endsection