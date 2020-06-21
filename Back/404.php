<?php http_response_code(404); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Ошибка 404</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		@font-face {
			font-family: "Sans"; 
			src: url("resource/OpenSans.ttf"); 
		}
		@media screen and (max-width: 510px) {
			#text{
				width:100%;
			}
			#flatti{
				width:90%;
			}
		}
		@media screen and (min-width: 511px) {
			#text{
				width:512px;
			}
			body{
				//overflow-y: hidden;
			}
			#flatti{
				height:90%;
				bottom:0px;
				margin-left:512px;
				position:fixed;
			}
			#img{
				position:absolute;
				bottom: 0px;
				height: 100%;
			}
		}
	</style>
</head>
<body style="overflow-x: hidden;">
<script>

</script>
<div id="text" style="font-family:Sans;">
<div style="text-align:center">
<div style="color:#d22a5e;font-size:28px;line-height:100px;"><b>СТРАНИЦА НЕ НАЙДЕНА</b></br>
<div style="color:#d22a5e;font-size:200px;text-indent:0px;font-family:Sans;"><b>404</b></div></div></br>
<div style="color:#d22a5e;font-size:18px;line-height:60px;"><b>НЕТУ ТАКОЙ... ЧЕСТНО... Я ВЕЗДЕ ПОИСКАЛА</b></div></br>
</div>
<div style="text-align:justify;padding-right:10px;padding-left:10px;font-size:16px;">Простите меня...то, что Вы просили - я не могу найти. Правда-правда. Не потому, что не искала, а потому, что не нашла. Может быть то, что Вы просили найти - вообще не существует... Наверно...</div></br></br>
<div style="padding-right:10px;padding-left:10px;font-size:20.5px;line-height:15px;"><b>Возможность, это случилось по одной из этих причин:</b></div>
<ul style="color:#d22a5e;font-size:14px;">
<li>Вы злой человек и заставили меня искать то, чего нет...</br>
<span style="color:gray;">(неправильно набрали URL)</span></br></li>
<li>Ищете то, что было еще до меня</br></li>
<li>Вас обманули злые люди и дали неработающую ссылку...</li>
<?php if($Page=="404") echo '<li>Вы хотели увидеть меня</br></li>';?>
</ul></br></br>
<div style="padding-right:10px;padding-left:10px;font-size:20px;line-height:15px;"><b>Я действительно хочу Вам помочь... Попробуйте:</b></div>
<div>
<ul style="color:#6a5acd;">
<li>Вернутся назад при помощи кнопки браузера back</br><span style="color:gray;">(это такая стрелочка загнутая влево на самом верху)</span></li>
<li>Еще раз написать адрес страницы, может ошиблись...</li>
</ul></div>
</div>
<div id="flatti" >
<img id="img" src="https://xn--90aoodj.xn--p1acf/resource/flatti.png" style="width: inherit;"/>
</div>
</body>
</html>