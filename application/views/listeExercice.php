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
<nav id="navbar-example2" class="navbar top second-navbar navbar-light  bg-light px-2">
    <a class="navbar-brand" href="#"><p class="display-6 text-white" style="font-style:italic">Liste Exercices</p></a>
    <ul class="nav nav-pills">
    <li class="nav-item" >
        <a class="nav-link active" href="<?php echo site_url("EcritureC/ajoutExercice"); ?>" style="background-color:#2E8B57">Nouveau Exercice</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="#"></a>
    </li>
    </ul>
</nav>
<main class="container mb-5">
<div class="" style="margin-top: 50px">
    </div>
  <div class="shadow-lg p-5 rounded">
        <table class="table">
            <tr style="background-color:#0F243D;color: white" >
                <th class="">NOM</th>
                <th class="">DÉBUT</th>
                <th class="">FIN</th>
                <th class="">CODE JOURNAL</th>
                <th class="">GRAND LIVRE</th>
                <th class="">BALANCE</th>
                <th class="">ETATS FINANCIERS</th>
                <th class="">ACTIONS</th>

            </tr>
            <?php foreach($listEx as $row){?>
                <tr>
                    <td><?php echo $row['nomexercice'];?></td>
                    <td><?php echo $row['debut'];?></td>
                    <td><?php echo $row['fin'];?></td>
                    <td><a href="<?php echo site_url("EcritureC/codeJournale?idExercice="); ?><?php echo $row['idexercice'];?>" class="text-secondary">Code Journal</a></td>
                    <td><a href="<?php echo site_url("BilanC/grandLivre?idExercice="); ?><?php echo $row['idexercice'];?>" class="text-secondary">Grand livre</a></td>
                    <td><a href="<?php echo site_url("BilanC/balance?idExercice="); ?><?php echo $row['idexercice'];?>" class="text-secondary">Balance</a></td>
                    <td><a href="<?php echo site_url("BilanC/etatFinancier?idExercice="); ?><?php echo $row['idexercice'];?>" class="text-secondary">Etats Financiers</a></td>
                    <td><a href="<?php echo site_url("BilanC/modifier?idExercice="); ?><?php echo $row['idexercice'];?>" class="" style="color: #6C1B0D"><i class="fas fa-edit"></i></a> | <a href="<?php echo site_url("BilanC/supprimer?idExercice="); ?><?php echo $row['idexercice'];?>" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>

                    <form method="POST" action="<?php echo site_url("ExportC/index");?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['idexercice'];?>"/>
                    <!--<input type="file" name="fichier"/>
                    <input type="submit" value="export CSV"/>-->
                    </form>
                </tr>
            <?php } ?>
        </table>
    
  </div>
</main>
  </body>
</html>