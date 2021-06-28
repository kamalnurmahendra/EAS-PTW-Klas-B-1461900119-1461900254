<!DOCTYPE html>
<html>
    <head>
        <title>KLAMBIAN.CO</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cart.css') }}">
    </head>
    
    <body>
        <div class="container">
            <header>
                <center>
                <div class="logo">
                    <a href="/" style="text-decoration: none; color: #ffffff;">KLAMBIAN.CO</a>
                </div>
                </center>
            </header>

            <main>
                <div class="katalog_nav">
                    <h1><a href="/" style="text-decoration: none; color: #000000;">Keranjang</a></h1>
                </div>
            @if(empty($cart) || count($cart)==0) 
                <div class="noproduk">
                    <h2 style="text-decoration: underline;">Keranjang Kosong</h2>
                </div>
            @else
            <center><table border="1" cellpadding="10" style="width: 70%;">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>&nbsp;</th>
                </tr>
                <?php 
                    $no=1;
                    $subtotal = 0;
                ?>
                @foreach($cart as $ct => $val)
                
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$val["nama_barang"]}}</td>
                    <td>Rp.{{$val["harga"]}}</td>
                    <td>
                        <a href="{{url('/cart/hapus/'.$ct)}}">Batal</a>
                    </td>
                </tr>
                <?php
                    $subtotal = $subtotal + $val["harga"];
                ?>
                @endforeach
                <tr>
                    <th colspan="2">Total</th>
                    <th>Rp.{{$subtotal}}</th>
                    <th id="yellow"><a href="/beli" style="text-decoration: none; color: #ffffff;">Checkout</a></th>
                </tr>
            </table></center>
            
            
        @endif
    
            </main>
        </div>
    </body>
</html>      