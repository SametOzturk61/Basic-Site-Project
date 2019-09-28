<?php
include("/ayar.php");
session_start();
if(!isset($_SESSION["login"])){
echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<ul id="yatay-menu">
&emsp;&emsp;&emsp;&emsp;<img src="/img/logo.png" height="100px" width="175px">&emsp;&emsp;&emsp;
<li><a href="/acp/mesajlar/index">Mesajlar</a></li>
<li><a href="/acp/urunler/index">Ürünler</a></li>
<li><a href="/acp/logout">Çıkış Yap</a></li>
</ul>
</nav>
<center><p>

<div class="row">
<div class="col-md-12" style="background-color:#022148">
<font size="7" color="white">Admin Paneli Özellikleri</font></br></br>
<font size="5" color="white">Mesajları görüntüleme</br>
Ürünleri görüntüleme,ekleme ve silme</br></br>
by Samet Öztürk</font></br>
</div>

</p></center>

</body>
</html>
<?php
}
?>