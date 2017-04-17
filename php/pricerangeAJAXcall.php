<?php
    if($_POST['daterange']!==null & $_POST['price-min']>=0 & $_POST['price-max']<=10000 & 
       is_numeric($_POST['price-min']) & is_numeric($_POST['price-max'])){
        $daterange = $_POST['daterange'];
        $date1 = substr($daterange, 0, 10);
        $date2 = substr($daterange, 12);
        $pricemin = $_POST['price-min'];
        $pricemax = $_POST['price-max'];
        include("shared.php");
        $db = new mysqli($servername, $username, $password, $dbname);
        if($db->connect_errno > 0){
            die('Unable to connect to database [' . $db->connect_error . ']');
        }              
        $query = "SELECT s.ticker, s.date, s.close
	       FROM sp500_quotes AS s
	       WHERE (s.close BETWEEN " . $pricemin . " AND ". $pricemax . ") AND
	      (s.date BETWEEN '". $date1 . "' AND '" . $date2 . "');";
        
        if(!$result = $db->query($query)){
            die('There was an error running the query [' . $db->error . ']');
        }
        $row_count = $result->num_rows;
                 $row_count = $result->num_rows;
        if($row_count < 1){
            echo '<h2>No data!</h2>';
        } else{
            echo '<table id="companies">';
            echo '<caption>Top 5 company closing prices between ' . $date1 .' and ' .$date2 . '!</caption>';
            echo '<th>ticker</th><th>date</th><th>close</th>';
            while($row = $result->fetch_assoc()){
                echo '<tr>';
                echo '<td>' . $row['ticker'] .
                    '</td><td>' . $row['date'] .
                    '</td><td>' . $row['close'] . '</tr>';       
            }
        }
    }
    else{
        
        echo 'Missing something';
    }


?>