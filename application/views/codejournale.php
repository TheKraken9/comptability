<?php
    $idExe = $idExe[0];
?>
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
    <a class="navbar-brand" href="#"><p class="display-6 text-white" style="font-style: italic"><?php echo $exercice[0]['nomexercice'];?></p></a>
    <ul class="nav nav-pills">
    <li class="nav-item" >
        <a class="nav-link text-white" href="#"><?php echo $exercice[0]['debut'];?> à <?php echo $exercice[0]['fin'];?></a>
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
        <a class="nav-link text-white" href="<?php echo site_url("BilanC/grandLivre?idExercice="); ?><?php echo $idExe;?>" style="background-color:#2E8B57">Grand livre</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="#"></a>
    </li>
    <li class="nav-item" >
        <a class="nav-link text-white" href="<?php echo site_url("BilanC/balance?idExercice="); ?><?php echo $idExe;?>" style="background-color:#2E8B57">Balance</a>
    </li>
   
    </ul>
</nav>
<main class="container text-center mb-5">
    <div class="" style="height:120px;margin-top: 50px">
    </div>
  <div class="shadow-lg p-5 w-75 container rounded">
      <table class="container">
          <nav>
              <ul class="nav nav-fill">
                  <tr style="background-color:#0F243D; color: white">
                      <th>CODE</th>
                      <th>INTITULÉ</th>
                      <th>ACTION</th>
                  </tr>
                  <?php foreach ($listJournale as $row) { ?>
                      <tr>
                          <td><?= $row['code'] ?></td>
                          <td><?= $row['nom'] ?></td>
                          <td class="nav-item">
                              <a class="nav-link" href="<?php echo site_url("EcritureC/sousJournale?idExercice=");?><?php echo $idExe;?>&&idCode=<?php echo $row['idcodejournale'];?>"><i class="fas fa-edit"></i></a>
                          </td>
                      </tr>
                  <?php } ?>
              </ul>
          </nav>
      </table>
  </div>
</main>
  </body>
</html>