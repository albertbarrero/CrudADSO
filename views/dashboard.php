<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
</head>
<body>
    <h1>DASHBOARD</h1>

    <form action="index.php?action=insertUser" method="GET">
        <button type="submit" name="action" value="insertUser">Insertar Usuario</button>
    </form>

    <form action="index.php?action=listUsers" method="GET">
        <button type="submit" name="action" value="listUsers">Consultar Usuarios</button>
    </form>

    <form action="index.php?action=searchUserByName" method="GET">
        <button type="submit" name="action" value="searchUserByName">Usuarios por Nombre</button>
    </form>

</body>
</html>