<!DOCTYPE HTML>
<html>
    <head>
        <title>Stock Overflow</title>
          <link rel="stylesheet" href="../buttons.css">
        <link rel="stylesheet" href="../tableModel.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

        <script type="text/javascript" src="../d3/d3.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.js"></script>
        
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>-->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />-->
<!--        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"/>-->
<!--        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>-->
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

 


<script type="text/javascript">
$(function() {
    $('input[name="daterange"]').daterangepicker();
    $('input[name="daterange"]').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        },
        startDate: '2010-12-31',
        endDate: '2017-03-31',
        minDate: '2010-12-31',
        maxDate: '2017-03-31'
    }
//function(start, end, label) {
//    alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
);
});
</script>
    </head>
    <body>
        
        <div class="jumbotron">
          <div class="container text-center" id="logo">

              <a href="../homepage.html"><img src="../images/logo.png" height="250px"></a>

          </div>
        </div>
        <div class="container-fluid bg-3 text-center">    
<!--              <h3>The available dates you can search are 2010-12-31 to 2017-03-31!</h3><br>-->
              <div class="row" id="paragraphArea">
                    <form id="formData" action ="pricerangeAJAXcall.php" method="post">
                        <div id="datarange">Date: <input type="text" name="daterange" /></div>
                    <div data-role="main" class="ui-content">
                        <p>The min price is 0 and max price is 10000!</p>
                        <div style="display:inline">
                            <label for="price-min">Price-min:</label>
                            <input type="text" name="price-min" id="price-min" value="200" min="0" max="10000">
                            <label for="price-max">Price-max:</label>
                            <input type="text" name="price-max" id="price-max" value="800" min="0" max="10000">
                        </div>
                        </div>
                    <input type="submit" data-inline="true" value="Submit">
                  </form>
                  <script type="text/javascript">
                    var frm = $('#formData');
                    frm.submit(function (ev) {
                        $.ajax({
                            type: frm.attr('method'),
                            url: frm.attr('action'),
                            data: frm.serialize(),
                            success: function (data) {
                                $('#table').html(data); 
                            }
                        });

                        ev.preventDefault();
                    });
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
                        <button class="bttn-fill bttn-lg bttn-warning">topFivePerSector</button>
                    </form>
                </div>
              </div>
                
                <br>
                
                <div class="row">
                
                <div class="col-sm-6">
                    <form action="top5date.php">
                        <button class="bttn-fill bttn-lg bttn-success">top5date</button>
                    </form>
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