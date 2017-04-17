<!DOCTYPE HTML>
<html>
    <head>
        <title>Top 5 stocks for a date!</title>
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--  <link rel="stylesheet" href="/resources/demos/style.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $( function() {
               // $.datepicker.formatDate("ATOM");
                $( "#datepicker" ).datepicker();
                
            } );
  </script>
    </head>
    <body>
        <h2 style="text-align: center">The available dates you can search are 2010-12-31 to 2017-03-31!</h2>
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
        <div id="table"></div>

    </body>
</html>