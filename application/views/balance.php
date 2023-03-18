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
  <table class="table">
        <tr class="table">
            <th colspan="6" class="display-4" >balance</th>
        </tr>
        <tr class="table">
            <th colspan="6">
            <form action="<?php echo site_url("BilanC/chercheBalance");?>" method="get"><input type="hidden" name="idExercice" value="<?php echo $exercice[0]['idexercice']; ?>">
                <div class="input-group mb-3"> 
                    <input type="date" name="date" class="form-control">
                    <button type="submit" class="btn btn-primary text-white"  style="background-color:#2E8B57">rechercher</button>
                </div>
            </form>
            </th>
        </tr>
        <tr style="background-color:#0F243D;color: white">
            <th>compte</th>
            <th>intitule</th>
            <th>mouvement Debit</th>
            <th>mouvement Credit</th>
            <th>Solde Debit</th>
            <th>Solde Creditaire</th>
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
            <th colspan="4">total</th>
            <th><?php echo $somme[0]['sd'] ?></th>
            <th><?php echo $somme[0]['sc'] ?></th>
        </tr>
    </table>
  </div>
</main>
</body>
</html>