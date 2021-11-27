<?php

$uploadDirFull = __DIR__ . "/../uploads";
$mb = 1048576;
$maxMb = 2;
$types = ["image/jpeg", "image/png"];

$images = $_FILES["images"];
$normalizeImages = [];

foreach ($images as $key => $item) {
    foreach ($item as $index => $val) {
        $normalizeImages[$index][$key] = $val;
    }
}

foreach ($normalizeImages as $normalizeImage) {
    if (!in_array($normalizeImage["type"], $types)) {
        echo "Incorrect file type";
        die();
    }

    if ($normalizeImage["size"] > $mb * $maxMb) {
        echo "Max size {$maxMb}MB";
        die();
    }

    if (!is_dir($uploadDirFull)) {
        mkdir($uploadDirFull);
    }

    $storePath = "$uploadDirFull/" . uniqid() . $normalizeImage['name'];

    if (move_uploaded_file($normalizeImage["tmp_name"], $storePath)) {
        //
    } else {
        echo "Error upload file";
    }
}

header("Location: /");
