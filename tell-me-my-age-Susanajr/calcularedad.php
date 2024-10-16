<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado</h1>
    <?php
    function es_bisiesto($anio) {
        return ($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0);
    }

    function validar_fecha($fecha) {
        $partes = explode('/', $fecha);
        if (count($partes) != 3) {
            return false;
        }
        $dia = intval($partes[0]);
        $mes = intval($partes[1]);
        $anio = intval($partes[2]);
        
        if ($anio < 1900 || $anio > date("Y")) {
            return false;
        }
        
        $dias_por_mes = [31, es_bisiesto($anio) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        
        return $mes >= 1 && $mes <= 12 && $dia >= 1 && $dia <= $dias_por_mes[$mes - 1];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        
        if (!validar_fecha($fecha_nacimiento)) {
            echo "<p>Formato de fecha inválido. Por favor, introduce una fecha válida en formato dd/mm/yyyy.</p>";
        } else {
            $partes = explode('/', $fecha_nacimiento);
            $dia = intval($partes[0]);
            $mes = intval($partes[1]);
            $anio = intval($partes[2]);

            $fecha_actual = explode('/', date("d/m/Y"));
            $dia_actual = intval($fecha_actual[0]);
            $mes_actual = intval($fecha_actual[1]);
            $anio_actual = intval($fecha_actual[2]);

            $edad = $anio_actual - $anio;
            if ($mes_actual < $mes || ($mes_actual == $mes && $dia_actual < $dia)) {
                $edad--;
            }

            echo "<p>Tu edad es: $edad años.</p>";
        }
    }
    ?>
    <a href="index.php">Volver</a>
</body>
</html>
