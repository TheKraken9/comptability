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
        margin-top: 150px;
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
        <a class="nav-link text-white" href="<?php echo site_url("EcritureC/codeJournale?idExercice="); ?><?php echo $exercice[0]['idexercice'];?>" style="background-color:#2E8B57">Journal</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="#"></a>
    </li>
    <li class="nav-item" >
        <a class="nav-link text-white" href="<?php echo site_url("BilanC/grandLivre?idExercice="); ?><?php echo $exercice[0]['idexercice'];?>" style="background-color:#2E8B57">Grand livre</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="#"></a>
    </li>
    <li class="nav-item" >
        <a class="nav-link text-white" href="<?php echo site_url("BilanC/balance?idExercice="); ?><?php echo $exercice[0]['idexercice'];?>" style="background-color:#2E8B57">Balance</a>
    </li>
   
    </ul>
</nav>
<nav id="navbar-example2" class="navbar tiers-navbar navbar-light  bg-light px-2 double-nav">
    <a class="navbar-brand" href="#"><p class="display-7 text-white" >Journal | <?php echo $journale[0]['nom']?></p></a>
</nav>

<main class="container w-50">
    <div class="" style="height:20px;">
    </div>
  <div class="shadow-lg p-4 rounded">
      <form class="container" method="post" action="<?php echo site_url("EcritureC/importerCSV");?>" enctype="multipart/form-data">
          <div class="container row mb-2 w-75">
              <input type="hidden" name="idExercice" value="<?php echo $_GET['idExercice'] ;?>">
              <input type="hidden" name="idCode" value="<?php echo $_GET['idCode'] ;?>">
              <input type="file" name="csv_file" accept=".csv" class="form-control" required>
              <input type="submit" value="Importer" class="btn btn-success float-end w-25" style="transform: translate(400px,-38px)">
          </div>
      </form>
  <table class="table">
    <tr style="background-color:#0F243D; color: white">
        <th>MOIS</th>
        <th></th>
    </tr>
    <?php date_default_timezone_set('America/New_York');
        for($i = 0 ; $i < count($listmois) ;$i++ ){?>
            <tr>
                <?php $date = date_create($listmois[$i]);?>
                <td><?php echo date_format($date,"M"); ?></td>
                <td><a href="<?php echo site_url("EcritureC/listeEcriture");  ?>?idExercice=<?php echo $idExe ;?>&&idCode=<?php echo $idCode[0] ;?>&&mois=<?php echo  date_format($date,"m"); ?>&&annee=<?php echo  date_format($date,"Y"); ?>"><i class="fas fa-edit"></i></a></td>
            </tr>
        <?php }?>
    </table>
  </div>
</main>
  </body>
</html>