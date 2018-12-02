<?php 

$DBHOST= 'localhost';
$DBUSER='testuser2';
$DBPASS='mypassword';

$page = $_SERVER['PHP_SELF'];

?>
<?php
if (!isset($artist)){
    $connection = mysqli_connect($DBHOST, $DBUSER, $DBPASS, 'art');
    // Check connection
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    if (!isset($_GET['artist_id'])){
        $_GET['id']=1;
    }
    $id = $_GET['id'];  
    $sql = 'SELECT * FROM artists where ArtistID='.$id;
    if($result = mysqli_query($connection, $sql)){
        $artist = mysqli_fetch_assoc($result);
    }
}
echo '<h3>Art by '.$artist['FirstName'].' '.$artist['LastName'].'</h3>';  
?>
<div class="row">
   <?php
    $sql = 'SELECT * FROM artworks where ArtistID='.$id;
    if($result= mysqli_query($connection, $sql)){
        while($artwork=mysqli_fetch_assoc($result)){
            echo
            '<div class="col-md-3">
              <div class="thumbnail">

                  <img src="images/art/works/square-medium/'.($artwork['ImageFileName']).'.jpg" title="'.($artwork['Title']).'" alt="" class="img-thumbnail img-responsive">

                 <div class="caption">
                    <a class="btn btn-primary btn-xs" href="display-art-work.php?art_id='.$artwork['ArtWorkID'].'"><span class="glyphicon glyphicon-info-sign"></span> View</a>
                    <button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-gift"></span> Wish</button>
                    <button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</button>
                 </div>
              </div>                   
           </div>';
        }
        
    }
    
        
    
    unset($value);
    
    ?>
</div> 
<!-- end artist's works row -->
