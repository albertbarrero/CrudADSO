<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Usuario</title>
</head>
<body>
    <h1>Actualizar Usuario</h1>
    <?php var_dump($users); 
    echo "Hola a todos"?>
    <form action="index.php?action=actualizar" method="POST" enctype="multipart/form-data">

        <?php foreach($users as $user):  ?>

        <input type="hidden" name="id" value="<?= $user['id']; ?>">

        <label for="numero_documento">Número de Documento:</label>
        <input type="text" name="numero_documento" value="<?= $user['numero_documento']; ?>"><br>
        
        <label for="tipo_documento">Tipo de Documento:</label>
        <select name="tipo_documento" id="">
        <?php foreach ($docums as $docum): ?>
            <option value="<?= $docum['id']; ?>"><?= $docum['nomTipDocum']; ?></option>
        <?php endforeach; ?> 
        </select><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= $user['nombre']; ?>"><br>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" value="<?= $user['telefono']; ?>"><br>
               
        <label>Foto Actual:</label>
        <img src="photo/<?= $user['foto'] ?>" alt="Foto actual" width="100"><br>
        <input type="hidden" name="foto_actual" value="<?= $user['foto'] ?>">

        <label for="nFoto">Nueva Foto (opcional):</label><br>
        <input type="file" name="foto" id="nFoto"><br>

        <input type="submit" value="Guardar">

        <?php endforeach;  ?>
    </form>

    <form action="index.php?action=dashboard" method="post">
        <button type="submit" name="action" value="dashboard">Dashboard</button>
    </form>
</body>
</html>