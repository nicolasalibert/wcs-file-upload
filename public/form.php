<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>⬆️ Upload</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="final.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="imageUpload">Upload a profile image</label>
            <input type="file" name="avatar" id="imageUpload">
        </div>

        <input type="hidden" name="action" value="upload">
        <input type="submit" value="Send">
    </form>
</body>
</html>