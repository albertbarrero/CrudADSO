<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard </title>
</head>

<body>

    <?php

    if ($_SESSION["rol"] !== "admin" && $_SESSION["rol"] !== "empleado") {
        header("Location: index.php?action=login");
        exit();
    }

    ?>

    <h1>Dashboard</h1>

    <?php $rol = $_SESSION["rol"];
    echo "El rol es: $rol";
    echo "<br>";
    $nom = $_SESSION["nombre"];
    echo "El nombre es: $nom"
    ?>

    <form action="index.php?action=insertUser" method="GET">
        <button type="submit" name="action" value="insertUser">Insertar Usuario</button>
    </form>

    <?php if ($_SESSION["rol"] == "admin") { ?>
        <form action="index.php?action=listUsers" method="GET">
            <button type="submit" name="action" value="listUsers">Consultar Usuario</button>
        </form>
    <?php } ?>

    <form action="index.php?action=searchUserByName" method="GET">
        <button type="submit" name="action" value="searchUserByName">Consultar Usuario por Nombre</button>
    </form>
    <form action="index.php?action=openForm" method="GET">
        <button type="submit" name="action" value="openForm">Actualizar Usuario por Numero de Documento</button>
    </form>

    <form action="index.php?action=openFormDelete" method="GET">
        <button type="submit" name="action" value="openFormDelete">Eliminar Usuario por Numero de Documento</button>
    </form>

    <form action="index.php?Reporte&action=reporte" method="GET">
        <button type="submit" name="action" value="reporte">Reporte</button>
    </form>

    <form action="index.php?action=logOut" method="GET">
        <button type="submit" name="action" value="logOut">Salir</button>
    </form>


</body>

</html>