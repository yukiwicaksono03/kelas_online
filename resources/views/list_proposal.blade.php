@extends('layouts.app')
@section('content')

<script type="text/javascript">
    
    function edit( id){
        if (confirm("Yakin edit data ?") == true) {

            $.post("/admin/proposal/edit",
            {
              // token: token,
                "_token": "{{ csrf_token() }}",
                id : id,
            },
            function(data,status){
                // alert(data);
                if(data == 't'){
                    alert('Proposal berhasil diapprove.');
                    location.replace('/admin/list_proposal');
                }
              // alert("Data: " + data + "\nStatus: " + status);
            });
        }else{
            return false;
        }
    }

    function del(id){
        if (confirm("Yakin hapus data ?") == true) {
            
            $.post("/admin/proposal/hapus",
            {
              // token: token,
                "_token": "{{ csrf_token() }}",
                id : id,
            },
            function(data,status){
                if(data == 't'){
                    alert('Proposal berhasil direject.');
                    location.replace('/admin/list_proposal');
                }
              // alert("Data: " + data + "\nStatus: " + status);
            });
        }else{
            return false;
        }
    }
</script>

    <body>
        <div class="container">

            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>LIST DATA PROPOSAL</strong>
                </div>
                <div class="card-body">
                    <!-- <a href="/admin/proposal/tambah" class="btn btn-primary">Input Item Baru</a>
                    <br/>
                    <br/> -->
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <!-- <th>Gambar</th> -->
                                <th>Nama</th>
                                <th>Phone</th>
                                <th>Email</th> 
                                <th>Tanggal Order</th> 
                                <th>Status</th>
                                <th>Fungsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @php $no = 1; @endphp
                            @foreach($list_proposal as $p)

                            @php
                            $status = '';
                            $display = '';

                            if($p->status == '1'){
                                $status = 'Approved';
                                $display = 'none';
                            }elseif($p->status == '2'){
                                $status = 'Rejected';
                                $display = 'none';
                            }else{
                                $status = 'Awaiting';
                            }
                            @endphp

                            <tr>
                                <td>{{ $no }}</td>
                                <!-- <td>
                                    <div class="card mb-2" style="max-width: 200px;">
                                        <img class="img-fluid mb-2" src="{{ url('/images').'/'.$p->lokasi }}">
                                    </div>
                                </td> -->
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->phone }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->trans_date }}</td>
                                <td>{{ $status }}</td>
                                <td>
                                    <!-- <a href="{{asset(public_path('pdf/').'PDF-PROPOSAL-'.$p->ltid.'.pdf') }}" class="btn btn-default">PDF</a> -->
                                    <a href="pdfile/{{$p->ltid}}" class="btn btn-default">PDF</a>
                                    <a href="#" onclick="edit({{ $p->lpid }})" class="btn btn-primary" style="display: {{$display}}">Approve</a>
                                    <a href="#" onclick="del({{ $p->lpid }})" class="btn btn-danger" style="display: {{$display}}">Reject</a>
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