<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>

    <style type="text/css">
        h4 {
            margin: 0;
        }
        .w-full {
            width: 100%;
        }
        .w-half {
            width: 50%;
        }
        .margin-top {
            margin-top: 1.25rem;
        }
        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            background-color: rgb(241 245 249);
        }
        table {
            width: 100%;
            border-spacing: 0;
        }
        table, th, td {
          border: 1px solid #DDDFDE;
        }

        table.products {
            font-size: 0.875rem;
        }
        table.products tr {
            background-color: #f1f3f5;
        }
        table.products th {
            color: #000;
            padding: 0.5rem;
        }
        table tr.items {
            background-color: rgb(241 245 249);
        }
        table tr.items td {
            padding: 0.5rem;
        }
        .total {
            text-align: right;
            margin-top: 1rem;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
<center>
    <h1>PROPOSAL</h1>

    <table width="100%" class="products">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th colspan="2">Item</th>
                <th>Detail</th>
                <!-- <th>Fungsi</th> -->
            </tr>
        </thead>
        <tbody>
            
            @php
                $no = 1;
            @endphp
            @foreach($billing as $item)
            
            <tr>
                <td align="center">{{$no++}}</td>
                <td align="center">
                    <h6>
                       {{ $item->kat}}
                    </h6>
                </td>
                <td align="center" style="border-right: 1px solid #f1f3f5;">
                                <img src="images/{{$item->lokasi}}" width="60">
                </td>
                <td align="center" style="border-left: 1px solid #f1f3f5;">
                                <h6>{{$item->nama}}</h6>
                </td>
                <td>
                    <h5><pre>{!! $item->deskripsi !!}</pre></h5>
                </td>
                <!-- <td>
                    <a href="#" onclick="return edit({{$item->sub_kategori}}, {{$item->id}});">
                        <span></span>
                    </a>
                    <a href="#" onclick="return del({{$item->id}});">
                        <span></span>
                    </a>
                </td> -->
            </tr>

            @endforeach

            </tbody>
    </table>
</center>
</body>