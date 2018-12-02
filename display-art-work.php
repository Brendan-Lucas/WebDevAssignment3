<?php
session_start();
$DBHOST= 'localhost';
$DBUSER='testuser2';
$DBPASS='mypassword';

$page = $_SERVER['PHP_SELF'];
if(!isset($_POST['cartAddition'])){
    array_push($_SESSION['Cart'], $_POST['cartAddition']);
}
if(!isset($_SESSION['Cart'])){
    $_SESSION['Cart'] = array();
}

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
          if(!isset($_GET['art_id'])){$_GET['art_id']=1;}
          $connection = mysqli_connect($DBHOST, $DBUSER, $DBPASS, 'art');
          $sql = 'SELECT artworks.*, artists.FirstName, artists.ArtistID, artists.LastName, genres.GenreName, genres.GenreID, galleries.GalleryID, galleries.GalleryName, galleries.GalleryWebSite, artworksubjects.ArtWorkSubjectID, subjects.SubjectId, subjects.SubjectName FROM artworks JOIN artists ON artworks.ArtistID=artists.ArtistID JOIN galleries ON artworks.GalleryID=galleries.GalleryID JOIN artworkgenres ON artworks.ArtWorkID=artworkgenres.ArtWorkID JOIN genres ON artworkgenres.GenreID=genres.GenreID JOIN artworksubjects on artworks.ArtWorkID=artworksubjects.ArtWorkID JOIN subjects on subjects.SubjectId=artworksubjects.SubjectID WHERE artworks.ArtWorkID='.$_GET['art_id'];
          if ($result = mysqli_query($connection, $sql)){
              $artwork = mysqli_fetch_assoc($result);
          }
          $_GET['id']=$artwork['ArtistID'];
          $price = $artwork['Cost'];
          echo '<h2>'.$artwork['Title'].'</h2>
      
         <p>'.$_SESSION['cart'].'</p>
         <p>By <a href="display-artist.php?id='.$artwork['ArtistID'].'">'.$artwork['FirstName'].' '.$artwork['LastName'].'</a></p>'
        ?>
         <div class="row">
            <div class="col-md-5">
               <?php
                echo '<img src="images/art/works/medium/'.$artwork['ImageFileName'].'.jpg" class="img-thumbnail img-responsive" alt="'.$artwork['Title'].'"/>';
                ?>
            </div>
            <div class="col-md-7">
               <?php
                echo
                '<p>
                '.$artwork['Description'].'
               </p>
               <p class="price">'.$price.'</p>'
                ?>
               <div class="btn-group btn-group-lg">
                 <button type="button" class="btn btn-default">
                     <a href="#"><span class="glyphicon glyphicon-gift"></span> Add to Wish List</a>  
                 </button>
                <?php
                  echo
                 '<button type="submit" class="btn btn-default", name="cartAddition", action="display-art-work.php", method="post" value="[["cost"]= '.$artwork['Cost'].', ["ID"]='.$artwork['ArtWorkID'].',["title"]='.$artwork['Title'].', ["FileName"]='.$artwork['ImageFileName'].']">
                  <a href="display-art-work.php"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Shopping Cart</a>
                 </button>'
                ?>
               </div>               
               <p>&nbsp;</p>
               <div class="panel panel-default">
                 <div class="panel-heading"><h4>Product Details</h4></div>
                 <table class="table">
                <?php
                    echo
                   '<tr>
                     <th>Date:</th>
                     <td>'.$artwork['YearOfWork'].'</td>
                   </tr>
                   <tr>
                     <th>Medium:</th>
                     <td>'.$artwork['Medium'].'</td>
                   </tr>  
                   <tr>
                     <th>Dimensions:</th>
                     <td>'.$artwork['Width'].' cm X '.$artwork['Height'].' cm</td>
                   </tr> 
                   <tr>
                     <th>Home:</th>
                     <td><a href="'.$artwork['GalleryWebSite'].'">'.$artwork['GalleryName'].'</a></td>
                   </tr>  
                   <tr>
                     <th>Genres:</th>
                     <td>'.$artwork['GenreName'].'</td>
                   </tr> 
                   <tr>
                     <th>Subjects:</th>
                     <td>'.$artwork['SubjectName'].'</td>
                   </tr>'
                ?>
                 </table>
               </div>                              
               
            </div>  <!-- end col-md-7 -->
         </div>  <!-- end row (product info) -->

 
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
    <script src="bootstrap-3.0.0/assets/js/jquery.js"></script>
    <script src="bootstrap-3.0.0/dist/js/bootstrap.min.js"></script>    
  </body>
</html>
