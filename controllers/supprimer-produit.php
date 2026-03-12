<?php
if (session_status() === PHP_SESSION_NONE) session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$index = isset($data['index']) ? intval($data['index']) : -1;

if ($index < 0 || !isset($_SESSION['panier'][$index])) {
    echo json_encode(['success' => false, 'message' => 'Index invalide']);
    exit;
}

array_splice($_SESSION['panier'], $index, 1);

echo json_encode(['success' => true, 'count' => count($_SESSION['panier'])]);
