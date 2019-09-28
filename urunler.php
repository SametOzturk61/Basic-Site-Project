<?php
$db = new PDO("mysql:host=localhost;dbname=database", 'root','');
require '/istekler/db.php';
$sql = 'SELECT * FROM urunler';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
 <?php
require 'sayfalar/sidebar.php';
require 'sayfalar/menu.php';
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
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Ürünler</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th></th>
          <th>ID</th>
          <th>Ürün Adı</th>
          <th>Fiyatı</th>
          <th>Stok Durumu</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>		
		    <td><img src="<?= $person->Resim; ?>" width="100" height="100"></img></td>
            <td><?= $person->ID; ?></td>
            <td><?= $person->Ad; ?></td>
            <td><?= $person->Fiyat; ?></td>
            <td><?php if($person->Stok > 0){
			echo "Var";	
			}else{
			echo "Yok";
			}?></td>
		
          </tr>
        <?php endforeach; ?>
      </table>
	  			
			<form id="contact-form" method="post" action="goruntule.php" role="form">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Detaylı Ürün Görüntüleme</label>
                                        <input id="form_name" type="text" name="id" class="form-control" placeholder="Görüntülenecek Ürünün ID'sini giriniz" required="required" data-error="ID gereklidir.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <input type="submit" name="görüntüle" class="btn btn-success btn-send" value="Görüntüle">
                                </div>
								</div>
								</form>

    </div>
  </div>
</div></div></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
<?php
require 'sayfalar/underbar.php';

?>
