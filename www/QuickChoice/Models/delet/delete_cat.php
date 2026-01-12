<?php

include '../Config/config.php';

if (isset($_POST['submit'])) {

    $section_P_S = $_POST['section_P_S'];

    // Validate input data
    if (empty($section_P_S) || !is_numeric($section_P_S)) {
        header("Location: ../../Views/index.php?delete_success=false");
        exit;
    }

    try {
        // Delete meals
        $query1 = "DELETE FROM `meals` WHERE id_from_admin = ? AND categorie = ?";
        $stmt1 = $conn->prepare($query1);
        $stmt1->bind_param("ii", $id, $section_P_S);
        $stmt1->execute();

        // Delete category
        $query = "DELETE FROM `categories` WHERE id_from_admin = ? AND id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $id, $section_P_S);
        $stmt->execute();

        header("Location: ../../Views/index.php?delete_success=true");
    } catch (Exception $e) {
        header("Location: ../../Views/index.php?delete_success=false");
    } finally {
        $conn->close();
    }
}

?>