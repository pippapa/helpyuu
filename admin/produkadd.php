<a href="<?php echo "?p=produk"; ?>"><button type="button" class="btn btn-add">PRODUK</button></a>
<button type="button" class="btn btn-dis">Tambah Produk</button>
<br>
<div class="card">
<div class="kepalacard">Tambah Produk</div>
<div class="isicard" style="text-align:center;">
<form action="" name="form1" method="post" enctype="multipart/form-data">
    <?php
    $sqlk = mysqli_query($kon,"select * from kategori order by namakat asc");
    echo "<select name='idkat'>";
    echo "<option value=''>Kategori</option>";
    while($rk = mysqli_fetch_array($sqlk)){
        echo "<option value='$rk[idkat]'>$rk[namakat]</option>";
    }
    echo "</select>";
    ?>
    		<input name="nama" type="text" id="nama" placeholder="Nama jasa">
            <input name="harga" type="text" id="harga" placeholder="biaya jasa (dalam Rp.)">
            <textarea name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi Produk"></textarea>
            <textarea name="detail" id="detail" placeholder="Detail Produk"></textarea>
            <input name="diskon" type="text" id="diskon" placeholder="Diskon  (Produk dalam %)">
            <input name="foto1" type="file" id="foto1">
            <input name="foto2" type="file" id="foto2">
            <input name="simpan" type="submit" id="simpan" value="SIMPAN JASA">
        </form>

<?php
if($_POST["simpan"]){
    if(!empty($_POST["idkat"]) and !empty($_POST["nama"]) and !empty($_POST["harga"]) and !empty($_POST["spesifikasi"]) and !empty($_POST["detail"]) ){
        $nmfoto1 = $_FILES["foto1"]["name"];
        $lokfoto1 = $_FILES["foto1"]["tmp_name"];
        if(!empty($lokfoto1)){
            move_uploaded_file($lokfoto1, "../fotojasa/$nmfoto1");
        }

        $nmfoto2 = $_FILES["foto2"]["name"];
        $lokfoto2 = $_FILES["foto2"]["tmp_name"];
        if(!empty($lokfoto2)){
            move_uploaded_file($lokfoto2, "../fotojasa/$nmfoto2");
        }

        $spek = nl2br($_POST["spesifikasi"]);
        $detail = nl2br($_POST["detail"]);
       

        $sqlp = mysqli_query($kon,"insert into produk (idkat, idadmin, nama, harga, spesifikasi, detail, diskon, foto1, foto2, tglproduk) values ('$_POST[idkat]','$ra[idadmin]', '$_POST[nama]','$_POST[harga]','$spek','$detail','$_POST[diskon]','$nmfoto1','$nmfoto2',NOW())");

        if($sqlp){
            echo "Jasa Berhasil Disimpan";
        }else{
            echo "Gagal Menyimpan";
        }
        echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=produk'>";
    }else{
        echo "Data harus diisi dengan lengkap !!!";
    }
    }
    ?>