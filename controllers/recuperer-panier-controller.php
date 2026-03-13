<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require "../connexion-bdd.php";
header('Content-Type: application/json');

if (empty($_SESSION['panier'])) {
    echo json_encode(['success' => true, 'panier' => []]);
    exit;
}

try {
    $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $ids = array_map('intval', $_SESSION['panier']);
    $uniqueIds = array_unique($ids);
    $placeholders = implode(',', array_fill(0, count($uniqueIds), '?'));

    $stmt = $bdd->prepare("SELECT * FROM produits WHERE id IN ($placeholders)");
    $stmt->execute(array_values($uniqueIds));

    $map = [];
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $p) {
        $map[$p['id']] = $p;
    }

    $panier = [];
    foreach ($ids as $index => $id) {
        if (isset($map[$id])) {
            $item = $map[$id];
            $item['cart_index'] = $index;
            $panier[] = $item;
        }
    }

    echo json_encode(['success' => true, 'panier' => $panier]);
} catch (PDOException $e) {
    error_log('[smash-food] Erreur récupération panier : ' . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Une erreur technique est survenue.']);
}
