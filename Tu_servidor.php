<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadDir = 'uploads/'; // Directorio donde se guardarán los archivos subidos

    // Crear el directorio si no existe
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadFile = $uploadDir . basename($_FILES['apkFile']['name']);

    // Verificar si el archivo es un APK
    if (pathinfo($uploadFile, PATHINFO_EXTENSION) != 'apk') {
        echo "Solo se permiten archivos APK.";
        exit;
    }

    // Mover el archivo subido al directorio de destino
    if (move_uploaded_file($_FILES['apkFile']['tmp_name'], $uploadFile)) {
        echo "El archivo ha sido subido correctamente.";
    } else {
        echo "Hubo un error al subir el archivo.";
    }
}
?>
