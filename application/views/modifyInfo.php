<?php ?>

<form method="post" action="http://localhost/comptability/Welcome/modifyInfo" class="container mt-5 pt-1">
    <div class="form form-group mt-5 w-50">
        <h4 class="text-center">Mon Entreprise</h4>
        <?php foreach ($infos as $info): ?>
            <p><label for="nom">Nom de l'entreprise : </label><input type="text" class="form-control" name="nom" id="nom" value="<?= $info['nom'] ?>"></p>
            <p><label for="mdp">Mot de passe : </label><input class="form-control" type="password" name="mdp" id="mdp" value="<?= $info['mdp'] ?>"></p>
            <p><label for="dirigeant">Dirigeant : </label><input type="text" name="dirigeant" class="form-control" id="dirigeant" value="<?= $info['dirigeant'] ?>"></p>
            <p><label for="siege">Siège : </label><input type="text" name="siege" id="siege" class="form-control" value="<?= $info['siege'] ?>"></p>
            <p><label for="datecreation">Date de création : </label><input type="date" name="datecreation" class="form-control" id="datecreation" value="<?= $info['datedecreation'] ?>"></p>
            <p><label for="numidfiscale">Numéro d'identification fiscale : </label><input type="text" name="numidfiscale" class="form-control" id="numidfiscale" value="<?= $info['numidfiscale'] ?>" ></p>
            <p><label for="numstat">Numéro Statistique : </label><input type="text" name="numstat" id="numstat" class="form-control" value="<?= $info['numstatistique'] ?>"></p>
            <p><label for="numregcom">Numéro de registre de commerce : </label><input type="text" name="numregcom" id="numregcom" class="form-control" value="<?= $info['numregcom'] ?>" ></p>
            <p><label for="status">Status : </label><input type="text" name="status" id="status" class="form-control" value="<?= $info['status'] ?>" ></p>
            <p><label for="datedebutexo">Date de début d'exercice : </label><input type="date" name="datedebutexo" id="datedebutexo" class="form-control" value="<?= $info['datedebutexercice'] ?>" ></p>
            <p><label for="devisetenuedecompte">Devise de tenu de compte : </label><input type="text" name="devisetenuedecompte" id="devisetenuedecompte" class="form-control" value="<?= $info['devtenuedecompte'] ?>" ></p>
            <p><label for="deviseequi">Devise d'équivalence : </label><input type="text" name="deviseequi" id="deviseequi" class="form-control" value="<?= $info['devequiv'] ?>"></p>
        <?php endforeach; ?>
            <p><input type="submit" value="Mettre à jour" class="btn btn-success float-end mb-5 mt-3"></p>
    </div>
</form>