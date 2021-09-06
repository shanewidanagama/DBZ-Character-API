<?php
/*
Page name: DBZ ENCYCLOPEDIA strongerthan endpoint
Description: Uses GET function to retrieve id from the url, calls the
stronger_than function, and returns an appropriate response. If successful,
it returns a stronger character, and their power level.
*/

require './data.php'; //get the stronger_than function definition

if(!empty($_GET['id']))
{
  /*get id from url to call stronger_than function*/
   $id=$_GET['id'];
   $race=stronger_than($id);

   if(empty($race))
      response(200,"Id Not Found",NULL);
  else
      response(200,"Id Found",$race);
}
else
  response(400,"Invalid Request", NULL);

/*formulates and encodes responses into JSON*/
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
