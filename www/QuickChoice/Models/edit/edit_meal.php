<?php
include '../Config/config.php';

if (isset($_GET['id'])) {
    $id_meal = $_GET['id'];

    // Fetch the meal details from the database
    $sql = "SELECT * FROM meals WHERE id = $id_meal";
    $result = mysqli_query($conn, $sql);
    $meal = mysqli_fetch_assoc($result);

    if ($meal) {
        $name = $meal['name'];
        $description = $meal['discretion']; // Consider renaming this column to 'description'
        $price = $meal['prix'];
        $img = $meal['img']; // Fetch the image path or URL
    } else {
        echo "Meal not found!";
        exit;
    }
}

// Handle form submission
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handle the image upload
    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $target_dir = "../../Views/assets/img/meals/"; // Directory where images will be stored
        $target_file = $target_dir . basename($image);
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $img = basename($image);
        } else {
            echo "Error uploading the image.";
        }
    }

    // Update the meal details in the database
    $sql = "UPDATE meals SET name='$name', discretion='$description', prix='$price', img='$img' WHERE id=$id_meal";

    if (mysqli_query($conn, $sql)) {
        echo "Meal updated successfully!";
        header("Location: ../../Views/index.php"); // Redirect to the meals list page
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meal</title>
    <link rel="icon" type="image/x-icon" href="../../Views/assets/img/all/logo-menu.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .btn-primary:hover {
            background-color: #1a67a2;
            border-color: #1a67a2;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }

        .meal-image {
            max-width: 100px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Meal</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Meal Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="5" required><?php echo $description; ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" class="form-control" value="<?php echo $price; ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Meal Image:</label><br>
                <img src="../../Views/assets/img/meals/<?php echo $img; ?>" id="meal-image-preview" class="meal-image" alt="Meal Image">
                <input type="file" id="image" name="image" class="form-control-file" onchange="previewImage(event)">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Meal</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript to Preview the Image -->
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('meal-image-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>