<?php

session_start();
$page = $_SERVER['PHP_SELF'];
$DBHOST= 'localhost';
$DBUSER='testuser2';
$DBPASS= 'mypassword';
//define ('')

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 3</title>

    <!-- Bootstrap core CSS  -->    
    <link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet"> 
    <!-- Custom styles for this template -->
    <link href="bootstrap3_defaultTheme/theme.css" rel="stylesheet">

  </head>

  <body>

<?php include 'includes/art-header.inc.php'; ?>
 <div class="container">
     <div class="row">
      <div class="col-md-10">
          <?php
            $connection = mysqli_connect($DBHOST, $DBUSER, $DBPASS, 'art');
            // Check connection
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            if (!isset($_GET['id'])){
                $_GET['id']=1;
            }
            $id = $_GET['id'];  
            $sql = 'SELECT * FROM artists where ArtistID='.$id;
            if($result = mysqli_query($connection, $sql)){
                $artist = mysqli_fetch_assoc($result);
                echo
                '<h2>'.$artist['FirstName'].' '.$artist['LastName'].'</h2>
                 <div class="row">
                    <div class="col-md-5">
                       <img src="images/art/artists/medium/'.$id.'.jpg" class="img-thumbnail img-responsive" alt="'.$artist['FirstName'].$artist['LastName'].'" title=""/>

                    </div>
                    <div class="col-md-7">
                       <p>
                        '.$artist['Details'].'
                       </p>
                       <div class="btn-group btn-group-lg">
                         <button type="button" class="btn btn-default">
                             <a href="#"><span class="glyphicon glyphicon-heart"></span> Add to Favorites List</a>  
                         </button>
                       </div>               
                       <p>&nbsp;</p>
                       <div class="panel panel-default">
                         <div class="panel-heading"><h4>Artist Details</h4></div>
                         <table class="table">
                           <tr>
                             <th>Date:</th>
                             <td>'.$artist['YearOfBirth'].'-'.$artist['YearOfDeath'].'</td>
                           </tr>
                           <tr>
                             <th>Nationality:</th>
                             <td>'.$artist['Nationality'].'</td>
                           </tr>  
                           <tr>
                             <th>More Info:</th>
                             <td>'.$artist['ArtistLink'].'</td>
                           </tr>    
                         </table>
                       </div>                              

                    </div>  <!-- end col-md-7 -->
                 </div>  <!-- end row (product info) -->

                 <p>&nbsp;</p>';
            }
        ?>
         <?php include 'includes/art-artist-works.inc.php'; ?>
         

      </div>  <!-- end col-md-10 (main content) -->        
      <div class="col-md-2"> 
          <?php include 'includes/art-shopping-cart.inc.php'; ?>
         <?php include 'includes/art-right-nav.inc.php'; ?>
      </div> <!-- end col-md-2 (right navigation) -->           
   </div>  <!-- end main row --> 
</div>  <!-- end container -->

<?php include 'includes/art-footer.inc.php'; ?>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap3_defaultTheme/assets/js/jquery.js"></script>
    <script src="bootstrap3_defaultTheme/dist/js/bootstrap.min.js"></script>    
  </body>
</html>
