
    <table class="table">
        <tr style="background-color:#0F243D;color: white">
            <th colspan="3"><?php echo $num[0] ;?></th>
            <th style="text-align:end;">SC:<?php echo $sd[0];?></th>
            <th style="text-align:end;">SD:<?php echo $sc[0];?></th>
        </tr>
        <tr class="table-success">
            <th>date</th>
            <th>libelle</th>
            <th>tiers</th>
            <th style="text-align:end;">debit</th>
            <th style="text-align:end;">credit</th>
        </tr>
        <?php foreach($livre as $row){?>
            <tr  >
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['libelle'];?></td>
                <td><a href="<?php echo site_url("BilanC/detailsTiers");?>?idExercice=<?php echo $exercice[0]['idexercice'] ?>&&idTiers=<?php echo $row['idtiers']; ?>"><?php echo $row['tiers'] ?></a></td>
                <td style="text-align:end;"><?php echo $row['debit'];?></td>
                <td style="text-align:end;"><?php echo $row['credit'];?></td>
            </tr>
        <?php } ?>
    </table>