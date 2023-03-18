<?php
    $idExe = $idExe[0];
?>
<style>
     .navbar.second-navbar {
        margin-top: 60px;
        background:  #0F243D !important;
        transition: all .5s ease-in-out;
    }
    .navbar.tiers-navbar {
        margin-top: 172px;
        background:  #0F243D !important;
        transition: all .5s ease-in-out;
    }

    .navbar.second-navbar.top-nav-collapse {
        margin-top: 45px;
    }
</style>
<nav id="navbar-example2" class="navbar fixed-top second-navbar navbar-light  bg-light px-2 double-nav">
    <a class="navbar-brand" href="#"><p class="display-6 text-white" style="font-style: italic"><?php echo $exercice[0]['nomexercice'];?></p></a>
    <ul class="nav nav-pills">
    <li class="nav-item" >
        <a class="nav-link text-white" href="#" ><?php echo $exercice[0]['debut'];?> à <?php echo $exercice[0]['fin'];?></a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="#"></a>
    </li>
    <li class="nav-item" >
        <a class="nav-link text-white" href="<?php echo site_url("EcritureC/codeJournale?idExercice="); ?><?php echo $exercice[0]['idexercice'];?>" style="background-color:#2E8B57">code journale</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="#"></a>
    </li>
    <li class="nav-item" >
        <a class="nav-link text-white" href="<?php echo site_url("BilanC/grandLivre?idExercice="); ?><?php echo $exercice[0]['idexercice'];?>" style="background-color:#2E8B57">Grande Livre</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="#"></a>
    </li>
    <li class="nav-item" >
        <a class="nav-link text-white" href="<?php echo site_url("BilanC/balance?idExercice="); ?><?php echo $exercice[0]['idexercice'];?>" style="background-color:#2E8B57">balance</a>
    </li>
    </ul>
</nav>
<nav id="navbar-example2" class="navbar fixed-top tiers-navbar navbar-light  bg-light px-2 double-nav">
    <a class="navbar-brand" href="#"><p class="display-7 text-white" >Journale <?php echo $journale[0]['nom']?></br><?php echo  $mois[0]; ?>-<?php echo  $annee[0]; ?></p></a>
    <ul class="nav nav-pills">
    <li class="nav-item" >
        <a class="nav-link active" href="<?php echo site_url("SaisieC/index");?>?idExercice=<?php echo $idExe ;?>&&idCode=<?php echo $idCode[0] ;?>&&mois=<?php echo  $mois[0]; ?>&&annee=<?php echo  $annee[0]; ?>" style="background-color:green">Saisie Ecriture</a>
    </li>
    </ul>
</nav>
<main class="container">
    <div class="bg-light" style="height:250px;">
    </div>
  <div class="bg-light p-5 rounded">
<div class="row">
<div>
    <table class="table">
            <tr style="background-color:#0F243D;color: white">
                <th>date</th>
                <th>libelle</th>
                <th>Ref-Piece</th>
            </tr>
            <tr>
                <th><?php echo $ecriture[0]['date'];?></th>
                <th><?php echo $ecriture[0]['libelle'];?></th>
                <th><?php echo $ecriture[0]['ref_piece'];?></th>
            </tr>
        </table>
    </div>
<div class="col col-lg-6" >
<table class="table">
        <tr style="background-color:#1C1C32;color: white">
            <th colspan="3">Mouvement credit</th>
        </tr>
        <tr class="table-success">
            <th>compte</th>
            <th>tiers</th>
            <th>credit</th>
        </tr>
        <?php foreach($credit as $row){?>
            <tr class="table-white">
                <th style="background-color:white"><?php echo $row['numero'] ?></th>
                <td style="background-color:white"><a href="<?php echo site_url("BilanC/detailsTiers");?>?idExercice=<?php echo $exercice[0]['idexercice'] ?>&&idTiers=<?php echo $row['idtiers']; ?>"><?php echo $row['tiers'] ?></a></td>
                <td style="background-color:white"><?php echo $row['credit'] ?></td>
            </tr>
        <?php }?>
    </table>
</div> 
<div class="col col-lg-6">
<table class="table">
        <tr style="background-color:#5356F5;color: white">
            <th colspan="3">Mouvement debit</th>
        </tr>
        <tr class="table-success">
            <th>compte</th>
            <th>tiers</th>
            <th>debit</th>
        </tr>
        <?php foreach($debit as $row){?>
            <tr class="table-white">
                <th style="background-color:white"><?php echo $row['numero'] ?></th>
                <td style="background-color:white"><a href="<?php echo site_url("BilanC/detailsTiers");?>?idExercice=<?php echo $exercice[0]['idexercice'] ?>&&idTiers=<?php echo $row['idtiers']; ?>"><?php echo $row['tiers'] ?></a></td>
                <td style="background-color:white"><?php echo $row['debit'] ?></td>
            </tr>
        <?php }?>
    </table>
</div>
</div>  
  </div>
</main>
</body>
</html>