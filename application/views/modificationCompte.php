<div class="container">
    <div class="">
        <a href="http://localhost/comptability/Welcome/compte" class="btn btn-success d-flex" style="transform: translate(10px,100px);width: 100px">< Retour</a>
        <form method="post" action="http://localhost/comptability/Welcome/confirmModification" class="container w-50 shadow-lg p-5" style="margin-top: 150px !important;">
            <h3 class="mb-4">Modifier un compte</h3>
            <?php foreach ($comptes as $row): ?>
                <input type="text" name="idcompte" value="<?php echo $row['idcompte'] ?>" hidden="hidden">
                <p><label for="numero">Numéro : </label><input type="number" class="form-control" name="numero" id="numero" value="<?php echo $row['numero'] ?>" disabled></p>
                <p><label for="intitule">Intitulé : </label><input type="text" class="form-control" name="intitule" id="intitule" value="<?php echo $row['intitule'] ?>"></p>
            <?php endforeach; ?>
            <input type="submit" value="Modifier" class="btn btn-primary">
        </form>
    </div>
</div>




