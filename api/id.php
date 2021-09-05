<?php
/*
Page name: Question 3 - DBZ ENCYCLOPEDIA Profile endpoint
Description: Uses GET function to retrieve id from the url, calls the
info_from_id function, and returns an appropriate response. If successful,
returns the id, name, address, power level, and race of a character
*/

require './data.php'; //get the info_from_id function definition

if(!empty($_GET['id']))
{
    /*get id from url to call info_from_id function*/
   $id=$_GET['id'];
   $race=info_from_id($id);

   if(empty($race))
      response(200,"Id Not Found",NULL);
  else
      response(200,"Id Found",$race);
}
else
  response(400,"Invalid Request", NULL);

  /*formulates and encodes all responses into JSON*/
function response ($status,$status_message,$data)
{
  header("Content-Type:application/json");
  header("HTTP/1.1 ".$status);
  $response['status']=$status;
  $response['status_message']=$status_message;
  $response['data']=$data;
  $json_response=json_encode($response);
  echo $json_response;
}

 ?>
