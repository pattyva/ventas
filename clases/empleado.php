<?php 

class Empleado {
        
		private $idempleado;
		private $nombre;
		private $telefono;
		private $direccion;
		private $usuario;
		private $password;
		private $con;

		public function conectar_db($cn){
			$this->con = $cn;

		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listaempl(){
			$sql = "SELECT * FROM empleados";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM empleados where idEmpleado=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}
		
		public function agrega_empleado($nom,$tel,$dir,$usu,$pass){
			// para generar hash de password
            $usu_pass_hash = password_hash($pass, PASSWORD_DEFAULT);

			$sql = "insert into empleados(nombre,telefono,direccion, usuario, password)
                    values ('$nom','$tel','$dir','$usu','$usu_pass_hash')";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
		public function modifica_empleado($id,$nom,$tel,$dir,$usu){
            
			$sql = "update empleados set
			nombre='$nom',
			telefono='$tel',
			direccion='$dir', 
			usuario='$usu'
			where idEmpleado='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
			
		public function borrar($id){
			$sql = "DELETE FROM empleados WHERE idEmpleado=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

        public function lee_datos($usu){
			$sql = "SELECT * FROM empleados where usuario='$usu'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}

			
	}
	
	

?>	