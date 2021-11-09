<!DOCTYPE html>
<html>
<head>
    <title>Barcode</title>

    <style>
        .text-center{
            text-align: center;
        }
        td{
            padding: 7px;
        }
        @page { margin: 0px; }
        body { margin: 0px; }
    </style>
</head>
<body>

<table>
    <tr>
    @foreach(range(0,$panjang) as $key)
    @if($x++ <= $panjang)
        <td style="text-align: center; border: 1px solid black" width="100" height="40">
        </td>
    @if ($no++ % 5 == 0)
    </tr>
    <tr>
    @endif
    @else
    @foreach($barang as $data)
       <td style="text-align: center">
                {!! \DNS1D::getBarcodeHTML($data -> id_barang,'C128') !!}
           
            {{ $data->id_barang }}<br>
            {{ $data->nama }}
        </td>
    @if ($no++ % 5 == 0)
    </tr>
    @endif
    @endforeach
    @endif
    @endforeach
    </tr>
</table>
</body>
</html>