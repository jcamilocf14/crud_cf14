<?php
//conexion a usar en el proyecto es: PDO
//PDO: Librería de php para conexión y transacciones 
//orientada a objetos hacia una base de datos.
//objetos  
class Conexion{
    private static $conexion = NULL;

    private function __construct(){} //Constructor vacio

    public static function conectar(){
        //Verificar errores
        $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;//Capturar errore
        self::$conexion = new PDO('mysql:host=localhost;dbname=crud_2395779','root','',$pdo_options);
        return self::$conexion;
    }

    static function desconectar(&$conexion){
        $conexion = null;
    }
}

$baseDatos = Conexion::conectar();

?>