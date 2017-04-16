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
        
<!--        <form name="selection" id="selection" method="POST">-->
            <select id="select" name="ticker" onchange="myFunction(this.value)">
                <option value="null"></option>
                <?php
                    while($row = $result3->fetch_assoc()){
                        echo '<option value="' . $row['ticker'] . '">' . $row['ticker'] .'</option>';
                    }
                ?>
            </select>
<!--
            <input type="submit" value="submit">
            </form>
-->
        <script>
        function myFunction(selection){
            $.post('graphingAJAXcall.php', {ticker:selection},
                  function(data){
                $('#result').html(data);
            });
        }

        
        </script>
        <div id="result"></div>
        
        
        
 
             	
	
        
        
        
    </body>
</html>