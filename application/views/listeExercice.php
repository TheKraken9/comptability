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
<nav id="navbar-example2" class="navbar fixed-top second-navbar navbar-light  bg-light px-2">
    <a class="navbar-brand" href="#"><p class="display-6 text-white" style="font-style:italic">liste Exercice</p></a>
    <ul class="nav nav-pills">
    <li class="nav-item" >
        <a class="nav-link active" href="<?php echo site_url("EcritureC/ajoutExercice"); ?>" style="background-color:#2E8B57">Nouveau Exercice</a>
    </li>
    <li class="nav-item">
    <a class="nav-link " href="#"></a>
    </li>
    </ul>
</nav>
<main class="container">
<div class="bg-light" style="height:150px;">
    </div>
  <div class="bg-light p-5 rounded">
        <table class="table">
            <tr style="background-color:#0F243D;color: white" >
                <th>nom</th>
                <th>debut</th>
                <th>fin</th>
                <th></th>
                <th></th>
                <th></th>
                
            </tr>
            <?php foreach($listEx as $row){?>
                <tr>
                    <td><?php echo $row['nomexercice'];?></td>
                    <td><?php echo $row['debut'];?></td>
                    <td><?php echo $row['fin'];?></td>
                    <td><a href="<?php echo site_url("EcritureC/codeJournale?idExercice="); ?><?php echo $row['idexercice'];?>">code journale</a></td>
                    <td><a href="<?php echo site_url("BilanC/grandLivre?idExercice="); ?><?php echo $row['idexercice'];?>">grandLivre</a></td>
                    <td><a href="<?php echo site_url("BilanC/balance?idExercice="); ?><?php echo $row['idexercice'];?>">balance</a></td>
                   
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