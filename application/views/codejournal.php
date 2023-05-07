<?php ?>
<main class="container text-center mb-5">
    <div class="" style="height:120px;margin-top: 10px">
    </div>
    <div class="shadow-lg p-5 w-75 container rounded">
        <h2>Codes Journaux</h2>
        <table class="container">
            <nav>
                <ul class="nav nav-fill">
                    <tr style="background-color:#0F243D; color: white">
                        <th>CODE</th>
                        <th>INTITULÉ</th>
                        <th>ACTION</th>
                    </tr>
                    <?php foreach ($codes as $row) { ?>
                        <tr>
                            <td><?= $row['code'] ?></td>
                            <td><?= $row['nom'] ?></td>
                            <td class="nav-item">
                                <a class="nav-link" href=""><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </ul>
            </nav>
        </table>
    </div>
</main>
