<?php
class Producto{
//Definir los atributos
private $idProducto;
private $idCategoria;
private $nombre;
private $precio;
private $estado;

//Definir el contructor
    public function __construct(){

    }

    public function setidProducto($e_idProducto){
        $this->idProducto = $e_idProducto;
    }

    public function setidCategoria($e_idCategoria){
        $this->idCategoria = $e_idCategoria;
    }

    public function setnombre($e_nombre){
        $this->nombre = $e_nombre;
    }

    public function setprecio($e_precio){
        $this->precio = $e_precio;
    }

    public function setestado($e_estado){
        $this->estado = $e_estado;
    }

    public function getidProducto(){
        return $this->idProducto;
    }

    public function getidCategoria(){
        return $this->idCategoria;
    }

    public function getnombre(){
        return $this->nombre;
    }

    public function getprecio(){
        return $this->precio;
    }

    public function getestado(){
        return $this->estado;
    }


}

?>