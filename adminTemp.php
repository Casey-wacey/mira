<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];
    
    // 1. Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Upload failed with error code: " . $file['error']);
    }

    // 2. Verify the actual MIME type securely
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    // 3. Load the image into PHP memory based on its format
    switch ($mimeType) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($file['tmp_name']);
            break;
        case 'image/png':
            $image = imagecreatefrompng($file['tmp_name']);
            // Preserve PNG transparency
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($file['tmp_name']);
            break;
        case 'image/webp':
            // Already WebP, just move it
            move_uploaded_file($file['tmp_name'], 'media/fotos/opstellingen/' . uniqid() . '.webp');
            exit("WebP uploaded successfully!");
        default:
            die("Unsupported image format.");
    }

    if (!$image) {
        die("Failed to process image.");
    }

    // 4. Create the destination folder if it doesn't exist
    $uploadDir = 'media/fotos/opstellingen/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // 5. Generate a unique filename and save as WebP (Quality: 0-100)
    $destination = $uploadDir . uniqid('img_') . '.webp';
    $quality = 80; 

    if (imagewebp($image, $destination, $quality)) {
        echo "Success! Saved as: <a href='$destination'>$destination</a>";
    } else {
        echo "Failed to convert image to WebP.";
    }

    // 6. Free up server memory
    imagedestroy($image);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="gids.css">
</head>
<body>
    <form action="adminTemp.php" method="POST" enctype="multipart/form-data">
        <label for="image">Choose an image (JPG, PNG, or GIF):</label>
        <input type="file" name="image" id="image" accept="image/jpeg, image/png, image/gif" required>
        <button type="submit">Upload & Convert</button>
    </form>
</body>
</html>

