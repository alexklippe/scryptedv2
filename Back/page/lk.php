<?php
	if(!isset($_COOKIE['token'])){
		header('Location: '. 'http://xn--80aaaas3ade3dbfv.xn--p1acf/reg');
	}
	$token = $_COOKIE['token'];
	$auth = mysqli_fetch_array(mysqli_query($CONNECT,"SELECT * FROM `auth` WHERE `token` = '$token'"));
	$userName = deconvent_email($auth['mail']);
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Личный кабинет пользователя</title>
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link rel="stylesheet" type="text/css" href="resources/sign-in.css">
  </head>
  <body style="background-image: url(https://grandecolife.ru/uploads/cache/lookbook_slide/uploads/media/5b7d020dda1c0/mo1203-rgb.jpg);">

    <!-- Start Top Bar -->
    <div class="top-bar" id="realEstateMenu" style="background-color: #3d454f;">
      <div class="top-bar-left" style="background-color: #3d454f;">
        <ul class="menu" data-responsive-menu="accordion" style="background-color: #3d454f;">
          <li class="menu-text" style="color: white;">COVIDINFO</li>
          <li><a href="#" style="color: white;">Главная</a></li>
        </ul>
      </div>
      <div class="top-bar-right" style="background-color: #3d454f;">
        <ul class="menu" style="background-color: #3d454f;">
          <li><a class="sign-in-form-button"><?php echo $userName;?></a></li>
        </ul>
      </div>
    </div>


    <div class="row column text-center">
      <h2>Личный кабинет</h2>
      <hr>
    </div>

    <div class="row">
      <div class="medium-4 columns">
        <h4>Ежедневная рассылка</h4>
        <div class="media-object">
          <div class="media-object-section" style="margin-bottom: 20px;">
            <p>Оформлена подписка на получения списка зарегистрированных случаи заражения COVID-19.</p>
          </div>
        </div>
		<div id="dis" style="margin-top: -1.82px;" class="sign-in-form-button">
			Отписаться
		</div>
      </div>
      <div class="medium-4 columns">
        <h4 style="margin-bottom: 4px;">Оповещения об изменении ситуации</h4>
        <div class="media-object" style="margin: 0px;">
          <div class="media-object-section">
            <p style="margin: 0px;">Оформлена подписка на получение уведомлений об эпидемиологической обстановке и ограничительных мерах.</p>
          </div>
        </div>
		<div id="dis" class="sign-in-form-button">
			Отписаться
		</div>
      </div>
      <div class="medium-4 columns">
		<h4 style="margin-bottom: 0px;">Удобное время получения рассылки</h4>
		<div class="media-object">
			<div class="media-object-section">
				<input style="font-size: 24px; display: inherit;" type="time" id="apptime" name="appt" min="09:00" max="22:00" value="16:00" required><span>*по МСК<span></input>
			</div>
			<div style="margin-top: -3px;" id="save" class="sign-in-form-button">
				Сохранить
			</div>
		</div>
      </div>
    </div>

   <div class="top-bar" id="realEstateMenu" style="position: fixed;bottom: 0px;width: 100%; background-color: #3d454f;">
    <div class="top-bar-left" style="background-color: #3d454f;">
      <ul class="menu" data-responsive-menu="accordion" style="background-color: #3d454f;">Dev by Scrypted © 2020г.</ul>
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
