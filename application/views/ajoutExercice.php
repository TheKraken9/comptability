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
    <a class="navbar-brand" href="#"><p class="display-6 text-white"style="font-style: italic" >Ajout exercice</p></a>
    <ul class="nav nav-pills">
    <li class="nav-item" >
        <a class="nav-link active" href="<?php echo site_url("Welcome/ecriture"); ?>" style="background-color:#2E8B57">liste Exercice</a>
    </li>
    </ul>
</nav>
<main class="container">
    <div class="bg-light" style="height:150px;">
    </div>
  <div class="bg-light p-5 rounded">
    <?php if($error[0] != ''){?>
      <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
        <?php echo $error[0];?>
        </div>
      </div>
    <?php } ?>          
    <form action="<?php echo site_url("EcritureC/addExercice"); ?>" method="get">
      <div class="input-group mb-3">
              <span class="input-group-text text-white" style="background-color:#6B8E23">nomExercice</span>
              <input type="text" class="form-control" name="nomE"  placeholder="nom Exercice">
      </div>
      <div class="input-group mb-3">
              <span class="input-group-text text-white" style="background-color:#6B8E23">mois</span>
              <input type="number" class="form-control" name="debut"  placeholder="debut mois">
      </div>
      <div class="input-group mb-3">
              <span class="input-group-text text-white" style="background-color:#6B8E23">annee</span>
              <input type="year" class="form-control" name="annee"  placeholder="annee">
      </div>
      <div class="row">
        <button type="submit" class="btn btn-success text-white" >Valider</button>
      </div>
    </form>
  </div>
</main>
  </body>
</html>
