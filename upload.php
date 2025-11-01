<?php
$password = "1234";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['password'] !== $password) {
        echo "Wrong password!";
        exit;
    }

    if (isset($_FILES['file'])) {
        $targetDir = "TP/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir);
        }
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo "✅ File uploaded successfully!";
        } else {
            echo "❌ Failed to upload file.";
        }
    }
} else {
    echo "Upload only via POST.";
}
?>
