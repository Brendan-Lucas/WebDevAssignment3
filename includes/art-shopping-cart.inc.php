<div class="panel panel-primary">
   <div class="panel-heading">
      <h3 class="panel-title">Cart </h3>
   </div>
   <div class="panel-body">            
      <?php
       $cart = $_SESSION['Cart'];
       //foreach($cart as $work){
       if (sizeof($cart)>0) {
       //foreach($cart as $work){
        echo 
        '<div class="media">
        <a class="pull-left" href="#">
          <img class="media-object" src="images/art/works/tiny/'.$cart[1]['FileName'].'.jpg" alt="..." width="32">
        </a>
        <div class="media-body">
          <p class="cartText"><a href="display-art-work.php?id=443">'.$cart[1]['title'].'</a></p>
        </div>';  
       }
       
       
       
       
       ?>
       
      </div> 
      <div class="media">
        <a class="pull-left" href="#">
          <img class="media-object" src="images/art/works/tiny/113010.jpg" alt="..." width="32">
        </a>
        <div class="media-body">
          <p class="cartText"><a href="display-art-work.php?id=437">Self-portrait in a Straw Hat</a></p>
        </div>
      </div> 
      <strong class="cartText">Subtotal: <span class="text-warning">$1200</span></strong>
      <div>
      <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-info-sign"></span> Edit</button>
      <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-arrow-right"></span> Checkout</button>
      </div>
   </div>
</div>    