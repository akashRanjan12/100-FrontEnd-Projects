<?php
session_start();
include '../../config/configuration.php'; // DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
    $usermail = $_SESSION['useremail'];

    // Process the uploaded image
    $imageName = time() . '_' . basename($_FILES['profile_image']['name']);
    $targetDir = '../../Uploads/';
    $targetFile = $targetDir . $imageName;

    // Ensure directory exists
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile)) {
        // Update the user's profile image in the database
        $stmt = $connection->prepare("UPDATE userdetails SET profile_image = ? WHERE email = ?");
        $stmt->bind_param("ss", $imageName, $usermail);
        $stmt->execute();
        $stmt->close();

        // Return success response with the image URL
        echo json_encode([
            'success' => true,
            'imageUrl' => "../../Uploads/$imageName"
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Image upload failed.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'No file uploaded or an error occurred.'
    ]);
}
?>
