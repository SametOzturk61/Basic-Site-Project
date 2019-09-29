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
	  			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#goruntule">
					Mesajı Görüntüle
				</button>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#sil">
					Mesajı Sil
				</button>
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
                        <div class="messages"></div>

                        <div class="controls">
				<div class="modal fade" id="sil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Mesaj Sil</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
				  					<form id="contact-form" method="post" action="delete.php" role="form">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="id" class="form-control" placeholder="Silinicek Mesajın ID'sini giriniz" required="required" data-error="ID gereklidir.">
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
			<div class="modal fade" id="goruntule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Mesaj Görüntüle</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
								<form id="contact-form" method="post" action="detay.php" role="form">
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="id2" class="form-control" placeholder="Görüntülenecek Mesajın ID'sini giriniz" required="required" data-error="ID gereklidir.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <input type="submit" name="goruntule" class="btn btn-success btn-send" value="Görüntüle">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                                </div>
								</form>
						</div>
					</div>
				</div>
			</div>	
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