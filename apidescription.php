<!--
Page name: DBZ ENCYCLOPEDIA API Description
Description: Provides a description of the API, as well as how to use each
endpoint together with example URLs.
-->
<?php
require './includes/library.php'; //defines connectDB functions
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="./css/styles.css">
  <title>DBZ API</title>
</head>
<body>
<main>
  <h1 class='title'>DBZ ENCYCLOPEDIA</h1> <!-- page header-->

<!-- general description-->
<p> The DBZ encyclopedia allows users to access information about their favorite
  characters. This API can do multiple things (3 to be exact). It can list all there is to know about a character.
   It can tell which alien race your favorite character belongs to. It can even tell you who's stronger than who! </p>

   <p>Look below for a legend and example URLs : </p>

<!-- Character ID legend-->
   <ul>
     <li>ID - Character</li>
     <li>1 - Goku</li>
     <li>2 - Frieza</li>
     <li>3 - Future Trunks</li>
     <li>4 - Cell</li>
     <li>5 - Majin Buu</li>
   </ul>

    <!-- example URLs and their instructions -->
    <ul>
      <li>For a general character profile, enter their character id: </li>
      <li><a href="https://loki.trentu.ca/~shanewidanagama/3420/assignments/assn2/assn2Q3/api/id.php?id=1">https://loki.trentu.ca/~shanewidanagama/3420/assignments/assn2/assn2Q3/api/id.php?id=1</a></li>
      <li>Enter a character's name to discover the alien race they belong too: </li>
      <li><a href="https://loki.trentu.ca/~shanewidanagama/3420/assignments/assn2/assn2Q3/api/races.php?name=Cell">https://loki.trentu.ca/~shanewidanagama/3420/assignments/assn2/assn2Q3/api/races.php?name=Cell</a></li>
      <li>Who's the strongest? Enter the id of a character and the API will tell you who's stronger than them, and what their power level is: </li>
      <li><a href="https://loki.trentu.ca/~shanewidanagama/3420/assignments/assn2/assn2Q3/api/strongerthan.php?id=4">https://loki.trentu.ca/~shanewidanagama/3420/assignments/assn2/assn2Q3/api/strongerthan.php?id=4</a></li>
    </ul>

</main>
</body>
</html>
