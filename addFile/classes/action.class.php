<?php
include_once 'classes/connection.class.php';
class Action extends Connection{

//Metoda za prikazivanje slika iz paze podataka
protected function getImages(){
  try {
  $sql = "SELECT * FROM files";
  $stmt = $this->connect()->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch()){
    $img = $row['image'];
    echo "<img src='files/$row[image]' class='image'>";
  }

  } catch (PDOException $e) {
    echo "Greska : ".$e->getMessage();
  }

}






}
 ?>
