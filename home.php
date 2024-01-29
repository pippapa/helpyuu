<!DOCTYPE html>
<html>
<head>
	<title>Sejasa.com</title>
	<link rel="stylesheet" href="" type="text/css" />
	<style>body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}
.header {
  background-image: url('foto/ltr.jpg') ;
  background-size: 100%; 
  background-color: #0b244e;
  color: #ffffff;
  padding: 20px;;
  text-align: center;
  font-size: 20px;
  margin-top: -10px;
}

.header1 {
  font-family:Verdana, Geneva, Tahoma, sans-serif;
  color:#0b244e;
  padding: 0%;
  margin-top: -20px;
  text-align: center;
  font-size: 20px;

}
.header a {
  color: #fff;
  text-decoration: none;
}
.nav {
  background-color: #f2f2f2;
  padding: 10px;
  text-align: center;
}
.nav a {
  color: #000000;
  margin: 0 5px;
  text-decoration: none;
}
.content {
  padding: 10px;
  text-align: center; 

}
.card {
  background-color: #f2f2f2;
  border: 1px solid #ddd;
  display:inline-block;
  margin: 10px;
  padding: 20px;


}
.card h2 {
  margin-top: 0;
}
.card p {
  margin: 10px 0;
}
.card a {
  
  color: #fff;
  padding: 5px 10px;
  text-decoration: none;
}

.card1 {
  background-color: #f2f2f2;
  border: 1px solid #ddd; 
  display: inline-block;
  margin: 10px;
  padding: 20px;
  text-align: left;
  width: 300px;
  height: 250px;
  
}

.container4{
  height: 400px;
  background-color: #ffffff;
  padding: 10px;
  border: 11px ;
  display: flex;
}

.popular-categories {
  background-image: url('foto/kt.png');
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 0 -10px;
  height:400px;
  width: 60%;
  background-color: #868fae;
  border: 1px solid #ddd;
  border-radius: 5px;
  text-align:right;
}

.category {
  background-color: #f2f2f2;
  border: 1px solid #ddd;
  border-radius: 5px;
  color: #333;
  display: flex;
  font-size: 14px;
  font-weight: bold;
  justify-content: center;
  align-items: center;
  height: 50px;
  margin: 7px;
  padding: 0 20px;
  text-transform: uppercase;
  width: 100%;
}
.category1 {

  
  border: 2px solid #ddd;
  border-radius: 5px;
  color: #fff;
  display: flex;
  font-size: 20px;
  font-weight: bold;
  justify-content: center;
  align-items: center;
  margin:10px;
  height: 35px;
  margin-left: 117px;
  padding: 0 20px;
  text-transform: uppercase;
  width: 50%;
}
.category:nth-child(7),
.category:nth-child(8) {
  width: calc(50% - 20px);
}

@media (max-width: 768px) {
  .category {
      width: 100%;
  }

  .category:nth-child(7),
  .category:nth-child(8) {
      width: 100%;
  }

}
.container3{
  margin-top:0px;
}
ul li {
		list-style: none;
		margin: 0 auto;
		border-left: 2px solid #0b244e;
		display: inline-block;
		padding: 0 25px;
		position: relative;
		text-decoration: none;
		text-align: center;
	  }
a {
  
  text-decoration: none;

  &:hover {
    color: #0b244e;
  }
 
}

  

</style>

	
</head>
<body>
	<div class="header">
 
		<div class="header1">
			
		<h1>helpyuu</h1>
		</div>
	</div>
	<div class="container3">
    <div class="grid">
        <div class="dh12">
            <form method="post" action="<?php echo "?p=layananjasa"; ?>">
                <input name="cari" type="text" placeholder="Ketik Nama Produk Yang Akan Dicari" />
                <input type="submit" name="submit" value="Cari" />
            </form>
        </div>
    </div>
</div> 
<div class="grid">
    <div class="dh12">
        <div class="container4">
			<div >   
            <img src="foto/pror.png" width="99%" height="400px">
			</div>
			
  
			<div class="popular-categories" >   
      
      <div class="category1">kategori </div>
			<div class="category"><?php echo "<a href='?p=home&idk=6' $pil>$rk[handphone]instalasi elektoronik</a>";?> </div>
			<div class="category"><?php echo "<a href='?p=home&idk=7' $pil>$rk[handphone]jasa kebersihan</a>";?> </div>
			<div class="category"><?php echo "<a href='?p=home&idk=8' $pil>$rk[handphone]jasa angkutan barang</a>";?> </div>
			<div class="category"><?php echo "<a href='?p=home&idk=9' $pil>$rk[handphone]jasa renovasi</a>";?> </div>
			<div class="category"><?php echo "<a href='?p=home&idk=10' $pil>$rk[handphone]jasa service</a>";?> </div>
			
	</div>
				
</div>

	<div class="nav">
  <div id="mySidenav" class="sidenav">  
    <ul>   
            <a href="<?php echo "?p=rekomendasi"; ?>">Rekomendasi</a>
            <li><a href="<?php echo "?p=promo"; ?>">Promo</a></li>
            <li><a href="<?php echo "?p=lainya"; ?>">Jasa Lainnya</a></li>
    </ul>          
        </div>
	</div>
  <?php
if($_GET["p"] == "promo"){
    include "promo.php";
}else if($_GET["p"] == "lainya"){
    include "lainya.php";
}else{
 include "rekomendasi.php"; 
}
?>
	
	
</div>
</div>
</body>
</html>