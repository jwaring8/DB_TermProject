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


//random test 
	try {
	    $conn = new PDO("mysql:host=" . $GLOBALS['servername'] . ";dbname=" . $GLOBALS['dbname'], $GLOBALS['username'], $GLOBALS['password']);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $query = "select * from sp500_quotes where date='2017-02-15'";
;
	    $stmt = $conn->prepare($query);
	    $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        echo '<table>';
        echo '<th>ticker</th><th>date</th><th>close</th><th>volume</th>';
        while($row = $stmt->fetch()){
            echo '<tr>';
            echo '<td>' . $row['ticker'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['close'] . '</td>';
            echo '<td>' . $row['volume'] . '</td>';
            echo '</tr>';        
        } // fetching all db rows
        
	 
	} catch (PDOException $e) {
	    die('Database connection failed: ' . $e->getMessage());
	}
	$conn = null;

?>