<?php
/**
 * Created by PhpStorm.
 * User: adasari
 * Date: 4/1/16
 * Time: 8:09 PM
 */
if(isset($_GET) && isset($_GET["stocksfield"]))
{
    $url = "http://dev.markitondemand.com/MODApis/Api/v2/Lookup/xml?input=" . $_GET["stocksfield"];
    $xml = simplexml_load_file($url);
   // print_r($xml);
    echo $xml;
}

?>