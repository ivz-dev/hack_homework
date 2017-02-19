<?php

require_once('config.php');
require_once('Vkontakte.php');

file_put_contents("img.png", base64_decode(explode(",", $_POST['img'])[1]));
$accessToken = token;

$vkAPI = new Vkontakte(['access_token' => $accessToken]);
$publicID = group_id;

$vkAPI->postToPublic($publicID, "", 'img.png');