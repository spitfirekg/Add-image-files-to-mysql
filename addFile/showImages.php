<?php include_once 'includes/header.php'; ?>
<?php
include_once 'classLoader.php';
$actionV = new ActionView();
 ?>

 <div class="container">
   <div class="images">
     <?php echo $actionV->showImages(); ?>
   </div>

 </div>

 <a href="index.php" style="text-align:center;">Nazad na index</a>


<?php include_once 'includes/footer.php'; ?>
