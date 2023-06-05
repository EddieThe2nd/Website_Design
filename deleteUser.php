<?php
require('./config/server.php');

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $stmt = $connection->prepare("DELETE FROM `users` WHERE user_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: AdminUsers.php");
        exit;
    } else {
        echo "Failed to delete user.";
    }
} else {
    echo "Invalid user ID.";
}
?>
