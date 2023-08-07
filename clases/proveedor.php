<?php 

class Proveedor {
        
		private $idproveedor;
		private $nombre;
		private $con;

		public function conectar_db($cn){
			$this->con = $cn;

		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listaproveedores(){
			$sql = "SELECT * FROM proveedores";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM proveedores where idProveedor=$id";
			
            $res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_assoc($res );
			return $return ;
		}
		
		public function agrega_proveedor($nom,$idLinea	){
			
			$sql = "insert into proveedores(nombre,idLinea)
                    values ('$nom','$idLinea')";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
		public function modifica_proveedor($id,$nom,$idLinea){
           
			$sql = "update proveedores set
			nombre='$nom',
			idLinea='$idLinea'
			where idProveedor='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
			
		public function borrar($id){
			$sql = "DELETE FROM proveedores WHERE idProveedor=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

        public function lee_datos($idprov){
			$sql = "SELECT * FROM proveedores where idProveedor='$idprov'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}

			
	}
	
	

?>	