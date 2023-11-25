<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST['action'] === 'upload') {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . uniqid() . "_" . basename($_FILES['avatar']['name']);
    
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $authorizedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $maxFileSize = 1048576;
    
        if (!in_array($extension, $authorizedExtensions)) {
            $errors[] = 'Veuillez sélectionner une image de type JPG/JPEG ou PNG.';
        }
        if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
            $errors[] = "Fichier trop lourd fréro (moins de 2Mo stp).";
        }
    
        if (empty($errors)) {
            move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
        }
    }
    else if ($_POST['action'] === 'delete') {
        if (file_exists($_POST['file'])) {
            unlink($_POST['file']);
        }
        header('Location: form.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>⬆️ Upload</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="license-card">
        <header>
            <h1>Springfield, Il</h1>
        </header>
    
        <div id="card-body">
            <div id="infos-top">
                <div id="license">LICENSE#<br>20349</div>
                <div id="birthdate">BIRTH DATE<br>4-56-87</div>
                <div id="expires">EXPIRES<br>4-45-32</div>
                <div id="class">CLASS<br>NONE</div>
            </div>
        
            <div id="main-content">
                <img src="<?= $uploadFile ?>" alt="Homer">
                <section>
                    <h2>Driver's License</h2>
                    <p>Homer Simpson</p>
                    <p>69 Old Plumtree Blvd</p>
                    <p>Springfield, Il 62701</p>
                </section>
            </div>
        </div>

        <form action="final.php" method="post">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="file" value="<?= $uploadFile ?>">
            <input type="submit" value="Delete picture">
        </form>

    </div>
</body>
</html>