<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<style>
    .navbar.second-navbar {
        margin-top: 60px;
        background:  #0F243D !important;
        transition: all .5s ease-in-out;
    }

    .navbar.second-navbar.top-nav-collapse {
        margin-top: 45px;
    }
</style>
<nav id="navbar-example2" class="navbar fixed-top second-navbar navbar-light  bg-light px-2 double-nav">
    <a class="navbar-brand" href="#"><p class="display-6 text-white"style="font-style: italic" >Ajout Exercice</p></a>
    <ul class="nav nav-pills">
    <li class="nav-item" >
        <a class="nav-link active me-3" href="<?php echo site_url("Welcome/ecriture"); ?>" style="background-color:#2E8B57">Liste Exercices</a>
    </li>
    </ul>
</nav>
<main class="container">
    <div class="bg-light" style="height:150px;">
    </div>
  <div class="shadow-lg p-5 rounded mt-5 w-75 container">
    <?php if($error[0] != ''){?>
      <div class="alert alert-success d-flex align-items-center" role="alert">
        <div>
        <?php echo $error[0];?>
        </div>
      </div>
    <?php } ?>          
    <form action="<?php echo site_url("EcritureC/addExercice"); ?>" method="get" class="mb-5">
      <div class="input-group mb-3">
              <span class="input-group-text text-white" style="background-color:#0F243D">Nom de l'Exercice</span>
              <input type="text" class="form-control" name="nomE"  placeholder="Nom de l'Exercice" required="">
      </div>
      <div class="input-group mb-3">
              <span class="input-group-text text-white" style="background-color:#0F243D">Mois</span>
              <input type="number" class="form-control" name="debut"  placeholder="Début du mois" required="">
      </div>
      <div class="input-group mb-3">
              <span class="input-group-text text-white" style="background-color:#0F243D">Année</span>
              <input type="year" class="form-control" name="annee"  placeholder="Année" required="">
      </div>
    <button type="submit" class="btn btn-success text-white float-end mt-3" >Valider</button>
    </form>
  </div>
</main>
  </body>
</html>
