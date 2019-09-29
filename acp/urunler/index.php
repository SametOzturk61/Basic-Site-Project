<?php
include("/ayar.php");
session_start();
if(!isset($_SESSION["login"])){
echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
}else{
?>
<?php
require 'db.php';
$sql = 'SELECT * FROM urunler';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<!doctype html>
<html lang="tr">
  <head>
    <title>Site</title>
    <!-- Required meta tags -->
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
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#olustur">
					Ürün Oluştur
				</button>
				<button type="button" class="btn btn-primary disabled" data-toggle="modal" data-target="#duzenle">
					Ürün Düzenle |BETA|
				</button>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#sil">
					Ürün Sil
				</button>
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
      </table></br>

                        <div class="messages"></div>

                        <div class="controls">
						
				<div class="modal fade" id="olustur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ürün Oluştur</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
				  		<form id="contact-form" method="post" action="olustur.php" role="form" enctype="multipart/form-data">

                            <div class="row">
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
                                        <input id="form_name" type="file" name="resim" class="form-control" placeholder="Oluşturulucak Ürünün Resmini seçiniz" required="required" data-error="Resim gereklidir.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
								<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                                    <input type="submit" name="olustur" class="btn btn-success btn-send" value="Oluştur">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                                </div>
								</div>
								</form>
						</div>
					</div>
				</div>
			</div>	
			<div class="modal fade" id="sil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ürün Silme</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
						<form id="contact-form" method="post" action="delete.php" role="form">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="id" class="form-control" placeholder="Silinicek Ürünün ID'sini giriniz" required="required" data-error="ID gereklidir.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <input type="submit" name="sil" class="btn btn-danger" value="Sil">
									<button type="button" class="btn btn-success" data-dismiss="modal">Kapat</button>
                                </div>
								</div>
								</form>
						</div>
					</div>
				</div>
			</div>	
            			<div class="modal fade" id="duzenle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ürün Düzenle</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
			<form id="contact-form" method="post" action="guncelle.php" role="form" enctype="multipart/form-data">
                            <div class="row">
								<div class="col-md-12">
								    <div class="form-group">
                                        <label for="form_name">Ürün ID'si (Girilmesi Zorunludur.*)</label>
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
                                    <input type="submit" name="olustur" class="btn btn-success btn-send" value="Düzenle">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                                </div>
								</div>
								</form>
						</div>
					</div>
				</div>
			</div>	
    </div>
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
<?php
}
?>