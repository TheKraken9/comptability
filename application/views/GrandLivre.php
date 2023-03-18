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
    <li class="nav-item" >
        <a class="nav-link active " href="#" onclick="grandLivre()" style="background-color:green">voir Grand livre</a>
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
        <a class="nav-link text-white" href="<?php echo site_url("BilanC/balance?idExercice="); ?><?php echo $exercice[0]['idexercice'];?>" style="background-color:#2E8B57">balance</a>
    </li>
    </ul>
</nav>
<script>
    var xhttp = null;
    function grandLivre(){
        document.getElementById("title").innerHTML="<table class='table'><tr><th colspan='6' class='display-4'>GRAND LIVRE</th></tr></table>";
        <?php foreach ($listNum as $row){?>
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("<?php echo $row['numcompte'];?>").innerHTML =
                    this.responseText;
                }
            };
         xhttp.open("GET", "<?php echo site_url("BilanC/Livre");?>?idExercice=<?php echo $id[0];?>&&num=<?php echo $row['numcompte'];?>", true);
           xhttp.send();
        <?php }?>
    }
</script>
<main class="container">
    <div class="bg-light" style="height:150px;">
    </div>
  <div class="bg-light p-5 rounded">
  <div id="title">
    <div class="row">
        <button type="button" onclick="grandLivre()" class="col-md-12 btn btn-lg " style="background-color:#0F243D; color: white">CLIQUEZ ICI!</button>
    </div>
  </div>
 
  <?php foreach ($listNum as $row) {?>
        <div id="<?php echo $row['numcompte']; ?>" style="background-color:white"></div>
        <div class="bg-light" style="height:50px;">
    </div>
    <?php }?>
  </div>
</main>
</body>
</html>