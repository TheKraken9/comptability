<?php ?>
<div class="container" style="margin-top: 100px">
    <div class="container text-center mb-4">
        <a href="http://localhost/comptability/Welcome/modifyProfil" class="me-5"><i class="fas fa-edit"></i> Modifier</a>
        <a href="http://localhost/comptability/Welcome/exportPdf"><i class="fas fa-download"></i> Télécharger</a>
    </div>
    <?php foreach ($infos as $info): ?>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"  style="color: #0F243D"><?= $info['nom'] ?></h3>
                <h5 class="card-title">Dirigé par <?= $info['dirigeant'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Située à <?= $info['siege'] ?></h6>
                <p class="card-text">Description de l'entreprise</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="far fa-calendar" style="color: #0F243D"></i> Date de création : <strong><?= $info['datedecreation'] ?></strong></li>
                    <li class="list-group-item"><i class="far fa-id-card" style="color: #0F243D"></i> N° d'identifiant fiscale : <strong><?= $info['numidfiscale'] ?></strong> </li>
                    <li class="list-group-item"><i class="fas fa-calculator" style="color: #0F243D"></i> N° statistique : <strong><?= $info['numstatistique'] ?></strong> </li>
                    <li class="list-group-item"><i class="fas fa-building" style="color: #0F243D"></i> N° de registre de commerce : <strong><?= $info['numregcom'] ?></strong> </li>
                    <li class="list-group-item"><i class="fas fa-info-circle" style="color: #0F243D"></i> Status : <strong><?= $info['status'] ?></strong> </li>
                    <li class="list-group-item"><i class="fas fa-calendar" style="color: #0F243D"></i> Date de début d'exercice : <strong><?= $info['datedebutexercice'] ?></strong> </li>
                    <li class="list-group-item"><i class="fas fa-money-bill" style="color: #0F243D"></i> Devise d'équivalence : <strong><?= $info['devequiv'] ?></strong> </li>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="m-5"></div>
</div>
<div class="container mb-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold"><i class="fas fa-book"></i> CODE JOURNAUX</h5>
                    <?php foreach ($codes as $info): ?>
                        <p class="card-text"><?= $info['code'] ?> - <?= $info['nom'] ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold"><i class="fas fa-money-bill"></i> DEVISES</h5>
                    <?php foreach ($devises as $info): ?>
                        <p class="card-text"><?= $info['nomdevise'] ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>


