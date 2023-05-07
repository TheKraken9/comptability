<style>
    .navbar.second-navbar {
        margin-top: 60px;
        background: #0F243D !important;
        transition: all .5s ease-in-out;
    }

    .navbar.second-navbar.top-nav-collapse {
        margin-top: 0px;
    }
</style>
<nav id="navbar-example2" class="navbar second-navbar navbar-light  bg-light px-2 double-nav">

    <ul class="nav nav-pills">
        <li class="nav-item ms-3 mt-3" >
            <a class="nav-link active" href="<?php echo site_url("CompteC/index"); ?>" style="background-color:#2E8B57">Nouveau Compte</a>
        </li>
        <!--<li class="nav-item">
            <a class="nav-link " href="#"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="<?php echo site_url("CompteC/exportePDF");?>" ><span class="badge bg-danger">PDF</span></a>
        </li>-->
        <li class="nav-item">
            <a class="nav-link " href="#"></a>
        </li>
        <li class="nav-item" style="transform: translate(500px,-10px)">
            <form method="post" action="<?php echo site_url("CompteC/importeCSV");?>" enctype="multipart/form-data">
                <div class="container">
                    <label class="">Importer</label>
                    <input type="file" name="csv_file" accept=".csv" class="form-control" required>
                    <input type="submit" value="Importer" class="btn btn-success float-end" style="transform: translate(150px,-38px)">
                </div>
            </form>
        </li>
    </ul>
</nav>
<main class="container mb-5">
    <div class="" style="height:20px;margin-top: 0px">
    </div>
  <div class="shadow-lg p-5 rounded">
      <div class="nav-item">
          <a class="nav-link active" href="http://localhost/comptability/CompteC/tiers">Comptes tiers</a>
      </div>
      <div class="row">
          <a class="navbar-brand" href="#"><p class="display-6" style="font-style: italic; color: black; font-weight: bold">Consultation</p></a>
      </div>
      <form method="post" action="http://localhost/comptability/Welcome/search" class="w-75">
          <div class="input-group w-50 mb-4">
              <input type="search" name="search" id="search" class="form-control" placeholder="N° Compte / Libellé ...">
              <div class="input-group-append ms-3">
                  <input type="submit" value="Rechercher" class="btn btn-outline-secondary">
              </div>
          </div>
      </form>
      <table class="table">
        <tr style="background-color:#0F243D;color: white">
            <th>NUMÉRO DE COMPTE</th>
            <th>LIBELLÉ</th>
            <th>ACTIONS</th>
        </tr>
        <?php  foreach ($listCompte as $row) {?>
            <tr>
            <td><?php echo $row['numero']?></td>
            <td><?php echo $row['intitule']?></td>
            <td><a href="http://localhost/comptability/Welcome/modifier?url=<?php echo $row['numero'] ?>" style="color: #6C1B0D"><i class="fas fa-edit"></i></a> | <a href="http://localhost/comptability/Welcome/supprimer?url=<?php echo $row['numero']?>" style="color: red"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        <?php } ?>
    </table>
  </div>
</main>
  </body>
</html>