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
        <h1>✨¡Bienvenido a la comparacion de numeros!😃</h1><br> 
    </div>
    <div class="contenido">
        <h2>Aqui estan los 50 numeros a comparar: 👀👀</h2>
        <?php
            if( !isset($_SESSION['nums']) ) {
                $_SESSION['nums'] = [];

                for( $i = 0; $i < 50; $i++ ) {
                    $num = rand(1, 100);
                    $_SESSION['nums'][] = $num; 
                }
            }
        ?>
        <?php
            $num_g = $_SESSION['nums'];
            echo "<p>";
            for( $i = 0; $i < 50; $i++ ) {
                if( $i % 20 === 0 ) 
                    echo "<br>";
                if( $i === 49 )
                    echo $num_g[$i].".";
                else 
                    echo $num_g[$i].", ";
                }
                echo "</p>";
        ?>
        <form action="" method="POST">
            <button type="submit" name="calcular">Sacar mayores</button>
        </form>
        <br>
        <?php 
            if( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calcular']) ) { 
                $nums_g = $_SESSION['nums'];
                rsort($nums_g);
                echo "<h3> Los 3 numeros mas grandes del arreglo son: </h3>";
                echo "<h5>". $nums_g[0] ." ". $nums_g[1] ." ". $nums_g[2] ."</h5>";
            }
        ?>

        <a href="?action=nuevo">Recargar</a>
        <?php
            if( isset($_POST['reiniciar']) || isset($_GET['action']) && $_GET['action'] == 'nuevo' ) {
                unset($_SESSION['nums']); 
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
        ?>
    </div>
</body>
</html>