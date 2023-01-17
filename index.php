<?php

require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$comando = $con->prepare("SELECT * FROM clientes");
$comando->execute();
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include "./header.php" ?>
<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col-12">
                    <h4>Clientes
                        <a href="nuevo.php" class="btn btn-primary float-right"><i class="fa-solid fa-user-plus"></i></a>
                    </h4>
                </div>
            </div>

            <div class="row py-3">
                <div class="col">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>DUI</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Departamento</th>
                                <th>Fecha de Nacimiento</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($resultado as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $row['ClienteID']; ?></td>
                                    <td><?php echo $row['Nombre']; ?></td>
                                    <td><?php echo $row['Apellido']; ?></td>
                                    <td><?php echo $row['DUI']; ?></td>
                                    <td><?php echo $row['Telefono']; ?></td>
                                    <td><?php echo $row['Direccion']; ?></td>
                                    <td><?php echo $row['Departamento']; ?></td>
                                    <td><?php echo $row['FechaNacimiento']; ?></td>
                                    <td><a href="editar.php?ClienteID=<?php echo $row['ClienteID']; ?>" class="btn btn-outline-dark"><i class="fa-solid fa-user-pen"></i></i></a></td>
                                    <td><a href="eliminar.php?ClienteID=<?php echo $row['ClienteID']; ?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a></td>
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