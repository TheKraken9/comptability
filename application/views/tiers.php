<style>
    .navbar.second-navbar {
        margin-top: 60px;
        height: 90px;
        background: #0F243D !important;
        transition: all .5s ease-in-out;
    }

    .navbar.second-navbar.top-nav-collapse {
        margin-top: 50px;
    }
</style>
<nav id="navbar-example2" class="navbar second-navbar navbar-light  bg-light px-2 double-nav">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link " href="#"></a>
        </li>
        <li class="nav-item" style="transform: translateX(1050px)">
            <a class="nav-link active" href="<?php echo site_url("CompteC/index2"); ?>" style="background-color:#2E8B57">Nouveau Compte Tiers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#"></a>
        </li>
        <!--<li class="nav-item">
            <a class="nav-link " href="<?php echo site_url("CompteC/exportePDF");?>" ><span class="badge bg-danger">PDF</span></a>
        </li>-->
    </ul>
</nav>
<main class="container mb-5">
    <div class="" style="height:20px;margin-top: 0px">
    </div>
    <div class="shadow-lg p-5 rounded">
        <div class="nav-item">
            <a class="nav-link active" href="http://localhost/comptability/Welcome/compte">Comptes généraux</a>
        </div>
        <div class="row">
            <a class="navbar-brand" href="#"><p class="display-6" style="font-style: italic; color: black; font-weight: bold">Consultation</p></a>
        </div>
        <form method="post" action="http://localhost/comptability/Welcome/searchTiers" class="w-75">
            <div class="input-group w-50 mb-4">
                <input type="search" name="search" id="search" class="form-control" placeholder="Type / Nom / Intitulé ...">
                <div class="input-group-append ms-3">
                    <input type="submit" value="Rechercher" class="btn btn-outline-secondary">
                </div>
            </div>
        </form>
        <table class="table">
            <tr style="background-color:#0F243D;color: white">
                <th>TYPE</th>
                <th>NOM DU COMPTE TIERS</th>
                <th>INTITULE DU COMPTE</th>
                <th>ACTIONS</th>
            </tr>
            <?php  foreach ($tiers as $row) {?>
                <tr>
                    <td><?php echo $row['type']?></td>
                    <td><?php echo $row['nomtiers']?></td>
                    <td><?php echo $row['type']?>_<?php echo $row['intitulecompte']?></td>
                    <td><a href="http://localhost/comptability/Welcome/modifierTiers?url=<?php echo $row['idtiers'] ?>" style="color: #6C1B0D"><i class="fas fa-edit"></i></a> | <a href="http://localhost/comptability/Welcome/supprimerTiers?url=<?php echo $row['idtiers']?>" style="color: red"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</main>
</body>
</html>