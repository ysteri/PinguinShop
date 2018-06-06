

<?php

include('db.php');
include("function.php");

if (isset($_POST["user_id"])) {
    $image = get_image_name($_POST["user_id"]);
    if ($image != '') {
        unlink("images/" . $image);
    }
    $statement = $connection->prepare(
            "DELETE FROM COCHONS WHERE ID = :id_cochons"
    );
    $result = $statement->execute(
            array(
                ':id_cochons' => $_POST["user_id"]
            )
    );

    if (!empty($result)) {
        echo 'Le cochon a bien été supprimée !';
    }
}
?>