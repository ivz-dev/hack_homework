<?php

if( $curl = curl_init() ) {
    curl_setopt($curl, CURLOPT_URL, 'https://api.ovva.tv/v2/ru/tvguide/1plus1/'.date('Y-m-d'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    $result = curl_exec($curl);
    curl_close($curl);
}

$resObj = json_decode($result);
if($resObj)
{
    $programs = $resObj->data->programs;

    $programArray = [];
    foreach ($programs as $program)
    {
        $programArray[]=array("title"=>$program->title, "time"=>date("H:i", $program->realtime_begin));
    }

    echo json_encode($programArray);
}