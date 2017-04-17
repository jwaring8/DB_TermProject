<!DOCTYPE HTML>
<html>
    <head>
        <title>Stock Overflow</title>
        <link rel="stylesheet" href="../buttons.css">
        <link rel="stylesheet" href="../tableModel.css">


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.css" rel="stylesheet" />

        <script type="text/javascript" src="../d3/d3.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
              margin-right: 10%;
              margin-left: 10%;
            }
              #logo {
                  margin-top: 3px;
                  margin: auto;
              }
              #row{
                  text-align: center;
              }
              #tableData {
                  padding: 50px;
                  background-color: #f2f2f2;
                  border-radius: 25px;
                  margin: 15px;
              }


          </style>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>-->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $( function() {
               // $.datepicker.formatDate("ATOM");
                $( "#datepicker" ).datepicker();
                
            } );
  </script>
    </head>
    <body>
        
        
        
        <div class="jumbotron">
          <div class="container text-center" id="logo">

              <a href="../homepage.html"><img src="../images/logo.png" height="250px"></a>

          </div>
        </div>
        <div class="container-fluid bg-3 text-center">    
              <h3>The available dates you can search are 2010-12-31 to 2017-03-31!</h3><br>
              <div class="row" id="paragraphArea">
                    <div>Date: <input type="text" id="datepicker" onchange="showDate(this.value)"></div>
                    <script>
                       // var date = $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();
                        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
                        function showDate(value){
                            $.post('top5dateAJAXcall.php', {date:value},
                                  function(data){
                                $('#table').html(data);
                            }); 
                        }

                    </script>
                  <div id="tableData"><div id="table"></div></div>  
                      
                      
                      
                      
                      
                      
                      
                      
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
              </div>
            </div><br>
            
            
            
            
            
            
            <div class="container-fluid bg-3 text-center">    
              <div class="row">
                <div class="col-sm-6"> 
                  
                    <form action="graph.php">
                        <button class="bttn-fill bttn-lg bttn-primary">Choose a ticker and graph!</button>
                    </form>
                </div>
                <div class="col-sm-6"> 
                  
                    <form action="topFivePerSector.php">
                        <button class="bttn-fill bttn-lg bttn-danger">topFivePerSector</button>
                    </form>
                </div>
                

              </div>
                
                <br>
                
                <div class="row">
                
                <div class="col-sm-6">
                  
                    <form action="pricerange.php">
                        <button class="bttn-fill bttn-lg bttn-success">pricerange</button>
                    </form>
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