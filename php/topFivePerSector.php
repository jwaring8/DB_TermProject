<!DOCTYPE HTML>
<html>
    <head>
        <title>Stock Overflow</title>
        <script type="text/javascript" src="../d3/d3.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="../buttons.css">
        <link rel="stylesheet" href="../tableModel.css">


            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <style>

            /* Remove the navbar's default margin-bottom and rounded borders */ 
            .navbar {
              margin-bottom: 0;
              border-radius: 0;
            }

            /* Add a gray background color and some padding to the footer */
            footer {
              background-color: #f2f2f2;
              padding: 25px;
            }
            #buttonArea {


            }
            button {
              height: 200px;
              width: 400px;
            }

            #paragraphArea {
              text-align: left;
              margin-right: 20%;
              margin-left: 20%;
            }
              #logo {
                  margin-top: 3px;
                  margin: auto;
              }
              #row{
                  text-align: center;
              }
              #tableData {
                  padding: 10px;
                  background-color: #f2f2f2;
                  border-radius: 25px;
                  margin: 15px;
              }


          </style>
    </head>
    <body>
        
        
        
        <div class="jumbotron">
          <div class="container text-center" id="logo">

              <a href="../homepage.html"><img src="../images/logo.png" height="250px"></a>

          </div>
        </div>
        <div class="container-fluid bg-3 text-center">    
              <h3>Top 5 Performing Companies (Per Sector):</h3><br>
              <div class="row" id="paragraphArea">

                  <div id="tableData">
                  
                  
                    <?php
                    //establish a connection to the database
                    include 'shared.php';
                    try {$conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname, $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                         //query being passed to the database 
                         $sql = "SELECT * FROM sp500_quotes LIMIT 100;";


                        //prepping the query and passing it to the database 
                         $stmt = $conn->prepare($sql);
                         $stmt->execute();
                         $result = $stmt->setFetchMode(PDO::FETCH_NUM);
                         $numRows = $stmt->rowCount();
                         $numCols = $stmt->columnCount(); //get number of columns

                         $fields = array_keys($stmt->fetch(PDO::FETCH_ASSOC)); // fill array with column names



                                //printing the results to the datbase 
                         if($numRows > 0){ // run if there are rows to be fetched. Otherwise, show no results
                            echo '<table>';
                            for($z=0;$z<sizeof($fields);$z++){ // add headers for table
                                echo '<th>' . $fields[$z] . '</th>';
                            }
                            while($row = $stmt->fetch()){ // iterate through and put tuples into table
                                echo '<tr>'; // beginning of row.
                            // output data of each row
                                for($i=0;$i<$numCols;$i++){ // putting table data in each row.
                                    echo '<td>' . $row[$i] . '</td>';
                                } // for
                                echo '</tr>'; // end of row
                            } // while


                                echo '</table>'; //
                            }
                            else{
                                echo 'No results';
                            }
                        } 

                        // error handling 
                        catch (PDOException $e) {
                                die('Database connection failed: ' . $e->getMessage());
                            }

                    $conn = null;
                    ?>
                  
                  
                  </div>
                  
                  
                  
                  
                  
                  
                  
              </div>
            </div><br>
            
            
            
            
            
            
            <div class="container-fluid bg-3 text-center">    
              <div class="row">
                <div class="col-sm-6"> 
                  
                    <form action="top5date.php">
                    <button class="bttn-fill bttn-lg bttn-warning">top5date.php</button>
                    </form>
                </div>
                <div class="col-sm-6"> 
                  
                    <form action="graph.php">
                        <button class="bttn-fill bttn-lg bttn-primary">Choose a ticker and graph!</button>
                    </form>
                </div>
                

              </div>
                
                <br>
                
                <div class="row">
                
                <div class="col-sm-6">
                  
                    <button class="bttn-fill bttn-lg bttn-success">large</button>
                </div>
                <div class="col-sm-6"> 
                  
                    <button class="bttn-fill bttn-lg bttn-royal">large</button>
                </div>

              </div>
            </div><br><br>
            <footer class="container-fluid text-center">
              <p>StockOverFlow 2017</p>
            </footer>
        </div>
        
        
        
        
    </body>
</html>