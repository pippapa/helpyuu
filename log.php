<div class="container2">
    <div class="grid">
        <div class="topnav" id="myTopnav">
            <div class="dh6">
                <a href="<?php echo "?p=beranda";?>">BERANDA</a>
                <a href="javascript:void(0);" class="icon" style="font-size:14px;" onClick="myFunction()">&#9776</a>
                
                </div>
                <div class="dh6">
                    <?php
                    if(!empty($_SESSION["userag"]) and !empty($_SESSION["passag"])){
                        echo "<a><b>$rag[nama]</b></a>";
                        echo "<a href='?p=konfirmasi&idag=$rag[idanggota]'>Konfirmasi</a>";
                        echo "<a href='?p=riwayat&idag=$rag[idanggota]'>Riwayat</a>";
                        echo "<a href='?p=keranjangbelanja&idag=$rag[idanggota]'>Keranjang</a>";
                        echo "<a href='?p=logout'>Logout</a>";
                    }else{
                        echo "<a href='?p=register'>Register</a>";
                        echo "<a href='?p=login'>Login</a>";
                    }
                    ?>
                    </div>
                </div>
                <script>
                    function myFunction(){
                        var x = document.getElementById("myTopnav");
                        if(x.className === "topnav"){
                            x.className += "responsive";
                        }else{
                            x.className = "topnav";
                        }
                    }
                    </script>
                    </div>
                </div>