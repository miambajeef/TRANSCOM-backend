<?php
session_start();
require('connexion.php');
$verification="";
?>

<?php  
//$motcle="NULL";
$recherch_nom_pro=$_GET['recherch_nom_pro'];

if(empty($_GET['recherch_nom_pro'])){
$verification="Pas de resultat pour cette recherche";
echo "pas de resulat svp";
}
else{
  $req=("SELECT * FROM proprietaire WHERE nom_pro LIKE '%$recherch_nom_pro%' OR postnom_pro LIKE '%$recherch_nom_pro%' OR prenom_pro LIKE '%$recherch_nom_pro%'");
$res=mysqli_query($conn,$req) or  die(mysqli_error());

}

?>
          <table>

          <?php while ($aff=mysqli_fetch_assoc($res)){?>
                
                <p class="black"> NOM PROPRIETAIRE: <?php echo ($aff['nom_pro']) ?></p>
                <p class="black">POSTNOM PROPRIETAIRE: <?php echo ($aff['postnom_pro']) ?></p>
                 <p class="black">PRENOM PROPRIETAIRE: <?php echo ($aff['prenom_pro']) ?></p>
               
<input class="text" type="hidde" name="id_mt_fk" value="<?php echo ($aff['postnom_pro'])?>">
<input class="text" type="hidde" name="num_plaque_mt_fk" value="<?php echo ($aff['prenom_pro'])?>">

                <a href="affectation_pro.php?id_pro=<?php echo ($aff['id_pro'])?>"><button ><p><strong> Voir </strong></p></button></a>        


<?php }?>


   </table>

<?php
echo $_SESSION['id_mt'];

if(isset($_POST['submit']))
{

$id_mt=$_POST['id_mt'];
$id_pro=$_POST['id_pro'];

$req1="INSERT INTO affectation_pro (id_mt,id_pro)

VALUES ('$id_mt_fk','$id_pro')";

mysqli_query($conn,$req1)  or die(mysqli_error()) ;
//header('location: saisie_proprietaire.php ');
}






?>


  <!-- section de la pagination  -->

<?php
//include('pagination.php')
?>
</div>


</body>
<?php
//include('footer.php');
?>
</html>
<?php
mysqli_close($conn);
?>
