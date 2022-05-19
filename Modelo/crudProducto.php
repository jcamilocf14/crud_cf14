<?php
//APLICACIONES TRANSACCIONALES 
//CRUD : CREATE=crear / READ=leer / UPDATE=modificar / DELET=eliminar

require_once('conexion.php');//Incluir el archivo conexión
class crudproducto{
    public function __construct(){
    }

    //Método para consultar todas las categorías
    //de la base de datos.
    public function listarproducto(){ //READ

      //Establecer la conexión a la base datos
      $baseDatos = Conexion::conectar();
      //Definir la sentencia sql
      $sql = $baseDatos->query('SELECT * FROM producto ORDER BY idproducto ASC ');
      //Ejecutar la consulta
      $sql->execute();
      //Cerrar la conexión
      Conexion::desconectar($baseDatos);
      //Retornar el resultado de la consulta a la tabla.
      return($sql->fetchAll());//Retornar el resultado de la consulta
    }

    public function registrarproducto($producto){//UPDATE
      $mensaje = ""; //Declarar una variable llamada mensaje
      //Establecer una conexion a base de datos
      $baseDatos = Conexion::conectar();
      //Preparar una conexion a sql
      //e_ indica que es un dato de entrada
        $sql = $baseDatos->prepare('INSERT INTO
        producto(idproducto,nombre)
        VALUES(:e_idproducto,:e_nombre) 
        ');
        //e: = dato de entrada (versatil, pero se le deve de colocar los atributos para no generar confuciones en el futuro) / se define la tabla y sus atributos

        //las siguientes lineas capturan los valores de los atributos del objeto
        //del objeto producto ('e_idproducto' se almacena lo que hay en $producto->getidproducto) y ()
        $sql->bindValue('e_idproducto', $producto->getidproducto());
        $sql->bindValue('e_nombre', $producto->getnombre());

       



        try{ 
          $sql->execute(); //esto se ejecuta si todo sale bien 
          $mensaje = "Registro exitoso";

        }catch(Exeption $excepcion){
          //se usa para capturar ecepciones ecepciones son : id iguales, base de datos mal nombrada etc
          //exepciones que no se pueden controlar
          $mensaje = "Problemas en el registro";
          
          //echo $excepcion->getMessage();//funcion reserbada de php sirve para imprimir mensajes de error
        }

        Conexion::desconectar($baseDatos);//siempre se cierra la conexion 
        return $mensaje;
    }
    public function buscarproducto($producto){ //READ

      //Establecer la conexión a la base datos
      $baseDatos = Conexion::conectar();
      //Definir la sentencia sql
      $sql = $baseDatos->query("SELECT * FROM producto WHERE idproducto=".$producto->getidproducto());
      //Ejecutar la consulta
      $sql->execute();
      //Cerrar la conexión
      Conexion::desconectar($baseDatos);
      //Retornar el resultado de la consulta a la tabla.
      return($sql->fetch());//Retornar el resultado de la consulta
    }

    
    public function actualizarproducto($producto){//UPDATE

      $baseDatos = Conexion::conectar();

        $sql = $baseDatos->prepare('UPDATE FROM
        producto SET nombre =:e_nombre WHERE idproducto=:e_idproducto');
        //e: = dato de entrada (versatil, pero se le deve de colocar los atributos para no generar confuciones en el futuro) / se define la tabla y sus atributos
        //las siguientes lineas capturan los valores de los atributos del objeto
        //del objeto producto ('e_idproducto' se almacena lo que hay en $producto->getidproducto) y ()
        
        $sql->bindValue('e_idproducto', $producto->getidproducto());
        $sql->bindValue('e_nombre', $producto->getnombre());

       



        try{ 
          $sql->execute(); //esto se ejecuta si todo sale bien 
          echo "Actualizacion exitosa";

        }catch(Exeption $excepcion){
          //se usa para capturar ecepciones ecepciones son : id iguales, base de datos mal nombrada etc
          //exepciones que no se pueden controlar

          echo $excepcion->getMessage();//funcion reserbada de php sirve para imprimir mensajes de error
        }

        Conexion::desconectar($baseDatos);//siempre se cierra la conexion 
      }

      public function eliminarproducto($producto){//UPDATE
        //Establecer la conexion a la base de datos
        //var_dump($producto);
        $baseDatos = Conexion::conectar();
        //Preparar la sentencia sql
        //e_ indica que es un dato de entrada
          $sql = $baseDatos->prepare('DELETE FROM
          producto WHERE idproducto=:e_idproducto');
          //las siguientes lineas capturan los valores de los atributos del objeto
          //del objeto producto ('e_idproducto' se almacena lo que hay en $producto->getidproducto) y ()
          $sql->bindValue('e_idproducto', $producto->getidproducto());
          try{ //capturar excdpciones de la base de datos
            //Ejecutar la consola
            $sql->execute(); //esto se ejecuta si todo sale bien 
            echo "Eliminacion exitosa";
           }
  
           catch(Exception $excepcion){//Exception: Excepcion o un error
            echo $excepcion->getMessage();//funcion reserbada de php sirve para imprimir mensajes de error
            echo "Problemas en la eliminacion";
            }
  
          Conexion::desconectar($baseDatos);//siempre se cierra la conexion 
      }
    }     
?>