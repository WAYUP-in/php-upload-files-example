<?php

$filePath = __DIR__ . "/../{$_POST["file_path"]}";

if (file_exists($filePath)) {
    unlink($filePath);
}

header("Location: /");