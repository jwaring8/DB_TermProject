       <?php
        if(isset($_REQUEST['ticker']) && $_REQUEST['ticker'] !== 'null'){
            $name = $_REQUEST['ticker'];
            echo '<h2 style="text-align: center; text-decoration: underline">' .$name.'</h2>';
            ?>
            <?php
            
            include("shared.php");
        $db = new mysqli($servername, $username, $password, $dbname);
        if($db->connect_errno > 0){
            die('Unable to connect to database [' . $db->connect_error . ']');
        }    
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
        }?>
<?php
        
echo <<<EOT
        <div id="chart"></div>
        <script type='text/javascript'>
            
            var chart = c3.generate({
                data: {
                    x:'year',
                    columns: [

EOT;
?>
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
<?php
echo <<<EOT
                ],
                }

            });
        </script>
EOT;
?>