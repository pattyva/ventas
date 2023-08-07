<?php

class Venta {
    private $idVenta;
    private $fecha;
    private $idCliente;
    private $idEmpleado;
    private $idDocumento;
    private $Importe;
    private $igv;
    private $con; // Agregamos la propiedad para almacenar la conexión

    public function conectar_db($cn) {
        $this->con = $cn;
    }

    public function sanitize($var) {
        $valor = mysqli_real_escape_string($this->con, $var);
        return $valor;
    }

    public function listaventa() {
        $sql = "SELECT * FROM ventas";
        $res = mysqli_query($this->con, $sql);
        return $res;
        
    }

    public function consulta($id) {
        $sql = "SELECT * FROM ventas WHERE idVenta=$id";
        $res = mysqli_query($this->con, $sql);
        $return = mysqli_fetch_array($res);
        return $return;
    }

    public function agrega_venta($fecha, $idCliente, $idEmpleado, $idDocumento, $Importe, $igv) {
        // Corregimos la inserción, agregando comillas simples para los valores no numéricos
        
        $sql = "INSERT INTO ventas (fecha, idCliente, idEmpleado, idDocumento, Importe, igv) 
        VALUES ('$fecha', '$idCliente', '$idEmpleado', '$idDocumento', '$Importe', '$igv')";
        $res = mysqli_query($this->con, $sql);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function borrar($id){
        $sql = "DELETE FROM ventas WHERE idVenta=$id";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    // No necesitas cerrar la conexión aquí, ya que podría usarse en otros métodos.
    // Se debería cerrar la conexión en otro lugar adecuado, como en un destructor o un método explícito de cierre de conexión.
}


    /*public function numero_actual($id) {
        $sql = "SELECT num_actual FROM numeracion WHERE iddocumento=$id";
        $res = mysqli_query($this->con, $sql);
        $return = mysqli_fetch_array($res);
        return $return;
    }*/


?>
	