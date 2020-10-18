<!-- Dodavanje Header - poglavlja na stranicu-->
<?php include_once 'includes/header.php'; ?>

<?php
//Dodavanje class loadera kojim se automatski ucitavanju klase
include_once "classLoader.php";
$con = new Connection();
  //Ukoliko kliknemo na taster za dodavanje fajlova
if(isset($_POST['ok']))

{
 //Odredjivanje direktorijuma u koji ce fajl biti smesten
$folder ="files/";
 //Deklarisanje naziva fajla
$image = $_FILES['image']['name'];
//Datum dodavanja
$date = date("Y-m-d");
//Putanja ka direktorijumum i ime fajla
$path = $folder . $image ;

$target_file=$folder.basename($_FILES["image"]["name"]);


$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);

//Dozvoljene extenzije fajla
$allowed=array('jpeg','png' ,'jpg','gif'); $filename=$_FILES['image']['name'];

$ext=pathinfo($filename, PATHINFO_EXTENSION);

//Ukoliko ekstenzija nije dozvoljena
if(!in_array($ext,$allowed) )

{

 echo "Zao nam je, jedino JPG, JPEG, PNG & GIF  fajlovi su dozvoljeni.";

}

else{
//Smestiti fajl u folder koji je ranije odredjen
move_uploaded_file( $_FILES['image'] ['tmp_name'], $path);
//Dodavanje podataka u bazu
$sth=$con->connect()->prepare("insert into files(image,date)values(:image,:date) ");

$sth->bindParam(':image',$image);
$sth->bindParam(':date',$date);

$sth->execute();

}

}

?>

<form method="POST" enctype="multipart/form-data">

<input type="file" name="image" />

<input type="submit" name="ok"/>

</form>

<a href="showImages.php">Pregled Fajlova</a>

<?php include_once 'includes/footer.php'; ?>
