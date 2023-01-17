<?php

require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$comando = $con->prepare("SELECT * FROM bitacora");
$comando->execute();
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include "./header.php" ?>
<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col-12">
                    <h4>Bitacora
                        <a href="index.php" class="btn btn-dark me-2 float-right">regresar</a>
                    </h4>
                </div>
            </div>

            <div class="row py-3">
                <div class="col">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Codigo Cliente</th>
                                <th>FechaModificacion</th>
                                <th>Descripcion</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($resultado as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $row['ID']; ?></td>
                                    <td><?php echo $row['ClienteID']; ?></td>
                                    <td><?php echo $row['FechaModificacion']; ?></td>
                                    <td><?php echo $row['Descripcion']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</body>

</html>