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
        <a class="nav-link text-white" href="<?php echo site_url("EcritureC/codeJournale?idExercice="); ?><?php echo $exercice[0]['idexercice'];?>" style="background-color:#2E8B57">code journale</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="#"></a>
    </li>
    <li class="nav-item" >
        <a class="nav-link text-white" href="<?php echo site_url("BilanC/grandLivre?idExercice="); ?><?php echo $idExe;?>" style="background-color:#2E8B57">Grande Livre</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="#"></a>
    </li>
    <li class="nav-item" >
        <a class="nav-link text-white" href="<?php echo site_url("BilanC/balance?idExercice="); ?><?php echo $idExe;?>" style="background-color:#2E8B57">balance</a>
    </li>
   
    </ul>
</nav>
<main class="container">
    <div class="bg-light" style="height:150px;">
    </div>
  <div class="bg-light p-5 rounded">
  <table class="table">
    <tr style="background-color:#0F243D; color: white">
        <th>CODE JOURNALE</th>
    </tr>
        <?php foreach ($listJournale as $row) {?>
            <tr>
                <td><a href="<?php echo site_url("EcritureC/sousJournale?idExercice=");?><?php echo $idExe;?>&&idCode=<?php echo $row['idcodejournale'];?>"><?php echo $row['nom']; ?></a></td>
            </tr>
        <?php }?>
    </table>
  </div>
</main>
  </body>
</html>