<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if (!$id || !ctype_digit($id)) {
    header('Location: index.php');
    exit;
}

$idInt = (int)$id;

$stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
$stmt->bind_param("i", $idInt);
$stmt->execute();

header('Location: index.php');
exit;
