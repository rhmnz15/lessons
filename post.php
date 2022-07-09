<?php 



$url = 'https://ppww2sdy.directus.app/items/modul_name';
$data = array(
    "modul_name" => "CSS",
    "parent_id" => null
);

$data_string = json_encode($data);
$ch=curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, array("moduls"=>$data_string));
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,
    array(
        'Content-Type:application/json',
        'Content-Length: ' . strlen($data_string)
    )
);

$result = curl_exec($ch);
curl_close($ch);



?>

