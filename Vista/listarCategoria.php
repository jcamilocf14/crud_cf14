<?php
require_once('../Controlador/controladorCategoria.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Categorias</title>
</head>
<body>
    <a href="../controlador/controladorCategoria.php?vista=registrarCategoria.html"> <strong>Registrar</strong> </a>
    <h1 align="center">Categorías</h1>
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
                foreach($listaCategoria as $categoria){
                    echo "<tr>";
                    echo "<td>".$categoria['idCategoria']."</td>";
                    echo "<td>".$categoria['nombre']."</td>";
                    echo "<td>
                <form id='frmCategoria$categoria[idCategoria]' method = 'POST' action = '../controlador/controladorCategoria.php'>
                    <input type ='hidden' name='idCategoria' value=".$categoria['idCategoria']." />                    
                    <button type= 'submit' name= 'Editar'>Editar</button>
                    <input type='hidden' name= 'Eliminar'/>
                    <button type='button' onclick='validarEliminacion($categoria[idCategoria])' name='Eliminar'>Eliminar</button>
                    </form>
                    </td>";
                    echo "</tr>";
                }
            ?>
            
        </tbody>
    </table>
    <script>
        function validarEliminacion(idCategoria){
            if(confirm('¿Realmente desea eliminar?')){
                //document.frmCategoria.submit();
                document.getElementById('frmCategoria'+idCategoria).submit();
            }
        }

    </script>
</body>
</html>