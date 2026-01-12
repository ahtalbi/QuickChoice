<?php

include '../Config/config.php';

if(isset($_GET['them']))
{
    $them = $_GET['them'];
    $sql = "UPDATE `admin` SET `couleur`='$them'";
    mysqli_query($conn, $sql);
    header('location:edit_profile.php');
}

?>