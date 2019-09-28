<?php
include("/ayar.php");
session_start();
if(!isset($_SESSION["login"])){
echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
}else{
?>
<?php
$db = new PDO("mysql:host=localhost;dbname=database", 'root','');
require '/db.php';
$sql = 'SELECT * FROM urunler';
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
      <h2>Ürünler</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Ürün Resmi</th>
          <th>ID</th>
          <th>Ürün Adı</th>
          <th>Fiyatı</th>
          <th>Stok Durumu</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>		
		    <td><img src="<?= $person->Resim; ?>" width="200" height="200"></img></td>
            <td><?= $person->ID; ?></td>
            <td><?= $person->Ad; ?></td>
            <td><?= $person->Fiyat; ?></td>
            <td><?= $person->Stok; ?></td>
		
          </tr>
        <?php endforeach; ?>
      </table></br></br></br></br></br>
	  									<form id="contact-form" method="post" action="olustur.php" role="form" enctype="multipart/form-data">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
							<label for="form_name"><h2>Ürün Oluşturma</h2></label></br>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Ürün Adı</label>
                                        <input id="form_name" type="text" name="ad" class="form-control" placeholder="Oluşturulucak Ürünün Adını giriniz" required="required" data-error="Ürün Adı gereklidir.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Ürün Fiyatı</label>
                                        <input id="form_name" type="text" name="fiyat" class="form-control" placeholder="Oluşturulucak Ürünün Fiyatını giriniz" required="required" data-error="Fiyat gereklidir.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Ürün Stoğu</label>
                                        <input id="form_name" type="text" name="stok" class="form-control" placeholder="Oluşturulucak Ürünün Stoğunu giriniz" required="required" data-error="Stok gereklidir.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Ürün Resmi</label>
                                        <input id="form_name" type="file" name="resim" class="form-control" placeholder="Oluşturulucak Ürünün Resmini seçiniz">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
								<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                                    <input type="submit" name="olustur" class="btn btn-success btn-send" value="Oluştur">
                                </div>
								</div>
								</form>
								</br></br>
						<form id="contact-form" method="post" action="guncelle.php" role="form" enctype="multipart/form-data">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
							<label for="form_name"><h2>Ürün Bilgisi Düzenle</h2></label></br>
								<div class="col-md-12">
								    <div class="form-group">
                                        <label for="form_name">Ürün ID'si</label>
                                        <input id="form_name" type="text" name="id" class="form-control" placeholder="Düzenlenecek Ürünün ID'sini giriniz" required="required" data-error="Ürün ID'si gereklidir.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="form_name">Ürün Adı</label>
                                        <input id="form_name" type="text" name="ad" class="form-control" placeholder="Düzenlenecek Ürünün Adını giriniz" >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Ürün Fiyatı</label>
                                        <input id="form_name" type="text" name="fiyat" class="form-control" placeholder="Düzenlenecek Ürünün Fiyatını giriniz">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Ürün Stoğu</label>
                                        <input id="form_name" type="text" name="stok" class="form-control" placeholder="Düzenlenecek Ürünün Stoğunu giriniz">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Ürün Resmi</label>
                                        <input id="form_name" type="file" name="resim" class="form-control" placeholder="Düzenlenecek Ürünün Resmini seçiniz">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
								<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                                    <input type="submit" name="olustur" class="btn btn-success btn-send" value="Düzenle">
                                </div>
								</div>
								</form>
								</br></br>
						<form id="contact-form" method="post" action="delete.php" role="form">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name"><h2>Ürün Silme</h2></label>
                                        <input id="form_name" type="text" name="id" class="form-control" placeholder="Silinicek Ürünün ID'sini giriniz" required="required" data-error="ID gereklidir.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <input type="submit" name="sil" class="btn btn-success btn-send" value="Sil">
                                </div>
								</div>
								</form>
								</br></br>
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