<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario por Numero de Documento</title>
</head>
<body>
    <h1>Buscar Usuario Por Numero de Documento</h1>

    <form action="index.php?action=searchUserByNumberDocum" method="get">
        <input type="hidden" name="action" value="searchUserByNumberDocum">
        <label for="">Numero de Documento</label>
        <input type="text" name="numero_documento" id="">
        <input type="submit" value="Buscar">
    </form>

    <h2>Lista de Usuarios</h2>
    
        <table border="1">
            <thead>
            <tr>
                <th>Numero de Documento</th>
                <th>Tipo de Docuemnto</th>
                <th>Nombre</th>
                <th>Telefono</th>
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
                    <td><img src="photo/<?= $user['foto']; ?>" width="100" alt="foto"></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <form action="index.php?action=dashboard" method="POST">
            <button type="submit" name="action" value="dashboard">Dashboard</button>
        </form>
</body>
</html>