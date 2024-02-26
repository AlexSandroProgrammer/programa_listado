<?php

if (!isset($_SESSION['username']) || !isset($_SESSION['rol_user'])) {
    echo "<script>alert('Debes iniciar sesión');</script>";
    header("Location:../../module/");
    exit; // Agregar exit para asegurar que el script se detenga
}
