<?php
include("/ayar.php");
session_start();
if(!isset($_SESSION["login"])){
echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
}else{
?>
<?php
require 'db.php';
$sql = 'SELECT * FROM mesaj';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Site</title>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/HTML; charset=ISO-8859-9" />
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
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Mesajlar</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Mesaj ID</th>
          <th>IP</th>
          <th>Tarih</th>
          <th>Isim</th>
          <th>Soyad</th>
          <th>Email</th>
          <th>Telefon</th>
          <th>Mesaj</th>
        </tr>
		<?php
    function kisalt($metin, $uzunluk){
  	// substr ile belirlenen uzunlukta kesiyoruz
        $metin = substr($metin, 0, $uzunluk)."...";
	// kesilen metindeki son kelimeyi buluyoruz
        $metin_son = strrchr($metin, " ");
	// son kelimeyi " ..." ile değiştiriyoruz
        $metin = str_replace($metin_son," ...", $metin);
        
        return $metin;
    }
?>
        <?php foreach($people as $person): ?>
		<?php $ID = $person->ID; ?>
          <tr>		  
            <td><?= $person->ID; ?></td>
            <td><?= $person->IP; ?></td>
            <td><?= $person->Tarih; ?></td>
            <td><?= $person->Isim; ?></td>
            <td><?= $person->Soyad; ?></td>
            <td><?= $person->Email; ?></td>
            <td><?= $person->Telefon; ?></td>
			<td><?php $uzunMetin = $person->Mesaj; 
			echo kisalt($uzunMetin, 30);?></td>
            </td>
		
          </tr>
        <?php endforeach; ?>
      </table>
	  			
			<form id="contact-form" method="post" action="delete.php" role="form">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Mesaj Silme</label>
                                        <input id="form_name" type="text" name="id" class="form-control" placeholder="Silinicek Mesajın ID'sini giriniz" required="required" data-error="ID gereklidir.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <input type="submit" name="sil" class="btn btn-success btn-send" value="Sil">
                                </div>
								</div>
								</form>
								<form id="contact-form" method="post" action="detay.php" role="form">
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Mesaj Görüntüleme</label>
                                        <input id="form_name" type="text" name="id2" class="form-control" placeholder="Görüntülenecek Mesajın ID'sini giriniz" required="required" data-error="ID gereklidir.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <input type="submit" name="goruntule" class="btn btn-success btn-send" value="Görüntüle">
                                </div>
								</form>
    </div>
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
<?php
}
?>