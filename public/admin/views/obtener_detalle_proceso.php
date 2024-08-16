<?php
require_once("../../../database/connection.php");
$db = new Database();
$connection = $db->conectar();

// Obtenemos el id del procedimiento 
$id_procedimiento = $_GET['id'] ?? null;
if ($id_procedimiento) {
    // Consulta SQL para obtener los detalles del procedimiento
    $query = "SELECT * FROM procedimiento INNER JOIN proceso ON procedimiento.id_Proceso = proceso.id_proceso AND procedimiento.id_proceso = proceso.id_proceso WHERE id_procedimiento = :id_procedimiento";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id_procedimiento', $id_procedimiento);
    $stmt->execute();
    $procedimiento = $stmt->fetch(PDO::FETCH_ASSOC);

    // Devolver los detalles del procedimiento en formato JSON
    echo json_encode([
        'nombre_procedimiento' => $procedimiento['nombre_proceso'],
        // Agrega más campos aquí si es necesario
    ]);
} else {
    // Si no se proporciona un ID de procedimiento válido, devolver un mensaje de error
    echo json_encode(['error' => 'ID de procedimiento no válido']);
}
