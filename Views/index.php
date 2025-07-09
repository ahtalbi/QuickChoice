<?php

include '../Models/Config/config.php';
include 'components/Modals.php';

// Initialize the $imge variable
$imge = '';

$sql3 = "SELECT image FROM admin WHERE id = $id";
$imgResult = $conn->query($sql3);

if ($imgResult) {
  if ($imgResult->num_rows > 0) {
    while ($row = $imgResult->fetch_assoc()) {
      // Check if 'image' key exists
      if (isset($row["image"])) {
        $imge = $row["image"];
      } else {
        echo "Key 'image' does not exist in the result.";
      }
    }
  } else {
    echo "No results found.";
  }
} else {
  echo "Error: " . $conn->error;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard - Quick Choice</title>
    <link href="assets/img/all/logo-menu.ico" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>


<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-2" href="index.php"><img src="assets/img/all/logo-menu.ico" height="30" width="30" style="border-radius: 50%;" alt="">  Quick Choice Menu</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><img style="
                     width: 40px;
                     height: 40px;
                     border-radius: 50%;
                     float: left;
                     border: 5px solid var(--menu-item-border);
                     object-fit: cover;
                     display: block;     " src="assets/img/profiles/<?php echo $imge;?>" ></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!"><b><?php echo $_SESSION['username'] ?></b></a></li>
                    <li><a class="dropdown-item" href="../Models/edit/edit_profile.php">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="../Models/auth/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <button type="button" class="btn btn-danger col-10 m-2 text-center" data-bs-toggle="modal"
                            data-bs-target="#New_Cat">
                            <i class="fas fa-plus"></i> Nouvelle Catégorie
                        </button>

                        <button type="button" class="btn btn-secondary col-10 m-2 text-center" data-bs-toggle="modal"
                            data-bs-target="#Sup_Cat">
                            <span><i class="fas fa-trash"></i> Supprimer Catégorie</span>
                        </button>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body justify-content-between d-flex">
                                    <h5><i class="fas fa-pizza-slice"></i> Repas</h5>
                                    <h5>
                                        <?php
                                        $repas = "SELECT COUNT(*) FROM meals WHERE id_from_admin = $id";
                                        $result_repas = mysqli_query($conn, $repas);
                                        $row_repas = mysqli_fetch_row($result_repas);
                                        echo $row_repas[0];
                                        ?>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body justify-content-between d-flex">
                                    <h5><i class="fas fa-list"></i> Catégories</h5>
                                    <h5>
                                        <?php
                                        $cat = "SELECT COUNT(*) FROM categories WHERE id_from_admin = $id";
                                        $result_cat = mysqli_query($conn, $cat);
                                        $row_cat = mysqli_fetch_row($result_cat);
                                        echo $row_cat[0];
                                        ?>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body d-flex justify-content-between">
                                    <h5><i class="fas fa-eye"></i> Views de Menu</h5>
                                    <h5>
                                        <?php
                                        $cat = "SELECT COUNT(*) FROM menu WHERE id_from_admin = $id";
                                        $result_cat = mysqli_query($conn, $cat);
                                        $row_cat = mysqli_fetch_row($result_cat);
                                        echo $row_cat[0];
                                        ?>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <button type="button"
                                class="card bg-danger text-white mb-4 btn d-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#Partager" style="height:65px ; width:100%;">
                                <span><i class="fas fa-qrcode"></i> Partager QR</span>
                            </button>
                        </div>
                    </div>


                    <div class="text-end">
                        <button type="button" class="btn btn-danger mt-3 mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="fas fa-plus"></i> Ajouter
                        </button>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>image</th>
                                        <th>Name</th>
                                        <th>description</th>
                                        <th>Prix</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>image</th>
                                        <th>Name</th>
                                        <th>description</th>
                                        <th>Prix</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $meal = "SELECT * FROM meals WHERE id_from_admin = $id";
                                    $result = mysqli_query($conn, $meal);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id_meal = $row['id'];
                                        $img = $row['img'];
                                        $name = $row['name'];
                                        $description = $row['discretion'];
                                        $price = $row['prix'];
                                        ?>
                                        <tr>
                                            <td>
                                                <img src="assets/img/meals/<?php echo $img; ?>"
                                                    style="
  width: 70px;
  height: 70px;
  border-radius: 50%;
  float: left;
  border: 5px solid var(--menu-item-border);
  object-fit: cover; 
  display: block;     

">
                                            </td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td><?php echo $price; ?></td>
                                            <td class="text-center">
                                                <a href="../Models/delet/delete_meal.php?id=<?php echo $id_meal; ?>"
                                                    class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="../Models/edit/edit_meal.php?id=<?php echo $id_meal; ?>"
                                                    class="btn btn-secondary">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Ahmed & Driss</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const qrLink = 'http://localhost/QuickChoice/Views/menuC/View/index.php?id=<?php echo $id; ?>';
            const qrcodeContainer = document.getElementById('qrcode');
            const qrLinkInput = document.getElementById('qr-link');
            const copyLinkBtn = document.getElementById('copy-link-btn');
            const downloadSvgBtn = document.getElementById('download-svg-btn');
            const downloadPdfBtn = document.getElementById('download-pdf-btn');
            const printBtn = document.getElementById('print-btn');

            // Initialize QR code
            const qrcode = new QRCode(qrcodeContainer, {
                text: qrLink,
                width: 250,
                height: 250,
            });

            qrLinkInput.value = qrLink;

            copyLinkBtn.addEventListener('click', function () {
                qrLinkInput.select();
                document.execCommand('copy');
                alert('Link copied to clipboard!');
            });

            document.getElementById('Partager').addEventListener('shown.bs.modal', function () {
                qrcode.makeCode(qrLink);
            });

            // Download as SVG
            downloadSvgBtn.addEventListener('click', function () {
                const svg = qrcodeContainer.querySelector('canvas').toDataURL('image/png');
                const link = document.createElement('a');
                link.href = svg;
                link.download = 'qrcode.png';
                link.click();
            });

            // Download as PDF
            downloadPdfBtn.addEventListener('click', function () {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();
                const qrCanvas = qrcodeContainer.querySelector('canvas');
                const qrDataUrl = qrCanvas.toDataURL('image/png');

                doc.addImage(qrDataUrl, 'PNG', 15, 40, 180, 180);
                doc.save('qrcode.pdf');
            });

            // Print QR code
            printBtn.addEventListener('click', function () {
                const printWindow = window.open('', '_blank');
                printWindow.document.write('<html><head><title>Print QR Code</title></head><body>');
                printWindow.document.write('<img src="' + qrcodeContainer.querySelector('canvas').toDataURL() + '"/>');
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            });
        });
    </script>
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
