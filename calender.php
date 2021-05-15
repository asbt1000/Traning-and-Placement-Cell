 <!DOCTYPE html>
<html>
 <head>
  <title>Jquery Fullcalandar Integration with PHP and Mysql</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="jquery/jquery-3.4.1.js"></script>
  <link rel="stylesheet" type="text/css" href="css/sidebar.css">
  <script>
   
  $(document).ready(function() {
	  
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    events: {
            url: 'load.php',
            type: 'POST', // Send post data
            error: function() {
                alert('There was an error while fetching events.');
            }
	},
	
	eventBackgroundColor:'#ffccb3',
	eventTextColor:'#009999',
	eventBorderColor:'#aaff80'	
  })
  $("button").click(function(){
    if ( $('#ma').css('visibility') == 'hidden' )
    $('#ma').css('visibility','visible');
  else
    $('#ma').css('visibility','hidden');
  });
  });
 </script>
 <style>
 
 </style>
 </head>
 <body >
 <br>
 <button class="btn button">toggle</button>
 <br>
 <br>
 <div id="ma" style="visibility:hidden;background-color:black">
  <div class="container" style="color:blue;height:480px;width:600px;display:inline-block;position:absolute;">
   <div id="calendar" ></div>
  </div>
 </div>
 
 </body>
</html>