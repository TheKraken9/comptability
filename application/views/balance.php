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
<main class="container-lg">
    <div class="" style="height:120px;margin-top: 50px">
    </div>
  <div class="shadow-lg p-2 rounded">
  <table class="table">
        <tr class="table">
            <th colspan="6" class="display-4" >Balance</th>
        </tr>
        <tr class="table">
            <th colspan="6">
            <form action="<?php echo site_url("BilanC/chercheBalance");?>" method="get"><input type="hidden" name="idExercice" value="<?php echo $exercice[0]['idexercice']; ?>">
                <div class="input-group mb-3"> 
                    <input type="date" name="date" class="form-control">
                    <button type="submit" class="btn btn-primary text-white"  style="background-color:#2E8B57">Rechercher</button>
                </div>
            </form>
            </th>
        </tr>
        <tr style="background-color:#0F243D;color: white">
            <th>COMPTE</th>
            <th>INTITULÉ</th>
            <th>MOUVEMENT DÉBIT</th>
            <th>MOUVEMENT CRÉDIT</th>
            <th>SOLDE DÉBITEUR</th>
            <th>SOLDE CRÉDITEUR</th>
        </tr>
        <?php foreach($Lbalance as $row){?>
            <tr>
                <th><?php echo $row['compte'] ?></th>
                <td><?php echo $row['intitule'] ?></td>
                <td><?php echo $row['mvtdebit'] ?></td>
                <td><?php echo $row['mvtcredit'] ?></td>
                <td><?php echo $row['solded'] ?></td>
                <td><?php echo $row['soldec'] ?></td>
            </tr>
        <?php } ?>
        <tr style="background-color:#1C1C32;color: white">
            <th colspan="4">TOTAL</th>
            <th><?php echo $somme[0]['sd'] ?></th>
            <th><?php echo $somme[0]['sc'] ?></th>
        </tr>
    </table>
  </div>
</main>
</body>
</html>