<!DOCTYPE html>
<html lang="en">
<head>
  <title>FindNearby</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Quantico" rel="stylesheet">   
  <link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDmFqQa3GmRdYRtITKJnv3qF3-tsL5H2A&v=3.exp&sensor=false&libraries=places"></script>
  <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('place_location');
                       var autocomplete = new google.maps.places.Autocomplete(input);
               }
               google.maps.event.addDomListener(window, 'load', initialize);
       </script>
  
  <script src="https://use.fontawesome.com/4ade0e5ef1.js"></script>
  <style type="text/css">

    .navbar
     {    
      background-color: #121212;
      padding-right: 50px;
      padding-left: 50px;
      padding-bottom: 30px;
      padding-top:30px;
      color:white;
      height: 100px;
      text-align: center;
      font-family: 'Carter One', cursive;
      font-size: 20px;

     }

     .active
     {
      background-color: green;
     } 

     #lg_devices_foot
    {
      background-color: #121212;
      position:relative;
      padding: 10px;           
      height:50px;
      color: white;
      position: relative;
      right: 0;
      bottom: 0;
      left: 0;
    }
       #sm_devices_foot
    {

      background-color: #121212;
      
      color:white;

    }


        .fixedContainer
     {    
    position: fixed;    
    margin-left: 10px;    
    }
     


  </style>
 </head>

 <body>
  
        <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#"></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">FindNearby</a></li>  
                 
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <!--<li class="active "><a href="signup.php"><span class="glyphicon glyphicon-user"></span> SignUp</a></li>
              <li class="active "><a href="#myModal" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" ></span> Login</a></li>
              -->
              <li class="active "><a href="#"><span class="glyphicon glyphicon-menu-hamburger"></span> About</a></li>  
                  

            </ul>
          </div>
        </div>
      </nav>

      <div class="container-fluid" style="margin-top:100px">

            <div class="container-fluid text-center" style="background-color:#A7C2E2;width:100%">
                      
                             <h1 style="text-align: center; color:#080C17;font-family: 'Russo One', sans-serif;"> About</h1>
                       
                     
            </div>

      </div>
      <div class="container-fluid">

            <div class="container-fluid " >
                      
                             <h3 style="color:#080C17;font-family: 'Architects Daughter', cursive;"> The user has to enter the address of the location and the category of place he wants to find like doctors, restaurants , bank , police station, etc..</h3>
                             <h3 style="color:#080C17;font-family: 'Architects Daughter', cursive;"> A search provides the top 30 results in any of the categories .</h3><br>
                             <h3 style="color:#080C17;font-family: 'Architects Daughter', cursive;"> The search results include places within a radius of 2 kilometers sorted in the order of their importance. Ranking will favor prominent places within the specified area. Prominence can be affected by a place's ranking in Google's index, global popularity, and other factors. </h3>


                       
                     
            </div>
        
      </div>


      




</body>
</html>

