        <?php 
    if(isset($_POST['date']) & $_POST !== null){
        include("shared.php");
        $date = $_POST['date'];
        $db = new mysqli($servername, $username, $password, $dbname);
        if($db->connect_errno > 0){
            die('Unable to connect to database [' . $db->connect_error . ']');
        }              
        $query = "SELECT s.ticker, s.company, q.close, q.date
	       FROM sp500_stocks AS s, sp500_quotes AS q
	       WHERE q.date='". $date . "' AND s.ticker=q.ticker
	       ORDER BY q.close DESC
	       LIMIT 5;";
        
        if(!$result = $db->query($query)){
            die('There was an error running the query [' . $db->error . ']');
        }
        $row_count = $result->num_rows;
        if($row_count < 1){
            echo '<h2>No data for this date!</h2>';
        } else{
            echo '<table id="companies">';
            echo '<caption>Top 5 company closing prices for ' . $date .'!</caption>';
            echo '<th>ticker</th><th>company</th><th>close</th>';
            while($row = $result->fetch_assoc()){
                echo '<tr>';
                echo '<td>' . $row['ticker'] .
                    '</td><td>' . $row['company'] .
                    '</td><td>' . $row['close'] . '</tr>';       
            }
        }
    }
        ?>