<?php

include '../Config/config.php';

if (isset($_POST['submit'])) {

    $Categorie = $_POST['Categorie'];

    $sql = "INSERT INTO categories (name, id_from_admin) VALUES ('$Categorie', '$id')";
    if ($conn->query($sql) === TRUE) {
        header('location: ../../Views/index.php?_msg=true');
    } else {
        header('location: ../../Views/index.php?_msg=false');
    }

    $conn->close();
}

?>