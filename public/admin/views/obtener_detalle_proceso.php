<?php
require_once("../../../database/connection.php");
$db = new Database();
$connection = $db->conectar();

// Obtenemos el id del procedimiento 

$id_procedimiento = $_GET['id'] ?? null;

if ($id_procedimiento) {
    // Consulta SQL para obtener los detalles del procedimiento
    $query = "SELECT * FROM procedimiento INNER JOIN proceso ON procedimiento.Id_Proceso = proceso.Id_Proceso AND procedimiento.Id_Proceso = proceso.Id_Proceso WHERE Id_Procedimiento = :id_procedimiento";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id_procedimiento', $id_procedimiento);
    $stmt->execute();
    $procedimiento = $stmt->fetch(PDO::FETCH_ASSOC);

    // Devolver los detalles del procedimiento en formato JSON
    echo json_encode([
        'nombre_procedimiento' => $procedimiento['Nombre_Proceso'],
        // Agrega más campos aquí si es necesario
    ]);
} else {
    // Si no se proporciona un ID de procedimiento válido, devolver un mensaje de error
    echo json_encode(['error' => 'ID de procedimiento no válido']);
}
