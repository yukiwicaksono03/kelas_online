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
    </style>
</head>
<body>

    <!-- <h1>PROPOSAL</h1> -->
    <h3 style="font-family: 'Arial';">Client Info</h3>
    <span style="font-family: 'Arial'; font-size: 12px; margin-top: -30px;">{{$proposal->nama}} &#x2022; {{$proposal->created_at}} &#x2022; {{$proposal->alamat}}</span>
    <br>
    <br>
    <br>
    <h3 style="font-family: 'Arial';">Based On Request Package</h3>

            @php
                $no = 1;
            @endphp
            @foreach($billing as $item)
            
            <ul>
                <li>{{ $item->kat}} by <span style="color: #01B050; font-weight: bold;">{{$item->nama}}</span>
                    <br>
                    {!! $item->deskripsi !!}
                </li>
            </ul>
            @endforeach

</body>