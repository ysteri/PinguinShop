<?php

//Insertion ou update d'une nouvelle chambre selon la valeur de l'input operation



include('pgConnect.php');
include('function.php');
if (isset($_POST["operation"])) {
    //INSERTION CHAMBRE
    if ($_POST["operation"] == "Add") {
        $image = '';
        if ($_FILES["user_image"]["name"] != '') {
            $image = upload_image();
        }
        $statement = $connection->prepare("
			INSERT INTO PINGOUINS (NOM,DATE_NAISS,IMAGE,DISPO) 
			VALUES (:nom,:date_naiss,:image,:dispo)
		");
        $result = $statement->execute(
                array(
                    ':image' => $image,
                    ':nom' => $_POST["nom"],
                    ':date_naiss' => $_POST["date_naiss"],
                    ':dispo' => $_POST["dispo"],
                )
        );
        if (!empty($result)) {
            echo 'Data Inserted';
        }
    }

    //UPDATE CHAMBRE
    if ($_POST["operation"] == "Edit") {
        $image = '';
        if ($_FILES["user_image"]["name"] != '') {
            $image = upload_image();
        } else {
            $image = $_POST["hidden_user_image"];
        }
        $statement = $connection->prepare(
                "UPDATE PINGOUINS 
			SET NOM = :nom,  DATE_NAISS = :date_naiss, IMAGE = :image, DISPO = :dispo
			WHERE ID = :id
			"
        );
        $result = $statement->execute(
                array(
                    ':image' => $image,
                    ':nom' => $_POST["nom"],
                    ':date_naiss' => $_POST["date_naiss"],
                    ':dispo' => $_POST["dispo"],
                    ':id' => $_POST["user_id"]
                )
        );
        if (!empty($result)) {
            echo 'Data Updated';
        }
    }
}
?>