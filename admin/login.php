<style>
.shapedividers_com-5200{
overflow:hidden;
position:relative;

}
.shapedividers_com-5200::before{ 
content:'';
font-family:'shape divider from ShapeDividers.com';
position: absolute;
z-index: 3;
pointer-events: none;
background-repeat: no-repeat;
bottom: -0.1vw;
left: -0.1vw;
right: -0.1vw;
top: -0.1vw; 
background-size:  50%;
background-position: 100% 50%;  background-image: url('data:image/svg+xml;charset=utf8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2.17 35.28" preserveAspectRatio="none"><path d="M1.67 0c-.55 3.07.41 9.27 0 16.14-.4 6.88-.58 13.75.1 19.14h.4V0z" fill="%230b244e"/><path d="M1.16 0c-.8 3.17.4 7.29.56 10.04C1.89 12.8.25 19.3.42 22.71c.16 3.43.84 4.65.86 7.05.03 2.4-.88 5.52-.88 5.52h1.77V0z" opacity=".5" fill="%230b244e"/><path d="M.31 0c.84 2.56.3 7.68.43 11.79.12 4.1.61 6.86.28 9.58-.33 2.73-1.18 5.61-1 8.61.19 3 .82 4.73.84 5.3h1.2V0z" opacity=".5" fill="%230b244e"/></svg>'); 
}
</style>

 <div class="shapedividers_com-5200">
<div id="signin">
    <fieldset>
        <img src="../foto/avatar.png" width="120px">
        <form name="form1" method="post" action="">
            <h3>ADMINISTRATOR</h3>
            <p>Silahkan Login</p>
            <input name="username" type="text" id="username" placeholder="Username">
            <input name="password" type="text" id="password" placeholder="Password">
            <input name="login" type="submit" id="login" value="Login Admin">
        </form>

        <?php
        if ($_POST["login"]) {
            $sqla = mysqli_query($kon, "select * from admin where username='$_POST[username]' and password='$_POST[password]'");
            $ra = mysqli_fetch_array($sqla);
            $row = mysqli_num_rows($sqla);
            if ($row > 0) {
                session_start();
                $_SESSION["useradm"] = $ra["username"];
                $_SESSION["passadm"] = $ra["password"];
                echo "<div align='center'> Login Berhasil</div>";
            } else {
                echo "<div align='center'> Login Gagal</div>";
            }
            echo "<META HTTP-EQUIV='Refresh' content='1; URL=?p=home'>";
        }
        ?>
    </fieldset>
</div>
</div>