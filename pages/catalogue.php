<?php
$PingouinsDB = new Vue_PingouinsDB($cnx);
$liste = $PingouinsDB->getVue_pingouinProduit();
$nbrPingouins = count($liste);
?>


<table class="table table-bordered">
    <thead>
        <tr >

            <th class="col-md-5">Photo</th>
            <th class="col-md-1">Date de naissance</th>
            <th class="col-md-1">Nom</th>
            <th class="col-md-2">Reserver</th>

        </tr>
    </thead>
<?php
if (isset($liste)) {
    if ($nbrPingouins > 0) {
        ?>          
            <?php
            ?>      
            <?php
            for ($i = 0; $i < $nbrPingouins; $i++) {
                if ($liste[$i]['DISPO'] == 1) {
                    ?>

                    <tbody>
                        <tr >

                            <td class="col-md-5"><img src="admin/images/<?php print $liste[$i]['IMAGE']; ?>" alt="image" id="liste"/></td>
                            <td class="col-md-1"><?php print $liste[$i]['DATE_NAISS']; ?></td>
                            <td class="col-md-1"><?php print $liste[$i]['NOM']; ?></td>
                            <td class="col-md-2"><a type="button" class="btn-action btn btn-warning" href="index.php?page=commande.php&id=<?php print $liste[$i]['ID'] ?>">                
                                    <span class="glyphicon glyphicon-leaf"></span>Reserver un pingouin
                                </a>    </td>

                        </tr>

                    </tbody>      
            <?php }
        } ?>


            <?php
        }
    }//fin if du debut 
    ?>
</table>

