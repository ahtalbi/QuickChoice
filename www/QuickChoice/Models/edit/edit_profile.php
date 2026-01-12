<?php
include '../Config/config.php';


$id_admin = $id;

// Fetch the admin details from the database
$sql = "SELECT * FROM admin WHERE id = $id_admin";
$result = mysqli_query($conn, $sql);
$admin = mysqli_fetch_assoc($result);

if ($admin) {
    $username = $admin['username'];
    $email = $admin['email'];
    $phone = $admin['phone'];
    $password = $admin['password'];
    $image = $admin['image']; // Fetch the image path or URL
} else {
    echo "Admin not found!";
    exit;
}


// Handle form submission
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Handle the image upload
    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $target_dir = "../../Views/assets/img/profiles/"; // Directory where images will be stored
        $target_file = $target_dir . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $img = basename($image);
        } else {
            echo "Error uploading the image.";
        }
    } else {
        // If no new image is uploaded, keep the existing one
        $img = $image;
    }

    // Update the admin details in the database
    $sql = "UPDATE admin SET username='$username', phone='$phone',password='$password', image='$img' WHERE id=$id_admin";

    if (mysqli_query($conn, $sql)) {
        echo "Admin updated successfully!";
        header("Location: ../../Views/index.php"); // Redirect to the admin list page
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
    <title>Edit Admin</title>
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

        .admin-image {
            max-width: 100px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .theme-img {
            min-height: 100px;
            max-height: 200px;
            margin: 5px;
            width: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Admin</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control"
                    value="<?php echo htmlspecialchars($username); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" disabled
                    value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" class="form-control"
                    value="<?php echo htmlspecialchars($password); ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" class="form-control"
                    value="<?php echo htmlspecialchars($phone); ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Profile Image:</label><br>
                <img id="meal-image-preview" src="../../Views/assets/img/profiles/<?php echo htmlspecialchars($image); ?>" class="admin-image" alt="Admin Image">
                <input type="file" id="image" name="image" class="form-control-file" onchange="previewImage(event)">
            </div>

            <div class="row">
                <div class="col-4"></div>
                <div class="col-4"></div>
                <div class="col-4">
                    <button type="button" class="btn btn-secondary m-2 text-center" data-bs-toggle="modal"
                        data-bs-target="#edit_them">
                        <span><i class="fas fa-pen"></i> Edit Theme Menu</span>
                    </button>
                </div>
            </div>

            <!-- Edit Theme Menu Modal -->
            <div class="modal fade" id="edit_them" tabindex="-1" aria-labelledby="editThemModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editThemModalLabel">Select a Theme</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4 mt-3">
                                        <a href="edit_them.php?them=default">
                                            <img src="../../Views/assets/img/thems/default.png" class="theme-img"
                                                alt="Default Theme">
                                        </a>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <a href="edit_them.php?them=green-theme">
                                            <img src="../../Views/assets/img/thems/green-theme.png" class="theme-img"
                                                alt="Green Theme">
                                        </a>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <a href="edit_them.php?them=dark-theme">
                                            <img src="../../Views/assets/img/thems/dark-theme.png" class="theme-img"
                                                alt="Dark Theme">
                                        </a>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <a href="edit_them.php?them=blue-theme">
                                            <img src="../../Views/assets/img/thems/blue-theme.png" class="theme-img"
                                                alt="Blue Theme">
                                        </a>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <a href="edit_them.php?them=red-theme">
                                            <img src="../../Views/assets/img/thems/red-theme.png" class="theme-img"
                                                alt="Red Theme">
                                        </a>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <a href="edit_them.php?them=light-theme">
                                            <img src="../../Views/assets/img/thems/light-theme.png" class="theme-img"
                                                alt="Light Theme">
                                        </a>
                                    </div>
                                    <div class="col-4 mt-3">
                                        <a href="edit_them.php?them=gold-theme">
                                            <img src="../../Views/assets/img/thems/gold-theme.png" class="theme-img"
                                                alt="Gold Theme">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update Admin</button>
            <div class="d-flex justify-content-start">
            <a href="../../Views/index.php" class="btn btn-secondary mt-3">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
        </form>
    </div>
        
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

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>