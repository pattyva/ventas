<?php

class Producto {
        
		private $idproducto;
		private $nomproducto;
		private $unimed;
		private $stock;
		private $preuni;
		private $cosuni;
		private $con;

		public function conectar_db($cn){
			$this->con = $cn;

		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listaprodu(){
			$sql = "SELECT * FROM productos";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM productos where idProducto=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}
		
		public function agrega_producto($nom,$und,$can,$pre,$cos,$idl){
			$sql = "insert into productos(nomproducto,unimed,stock, preuni,cosuni,idLinea) 
			values ('$nom','$und',$can,$pre,$cos,$idl)";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
		public function modifica_producto($id,$nom,$und,$can,$pre,$cos,$idl){
			$sql = "update productos set
			nomproducto='$nom',
			unimed='$und',
			stock=$can, 
			preuni=$pre,
			cosuni=$cos,
			idLinea=$idl
			where idProducto='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
			
		public function borrar($id){
			$sql = "DELETE FROM productos WHERE idProducto=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		
		public function set_idproducto($id){
			$this->idproducto = $id;
		}
		public function set_nomproducto($nom){
			$this->nomproducto = $nom;
		}
		public function set_unimed($und){
			$this->unimed = $und;
		}
		public function set_stock($cant){
			$this->stock = $cant;
		}
		public function set_preuni($pre){
			$this->preuni = $pre;
		}
		public function set_cosuni($cos){
			$this->cosuni = $cos;
		}

		public function get_idproducto(){
			return $this->idproducto;
		}
		public function get_nomproducto(){
			return $this->nomproducto;
		}
		public function get_unimed(){
			return $this->unimed;
		}
		public function get_stock(){
			return $this->stock;
		}
		public function get_preuni(){
			return $this->preuni;
		}
		public function get_cosuni(){
			return $this->cosuni;
		}


	
	}
	
	

?>	