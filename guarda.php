<?php

require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

if (isset($_POST['ClienteID'])) {

    $ClienteID = $_POST['ClienteID'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $DUI = $_POST['DUI'];
    $Telefono = $_POST['Telefono'];
    $Direccion = $_POST['Direccion'];
    $Departamento = $_POST['Departamento'];
    $FechaNacimiento = $_POST['FechaNacimiento'];
    $fecha_mysql = DateTime::createFromFormat('Y-m-d', $FechaNacimiento);
    $fecha_formateada = $fecha_mysql->format('Y-m-d');
    $query = $con->prepare("UPDATE clientes SET Nombre=?,Apellido=?,DUI=?,Telefono=?,Direccion=?,Departamento=?,FechaNacimiento=? where ClienteID=?");
    $resultado = $query->execute(array($Nombre, $Apellido, $DUI, $Telefono,$Direccion,$Departamento,$FechaNacimiento,$ClienteID));

    if ($resultado) {
        $correcto = true;
    }
}else {
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $DUI = $_POST['DUI'];
    $Telefono = $_POST['Telefono'];
    $Direccion = $_POST['Direccion'];
    $Departamento = $_POST['Departamento'];
    $FechaNacimiento = $_POST['FechaNacimiento'];
    $fecha_mysql = DateTime::createFromFormat('Y-m-d', $FechaNacimiento);
    $fecha_formateada = $fecha_mysql->format('Y-m-d');

    $query = $con->prepare("INSERT INTO clientes ( Nombre,Apellido,DUI,Telefono,Direccion,Departamento,FechaNacimiento) VALUES ( :Nombre,:Apellido,:DUI,:Telefono,:Direccion,:Departamento,:FechaNacimiento)");
    $resultado = $query->execute(array( 'Nombre' => $Nombre, 'Apellido' => $Apellido, 'DUI' => $DUI, 'Telefono' => $Telefono, 'Direccion' => $Direccion, 'Departamento' => $Departamento, 'FechaNacimiento' => $FechaNacimiento));

    if ($resultado) {
        $correcto = true;
        echo $con->lastInsertId();
    }
}
?>
<?php include "./header.php" ?>
<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <?php if ($correcto) { ?>
                        <h3>Registro guardado</h3>
                    <?php } else { ?>
                        <h3>Error al guardar</h3>
                    <?php }  ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-outline-primary" href="index.php">Regresar</a>
                </div>
            </div>
        </div>
    </main>

</body>

</html>