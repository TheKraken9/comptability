<?php ?>
<form method="post" action="http://localhost/comptability/Welcome/wantconnect" class="container mt-5 pt-1" data-parsley-validate="">
    <img src="<?php echo site_url("assets/brand/img.jpg") ?>" width="535px" height="535px" class="float-end">
    <div class="form form-group w-25 shadow-lg rounded-3" style="transform: translate(100px,90px);padding: 40px 80px 90px 60px!important;width: 380px!important;height: 350px!important;">
        <h2 class="mb-4">S'identifier</h2>
        <p><label for="nom"><small>Entreprise :</small> </label><input type="text" class="form-control" name="nom" id="nom" value="Kudeta" required=""></p>
        <p><label for="mdp"><small>Mot de passe :</small> </label><input type="password" name="mdp" class="form-control" id="mdp" value="kudeta" required="" data-parsley-trigger="change"></p>
        <p><input type="submit" value="S'identifier" class="btn btn-success float-end mt-2"></p>
    </div>
</form>