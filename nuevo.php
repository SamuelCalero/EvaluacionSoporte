<!DOCTYPE html>
<html lang="en">

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

                        <div class="col-md-4">
                            <label for="Nombre" class="form-label">Nombre</label>
                            <input type="text" id="Nombre" name="Nombre" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="Apellido" class="form-label">Apellido</label>
                            <input type="text" id="Apellido" name="Apellido" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="DUI" class="form-label">DUI</label>
                            <input type="text" id="DUI" name="DUI" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="Telefono" class="form-label">Telefono</label>
                            <input type="number" id="Telefono" name="Telefono" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="Direccion" class="form-label">Direccion</label>
                            <input type="text" id="Direccion" name="Direccion" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="stock" class="form-label">Departamento</label>
                            <input type="text" id="Departamento" name="Departamento" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="stock" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" id="FechaNacimiento" name="FechaNacimiento" class="form-control">
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