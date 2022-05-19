<?php
require_once('../Controlador/controladorProducto.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Productos</title>
</head>
<body>
    <a href="../controlador/controladorProducto.php?vista=registrarProducto.html"> <strong>Registrar</strong> </a>
    <h1 align="center">Productos</h1>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listaProducto as $Producto){
                    echo "<tr>";
                    echo "<td>".$Producto['idProducto']."</td>";
                    echo "<td>".$Producto['nombre']."</td>";
                    echo "<td>$".number_format($Producto['precio'],2,",",".")."</td>";
                    echo "<td>
                <form id='frmProducto$Producto[idProducto]' method = 'POST' action = '../controlador/controladorProducto.php'>
                    <input type ='hidden' name='idProducto' value=".$Producto['idProducto']." />                    
                    <button type= 'submit' name= 'Editar'>Editar</button>
                    <input type='hidden' name= 'Eliminar'/>
                    <button type='button' onclick='validarEliminacion($Producto[idProducto])' name='Eliminar'>Eliminar</button>
                    </form>
                    </td>";
                    echo "</tr>";
                }
            ?>
            
        </tbody>
    </table>
    <script>
        function validarEliminacion(idProducto){
            if(confirm('¿Realmente desea eliminar?')){
                //document.frmProducto.submit();
                document.getElementById('frmProducto'+idProducto).submit();
            }
        }

    </script>
</body>
</html>