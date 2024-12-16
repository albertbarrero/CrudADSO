<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta por nombre</title>
</head>
<body>
    <h1>Buscar Usuario Por Nombre</h1>

    <form action="index.php?action=searchUserByName" method="get">
        <input type="hidden" name="action" value="searchUserByName">
        <label for="">Nombre</label>
        <input type="text" name="name" id="">
        <input type="submit" value="Buscar">
    </form>

    <?php if (isset($users) && count($users)>0): ?>
        <h2>Resultado de la busqueda</h2>
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

        <?php elseif(isset($users)):?>
            <p>No se encuentran usuarios con esos datos!!!</p>
        <?php endif; ?>

        <form action="index.php?action=dashboard" method="POST">
            <button type="submit" name="action" value="dashboard">Dashboard</button>
        </form>
</body>
</html>