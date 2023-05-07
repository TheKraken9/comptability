<div class="container">
    <div>
        <a href="http://localhost/comptability/CompteC/tiers" class="btn btn-success d-flex" style="transform: translate(10px,100px);width: 100px">< Retour</a>
        <form method="post" action="http://localhost/comptability/Welcome/confirmModificationTiers" class="container w-50 shadow-lg p-5" style="margin-top: 130px !important;">
            <h3 class="mb-4">Modifier un compte tiers</h3>
            <?php foreach ($comptesTiers as $rows): ?>
                <input type="text" name="idtiers" value="<?php echo $rows['idtiers'] ?>" hidden="hidden">
                <label for="type">Type : </label>
                <select name="typetiers" class="form-select" id="type">
                    <?php  foreach ($typetiers as $row) {?>
                        <option  value="<?php echo $row['type']?>"><?php echo $row['type']?> : <?php echo $row['name']?> </option>
                    <?php } ?>
                </select>
                <p><label for="intitule">Nom : </label><input type="text" class="form-control" name="nom" id="intitule" value="<?php echo $rows['nomtiers'] ?>"></p>
                <p><label for="intitule">Intitulé de compte : </label><input type="text" class="form-control" name="intitule" id="intitule" value="<?php echo $rows['intitulecompte'] ?>"></p>
            <?php endforeach; ?>
            <input type="submit" value="Modifier" class="btn btn-primary">
        </form>
    </div>
</div>



