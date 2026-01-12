<?php
include '../Config/config.php'; // Include your database connection

$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['cat']);

    // File upload handling
    $img = '';
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $target_dir = "../../Views/assets/img/meals/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $img = basename($_FILES["img"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit;
            }
        } else {
            echo "File is not an image.";
            exit;
        }
    }

    // Insert data into database
    $sql = "INSERT INTO meals (name, discretion, prix, img, categorie, id_from_admin) VALUES ('$name', '$description', '$price', '$img', '$category', '$id')";

    if (mysqli_query($conn, $sql)) {
        echo "New meal inserted successfully";
        header("Location: ../../Views/index.php"); // Redirect to meals page
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
