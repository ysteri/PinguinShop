

<?php

include('pgConnect.php');
include("function.php");

if (isset($_POST["user_id"])) {
    $image = get_image_name($_POST["user_id"]);
    if ($image != '') {
        unlink("images/" . $image);
    }
    $statement = $connection->prepare(
            "DELETE FROM PINGOUINS WHERE ID = :id_pingouins"
    );
    $result = $statement->execute(
            array(
                ':id_pingouins' => $_POST["user_id"]
            )
    );

    if (!empty($result)) {
        echo 'Le pingouin a bien été supprimé !';
    }
}
?>