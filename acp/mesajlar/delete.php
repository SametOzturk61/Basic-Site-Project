
<?php
   $db = new PDO("mysql:host=localhost;dbname=database", 'root','');
   $ID = $_POST["id"];
   $sonuc = $db->exec("DELETE FROM  mesaj where ID= '$ID'  ");
   if ($sonuc){
header("refresh:2;url=http://localhost/acp/mesajlar/index");
                            die($ID. ' Id li Mesaj Silindi ');   
   }
   else {
header("refresh:2;url=http://localhost/acp/mesajlar/index");
                            die("Basarisiz");   
   }
?>
