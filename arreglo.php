<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>arreglo</title>
</head>
<body>
    <div class = "tope">
        <h1>¡Bienvenido a la comparacion de numeros!</h1><br> 
    </div>
    <div class="contenido">
        <h2>Aqui estan los 50 numeros a comparar: 👀👀</h2>
        <?php
            $_SESSION['mis_numeros'] = [];

            echo "<p>";
            for( $i = 0; $i < 50; $i++ ) {
                $num = rand(1, 100);
                $_SESSION['mis_numeros'][] = $num; 
                if( $i % 20 === 0 ) 
                    echo "<br>";
                if( $i === 49 )
                    echo $num.".";
                else 
                    echo $num .", ";
            }
            echo "</p>";
        ?>
        
    </div>
</body>
</html>