<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Usuario</title>
</head>
<body>

    <h1>INSERTAR USUARIO</h1>

    <form action="index.php?action=insertUser" method="POST" enctype="multipart/form-data">
        <label for="">Numero de Documento</label>
        <input type="text" name="numero_documento" id=""><br>

        <label for="">Tipo de Documento</label>
        <input type="text" name="tipo_documento" id=""><br>

        <label for="">Nombre</label>
        <input type="text" name="nombre" id=""><br>

        <label for="">Telefono</label>
        <input type="text" name="telefono" id=""><br>

        <label for="">Foto</label>
        <input type="file" name="foto" required><br>

        <input type="submit" value="Guardar">
    </form>

    <form action="index.php?action=dashboard" method="POST">
        <button type="submit" name="action" value="dashboard">Dashboard</button>
    </form>

</body>
</html>