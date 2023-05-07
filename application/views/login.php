<?php
?>

<form method="post" action="http://localhost/comptability/Welcome/wantregister" class="container mt-5 pt-1">
    <div class="form form-group mt-5 w-75 container">
        <h3 class="mb-3">Nouvelle Entreprise</h3>
        <div class="row mb-2">
            <div class="col">
                <label for="nom"><small>Nom de l'entreprise : </small></label><input type="text" class="form-control" name="nom" id="nom" value="ITUNIVERSITY">
            </div>
            <div class="col">
                <label for="mdp"><small>Mot de passe : </small></label><input class="form-control" type="password" name="mdp" id="mdp" value="itunivesity">
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <label for="dirigeant"><small>Dirigeant : </small></label><input type="text" name="dirigeant" class="form-control" id="dirigeant" value="monsieur">
            </div>
            <div class="col">
                <label for="siege"><small>Siège : </small></label><input type="text" name="siege" id="siege" class="form-control" value="Andoharanofotsy">
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <label for="datecreation"><small>Date de création : </small></label><input type="date" name="datecreation" class="form-control" id="datecreation" value="">
            </div>
            <div class="col">
                <label for="datedebutexo"><small>Date de début d'exercice : </small></label><input type="date" name="datedebutexo" id="datedebutexo" class="form-control" value="" >
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <label for="numstat"><small>Numéro Statistique : </small></label><input type="text" name="numstat" id="numstat" class="form-control" value="12">
            </div>
            <div class="col">
                <label for="numregcom"><small>Numéro de registre de commerce :</small> </label><input type="text" name="numregcom" id="numregcom" class="form-control" value="45" >
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <label for="status"><small>Status :</small> </label><input type="text" name="status" id="status" class="form-control" value="78" >
            </div>
            <div class="col">
                <label for="numidfiscale"><small>Numéro d'identification fiscale :</small> </label><input type="text" name="numidfiscale" class="form-control" id="numidfiscale" value="123456" >
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <label for="devisetenuedecompte"><small>Devise de tenu de compte :</small> </label><input type="text" name="devisetenuedecompte" id="devisetenuedecompte" class="form-control" value="56" >
            </div>
            <div class="col">
                <label for="deviseequi"><small>Devise d'équivalence :</small> </label><input type="text" name="deviseequi" id="deviseequi" class="form-control" value="ariary">
            </div>
        </div>
        <input type="submit" value="valider" class="btn btn-primary float-end mt-2">
    </div>
</form>
