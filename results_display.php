
<?php

include 'connect.php';
$looking_for=$_SESSION['key_val'];

?>


<!DOCTYPE html>
<html lang="en">
<head>

  <title>FindNearby</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Carter+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Marcellus" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/4ade0e5ef1.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDmFqQa3GmRdYRtITKJnv3qF3-tsL5H2A&v=3.exp&sensor=false&libraries=places"></script>
  <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('diff_address');
                       var autocomplete = new google.maps.places.Autocomplete(input);
               }
               google.maps.event.addDomListener(window, 'load', initialize);
       </script>

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
  <div class="container">
    <div class="navbar-header">

      <div class="row">
         <div class="col-sm-4">
      
            <a class="navbar-brand" href="index.php ">FindNearby</a>
          </div>
       
          <div class= "col-sm-8">
                
                      <form role="search" class="navbar-form " method="POST" action="results_display.php">
                          <div class="form-group" >
                              <input type="text" id="diff_address" name="location"  placeholder="change location.." class="form-control" style="width:100%;">
                          </div>

                          
                      </form>
            </div>
        </div>
    
    </div>
  </div>
</nav>





    <div class="container row" id="results" style="margin-top:120px;">

      <div class="col-sm-12 col-md-6 col-xs-12 col-lg-6 " >
      <?php

        /*if($_POST['location']==" " )
        {
        echo " Enter the address above...";

        }     
            */
        //echo $looking_for;
        

        if (isset($_POST['submit_mes'])||($_POST['location'])) 
              {

                if($_POST['location']==" " )
                    {
                      echo " Enter the address above...";

                    }//not working....why?


              //$location_length = strlen($_POST['location'])  ;

              //$addr=str_replace(" ","+",$_POST['location']);

              //done to replace empty spaces by '+' sign as google api requires it.
              $addr=urlencode($_POST['location']);
              
              $location_url="https://maps.googleapis.com/maps/api/geocode/json?address=".$addr;
              //echo '<br><br><br>'.$location_url;

              //https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-33.8670522,151.1957362&radius=500&type=restaurant&name=cruise&key=YOUR_API_KEY

              $loc_cont = file_get_contents($location_url);
              $loc_obj = json_decode($loc_cont,true);          

              $lat=$loc_obj["results"][0]["geometry"]["location"]["lat"];
              /*
              if(!isset($lat))
                  {
                    echo "We were not able identify this location. ";
                    
                  }
              */
              $lng=$loc_obj["results"][0]["geometry"]["location"]["lng"];
              /*if(!isset($lng))
                  {
                    echo "We were not able identify this location. ";
                    
                  }
              */

              $formal_location=$loc_obj["results"][0]["formatted_address"];

              echo "<br>
                     <div class='container-fluid' style='font-family:'Marcellus',serif;'>
                        <b><i>We are showing results for this location(".$_POST['location'].")</b></i>
                     </div>";
                      
              echo "<br><br>";
          
              /*-----to be put inside function--------
              $link ="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=".$lat.','.$lng.'&radius=500&type=doctor&key=AIzaSyDtRVL608rSdYKjmMIlgRNwRgkqDU0zhi0 ';    
              */  
              
              $link ="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=".$lat.','.$lng.'&radius=2000&type='.$looking_for. '&key=AIzaSyDtRVL608rSdYKjmMIlgRNwRgkqDU0zhi0 ';      

                  

              //$link= place_type_decide($lat,$lng);  //place_type_decide is a user-defined function ....defined below.
                      
              $cont = file_get_contents($link);
              $obj = json_decode($cont,true);              
              /*
              $doctor=$obj["results"][0]["name"];
              $doctor_address=$obj["results"][0]["vicinity"];
              echo $doctor;
              echo "<br>";
              echo $doctor_address;
              */
              /*$doctor=$obj["results"];

              foreach ($obj["results"] as $key )
               {
                        # code...
                  echo $key->name;
                  echo "<br>";
                  echo $key->vicinity;

               }
               */
               for($i=0;$i<30;$i++)
               {
                  if(!isset($obj["results"][$i]["name"]))
                  {
                    echo "<b>We were able to show only these many results.</b><br><br><br><br>";
                    break;
                  }
                  else
                  {
                   /* echo $obj["results"][$i]["name"];
                    echo "<br>";
                    echo $obj["results"][$i]["vicinity"];
                    echo "<br><br>";
                    */
                    
                          $place_ref=$obj["results"][$i]["place_id"];
                          //echo $place_ref;
                          $place_details_url="https://maps.googleapis.com/maps/api/place/details/json?placeid=".$place_ref.'&key=AIzaSyDtRVL608rSdYKjmMIlgRNwRgkqDU0zhi0';
                           $details_cont = file_get_contents($place_details_url);
                           $details_obj = json_decode($details_cont,true); 

                          echo '
                          <div class="container-fluid">
                              <div class="jumbotron3" style="background-color:#9CDEBA;font-size:20px;margin-left:20px;padding-left:20px;padding-top:25px;padding-bottom:25px;">
                                  <b>'.$obj["results"][$i]["name"].
                              '</div></b><br><br>';
                          echo '<ul type="square" >
                                 <li><b><i>Address:'.$obj["results"][$i]["vicinity"].'</i></b><br></li>';

                            if (isset($details_obj["result"]["formatted_phone_number"])) 
                                  {
                                       echo '<li><b><i>Contact:'.$details_obj["result"]["formatted_phone_number"].'</i></b><br></li>'  ;                                 
                                 }
                            if(isset($details_obj["result"]["website"]))    
                            {
                                       echo '<li><b><i>Website:<a target="_blank" href='.$details_obj["result"]["website"].'>Open in a new tab. </a></i></b><br></li>';
                            } 
                                 
                                 if(isset($details_obj["result"]["rating"]))
                            {
                                       echo '<li><b><i>Ratings:'.$details_obj["result"]["rating"].'</i></b><br></li>';

                            }
                            
                            if(isset($details_obj["result"]["url"]))
                            {
                                      echo '<li><b><i>Find on map:<a target="_blank" href='.$details_obj["result"]["url"].'>Open in a new tab.</a></i></b><br></li>';

                            }

                                 
                                 echo "</ul><br><hr></div>";
                          
                  }  


               }
               
             }

             
       
      ?>      
        
      </div>

      <div class="col-md-6  col-lg-6 hidden-xs hidden-sm "  id="map" style="position:relative">
                                        <?php 
                                        
                                            echo '
                                                    
                                                      <div class="fixedContainer">
                                                      <iframe 
                                                        width="650"
                                                        height="460"                                                        
                                                        frameborder="0" style="border:0"
                                                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAnPd6rDXQ8pUSBOkvy5TCI5PCDUFQXTdk
                                                          &q='.$_POST['location'].'" allowfullscreen>

                                                      </iframe></div>';

                                                        


                                            

                                         ?>
                                </div>      

  </div>
  <div class="col-xs-12 col-sm-12 hidden-md hidden-lg"  id="map" style="position:relative">

              <?php                                         
                                    echo '
                                                    
                                                      <div class="container-fluid">
                                                      <iframe 
                                                        width="380"
                                                        height="300"                                                        
                                                        frameborder="0" style="border:0"
                                                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAnPd6rDXQ8pUSBOkvy5TCI5PCDUFQXTdk
                                                          &q='.$_POST['location'].'" allowfullscreen>

                                                      </iframe></div>';                                        

                ?>
   </div>     
  







 


</body>
</html>