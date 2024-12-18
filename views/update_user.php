<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
</head>
<body>

    <h1>Actualizar Usuario</h1>

    <form action="index.php?action=actualizar" method="POST" enctype="multipart/form-data">

        <?php foreach($users as $user): ?>

        <input type="hidden" name="id" value="<?= $user['id']; ?>">

        <label for="">Numero de Documento</label>
        <input type="text" name="numero_documento" id="" value="<?= $user['numero_documento']; ?>"><br>

        <!-- <label for="">Tipo de Documento</label>
        <input type="text" name="tipo_documento" id=""><br> -->

        <label for="tipo_documento">Tipo de Documento:</label>
        <select name="tipo_documento" id="">
        <?php foreach ($docums as $docum): ?>
            <option value="<?= $docum['id']; ?>"><?= $docum['nomTipDocum']; ?></option>
        <?php endforeach; ?> 
        </select><br>

        <label for="">Nombre</label>
        <input type="text" name="nombre" id="" value="<?= $user['nombre']; ?>"><br>

        <label for="">Telefono</label>
        <input type="text" name="telefono" id="" value="<?= $user['telefono']; ?>"><br>

        <label for="">Foto</label>
        <img src="photo/<?= $user['foto']; ?>" alt="Foto Actual" width="100">
        <input type="hidden" name="foto_actual" value="<?= $user['foto']; ?>"><br>

        <label for="">Nueva Foto (Opcional)</label>
        <input type="file" name="foto" id=""><br>

        <input type="submit" value="Actualizar">
        <?php endforeach; ?>
    </form>

    <form action="index.php?action=dashboard" method="POST">
        <button type="submit" name="action" value="dashboard">Dashboard</button>
    </form>

</body>
</html>