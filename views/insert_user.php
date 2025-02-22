<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Insertar Usuario</title>
</head>

<body>
    <!-- <?php var_dump($docums) ?> -->
    <h1>Insertar Usuario</h1>
    <form action="index.php?action=insertUser" method="POST" enctype="multipart/form-data">
        <label for="numero_documento">Número de Documento:</label>
        <input type="text" name="numero_documento" required><br>

        <label for="tipo_documento">Tipo de Documento:</label>
        <select name="tipo_documento" id="">
            <?php foreach ($docums as $docum): ?>
                <option value="<?= $docum['id']; ?>"><?= $docum['nomTipDocum']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" required><br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto" required><br>

        <input type="submit" value="Guardar">
    </form>

    <form action="index.php?action=dashboard" method="post">
        <button type="submit" name="action" value="dashboard">Dashboard</button>
    </form>
</body>

</html>