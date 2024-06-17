@extends('layouts.app')
@section('content')
    <body>
        <div class="container">

            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>LIST KATEGORI ITEM</strong>
                </div>
                <div class="card-body">
                    <a href="/admin/kat/tambah" class="btn btn-primary">Input Kategori Baru</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <!-- <th>Tipe</th>  -->
                                <!-- <th>Kategori</th>  -->
                                <th>Status</th>
                                <th align="center">Fungsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @php $no = 1; @endphp
                            @foreach($list_kategori as $p)

                            @php
                           
                            $status = '';
                           
                            if($p->is_aktif == '1'){
                                $status = 'Aktif';
                                $bg = '#AAE7BC';
                            }else{
                                $status = 'Tidak aktif';
                                $bg = '#FF576D';
                            }

                            @endphp

                            <tr style="background-color: {{$bg}} ;">
                                <td>{{ $no }}</td>
                                <td>
                                    <div class="card mb-2" style="max-width: 200px;">
                                        <img class="img-fluid mb-2" src="{{ url('/images').'/'.$p->lokasi }}">
                                    </div>
                                </td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->deskripsi }}</td>
                                <!-- <td>{{ $p->tipe }}</td> -->
                                <!-- <td>{{ $p->nama_kat }}</td> -->
                                <td>{{ $status }}</td>
                                <td>
                                    <a href="/admin/kat/edit/{{ $p->gid }}" class="btn btn-warning">Edit</a>
                                    <a href="/admin/kat/hapus/{{ $p->gid }}" class="btn btn-danger">Hapus</a>
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