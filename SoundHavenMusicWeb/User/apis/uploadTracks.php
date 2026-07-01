<?php
session_start();
header('Content-Type: application/json');
include '../../config/configuration.php'; // DB connection

try {
    // Check session
    if (!isset($_SESSION['useremail'])) {
        throw new Exception("User not logged in.");
    }

    // Get user ID using session email
    $email = $_SESSION['useremail'];
    $stmt = $connection->prepare("SELECT id FROM userdetails WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        throw new Exception("User not found.");
    }
    $user = $result->fetch_assoc();
    $user_id = $user['id'];
    $stmt->close();

    // Validate upload
    if (!isset($_FILES['music_path']) || $_FILES['music_path']['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("No valid music file uploaded.");
    }

    // Generate filename and target path
    $fileName = time() . '_' . basename($_FILES['music_path']['name']);
    $targetDir = '../../Uploads/';
    $targetFile = $targetDir . $fileName;

    // Create directory if needed
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Move file
    if (!move_uploaded_file($_FILES['music_path']['tmp_name'], $targetFile)) {
        throw new Exception("Failed to move uploaded file.");
    }

    // Sanitize inputs
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    if (empty($title) || empty($description)) {
        throw new Exception("Title or description missing.");
    }

    // Insert into DB
    $stmt = $connection->prepare("INSERT INTO usercontent (user_id, music_path, title, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $fileName, $title, $description);

    if (!$stmt->execute()) {
        throw new Exception("Database error: " . $stmt->error);
    }

    echo json_encode([
        // 'success' => true,
        // 'message' => 'Music uploaded successfully!',
        // 'fileUrl' => '../../Uploads/' . $fileName
          'success' => true,
    'music_path' => 'path/to/music.mp3',
    'title' => $title,
    'description' => $description
    ]);
    exit;

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
    exit;
}
?>
