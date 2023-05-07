<?php ?>
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
    <a class="navbar-brand" href="#"><p class="display-6 text-white" style="font-style:italic">Etats Financiers - Compte de résultat</p></a>
    <ul class="nav nav-pills">
        <li class="nav-item" >
            <a class="nav-link active" href="#" style="background-color:#2E8B57">COMPTE DE RÉSULTAT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#"></a>
        </li>
    </ul>
</nav>
    <!--<div class="nav nav-pills">
        <li class="nav-item" >
            <a class="nav-link active" href="<?php echo site_url("EcritureC/actifs"); ?>" style="background-color:#2E8B57">ACTIFS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#"></a>
        </li>
    </div>
    <div class="nav nav-pills">
        <li class="nav-item" >
            <a class="nav-link active" href="<?php echo site_url("EcritureC/passif"); ?>" style="background-color:#2E8B57">PASSIFS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#"></a>
        </li>
    </div>-->
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
    <p class="card-subtitle text-center"><strong>COMPTE DE RÉSULTAT</strong></p>
    <p class="card-subtitle text-center"><small>(par nature)</small></p>
    <p class="card-subtitle text-center"><strong>Période du <?php foreach ($exoinfo as $exoinf){ echo $exoinf['debut']; } ?> Au <?php foreach ($exoinfo as $exoinf){ echo $exoinf['fin']; } ?></strong></p>
    <p class="card-subtitle text-center"><strong>Unité monétaire: ARIARY</strong></p>
<table class="table">
    <thead style="background-color:#0F243D;color: white" >
        <th></th>
        <th>Compte</th>
        <th><?php foreach ($exoinfo as $exoinf){ echo $exoinf['fin']; } ?></th>
        <th>DATE FIN EXERCICE N-1</th>
    </thead>
    <tbody>
        <tr>
            <td>Chiffre d'affaires</td>
            <td>70</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Production Stockée</td>
            <td>71</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>I. PRODUCTION DE L'EXERCICE</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Achats consommés</td>
            <td>60</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Services extérieurs et autres consommations</td>
            <td>61/62</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>II. CONSOMMATION DE L'EXERCICE</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>III. VALEUR AJOUTÉE D'EXPLOITATION(I-II)</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Charges de personnel</td>
            <td>64</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Impôts, taxes et versements assimilés</td>
            <td>63</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>IV. EXCEDENT BRUT D'EXPLOITATION</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Autres produits opérationnels</td>
            <td>75</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Autres charges opérationnels</td>
            <td>65</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Dotations aux amortissements, aux provisions et pertes de valeur</td>
            <td>68</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Reprise sur provisions et pertes de valeurs</td>
            <td>78</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>VI. RÉSULTAT OPERATIONNEL</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Produits financiers</td>
            <td>76</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Charges financiers</td>
            <td>66</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>VI. RÉSULTAT FINANCIER</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>VII. RÉSULTAT AVANT IMPÔTS(V + VI)</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Impôts exigibles sur résultats</td>
            <td>695</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Impôts différés(Variations)</td>
            <td>692</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="text-center"><strong>TOTAL DES PRODUITS DES ACTIVITÉS ORDINAIRES</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="text-center"><strong>TOTAL DES CHARGES DES ACTIVITÉS ORDINAIRES</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>VIII. RÉSULTAT NET DES ACTIVITÉS ORDINAIRES</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Eléments extraordinaires (produits)</td>
            <td>77</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Eléments extraordinaires (charges)</td>
            <td>67</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>IX. RÉSULTAT EXTRAORDINAIRE</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>X. RÉSULTAT NET DE L'EXERCICE</strong></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
</div>
