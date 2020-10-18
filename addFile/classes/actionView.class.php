<?php
class ActionView extends Action{
   // Metoda koja prikazuje podatke iz modelske funkcije getImage
   public function showImages(){
     $result = $this->getImages();
     
   }
}
 ?>
