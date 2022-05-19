<?php

require_once('../Controlador/controladorCategoria.php');
$categoria = $controladorCategoria->buscarCategoria($_REQUEST['idCategoria']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../Controlador/controladorCategoria.php" method="POST">
        <label>Id:</label>
        <input type="number" name="idCategoria" id="idCategoria" value="<?php echo $categoria->getidCategoria(); ?>"readonly />
        <br>
        <label>Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $categoria->getnombre(); ?>" />
        <br>
        <button type="submit" name="Actualizar">Actualizar</button>
        
    </form>
</body>
</html>