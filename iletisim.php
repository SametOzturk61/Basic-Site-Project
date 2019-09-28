<?php
require 'sayfalar/sidebar.php';
require 'sayfalar/menu.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="/css/form.css">
</head>
<body>
<style>
.content {
  display: flex;
}

.content img {
  margin-right: 10px;
  display: block;
}

.content h3,
.content p {margin: 0;}

	#Form span{display:block;font: 18px Tahoma;color: #F8F8FF}
	#Form input {border:1px solid #ddd; padding:10px;width:250px}
	#Form button {display block;border:1px solid #ddd; padding:10px;width:272px;margin-top:10px;cursor:pointer;background-color:#008CBA;font: 18px Tahoma;color: #F8F8FF}
    #Form
    {
    position: absolute;

    left: 500px;
    top: 300px;
    }
    #Form 
	{
    background-color: #555555;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    }
</style>


<center><p>

<div class="row">
<div class="col-md-12" style="background-color:#FFFFFF">
<div class="content">
  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  <img src="img/dukkan2.jpg" width="700" height="600">
  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  <div class="text">
    <h3><strong>OZTURK CEYIZ</strong></h3></br>
    <p><i class="fas fa-home"></i>Beyazıt, Nişanca Cd. No:17, </br>34087 Fatih/İstanbul</p></br>
    <p><i class="far fa-envelope"></i>ozturkceyiz40@gmail.com</p></br>
    <p><i class="fas fa-phone-alt"></i>+90 532 470 3686</p></br>
    <p><i class="far fa-clock"></i>Hafta içi: 09:00-20:30</p></br>
    <p><i class="far fa-clock"></i>Cumartesi: 09:00-20:30</p></br>
    <p><i class="far fa-clock"></i>Pazar: Kapalı</p></br>
  </div>
</div></br>

</div>
</div>
</div>
<h3><strong>MESAJ YOLLAYIN</strong></h3></br>
                   <form id="contact-form" method="post" action="/istekler/mesaj.php" role="form">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Adınız *</label>
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Lütfen adınızı giriniz *" required="required" data-error="İsim gereklidir.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Soyadınız *</label>
                                        <input id="form_lastname" type="text" name="soyad" class="form-control" placeholder="Lütfen soyadınızı giriniz *" required="required" data-error="Soyad gereklidir.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Lütfen emailinizi giriniz *" required="required" data-error="Email gereklidir.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">Telefon Numarası</label>
                                        <input id="form_phone" type="telefon" name="telefon" class="form-control" placeholder="Lütfen telefon numaranızı giriniz">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Mesajınız *</label>
                                        <textarea id="form_message" name="mesaj" class="form-control" placeholder="Mesajınızı yazınız... *" required="required" data-error="Lütfen bir mesaj yazın"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
							 <div class="col-md-12">
                                    <input type="submit" name="ok" class="form-control" value="Yolla">									
                             </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-muted"><strong>*</strong> ile işaretli alanların doldurulması gerekmektedir.</p>
                                </div>
                            </div>
                        </div>

                    </form>
            
</p></center>
<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>

</body>
</html>
<?php
require 'sayfalar/underbar.php';
?>
