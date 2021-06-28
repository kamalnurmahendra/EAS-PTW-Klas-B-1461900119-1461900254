<!DOCTYPE html>
<html>
    <head>
        <title>KLAMBIAN.CO</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    </head>

    <body>
            <?php
            //KONEKSI
            $db_host = 'localhost'; // Nama Server
            $db_user = 'root'; // User Server
            $db_pass = ''; // Password Server
            $db_name = 'db_klambian'; // Nama Database
            
            $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
            if (!$link) {
                die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
            }
            ?>
        <div class="container">
            <header>
                <center>
                <div class="logo">
                    <a href="/" style="text-decoration: none; color: #ffffff;">KLAMBIAN.CO</a>
                </div>
                </center>
                <div class="cart">
                    <img src="images/cart-36-64.png" alt="cart"
                    width="20">
                </div>
                <div class="cart_text">
                    <a href="/cart"style="text-decoration: none; color: #ffffff;">Cart</a>
                </div>
                <div class="login">
                <a href="{{ route('login') }}" 
                class="text-sm text-gray-700 underline" 
                style="text-decoration: none; color: #ffffff;">Login Admin</a>
                </div>
            </header>

            <main>
                <div class="promo">
                    Special<br>
                    Opening Store <br>
                    Discount 35% Off <br>
                    <?php
                    $q = $link->query("select * from barang where nama_barang ='Lawless - Iron Eagle'");  
                    while ($r = $q->fetch_array()) { //mengambil data array hasil dari database dan menampung dalam variabel $r
                    echo $r['nama_barang'];
                    }
                    ?>
                                   
                </div>
                <div class="image"></div>
                <div class="button1">
                    Join and Order
                </div>
            
                
            </main>

            <section>
                <div id="index-gallery">
                    @foreach($produk as $pro)
                    <div class="item">
                    
                        <img src="{{ url('/data_file/'.$pro->file) }}" style="width: 90%;"/>
                        <div class="button2">
                            <a href="{{url('/cart/tambah/'.$pro->kode_barang)}}" 
                            style="text-decoration: none; color:inherit;">Add to Cart</a>
                        </div>
                        <p>{{$pro->nama_barang}}</p>
                        <p>Rp.{{$pro->harga}}</p>
                    
                    </div>
                    @endforeach
                </div>


            </section>
        </div>
    </body>
</html>      