<!DOCTYPE html>
<html lang="en">

<div class="card-header">
        <h3 class="card-title text-center">Daftar Barang</h3>
    </div>

<table  width="100%" >
        <tr>
            @foreach ($barang as $data)
            <td style="text-align: center">
                {!! \DNS1D::getBarcodeHTML($data -> id_barang,'C128') !!}
                {{ $data -> id_barang }} 
                <br>
                {{ $data->nama }}
                <br>
            </td>
                
            @endforeach
        </tr>
    </table>
</html>