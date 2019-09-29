<?php
include("/ayar.php");
session_start();
if(!isset($_SESSION["login"])){
echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
}else{
?>
<?php
$id = $_POST["id"];
$Ad = $_POST["ad"];
$Fiyat = $_POST["fiyat"];
$Stok = $_POST["stok"];
$db = new PDO("mysql:host=localhost;dbname=database", 'root','');
require '/db.php';
$sql = 'SELECT * FROM urunler';
$statement = $connection->prepare($sql);
$statement->execute(array($id));
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
        <?php foreach($people as $person): ?>
		<?php		
		$Resim = $person->Resim;
		if($Ad == ""){
		$Ad = $person->Ad;
		}
		if($Fiyat == ""){
		$Fiyat = $person->Fiyat;
		}
		if($Stok == ""){
		$Stok = $person->Stok;
		} 
        		if(!is_numeric($Fiyat) || !is_numeric($Stok)){
            	header("refresh:2;url=http://localhost/acp/urunler/index");
				die('HATA ! Fiyat veya stok sadece rakam ile belirlenmelidir.');  
        }		
		?>
        <?php endforeach; ?>
		<?php
		
		   										$sonuc = $db->prepare("UPDATE urunler set Resim=?, Ad=?, Fiyat=?, Stok=?");
						$sonuc->execute(array($Resim,$Ad,$Fiyat,$Stok));
   if ($sonuc){
header("refresh:2;url=http://localhost/acp/urunler/index");
                            die($id. ' ID li Ürün Başarıyla Güncellendi.');   
   }
   else {
header("refresh:2;url=http://localhost/acp/urunler/index");
                            die('HATA !' . $id . 'li Ürün Güncellenemedi.');   
   }
?>


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