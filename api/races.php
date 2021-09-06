<?php
/*
Page name: DBZ ENCYCLOPEDIA Race endpoint
Description: Uses GET function to retrieve character name from the url, calls the
get_race function, and returns an appropriate response. If successful,
returns alien race a character belongs to.
*/

require './data.php'; //get the get_race function definition

$pdo = connectDB(); //connect to database

if(!empty($_GET['name']))
{
  /*get name from url to call get_race function*/
   $name=$_GET['name'];
   $race=get_race($name);

   if(empty($race))
      response(200,"Race Not Found",NULL);
  else
      response(200,"Race Found",$race);
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
