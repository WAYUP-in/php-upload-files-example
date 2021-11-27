<?php

$uploadDirFull = __DIR__ . "/../uploads";
$mb = 1048576;
$maxMb = 2;
$types = ["image/jpeg", "image/png"];

$image = $_FILES["image"];

if (!in_array($image["type"], $types)) {
    echo "Incorrect file type";
    die();
}

if ($image["size"] > $mb * $maxMb) {
    echo "Max size {$maxMb}MB";
    die();
}

if (!is_dir($uploadDirFull)) {
    mkdir($uploadDirFull);
}

$storePath = "$uploadDirFull/" . uniqid() . $image['name'];

if (move_uploaded_file($image["tmp_name"], $storePath)) {
    header("Location: /");
} else {
    echo "Error upload file";
}



