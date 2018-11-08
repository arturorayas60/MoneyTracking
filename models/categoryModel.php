<?php  
/**
 * categoryModel.php
 *
 * @author Arturo Adonay Rayas Vergara <arturorayas60@gmail.com>
 */

	/** *//**
	 * Clase categoryModel
	 */
	class categoryModel extends AppModel
	{
		/** *//**
		 * funcion constructora
		 * @return type
		 */
		public function __construct()
		{
			parent::__construct();
		}

		/** *//**
		 * funcion getAll trae todas las categorias en la base de datos
		 * @return type
		 */
		public function GetAll()
		{
			$query = $this->_db->prepare("SELECT * FROM categories ");
			$query->execute();
			$items = $query->fetchall();
			
			if($items)
			{
				return $items;
			}
			else
			{
				return null;
			}
		}

		/** *//**
		 * funcion Add agrega una nueva categoria a la base de datos
		 * @param array $data 
		 * @return type
		 */
		public function Add($data = array())
		{
			$query = $this->_db->prepare("INSERT INTO categories (name) VALUES (:name )");			
			$query->bindParam(":name",$data['name']);

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/** *//**
		 * funcion Add agrega una nueva categoria a la base de datos
		 * @param array $data 
		 * @return type
		 */
		public function Update($data = array()) 
		{
			$query = $this->_db->prepare("UPDATE categories SET name=:name WHERE id=:id");		

			$query->bindParam(":id",$data['id']);	
			$query->bindParam(":name",$data['name']);

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/** *//**
		 * funcion Find carga los datos de la categoraia a la que le pertenezca el id que se envia
		 * @param  $id 
		 * @return type
		 */
		public function Find($id)
		{
			$query = $this->_db->prepare("SELECT * FROM categories WHERE id=:id");
			$query->bindParam(":id",$id);
			$query->execute();
			$items = $query->fetch();
			
			if($items)
			{
				return $items;
			}
			else
			{
				return null;
			}
		}

		/** *//**
		 * funcion Delete limina una categoria en la base de datos a la que le pertenezca el id que se envia
		 * @param $id 
		 * @return type
		 */
		public function Delete($id)
		{
			$query = $this->_db->prepare("DELETE FROM categories WHERE id=:id");		

			$query->bindParam(":id",$id);	

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
?>