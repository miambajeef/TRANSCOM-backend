<?php
session_start();  
include('connexion.php');
?>


<h2 class="">  TABLEAU DE BORD ROULLAGE </h2>

<?php
echo 'Nom de l\'admin: '.$_SESSION['nom_ut'].'<br>';
$req=("SELECT * FROM utilisateur WHERE nom_ut='".$_SESSION['nom_ut']."'  ");
$res=mysqli_query($conn,$req) or die(mysqli_error());
?>

    <?php while ($aff=mysqli_fetch_assoc($res)){?>
                 
    nom de l'operateur est: <?php echo ($aff['nom_ut'])?></h4>
    <a href="deconnexion.php">deconnexion</a>




   

</body>
</html>

<?php }?>
