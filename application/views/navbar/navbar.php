<?php
  $color[0]='';
  $color[1]='';
  $color[2]='';
  if($page[0] =='' ){
    $color[0]='text-white';
  }
  if($page[1] =='' ){
    $color[1]='text-white';
  }
  if($page[2] == '') {
      $color[2]='text-white';
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <link rel="icon" type="image/png" href="<?= site_url("template/images/entreprise.png");?> ">
    <title>GEST-COMPTA</title>
<link href=" <?php echo site_url("assets/dist/css/bootstrap.min.css");?>" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="<?php echo site_url("navbar-top-fixed.css");?>" rel="stylesheet">
  </head>
  <body>
<nav class="navbar navbar-expand-md fixed-top" style="background-color: #0F243D">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color:white"><small>GEST-COMPTA</small></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul  class="nav nav-tabs" id="myTab" role="tablist">
          <?php if(isset($_SESSION['name'])): ?>
              <li class="nav-item">
                  <a class="nav-link <?php echo $page[0];?> <?php echo $color[0];?> " aria-current="page" href="<?php echo site_url("Welcome/compte"); ?>" >Compte</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link <?php echo $page[1];?> <?php echo $color[1];?>" href="<?php echo site_url("Welcome/ecriture"); ?>">Exercice</a>
              </li>
          <?php else: ?>
              <li class="nav-item">
                  <a class="nav-link <?php echo $page[0];?> <?php echo $color[0];?> " aria-current="page" href="<?php echo site_url("Welcome/login"); ?>" >S'inscrire</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link <?php echo $page[1];?> <?php echo $color[1];?>" href="<?php echo site_url("Welcome/connect"); ?>">S'identifier</a>
              </li>
          <?php endif; ?>
      </ul>
        <?php if(isset($_SESSION['name'])): ?>
            <ul  class="flex-fill" id="myTab" role="tablist">
                <li class="float-end">
                    <a class="badge-outline-secondary nav-link <?php echo $page[2];?> <?php echo $color[2];?>" href="<?php echo site_url("Welcome/logout"); ?>">Se déconnecter</a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
  </div>
</nav>
    <script src="<?php echo site_url("assets/dist/js/bootstrap.bundle.min.js")?>"></script>
