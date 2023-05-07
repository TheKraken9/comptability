<?php global $TOTAL, $TOTALAC ?>
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
    <a class="navbar-brand" href="#"><p class="display-6 text-white" style="font-style:italic">Etats Financiers - Actifs</p></a>
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
    <p class="card-subtitle text-center"><strong>EXERCICE CLOS AU <?php foreach ($exoinfo as $exoinf){ echo $exoinf['fin']; } ?></strong></p>
    <p class="card-subtitle text-center"><strong>Unité monétaire: ARIARY</strong></p>
    <table class="table">
        <thead style="background-color:#0F243D;color: white" >
        <tr>
            <th>ACTIFS</th>
            <th>Compte</th>
            <th></th>
            <th class="text-center"><?php foreach ($exoinfo as $exoinf){ echo $exoinf['fin']; } ?></th>
            <th></th>
            <th class="text-center">DATE FIN EXERCICE N-1</th>
        </tr>
       <tr>
           <th></th>
           <th></th>
           <th></th>
           <th>MONTANT</th>
           <th></th>
           <th></th>
       </tr>
        <tr>
            <th></th>
            <th></th>
            <th>Brut</th>
            <th>Amort./Prov.</th>
            <th>Net</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>ACTIFS NON COURANTS</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>IMMOBILISATIONS INCORPORELLES</td>
                <td><strong style="font-size: x-large">20</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte20 as $c20): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c20['numcompte'] ?></small></td>
                    <td><?= $c20['debit'] == 0 ? $c20['credit'] : $c20['debit'] ?></td>
                    <td><?= $c20['debit'] == 0 ? ($c20['credit']*0.01)*5 : ($c20['debit']*0.01)*5 ?>.00</td>
                    <td><?= $c20['debit'] == 0 ? (($c20['credit'])-(($c20['credit']*0.01)*5)) : (($c20['debit'])-(($c20['debit']*0.01)*5)) ?>.00</td>
                    <td></td>
                    <?php $c20['debit'] == 0 ? $TOTAL += (($c20['credit'])-(($c20['credit']*0.01)*5)) : $TOTAL += (($c20['debit'])-(($c20['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>IMMOBILISATIONS CORPORELLES</td>
                <td><strong style="font-size: x-large">21</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte21 as $c21): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c21['numcompte'] ?></small></td>
                    <td><?= $c21['debit'] == 0 ? $c21['credit'] : $c21['debit'] ?></td>
                    <td><?= $c21['debit'] == 0 ? ($c21['credit']*0.01)*5 : ($c21['debit']*0.01)*5 ?>.00</td>
                    <td><?= $c21['debit'] == 0 ? (($c21['credit'])-(($c21['credit']*0.01)*5)) : (($c21['debit'])-(($c21['debit']*0.01)*5)) ?>.00</td>
                    <td></td>
                    <?php $c21['debit'] == 0 ? $TOTAL += (($c21['credit'])-(($c21['credit']*0.01)*5)) : $TOTAL += (($c21['debit'])-(($c21['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>IMMOBILISATIONS BIOLOGIQUES</td>
                <td><strong style="font-size: x-large">22</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte22 as $c22): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c22['numcompte'] ?></small></td>
                    <td><?= $c22['debit'] == 0 ? $c22['credit'] : $c22['debit'] ?></td>
                    <td><?= $c22['debit'] == 0 ? ($c22['credit']*0.01)*5 : ($c22['debit']*0.01)*5 ?>.00</td>
                    <td><?= $c22['debit'] == 0 ? (($c22['credit'])-(($c22['credit']*0.01)*5)) : (($c22['debit'])-(($c22['debit']*0.01)*5)) ?>.00</td>
                    <td></td>
                    <?php $c22['debit'] == 0 ? $TOTAL += (($c22['credit'])-(($c22['credit']*0.01)*5)) : $TOTAL += (($c22['debit'])-(($c22['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>IMMOBILISATIONS EN COURS</td>
                <td><strong style="font-size: x-large">23</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte23 as $c23): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c23['numcompte'] ?></small></td>
                    <td><?= $c23['debit'] == 0 ? $c23['credit'] : $c23['debit'] ?></td>
                    <td><?= $c23['debit'] == 0 ? ($c23['credit']*0.01)*5 : ($c23['debit']*0.01)*5 ?>.00</td>
                    <td><?= $c23['debit'] == 0 ? (($c23['credit'])-(($c23['credit']*0.01)*5)) : (($c23['debit'])-(($c23['debit']*0.01)*5)) ?>.00</td>
                    <td></td>
                    <?php $c23['debit'] == 0 ? $TOTAL += (($c23['credit'])-(($c23['credit']*0.01)*5)) : $TOTAL += (($c23['debit'])-(($c23['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>IMMOBILISATIONS FINANCIERS</td>
                <td><strong style="font-size: x-large">25</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte25 as $c25): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c25['numcompte'] ?></small></td>
                    <td><?= $c25['debit'] == 0 ? $c25['credit'] : $c25['debit'] ?></td>
                    <td><?= $c25['debit'] == 0 ? ($c25['credit']*0.01)*5 : ($c25['debit']*0.01)*5 ?>.00</td>
                    <td><?= $c25['debit'] == 0 ? (($c25['credit'])-(($c25['credit']*0.01)*5)) : (($c25['debit'])-(($c25['debit']*0.01)*5)) ?>.00</td>
                    <td></td>
                    <?php $c25['debit'] == 0 ? $TOTAL += (($c25['credit'])-(($c25['credit']*0.01)*5)) : $TOTAL += (($c25['debit'])-(($c25['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>IMPÔTS DIFFÉRÉS</td>
                <td><strong style="font-size: x-large">13</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte13 as $c13): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c13['numcompte'] ?></small></td>
                    <td><?= $c13['debit'] == 0 ? $c13['credit'] : $c13['debit'] ?></td>
                    <td><?= $c13['debit'] == 0 ? ($c13['credit']*0.01)*5 : ($c13['debit']*0.01)*5 ?>.00</td>
                    <td><?= $c13['debit'] == 0 ? (($c13['credit'])-(($c13['credit']*0.01)*5)) : (($c13['debit'])-(($c13['debit']*0.01)*5)) ?>.00</td>
                    <td></td>
                    <?php $c13['debit'] == 0 ? $TOTAL += (($c13['credit'])-(($c13['credit']*0.01)*5)) : $TOTAL += (($c13['debit'])-(($c13['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr style="background-color: #5356F5; color: white">
                <td class="text-center"><strong>TOTAL ACTIFS NON COURANTS</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center"><?= $TOTAL ?>.00</td>
            </tr>
            <tr>
                <td><strong>ACTIFS COURANTS</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>STOCKS ET EN COURS</td>
                <td><strong style="font-size: x-large">3</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte3 as $c3): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c3['numcompte'] ?></small></td>
                    <td><?= $c3['debit'] == 0 ? $c3['credit'] : $c3['debit'] ?></td>
                    <td><?= $c3['debit'] == 0 ? ($c3['credit']*0.01)*5 : ($c3['debit']*0.01)*5 ?>.00</td>
                    <td><?= $c3['debit'] == 0 ? (($c3['credit'])-(($c3['credit']*0.01)*5)) : (($c3['debit'])-(($c3['debit']*0.01)*5)) ?>.00</td>
                    <td></td>
                    <?php $c3['debit'] == 0 ? $TOTALAC += (($c3['credit'])-(($c3['credit']*0.01)*5)) : $TOTALAC += (($c3['debit'])-(($c3['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>CRÉANCES ET EMPLOIS ASSIMILÉS</td>
                <td><strong style="font-size: x-large">4111</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="text-center">Clients et autres débiteurs</td>
                <td><strong style="font-size: x-large">41</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte41 as $c41): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c41['numcompte'] ?></small></td>
                    <td><?= $c41['debit'] == 0 ? $c41['credit'] : $c41['debit'] ?></td>
                    <td><?= $c41['debit'] == 0 ? ($c41['credit']*0.01)*5 : ($c41['debit']*0.01)*5 ?>.00</td>
                    <td><?= $c41['debit'] == 0 ? (($c41['credit'])-(($c41['credit']*0.01)*5)) : (($c41['debit'])-(($c41['debit']*0.01)*5)) ?>.00</td>
                    <td></td>
                    <?php $c41['debit'] == 0 ? $TOTALAC += (($c41['credit'])-(($c41['credit']*0.01)*5)) : $TOTALAC += (($c41['debit'])-(($c41['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td class="text-center">Impôts/Bénéfices</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="text-center">Autres créances et actifs assimilés</td>
                <td><strong style="font-size: x-large">4112</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte4112 as $c4112): ?>
                <tr>
                    <td></td>
                    <td class="text-center"><small><?= $c4112['numcompte'] ?></small></td>
                    <td><?= $c4112['debit'] == 0 ? $c4112['credit'] : $c4112['debit'] ?></td>
                    <td><?= $c4112['debit'] == 0 ? ($c4112['credit']*0.01)*5 : ($c4112['debit']*0.01)*5 ?>.00</td>
                    <td><?= $c4112['debit'] == 0 ? (($c4112['credit'])-(($c4112['credit']*0.01)*5)) : (($c4112['debit'])-(($c4112['debit']*0.01)*5)) ?>.00</td>
                    <td></td>
                    <?php $c4112['debit'] == 0 ? $TOTALAC += (($c4112['credit'])-(($c4112['credit']*0.01)*5)) : $TOTALAC += (($c4112['debit'])-(($c4112['debit']*0.01)*5)) ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>TRÉSORERIE ET EQUIVALENTS DE TRÉSORERIE</td>
                <td><strong style="font-size: x-large">51200</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($compte51200 as $c51200): ?>
            <tr>
                <td></td>
                <td class="text-center"><small><?= $c51200['numcompte'] ?></small></td>
                <td><?= $c51200['debit'] == 0 ? $c51200['credit'] : $c51200['debit'] ?></td>
                <td><?= $c51200['debit'] == 0 ? ($c51200['credit']*0.01)*5 : ($c51200['debit']*0.01)*5 ?>.00</td>
                <td><?= $c51200['debit'] == 0 ? (($c51200['credit'])-(($c51200['credit']*0.01)*5)) : (($c51200['debit'])-(($c51200['debit']*0.01)*5)) ?>.00</td>
                <td></td>
                <?php $c51200['debit'] == 0 ? $TOTALAC += (($c51200['credit'])-(($c51200['credit']*0.01)*5)) : $TOTALAC += (($c51200['debit'])-(($c51200['debit']*0.01)*5)) ?>
            </tr>
            <?php endforeach; ?>
            <tr style="background-color: #5356F5; color: white">
                <td class="text-center"><strong>TOTAL ACTIFS COURANTS</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center"><?= $TOTALAC ?>.00</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="background-color: #5356F5; color: white">
                <td class="text-center" ><strong>TOTAL DES ACTIFS</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center"><?= ($TOTAL+$TOTALAC) ?>.00</td>
            </tr>
        </tbody>
    </table>
</div>
