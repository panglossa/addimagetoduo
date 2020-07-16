<?php
//Using the TDB class from the go!Johnny library;
//or you can access the database any way you want
require_once('../gojohnny/gojohnny.php');
$db = TDB('imagedata.sqlite', 'sqlite');
$res = '';
$sentence = $_REQUEST['sentence'];
$punctuation = [',', '.', '!', '?', ':', ';', '(', ')', '[', ']'];
foreach($punctuation as $p){
    $sentence = str_replace($p, '', $sentence);
    }
$sentencedata = $db->select('images', '*', "sentence LIKE '{$sentence}'");
if (count($sentencedata)>0) {
   foreach ($sentencedata as $row) {
	    $res = $row['imageurl'];
       }
	}else{
	$db->insert('images', ['sentence' => $sentence, 'imageurl' => '']);
	}
if (strpos($res, '.jpg')!==false){
    header("Content-type: image/jpeg");
    $image=imagecreatefromjpeg($res);
    imagejpeg($image);
    } else if (strpos($res, '.png')!==false){
    header("Content-type: image/png");
    $image=imagecreatefrompng($res);
    imagepng($image);
    } else if (strpos($res, '.gif')!==false){
    header("Content-type: image/gif");
    $image=imagecreatefromgif($res);
    imagegif($image);
    }
