<!DOCTYPE HTML>
<html>
    <head>
        <title>Stock Graph</title>
        <script type="text/javascript" src="../d3/d3.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.js"></script>
    </head>
    <body>
        <h2 style="text-align: center">
        Graph of AVG Closing Price of Company per Year
        </h2>
        <?php 
        include("shared.php");
        $db = new mysqli($servername, $username, $password, $dbname);
        if($db->connect_errno > 0){
            die('Unable to connect to database [' . $db->connect_error . ']');
        }           


        
        $query2 = "SELECT DISTINCT ticker from sp500_quotes
        order by ticker;";
        
        if(!$result3 = $db->query($query2)){
            die('There was an error running the query [' . $db->error . ']');
        }
        ?>
        
        <form name="selection" id="selection" method="POST">
            <select id="select" name="ticker">
                <option value="null"></option>
                <?php
                    while($row = $result3->fetch_assoc()){
                        echo '<option value="' . $row['ticker'] . '">' . $row['ticker'] .'</option>';
                    }
                ?>
            </select>
            <input type="submit" value="submit">
            </form>
        

        
        <?php
        if(isset($_POST['ticker']) && $_POST['ticker'] !== 'null'){
            $name = $_POST['ticker'];
            echo '<h2 style="text-align: center; text-decoration: underline">' .$name.'</h2>';
            ?>
            <?php
            $query = "SELECT ticker, AVG(close) AS 'average closing price', YEAR(date) AS 'year' 
                FROM sp500_quotes
                WHERE ticker='". $name . "'
                GROUP BY YEAR(date);";


            if(!$result = $db->query($query)){
                die('There was an error running the query [' . $db->error . ']');
            }

            if(!$result2 = $db->query($query)){
                die('There was an error running the query [' . $db->error . ']');
            }
        }
        else{
            
            echo 'No company selected!';
        }
        
        ?>
        <div id="chart"></div>
        <!--
                <button id='hide'>hide</button>
                <button id='show'>show</button>

        -->
        


        <script type='text/javascript'>
            
            var chart = c3.generate({
                data: {
                    x:'year',
                    columns: [
                        <?php 
                        echo "['year'";
                        while($row = $result->fetch_assoc()){
                            echo ", " ."'" .$row['year']. "'";
                        }
                        echo "],";
                        echo "['avg closing price for each year'";
                        while($row = $result2->fetch_assoc()){
                            echo ", " ."'" .$row['average closing price']. "'";
                        }
                        echo "]";
                        ?> 
                        
                        //['year', '2012', '2013', '2014', '2015', '2016', '2017'],
                        //['closing price', 300, 350, 300, 0, 0, 0],
//                        ['data2', 700, 100, 140, 200, 150, 50],
//                        ['data3', 300, 250, 140, 270, 74, 50]
                    ],
                }

            });
            


//            var hider = document.getElementById('hide');
//            hider.onclick = function() {
//                    chart.hide(['data2', 'data3']);
//            }
//
//            var shower = document.getElementById('show');
//            shower.onclick = function() {
//                    chart.show(['data2', 'data3']);
//            }
        </script>
             	
	
        
        
        
    </body>
</html>