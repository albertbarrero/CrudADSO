<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Usuario por Nombre</title>
</head>
<body>
    <h1>Buscar Usuario por Nombre</h1>
    <form action="index.php?action=searchUserByName" method="get">
        <input type="hidden" name="action" value="searchUserByName">
        <label for="name">Nombre:</label>
        <input type="text" name="name" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if (isset($users) && count($users) > 0): ?>
        <h2>Resultados de la búsqueda:</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Número de Documento</th>
                    <th>Tipo de Documento</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['numero_documento']; ?></td>
                    <td><?= $user['tipo_documento']; ?></td>
                    <td><?= $user['nombre']; ?></td>
                    <td><?= $user['telefono']; ?></td>
                    <td><img src="photo/<?= $user['foto']; ?>" width="100" alt="Foto"></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (isset($users)): ?>
        <p>No se encontraron usuarios con ese nombre.</p>
    <?php endif; ?>

    <form action="index.php?action=dashboard" method="post" enctype="multipart/form-data">
        <button type="submit" name="action" value="dashboard">Dashboard</button>
    </form> 
</body>
</html>