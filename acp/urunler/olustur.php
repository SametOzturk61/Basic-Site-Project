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
 
        if ($_FILES["resim"]["type"]=="image/jpeg"){  //dosya tipi jpeg olsun
 
            $Ad    =     $_POST["ad"];
            $Fiyat    =     $_POST["fiyat"];
            $Stok    =     $_POST["stok"];
            $dosya_adi   =    $_FILES["resim"]["name"];
 
            //Resimi kayıt ederken yeni bir isim oluşturalım
            $uret=array("as","rt","ty","yu","fg");
            $uzanti=substr($dosya_adi,-4,4);
            $sayi_tut=rand(1,10000);
 
            $yeni_ad=$_SERVER['DOCUMENT_ROOT'].'/img/urunler/'.$uret[rand(0,4)].$sayi_tut.$uzanti;
 
            //Dosya yeni adıyla uploadklasorune kaydedilecek
 
            if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
                echo 'Dosya başarıyla yüklendi.';
 
                //Bilgileri veritabanına kayıt ediyoruz..
				$yeni_ad = str_replace("C:/xampp/htdocs","", $yeni_ad);
										$sorgu = $db->prepare("insert into urunler set Resim=?, Ad=?, Fiyat=?, Stok=?");
						$sorgu->execute(array($yeni_ad,$Ad,$Fiyat,$Stok));
 
            if ($sorgu){
                echo 'Veritabanına kaydedildi.';
            }else{
                echo 'Kayıt sırasında hata oluştu!';
            }
        }else{
            echo 'Dosya Yüklenemedi!';
        }
    }else{
        echo 'Dosya yalnızca jpeg formatında olabilir!';
    }
    }else{          
        echo 'Dosya boyutu 1 Mb ı geçemez!';
    }
}
?>
