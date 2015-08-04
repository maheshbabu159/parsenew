<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
            
require "autoload.php";

use Parse\ParseClient;
use Parse\ParseACL;
use Parse\ParseObject;

$app_id = 'ORY7BYT28z07dlH1rdlZoJyL2PUOiszHBItyMVSb';
$rest_key = 'ZvJyc70WKYorqXsJ4DYE649JwPKJ5YEL6TilZfn5';
//$master_key = 'iVO6PR4Bwg57takNWArXphExtQvhzxFMIbfdCCOY';

//ParseClient::initialize($app_id, $rest_key, $master_key);

/*$rolePermissions = new ParseACL();
$rolePermissions->setPublicReadAccess(true);

$newRole = ParseRole::createRole("admin", $rolePermissions);
$newRole->save();
      

/*$newRole = new Parse.Role("Admin", roleACL);
$newRole->getUsers()->add(usersToAddToRole);
$newRole->getRoles()->add(rolesToAddToRole);


$wallPost = new ParseObject("WallPost");
$wallPost->setACL($rolePermissions);
$wallPost->save();*/

$service_url = 'https://api.parse.com/1/functions/Login';

$headersArray = array();
array_push($headersArray, "X-Parse-Application-Id: " . $app_id);
array_push($headersArray, "X-Parse-REST-API-Key: " . $rest_key);
array_push($headersArray, "Content-Type: application/json");


$push_payload = json_encode(array("username" => "mauricse","password"=>"yes"));

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $service_url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headersArray);
curl_setopt($curl, CURLOPT_POSTFIELDS, $push_payload); 

$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
echo $curl_response;
$decoded = json_decode($curl_response);
echo $decoded;
