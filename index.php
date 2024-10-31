<?php
/*
Plugin Name: Quote of the Day by Aistore
Plugin URI: #
Description: If your visitors love quote let this plugin publish a new quote on each day you just install and enable this plugin and place widget at appropriate place it this is all you need to do . In case you want to customize it CSS you can use any plugin add the css and can give a new looks.
Version: 2.0
Author: susheelhbti
Author URI: #
License: GPL2
*/

/* short code generating */

add_shortcode("PRINT_AistoreQuote","AistoreQuote");

 
 function AistoreQuote()
 {
$AistoreQuote = new AistoreQuoteCls();
return  $AistoreQuote->printQuote() ;
 }
 
 
  
 function getAistoreQuote()
 {
$AistoreQuote = new AistoreQuoteCls();
return  $AistoreQuote->printQuote() ;
 }
 
 
 
class AistoreQuoteCls
{


function printQuote()
{
 


$d1 = new DateTime("1986-04-11");
$d2 = new DateTime();
$interval = $d1->diff($d2);


$select=$interval->days % 100;

 
$data_json=aistore_getData();
 

$ar=json_decode($data_json);




 $result=$ar[$select] ->Text." --Bhagavad gita" ;

return print_r($result,true);


}

 
}







 function aistore_getData()
     {
          ob_start();
             
          include_once dirname(__FILE__) . "/data.json";
             
             
          return ob_get_clean();
         
     }
     
     
     