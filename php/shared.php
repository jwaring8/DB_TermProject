
<!--
 shared file among all php files. This is where we will put shared functions
 and connection credentials for the database.
-->

This is a table showing all sp500 stocks on 2/15/2017!

<?php
$servername = 'localhost:3306'; // change to your correct localhost port number
$dbname = 'TermProj'; // change to your database name
$username = 'root'; // change to your username
$password = 'perfectmint299'; // change to your db password 


//random test of everything we want to use.

$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}           

$query = "select * from sp500_quotes where ticker='AMD' order by date asc;";

if(!$result = $db->query($query)){
    die('There was an error running the query [' . $db->error . ']');
}
$rows = array();
while($row = mysqli_fetch_assoc($result)){
  $rows[] =  $row;
} // fetching all db rows
mysqli_close($db);
echo '</br>';
//write to json file
$fp = fopen('stocks.json', 'w');
fwrite($fp, json_encode($rows, JSON_PRETTY_PRINT));
fclose($fp);
?>
        


    