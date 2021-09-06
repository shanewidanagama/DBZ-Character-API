<?php
/*
Page name: DBZ ENCYCLOPEDIA FUNCTIONS
Description: Defines the functions used by each endpoint. get_race gets a
character's race. info_from_id gets general info using a character's id.
stronger_than accepts a character id, and return's a character stronger than
the one given.
*/

require '../includes/library.php'; //defines connectDB functions


/*accepts name, and returns their alien race*/
function get_race($name)
{

$pdo = connectDB(); //connect to database

/*gets character names and race info array*/
$racequery = "SELECT name, race FROM dbz_characters";
$raceresult= $pdo->prepare($racequery);
$raceresult ->execute();
$races = $raceresult ->fetchAll(PDO::FETCH_KEY_PAIR);

/*returns race of given character, otherwise returns NULL*/
  if(isset($races[$name])) {
  return $races[$name];
}
  else {return NULL;}

}



/*accepts character ID and returns general info about that character*/
function info_from_id($id)
{

$pdo = connectDB(); //connect to database

$infoquery = "SELECT * FROM dbz_characters";
$inforesult = $pdo->prepare($infoquery);
$inforesult ->execute();
$info = $inforesult ->fetchAll();

/*gets number of characters in database*/
$countquery = "SELECT COUNT(*) FROM dbz_characters";
$cntresult = $pdo->prepare($countquery);
$cntresult ->execute();
$count = $cntresult ->fetch();

//$profile = array();

/*traverses database to find matching ID, and prints character's id, address
race, power level, and name. otherwise returns NULL*/
for($i = 0; $i < $count['COUNT(*)']; $i++)
{
  if($info[$i]['id']==$id) {

    $profile = array(
      $profile['id'] = $info[$i]['id'],
      $profile['address'] = $info[$i]['address'],
      $profile['race'] = $info[$i]['race'],
      $profile['power level'] = $info[$i]['power level'],
      $profile['name'] = $info[$i]['name']

    );
      return $profile;
}
}
}

/*accepts a character id, and returns name and power level of a character
stronger than them
Note: Returns an error if the strongest character is compared with themselves */
function stronger_than($id)
{

$pdo = connectDB(); //connect to database

/*get all character info in multidimensional array*/
$infoquery = "SELECT * FROM dbz_characters";
$inforesult = $pdo->prepare($infoquery);
$inforesult ->execute();
$info = $inforesult ->fetchAll();

/*get character id and respective power level in array */
$plquery = "SELECT id, `power level` FROM dbz_characters";
$plresults = $pdo->prepare($plquery);
$plresults ->execute();
$pwrlevel = $plresults ->fetchAll(PDO::FETCH_KEY_PAIR);

/*gets number of characters in database*/
$countquery = "SELECT COUNT(*) FROM dbz_characters";
$cntresult = $pdo->prepare($countquery);
$cntresult ->execute();
$count = $cntresult ->fetch();

/*finds a stronger character, compared to chosen character*/
for($i = 0; $i < $count['COUNT(*)']; $i++)
{
  /*returns the name and power level of a character stronger than the inputted
  one */
  if($info[$i]['power level']>$pwrlevel[$id]) {

    $stronger = array(
      $stronger['name'] = $info[$i]['name'],
      $stronger['power level'] = $info[$i]['power level']
    );
}
}
  return $stronger;
}

?>
