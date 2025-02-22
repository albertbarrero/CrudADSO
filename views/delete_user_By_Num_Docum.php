<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuario por Numero de Documento</title>
</head>

<body>
    <h1>Eliminar Usuario por Numero de Documento</h1>
    <form action="index.php?action=eliminar" method="get">
        <input type="hidden" name="action" value="eliminar">
        <label for="numero_documento">numero_documento:</label>
        <input type="text" name="numero_documento" required>
        <input type="submit" value="Buscar">
    </form>

    <h1>Lista de Usuarios</h1>
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

    <form action="index.php?action=dashboard" method="post" enctype="multipart/form-data">
        <button type="submit" name="action" value="dashboard">Dashboard</button>
    </form>
</body>

</html>