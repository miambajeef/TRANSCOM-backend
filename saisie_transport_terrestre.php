<?php
session_start();
include('connexion.php');
$id;


echo $_SESSION['nom_ut'];

if(isset($_POST['submit']))
{

$image_mt=$_FILES['image_mt'] ['name'];
$file_tmp_name=$_FILES['image_mt'] ['tmp_name'];

move_uploaded_file($file_tmp_name,"./imgs/$image_mt");

$num_plaque_mt=$_POST['num_plaque_mt'];
$marque_mt=$_POST['marque_mt'];
$model_mt=$_POST['model_mt'];
$type_mt=$_POST['type_mt'];
$annee_fabrication_mt=$_POST['annee_fabrication_mt'];
$num_chassis_mt=$_POST['num_chassis_mt'];
$num_moteur_mt=$_POST['num_moteur_mt'];
$main_mt=$_POST['main_mt'];
$couleur_mt=$_POST['couleur_mt'];

$id_ut_fk=$_POST['id_ut_fk'];
$nom_ut_fk=$_POST['nom_ut_fk'];

$req1="INSERT INTO moyen_de_transport (num_plaque_mt,marque_mt,model_mt,type_mt,annee_fabrication_mt,num_chassis_mt,num_moteur_mt,main_mt,couleur_mt,image_mt,id_ut_fk,nom_ut_fk)

VALUES ('$num_plaque_mt','$marque_mt','$model_mt','$type_mt','$annee_fabrication_mt','$num_chassis_mt','$num_moteur_mt','$main_mt','$couleur_mt','$image_mt','$id_ut_fk','$nom_ut_fk')";

mysqli_query($conn,$req1)  or die(mysqli_error()) ;
//header('location: saisie_proprietaire.php ');
}



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	  <?php 
  //include ('menu.php');
  ?><br>
</head>
<body>
 <a href="deconnexion.php">Deconnexion</a><br>


<form method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8">
	Numero plaque: <input type="text" name="num_plaque_mt"><br>
	Marque: <input type="text" name="marque_mt"><br>
	Model: <input type="text" name="model_mt"><br>
	<select name="type_mt" required="">
		<option value="vehicule">Vehicule</option>
		<option value="moto">Moto</option>
	</select>
	Année de fabrication: <input type="date" name="annee_fabrication_mt"><br>
	Num chassis: <input type="text" name="num_chassis_mt"><br>
	Num moteur: <input type="text" name="num_moteur_mt"><br>

	<select name="main_mt">
		<option selected="">---Selectionez---</option>
		<option value="GAUCHE">GAUCHE</option>
		<option value="DROITE">DROITE</option>
	</select>
	Couleur: <input type="text" name="couleur_mt"><br>
	image: <input type="file" name="image_mt"><br>


<?php
$req2=("SELECT * FROM utilisateur WHERE nom_ut='".$_SESSION['nom_ut']."'  ");
$res2=mysqli_query($conn,$req2) or die(mysqli_error());
?>

 <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
        
<input class="text" type="hidden" name="id_ut_fk" value="<?php echo ($aff2['id_ut'])?>">
<input class="text" type="hidden" name="nom_ut_fk" value="<?php echo ($aff2['nom_ut'])?>">
              
<?php }?>

	<input type="submit" name="submit" value="Enregistrer">
</form>

</body>
</html>