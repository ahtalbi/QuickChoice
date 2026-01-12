<div class="modal fade w-100" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3 col-xl-12 col-sm-4">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert New Meal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../Models/insert/insert_meal.php" method="POST" enctype="multipart/form-data">
                <div class="col-12 row mb-3 justify-content-center">
                    <div class="col-sm-10 col-xl-4 row text-center justify-content-center align-items-center">
                        <label for="imgs">
                            <img class="col-6" style="border-radius:50%; width:100px; height:100px; margin-top:20px"
                                src="https://via.placeholder.com/50" alt="">
                        </label>
                        <input type="file" name="img" id="imgs" style="visibility:hidden">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="name"><b>Name</b></label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="col-6 mb-3 text-start">
                    <label for="post"><b>Catégorie :</b></label>
                    <select id="post" class="isEmpty form-control m-2" name="cat" required>
                        <option value="">Sélectionner</option>
                        <?php
                        $sql1 = "SELECT * FROM categories WHERE id_from_admin = $id";
                        $sel = $conn->query($sql1);
                        while ($rowSel = mysqli_fetch_assoc($sel)) {
                            echo '<option value="' . $rowSel['id'] . '">' . $rowSel['name'] . '</option>';
                        } ?>
                    </select>

                </div>

                <div class="form-group mb-4">
                    <label for="description"><b>Description</b></label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="price"><b>Price</b></label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="submitForms btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- new Categories -->

<div class="modal fade w-100" id="New_Cat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3 col-xl-12 col-sm-4">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="../Models/insert/insert_cat.php" method="post">
                <div class="form-group mb-4">
                    <label for="Categorie"><b>Name Categorie</b></label>
                    <input type="text" class="form-control" id="Categorie" name="Categorie" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="submitForms btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- sub cat -->

<div class="modal fade" id="Sup_Cat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <form action="../Models/delet/delete_cat.php" method="post" id="Sup_Cat_form">
                    <div class="col-6 mb-3 text-start">
                        <label for="post">categories:</label>
                        <select id="post" class="isEmpty form-control m-2" name="section_P_S" required>
                            <option value="">Sélectionner</option>
                            <?php
                            $sql1 = "SELECT * FROM categories WHERE id_from_admin = '$id'";

                            $sel = $conn->query($sql1);
                            while ($rowSel = mysqli_fetch_assoc($sel)) {
                                echo '<option value="' . $rowSel['id'] . '">' . $rowSel['name'] . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="Partager" tabindex="-1" aria-labelledby="PartagerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PartagerLabel">Share QR Code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <!-- QR Code Container -->
                <div class="d-flex justify-content-center align-items-center">
                    <div id="qrcode" class="mb-3"></div>
                </div>

                <!-- Copy Link Button -->
                <input type="text" id="qr-link" class="form-control mb-3" readonly>
                <button type="button" class="btn btn-primary" id="copy-link-btn">Copy Link</button>
                <button type="button" class="btn btn-secondary" id="download-svg-btn">Download as SVG</button>
                <button type="button" class="btn btn-secondary" id="download-pdf-btn">Download as PDF</button>
                <button type="button" class="btn btn-secondary" id="print-btn">Print QR Code</button>
            </div>
        </div>
    </div>
</div>