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
// POST methoduyla veri çekmek için degiskenler
date_default_timezone_set('Europe/Istanbul');
$isim = $_POST["name"];
$soyad = $_POST["soyad"];
$email = $_POST["email"];
$telefon = $_POST["telefon"];
$mesaj = $_POST["mesaj"];
$zaman = date("Y-m-d H:i:s");

// Kontroller
if(strlen($mesaj) > 500)
{
							header("refresh:2;url=http://localhost/iletisim");
                            die("Mesajınız 500 karakterden uzun olamaz"); 
}
else if (strlen($mesaj) < 5)
{
							header("refresh:2;url=http://localhost/iletisim");
                            die("Mesajınız 5 karakterden küçük olamaz"); 
}			                  	
						else
						{
						$ip = $_SERVER["REMOTE_ADDR"];
						$register = $db->prepare("insert into mesaj set Isim=?,Soyad=?,Email=?,IP=?,Telefon=?,Mesaj=?,Tarih=?");
						$register->execute(array($isim,$soyad,$email,$ip,$telefon,$mesaj,$zaman));
                            if($register)
						    {	                        
							header("refresh:2;url=http://localhost/iletisim");
                            die("Mesajınız başarıyla gönderildi");						
						    }
						        else
								{
	                        header("refresh:2;url=http://localhost/iletisim");
                            die("Mesajınız maalesef gönderilemedi. Lütfen daha sonra tekrar deneyin."); 	
							    }
							}
						
					
					
?>