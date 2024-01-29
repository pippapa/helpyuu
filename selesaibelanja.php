<p><div class="container5">
    <div class="grid">
    <div class="dh12">
        <div class="card">
        <div class="kepalacard">Proses Checkout</div>
        <div class="isicard" style="text-align:center;">
        <form method="post" action="<?php echo "?p=selesaibelanjaaksi"; ?>" enctype="multipart/form-data">
        <input name="idag" type="text" value="<?php echo "$rag[idanggota]"; ?>">
        <input name="email" type="text" value="<?php echo "$rag[email]"; ?>">
        <input name="nama" type="text" value="<?php echo "$rag[nama]"; ?>">
        <input name="nohp" type="text" value="<?php echo "$rag[nohp]"; ?>">
        <textarea name="alamat"><?php echo "$rag[alamat]"; ?></textarea>
        <textarea name="tanggalpemesanan" placeholder="tanggal pemesanan"></textarea><p>
        
       
       
    <input type="submit" name="submit" value="PROSES CHECKOUT">
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>