<!DOCTYPE HTML>
<html>
    <head>
        <title>Top 5 stocks for a date!</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body>

        <?php 
        include("shared.php");
        $db = new mysqli($servername, $username, $password, $dbname);
        if($db->connect_errno > 0){
            die('Unable to connect to database [' . $db->connect_error . ']');
        }              
        $query2 = "SELECT s.ticker, s.company, q.close, q.date
	       FROM sp500_stocks AS s, sp500_quotes AS q
	       WHERE q.date='2014-1-30' AND s.ticker=q.ticker
	       ORDER BY q.close DESC
	       LIMIT 5;";
        
        if(!$result3 = $db->query($query2)){
            die('There was an error running the query [' . $db->error . ']');
        }
        ?>
            <select id="select" name="ticker" onchange="myFunction(this.value)">
                <option value="null"></option>
                <?php
                    while($row = $result3->fetch_assoc()){
                        echo '<option value="' . $row['ticker'] . '">' . $row['ticker'] .'</option>';
                    }
                ?>
            </select>
        <script>
        function myFunction(selection){
            $.post('graphingAJAXcall.php', {ticker:selection},
                  function(data){
                $('#chart').html(data);
            });
        }    
        </script>
        <div id="chart"></div> 
    </body>
</html>