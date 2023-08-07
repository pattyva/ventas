<?php 

class Linea {
        
		private $idLinea;
		private $nombre;
		private $con;

		public function conectar_db($cn){
			$this->con = $cn;

		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listaLinea(){
			$sql = "SELECT * FROM lineas";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM lineas where idLinea=$id";
			
            $res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_assoc($res );
			return $return ;
		}
		
		public function agrega_Linea($nom){
			
			$sql = "insert into lineas(nombre)
                    values ('$nom')";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
		public function modifica_proveedor($id,$nom){
           
			$sql = "update lineas set
			nombre='$nom'
			where idLinea='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
			
		public function borrar($id){
			$sql = "DELETE FROM lineas WHERE idLinea=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

        public function lee_datos($idlinea){
			$sql = "SELECT * FROM lineas where idLinea='$idlinea'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}

			
	}
	
	

?>	