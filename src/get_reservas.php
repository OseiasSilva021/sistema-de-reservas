<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM reservas");
$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($reservas);
?>
