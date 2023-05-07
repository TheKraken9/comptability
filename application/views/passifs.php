<?php global $TOTALCP, $TOTALPNC, $TOTALPC?>
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
<nav id="navbar-example2" class="navbar top second-navbar navbar-light  bg-light px-2 mb-3">
    <a class="navbar-brand" href="#"><p class="display-6 text-white" style="font-style:italic">Etats Financiers - Passifs</p></a>
    <ul class="nav nav-pills">
        <li class="nav-item" >
            <a class="nav-link active" href="<?php echo site_url("BilanC/etatFinancier?idExercice=$idexercice"); ?>" style="background-color:#2E8B57">COMPTE DE RÉSULTAT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#"></a>
        </li>
    </ul>
</nav>
<?php foreach ($infos as $info): ?>
    <div class="ms-5 card w-25 float-end me-5 mb-3 shadow-lg">
        <div class="card-body">
            <h4 class="card-title"  style="color: #0F243D"><strong>SOCIETE : </strong> <?= $info['nom'] ?></h4>
            <h6 class="card-subtitle mb-2 text-muted"><strong>ADRESSE : </strong><?= $info['siege'] ?></h6>
            <h6 class="card-subtitle mb-2 text-muted"><strong>CAPITAL : </strong><?= $info['devequiv'] ?></h6>
            <h6 class="card-subtitle mb-2 text-muted"><strong>CIF : </strong><?= $info['numidfiscale'] ?></h6>
            <h6 class="card-subtitle mb-2 text-muted"><strong>STAT : </strong><?= $info['numstatistique'] ?></h6>
        </div>
    </div>
<?php endforeach; ?>
<div class="shadow-lg p-3 rounded">
    <p>
        <a class="ms-5 me-5" href="<?php echo site_url("EcritureC/actifs?idExercice=$idexercice"); ?>" style="float: inherit">ACTIFS</a>
        <a class="ms-5" href="<?php echo site_url("EcritureC/passifs?idExercice=$idexercice"); ?>" style="">PASSIFS</a>
    </p>
    <p class="card-subtitle text-center"><strong>BILAN</strong></p>
    <p class="card-subtitle text-center"><strong>EXERCICE CLOS AU <?php foreach ($exoinfo as $exoinfos){ echo $exoinfos['fin']; } ?></strong></p>
    <p class="card-subtitle text-center"><strong>Unité monétaire: ARIARY</strong></p>
    <table class="table">
        <thead style="background-color:#0F243D;color: white" >
        <tr>
            <th>PASSIFS</th>
            <th>Compte</th>
            <th><?php foreach ($exoinfo as $exoinfos){ echo $exoinfos['fin']; } ?></th>
            <th>DATE FIN EXERCICE N-1</th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th>MONTANT</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>CAPITAUX PROPRES</strong></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Capital émis</td>
                <td><strong style="font-size: x-large">101</strong></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte101 as $c101): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c101['numcompte'] ?></small></td>
                    <td><?= $c101['debit'] == 0 ? $c101['credit'] : $c101['debit'] ?></td>
                    <td></td>
                    <?php $c101['debit'] == 0 ? $TOTALCP += (($c101['credit'])-(($c101['credit']*0.01)*5)) : $TOTALCP += (($c101['debit'])-(($c101['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Réserves légales</td>
                <td><strong style="font-size: x-large">106</strong></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte106 as $c106): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c106['numcompte'] ?></small></td>
                    <td><?= $c106['debit'] == 0 ? $c106['credit'] : $c106['debit'] ?></td>
                    <td></td>
                    <?php $c106['debit'] == 0 ? $TOTALCP += (($c106['credit'])-(($c106['credit']*0.01)*5)) : $TOTALCP += (($c106['debit'])-(($c106['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Résultat en instance d'affectation</td>
                <td><strong style="font-size: x-large">128</strong></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte128 as $c128): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c128['numcompte'] ?></small></td>
                    <td><?= $c128['debit'] == 0 ? $c128['credit'] : $c128['debit'] ?></td>
                    <td></td>
                    <?php $c128['debit'] == 0 ? $TOTALCP += (($c128['credit'])-(($c128['credit']*0.01)*5)) : $TOTALCP += (($c128['debit'])-(($c128['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Résultat net</td>
                <td><strong style="font-size: x-large">1281</strong></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte1281 as $c1281): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c1281['numcompte'] ?></small></td>
                    <td><?= $c1281['debit'] == 0 ? $c1281['credit'] : $c1281['debit'] ?></td>
                    <td></td>
                    <?php $c1281['debit'] == 0 ? $TOTALCP += (($c1281['credit'])-(($c1281['credit']*0.01)*5)) : $TOTALCP += (($c1281['debit'])-(($c1281['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Autres capitaux propres</td>
                <td><strong style="font-size: x-large">102</strong></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte102 as $c102): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c102['numcompte'] ?></small></td>
                    <td><?= $c102['debit'] == 0 ? $c102['credit'] : $c102['debit'] ?></td>
                    <td></td>
                    <?php $c102['debit'] == 0 ? $TOTALCP += (($c102['credit'])-(($c102['credit']*0.01)*5)) : $TOTALCP += (($c102['debit'])-(($c102['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr style="background-color: #5356F5; color: white">
                <td class="text-center"><strong>TOTAL CAPITAUX PROPRES</strong></td>
                <td></td>
                <td></td>
                <td class="text-center"><?= $TOTALCP ?>.00</td>
            </tr>
            <tr>
                <td><strong>PASSIFS NON-COURANTS</strong></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Impôts différés</td>
                <td><strong style="font-size: x-large">13</strong></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte13 as $c13): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c13['numcompte'] ?></small></td>
                    <td><?= $c13['debit'] == 0 ? $c13['credit'] : $c13['debit'] ?></td>
                    <td></td>
                    <?php $c13['debit'] == 0 ? $TOTALPNC += (($c13['credit'])-(($c13['credit']*0.01)*5)) : $TOTALPNC += (($c13['debit'])-(($c13['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Emprunts/dettes à LMT part+1an</td>
                <td><strong style="font-size: x-large">161</strong></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte161 as $c161): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c161['numcompte'] ?></small></td>
                    <td><?= $c161['debit'] == 0 ? $c161['credit'] : $c161['debit'] ?></td>
                    <td></td>
                    <?php $c161['debit'] == 0 ? $TOTALPNC += (($c161['credit'])-(($c161['credit']*0.01)*5)) : $TOTALPNC += (($c161['debit'])-(($c161['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr style="background-color: #5356F5; color: white">
                <td class="text-center"><strong>TOTAL PASSIFS NON-COURANTS</strong></td>
                <td></td>
                <td></td>
                <td class="text-center"><?= $TOTALPNC ?>.00</td>
            </tr>
            <tr>
                <td><strong>PASSIFS COURANTS</strong></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Emprunts/dettes à LMT part-1an</td>
                <td><strong style="font-size: x-large">161</strong></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte161 as $c161): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c161['numcompte'] ?></small></td>
                    <td><?= $c161['debit'] == 0 ? $c161['credit'] : $c161['debit'] ?></td>
                    <td></td>
                    <?php $c161['debit'] == 0 ? $TOTALPC += (($c161['credit'])-(($c161['credit']*0.01)*5)) : $TOTALPC += (($c161['debit'])-(($c161['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td><strong style="font-size: x-large">165</strong></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte165 as $c165): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c165['numcompte'] ?></small></td>
                    <td><?= $c165['debit'] == 0 ? $c165['credit'] : $c165['debit'] ?></td>
                    <td></td>
                    <?php $c165['debit'] == 0 ? $TOTALPC += (($c165['credit'])-(($c165['credit']*0.01)*5)) : $TOTALPC += (($c165['debit'])-(($c165['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Fournisseurs et comptes rattachés</td>
                <td><strong style="font-size: x-large">401</strong></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte401 as $c401): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c401['numcompte'] ?></small></td>
                    <td><?= $c401['debit'] == 0 ? $c401['credit'] : $c401['debit'] ?></td>
                    <td></td>
                    <?php $c401['debit'] == 0 ? $TOTALPC += (($c401['credit'])-(($c401['credit']*0.01)*5)) : $TOTALPC += (($c401['debit'])-(($c401['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Avances reçues des clients</td>
                <td><strong style="font-size: x-large">4113</strong></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte4113 as $c4113): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c4113['numcompte'] ?></small></td>
                    <td><?= $c4113['debit'] == 0 ? $c4113['credit'] : $c4113['debit'] ?></td>
                    <td></td>
                    <?php $c4113['debit'] == 0 ? $TOTALPC += (($c4113['credit'])-(($c4113['credit']*0.01)*5)) : $TOTALPC += (($c4113['debit'])-(($c4113['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Autres dettes</td>
                <td><strong style="font-size: x-large">418</strong></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte418 as $c418): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c418['numcompte'] ?></small></td>
                    <td><?= $c418['debit'] == 0 ? $c418['credit'] : $c418['debit'] ?></td>
                    <td></td>
                    <?php $c418['debit'] == 0 ? $TOTALPC += (($c418['credit'])-(($c418['credit']*0.01)*5)) : $TOTALPC += (($c418['debit'])-(($c418['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Comptes de trésorerie</td>
                <td><strong style="font-size: x-large">51202</strong></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte51202 as $c51202): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c51202['numcompte'] ?></small></td>
                    <td><?= $c51202['debit'] == 0 ? $c51202['credit'] : $c51202['debit'] ?></td>
                    <td></td>
                    <?php $c51202['debit'] == 0 ? $TOTALPC += (($c51202['credit'])-(($c51202['credit']*0.01)*5)) : $TOTALPC += (($c51202['debit'])-(($c51202['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr style="background-color: #5356F5; color: white">
                <td class="text-center"><strong>TOTAL PASSIFS COURANTS</strong></td>
                <td></td>
                <td></td>
                <td class="text-center"><?= $TOTALPC ?>.00</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="background-color: #5356F5; color: white">
                <td class="text-center"><strong>TOTAL CAPITAUX PROPRES ET PASSIFS</strong></td>
                <td></td>
                <td></td>
                <td class="text-center"><?= ($TOTALCP+$TOTALPNC+$TOTALPC) ?>.00</td>
            </tr>
        </tbody>
    </table>
</div>
