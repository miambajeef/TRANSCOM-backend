<?php
session_start();
include('connexion.php');
$id;


echo $_SESSION['nom_ut'];

if(isset($_POST['submit']))
{


$type_alerte=$_POST['type_alerte'];
$autre_alerte=$_POST['autre_alerte'];
$date_alerte=$_POST['date_alerte'];
$lieu_alerte=$_POST['lieu_alerte'];
$description_alerte=$_POST['description_alerte'];
$casier_mt=$_POST['casier_mt'];

$id_ut_fk=$_POST['id_ut_fk'];
$nom_ut_fk=$_POST['nom_ut_fk'];
$id_mt_fk=$_POST['id_mt_fk'];
$num_plaque_mt_fk=$_POST['num_plaque_mt_fk'];

$req1="INSERT INTO alerte (type_alerte,autre_alerte,date_alerte,lieu_alerte,description_alerte,casier_mt,id_ut_fk,nom_ut_fk,id_mt_fk,num_plaque_mt_fk)

VALUES ('$type_alerte','$autre_alerte','$date_alerte','$lieu_alerte','$description_alerte','$casier_mt','$id_ut_fk','$nom_ut_fk','$id_mt_fk','$num_plaque_mt_fk')";

mysqli_query($conn,$req1)  or die(mysqli_error()) ;
//header('location: saisie_proprietaire.php ');
}


?>

<!DOCTYPE html>
<html>
<head>

	<title></title>

    <?php 
  include ('menu.php');
  ?><br>
</head>
<body>
 <a href="deconnexion.php">Deconnexion</a><br>

<form method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8">
	TYPE ALERTE: 
  <select name="type_alerte">
    <option value="vol">Volé(e)</option>
    <option value="accident">Accident</option>
    <option value="recherche">Recherché par la police</option>
    <option value="autres_degats">autres degats</option>
  </select><br>
	AUTRES: <input type="text" name="autre_alerte"><br>
	DATE D'ALERTE: <input type="date" name="date_alerte"><br>
  LIEU D'ALERTE: <input type="text" name="lieu_alerte"><br>
  DESCRIPTION: <input type="text" name="description_alerte"><br>
  DOSSIER: <input type="text" value="non reglé" name="casier_mt"><br>



<?php
$req2=("SELECT * FROM utilisateur WHERE nom_ut='".$_SESSION['nom_ut']."'  ");
$res2=mysqli_query($conn,$req2) or die(mysqli_error());
?>

 <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
        
<input class="text" type="hidden" name="id_ut_fk" value="<?php echo ($aff2['id_ut'])?>">
<input class="text" type="hidden" name="nom_ut_fk" value="<?php echo ($aff2['nom_ut'])?>">
                  
<?php }?>

<?php

//echo $_SESSION['id_mt'];
$req2=("SELECT * FROM moyen_de_transport WHERE id_mt='".$_SESSION['id_mt']."'  ");
$res2=mysqli_query($conn,$req2) or die(mysqli_error());
?>

 <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
        
<input class="text" type="hidden" name="id_mt_fk" value="<?php echo ($aff2['id_mt'])?>">
<input class="text" type="hidden" name="num_plaque_mt_fk" value="<?php echo ($aff2['num_plaque_mt'])?>"> 
                  
<?php }?>


	<input type="submit" name="submit" value="Enregistrer">
</form>

       <h2 class="mb-4">APERCU GENERAL DES ALERTES</h2>

      <hr class="two">
      <?php
      $req=("SELECT * FROM alerte WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_alerte DESC ");

       //$req=("SELECT * FROM alerte WHERE casier_mt=1 AND type_Alerte='vol' AND id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_alerte DESC ");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

    TYPE D'ALERTE: <?php echo ($aff['type_alerte'])?><br>
    DATE D'ALERTE: <?php echo ($aff['date_alerte'])?><br>
    LIEU D'ALERTE: <?php echo ($aff['lieu_alerte'])?><br>
    LIEU D'ALERTE: <?php echo ($aff['description_alerte'])?><br>
    <?php $reg=  ($aff['casier_mt'])?>


 <?php  
if ($reg!="non reglé") {
 echo "non reglé en rouge".'<br>';
}
else {
echo "reglé en vert";
}

?>
<hr>
      <?php }?>



</body>
</html>