<?php

require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$ClienteID = $_GET['ClienteID'];

$query = $con->prepare("DELETE FROM clientes WHERE ClienteID=?");
$query->execute([$ClienteID]);
$numElimina = $query->rowCount();

?>
<?php include "./header.php" ?>
<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <?php if ($numElimina > 0) { ?>
                        <h3>Registro eliminado</h3>
                            
                    <?php } else { ?>
                        <h3>Error al eliminar registro</h3>
                    <?php }  ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="index.php">Regresar</a>
                </div>
            </div>
        </div>
    </main>

</body>

</html>