<?php
session_start();  
include('connexion.php');
?>


<form  method="GET" action="search.php">
         <input type="date" id="search-input" name="motcle" value="" placeholder="chercher vehicule par numero plaque/chassis/moteur"  type="text" >
         <input type="text" name="taxe">
         <button type="submit"  name="submit">Go</button>
         </span> 
    </form>