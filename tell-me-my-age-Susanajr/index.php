<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcula tu Edad</title>
</head>
<body>
    <h1>Calcula tu Edad</h1>
    <form method="post" action="calcularedad.php">
        <label for="fecha_nacimiento">Introduce tu fecha de nacimiento (dd/mm/yyyy):</label>
        <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" required>
        <button type="submit">Calcular Edad</button>
    </form>
</body>
</html>
