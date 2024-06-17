@extends('layouts.app')
@section('content')
    <body>
        <div class="container">


            <br>
            <br>
            <center>
              <h1>Selemat Datang di Halaman Admin.</h1>
            </center>
            <!-- <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Sales Graph
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Mail-Orders</div>
                  </div>
                  
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Online</div>
                  </div>
                  
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                  </div>
                  
                </div>
                
              </div>
            </div> -->
            
            <div class="card" style="display: none !important;">
              <div class="card-header border-0">
                <h3 class="card-title">Sales Products</h3>
                
                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Product</th>
                    <th>Jenis</th>
                    <th>Price</th>
                    <th>Sales</th>
                    <th>Tgl Order</th>
                    <!-- <th>More</th> -->
                  </tr>
                  </thead>
                  <tbody>


                @php $not = 1; @endphp
                @foreach($top_sales as $ts)
                            
                  <tr>
                    <td>
                      <!-- <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2"> -->
                      {{ $ts->name }}
                      <!-- <span class="badge bg-danger">NEW</span> -->
                    </td>
                    <td>
                      <font style="text-transform: capitalize;">{{ $ts->tipe_order }}</font>
                    </td>
                    <td>Rp. {{ $ts->price }}</td>
                    <td>
                      <!-- <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        12%
                      </small> -->
                      <!-- <small class="text-warning mr-1">
                        <i class="fas fa-arrow-down"></i>
                        0.5%
                      </small>
                      <small class="text-danger mr-1">
                        <i class="fas fa-arrow-down"></i>
                        3%
                      </small> -->
                      {{ $ts->jml }}
                    </td>
                    <td>{{ $ts->trans_date }}</td>
                    <!-- <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td> -->
                  </tr>

                  @php $not++; @endphp
                            @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->


            <div class="card mt-5" style="display: none !important;">
                <div class="card-header text-center">
                    <strong>LIST DATA GAMBAR DAN ARTIKEL</strong>
                </div>
                <div class="card-body">
                    <a href="/pegawai/tambah" class="btn btn-primary">Input Data Baru</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th> 
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @php $no = 1; @endphp
                            @foreach($pegawai as $p)

                            @php
                            $kat = '';
                            $status = '';
                            if($p->kategori == '1'){
                                $kat = 'Slideshow Depan';
                            }elseif($p->kategori == '2'){
                                $kat = 'Wahana';
                            }elseif($p->kategori == '3'){
                                $kat = 'Galeri';
                            }elseif($p->kategori == '4'){
                                $kat = 'Blog';
                            }elseif($p->kategori == '5'){
                                $kat = 'Promo';
                            }else{
                                $kat = '-';
                            }
                            if($p->is_aktif == '1'){
                                $status = 'Aktif';
                            }else{
                                $status = 'Tidak aktif';
                            }
                            @endphp

                            <tr>
                                <td>{{ $no }}</td>
                                <td>
                                    <div class="card mb-2" style="max-width: 200px;">
                                        <img class="img-fluid mb-2" src="{{ url('/images').'/'.$p->lokasi }}">
                                    </div>
                                </td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->deskripsi }}</td>
                                <td>{{ $kat }}</td>
                                <td>{{ $status }}</td>
                                <td>
                                    <a href="/pegawai/edit/{{ $p->gid }}" class="btn btn-warning">Edit</a>
                                    <a href="/pegawai/hapus/{{ $p->gid }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @php $no++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
@endsection