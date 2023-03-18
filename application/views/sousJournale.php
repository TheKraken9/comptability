<?php
    $idExe = $idExe[0];
?>
<style>
    .navbar.second-navbar {
        margin-top: 60px;
        background: #0F243D !important;
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
        <a class="nav-link text-white" href="<?php echo site_url("EcritureC/codeJournale?idExercice="); ?><?php echo $exercice[0]['idexercice'];?>" style="background-color:#2E8B57">code journal</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="#"></a>
    </li>
    <li class="nav-item" >
        <a class="nav-link text-white" href="<?php echo site_url("BilanC/grandLivre?idExercice="); ?><?php echo $exercice[0]['idexercice'];?>" style="background-color:#2E8B57">Grand Livre</a>
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
    <a class="navbar-brand" href="#"><p class="display-7 text-white" >Journal <?php echo $journale[0]['nom']?></p></a>
</nav>
<main class="container">
    <div class="bg-light" style="height:250px;">
    </div>
  <div class="bg-light p-5 rounded">
  <table class="table">
    <tr style="background-color:#0F243D; color: white">
        <th>mois</th>
        <th></th>
    </tr>
    <?php date_default_timezone_set('America/New_York');
        for($i = 0 ; $i < count($listmois) ;$i++ ){?>
            <tr>
                <?php $date = date_create($listmois[$i]);?>
                <td><?php echo date_format($date,"M"); ?></td>
                <td><a href="<?php echo site_url("EcritureC/listeEcriture");  ?>?idExercice=<?php echo $idExe ;?>&&idCode=<?php echo $idCode[0] ;?>&&mois=<?php echo  date_format($date,"m"); ?>&&annee=<?php echo  date_format($date,"Y"); ?>">ecriture</a></td>
            </tr>
        <?php }?>
    </table>
  </div>
</main>
  </body>
</html>