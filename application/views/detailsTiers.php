<style>
    .navbar.second-navbar {
        margin-top: 60px;
        background: #0F243D !important;
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
<main class="container">
    <div class="bg-light" style="height:150px;">
    </div>
  <div class="bg-light p-5 rounded">
    <div style="background-color:white">
        <table class="table">
                <tr class="table-light">
                    <th colspan="5" class="display-4" >Tiers: <?php echo $tiers[0]['nomtiers'];  ?></th>
                </tr>
                <tr style="background-color:#0F243D;color: white">
                    <th>date</th>
                    <th>libelle</th>
                    <th>tiers</th>
                    <th>credit</th>
                    <th>debit</th>
                </tr >
                <?php foreach($LTiers as $row ){?>
                    <th><?php echo $row['date'];?></th>
                    <td><?php echo $row['libelle'];?></td>
                    <td><?php echo $row['tiers'];?></td>
                    <td><?php echo $row['credit'];?></td>
                    <td><?php echo $row['debit'];?></td>
                <?php } ?>
        </table>
    </div>
  </div>
</main>
</body>
</html>



