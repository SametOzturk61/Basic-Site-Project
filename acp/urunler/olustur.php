<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	    <meta http-equiv="Content-Type" content="text/HTML; charset=ISO-8859-9" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>	
</body>
</html>
<?php
// MySQL Bağlantısı
	$dbhost 	= "localhost";
	$dbname 	= "database";
	$charset 	= "utf8";
	$dbuser 	= "root";
	$dbpassword = "";
	try{
		$db = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=$charset;", $dbuser, $dbpassword);
	}catch(PDOExeption $error){
		echo $error->getMessage();
	}
	
if($_POST){
 
    if ($_FILES["resim"]["size"]<1024*1024){//Dosya boyutu 1Mb tan az olsun
	$dosya = $_FILES["resim"]["type"];
        if ($dosya == "image/jpeg" || $dosya == "image/png" || $dosya == "image/gif"){
 
            $Ad    =     $_POST["ad"];
            $Fiyat    =     $_POST["fiyat"];
            $Stok    =     $_POST["stok"];
            $dosya_adi   =    $_FILES["resim"]["name"];
			if(!is_numeric($Fiyat) || !is_numeric($Stok)){
            	header("refresh:2;url=http://localhost/acp/urunler/index");
				die('Fiyat veya stok sadece rakam ile belirlenmelidir.');  
            }else{
 
            //Resimi kayıt ederken yeni bir isim oluşturalım
            $uret=array("as","rt","ty","yu","fg");
            $uzanti=substr($dosya_adi,-4,4);
            $sayi_tut=rand(1,10000);
 
            $yeni_ad=$_SERVER['DOCUMENT_ROOT'].'/img/urunler/'.$uret[rand(0,4)].$sayi_tut.$uzanti;
 
            //Dosya yeni adıyla uploadklasorune kaydedilecek
			}
            if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){                
 
                //Bilgileri veritabanına kayıt ediyoruz..
				$yeni_ad = str_replace("C:/xampp/htdocs","", $yeni_ad);
										$sorgu = $db->prepare("insert into urunler set Resim=?, Ad=?, Fiyat=?, Stok=?");
						$sorgu->execute(array($yeni_ad,$Ad,$Fiyat,$Stok));
 
            if ($sorgu){				
				header("refresh:2;url=http://localhost/acp/urunler/index");
				die('Ürün başarıyla oluşturuldu.');   
            }else{
				header("refresh:2;url=http://localhost/acp/urunler/index");
				die('HATA ! Ürün oluşturulamadı.'); 
            }
        }else{
			header("refresh:2;url=http://localhost/acp/urunler/index");
			die('HATA ! Ürün resmi yüklenemedi.'); 
        }
    }else{
		header("refresh:2;url=http://localhost/acp/urunler/index");
		die('HATA ! Resim yalnızca jpeg,png veya gif olabilir.'); 
    }
    }else{          
		header("refresh:2;url=http://localhost/acp/urunler/index");
		die('HATA ! Resim boyutu 1 MB tan fazla olamaz.'); 
    }
}
?>
