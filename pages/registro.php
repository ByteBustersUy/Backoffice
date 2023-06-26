<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/normalize.css">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Registro</title>
</head>

<body>
    <h1>Registro de usuario</h1>
    <form action="./src/modules/auth/registrar.php" method="post">
        <input type="text" name="user" placeholder="Usuario">
        <input type="password" name="pass" placeholder="Contraseña">
        <label>Administrador<input type="checkbox" name="rol" value="Admin"></label>
        <label>Vendedor<input type="checkbox" name="rol" value="Vendedor"></label>
        <input type="submit" value="Registrar">
    </form>
</body>

</html>