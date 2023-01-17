<?php

require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$ClienteID = $_GET['ClienteID'];

$query = $con->prepare("SELECT * from clientes WHERE ClienteID = :ClienteID");
$query->execute(['ClienteID' => $ClienteID]);
$num = $query->rowCount();
if ($num > 0) {
    $row = $query->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: index.php");
}

?>

<?php include "./header.php" ?>
<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4>Nuevos registro</h4>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="row g-3" method="POST" action="guarda.php" autocomplete="off">
                        <input type="hidden" id="ClienteID" name="ClienteID" value="<?php echo $ClienteID; ?>">
                        <div class="col-md-4">
                            <label for="ClienteID" class="form-label">Código</label>
                            <input type="text" id="ClienteID" name="ClienteID" class="form-control" value="<?php echo $row['ClienteID']; ?>" readonly autofocus>
                        </div>

                        <div class="col-md-8">
                            <label for="Nombre" class="form-label">Nombre</label>
                            <input type="text" id="Nombre" name="Nombre" class="form-control" value="<?php echo $row['Nombre']; ?>" required>
                        </div>
                        <div class="col-md-8">
                            <label for="Apellido" class="form-label">Apellido</label>
                            <input type="text" id="Apellido" name="Apellido" class="form-control" value="<?php echo $row['Apellido']; ?>" required>
                        </div>
                        <div class="col-md-8">
                            <label for="DUI" class="form-label">DUI</label>
                            <input type="text" id="DUI" name="DUI" class="form-control" value="<?php echo $row['DUI']; ?>" required>
                        </div>
                        <div class="col-md-8">
                            <label for="Telefono" class="form-label">Telefono</label>
                            <input type="number" id="Telefono" name="Telefono" class="form-control" value="<?php echo $row['Telefono']; ?>" required>
                        </div>
                        <div class="col-md-8">
                            <label for="Direccion" class="form-label">Dirección</label>
                            <input type="text" id="Direccion" name="Direccion" class="form-control" value="<?php echo $row['Direccion']; ?>" required>
                        </div>
                        <div class="col-md-8">
                            <label for="Departamento" class="form-label">Departamento</label>
                            <input type="text" id="Departamento" name="Departamento" class="form-control" value="<?php echo $row['Departamento']; ?>" required>
                        </div>
                        <div class="col-md-8">
                            <label for="FechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" id="Nombre" name="FechaNacimiento" class="form-control" value="<?php echo $row['FechaNacimiento']; ?>" required>
                        </div>

                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="index.php">Regresar</a>
                            <button type="submit" class="btn btn-primary" name="registro">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>