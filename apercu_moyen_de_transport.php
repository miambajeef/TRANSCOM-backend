<?php
session_start();	
include('connexion.php');

?>

<?php
include('menu.php');

?>
<form  method="GET" action="chercher_proprietaire.php">
         <input id="search-input" name="recherch_nom_pro" value="" placeholder="chercher Proprietaire"  type="text" >
         
         <button type="submit"  name="submit">Go</button>
         </span> 
    </form>


<h5 class="">IDENTITE MOYEN DE TRANSPORT</h5>
              
<?php
$id_mt=htmlspecialchars($_GET['id_mt'])  ;

$_SESSION['id_mt']=htmlentities ($_GET['id_mt']);
//echo $_SESSION['id_fonct'];

$req=("SELECT * FROM moyen_de_transport WHERE id_mt='".$_SESSION['id_mt']."' ");
$res=mysqli_query($conn,$req) or die(mysqli_error());

?>
              <?php while ($aff=mysqli_fetch_assoc($res)){?>
              
<div class="">
  <img height="250" width="250" src=" imgs/<?php echo ($aff['image_mt']) ?>"/>
</div>
<br><br><hr class="two">

               NUMERO DE PLAQUE: <?php echo ($aff['num_plaque_mt'])?><br> 

                MODELE: <?php echo ($aff['model_mt']) ?> <br>
                TYPE: <?php echo ($aff['type_mt'])?><br>
                MARQUE:  <?php echo ($aff['marque_mt'])?><br>
                ANNEE DE FABRICATION:  <?php echo ($aff['annee_fabrication_mt'])?><br>

               NUMERO DE CHASSIS:  <?php echo ($aff['num_chassis_mt'])?><br>

               NUMERO MOTEUR:  <?php echo ($aff['num_moteur_mt'])?><br>

               POSITION DE VOLANT (MAIN):  <?php echo ($aff['main_mt'])?><br>

               COULEUR:  <?php echo ($aff['couleur_mt'])?><br>
            

                <hr class="two">

            <?php }?>


<!-- --------------------------------------------------------------------------- -->



       <h2 class="mb-4">APERCU GENERAL NOM PROPRIETAIRE</h2>

      <hr class="two">
      <?php
      $req=("SELECT * FROM proprietaire WHERE id_mt_fk='".$_SESSION['id_mt']."' ");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>
       non proprietaire: <?php echo ($aff['nom_pro'])?>

      <hr class="two">
      <?php }?>
      



<?php
 //include('footer.php');
 ?>
</body>
</html>