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
    <form method="post" action="http://localhost/comptability/Welcome/search" class="w-75">
        <div class="input-group w-25">
            <input type="search" name="search" id="search" class="form-control" placeholder="Rechercher...">
            <div class="input-group-append">
                <input type="submit" value="Search" class="btn btn-outline-secondary">
            </div>
        </div>
    </form>

    <ul class="nav nav-pills">
        <li class="nav-item" >
            <a class="nav-link active" href="<?php echo site_url("CompteC/index"); ?>" style="background-color:#2E8B57">Nouveau Compte</a>
        </li>
        <li class="nav-item">
        <a class="nav-link " href="#"></a>
        </li>
        <li class="nav-item">
            <!--<a class="nav-link " href="<?php //echo site_url("CompteC/exportePDF");?>" ><span class="badge bg-danger">PDF</span></a>-->
        </li>
    </ul>
</nav>
<main class="container">
    <div class="bg-light" style="height:150px;">
    </div>
  <div class="bg-light p-5 rounded">
      <a class="navbar-brand" href="#"><p class="display-6" style="font-style: italic; color: black; font-weight: bold">Consultation</p></a>
  <table class="table">
        <tr style="background-color:#0F243D;color: white">
            <th>NUMERO DE COMPTE</th>
            <th>LIBELLÉ</th>
            <th>ACTIONS</th>
        </tr>
        <?php  foreach ($listCompte as $row) {?>
            <tr>
            <td><?php echo $row['numero']?></td>
            <td><?php echo $row['intitule']?></td>
            <td><a href="http://localhost/comptability/Welcome/modifier/<?php echo $row['numero'] ?>" style="color: #6C1B0D">Modifier</a> | <a href="http://localhost/comptability/Welcome/supprimer/<?php echo $row['numero']?>" style="color: red">Supprimer</a></td>
            </tr>
        <?php } ?>
    </table>
  </div>
</main>
  </body>
</html>