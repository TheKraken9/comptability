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
    <div class="" style="height:220px;">
    </div>
    <div class="shadow-lg p-5 rounded w-75 container">
        <h3>Modifier Exercice</h3>
        <?php foreach ($exos as $exo): ?>
            <form action="<?php echo site_url("EcritureC/modifExercice"); ?>" method="get">
                <input type="text" value="<?= $exo['idexercice'] ?>" name="idexo" hidden="hidden">
                <div class="input-group mb-3">
                    <span class="input-group-text text-white" style="background-color:#0F243D">nomExercice</span>
                    <input type="text" class="form-control" name="nomE"  placeholder="nom Exercice" value="<?= $exo['nomexercice'] ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text text-white" style="background-color:#0F243D">mois</span>
                    <input type="number" class="form-control" name="debut"  placeholder="debut mois" value="<?= $exo['mois'] ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text text-white" style="background-color:#0F243D">annee</span>
                    <input type="year" class="form-control" name="annee"  placeholder="annee" value="<?= $exo['an'] ?>">
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-success text-white" style="width: 80px; transform: translate(670px,15px)" >Valider</button>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>
