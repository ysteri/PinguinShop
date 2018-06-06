<?php

function upload_image()
{
	if(isset($_FILES["user_image"]))
	{
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './images/' . $new_name;
		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($user_id)
{
	include('pgConnect.php');
	$statement = $connection->prepare("SELECT IMAGE FROM PINGOUINS WHERE ID = '$user_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["IMAGE"];
	}
}

function get_total_all_records()
{
	include('pgConnect.php');
	$statement = $connection->prepare("SELECT * FROM PINGOUINS");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>