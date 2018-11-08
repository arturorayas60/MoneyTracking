<?php  
/**
 * transactionModel.php
 *
 * @author Arturo Adonay Rayas Vergara <arturorayas60@gmail.com>
 */

	/** *//**
	 * Clase transactionModel
	 */	
	class transactionModel extends AppModel
	{
		/** *//**
		 * metodo constructor
		 * @return type
		 */
		public function __construct()
		{
			parent::__construct();
		}

		/** *//**
		 * Obtiene todas las transacciones de la base de datos
		 * @return type
		 */
		public function GetAll()
		{
			$query = $this->_db->prepare("SELECT t.*,a.name AS nameaccount,c.name AS namecategory FROM transactions t INNER JOIN accounts a ON a.id=t.account_id INNER JOIN categories c ON c.id=t.category_id");
			$query->execute();
			$items = $query->fetchall();
			if($items)
			{
				return $items;
			}
			else
			{
				return false;
			}
		}

		/** *//**
		 * funcion Add agrega una nueva transaccion a la base de datos 
		 * @param array $data 
		 * @return type
		 */
		public function Add($data = array())
		{
			$query = $this->_db->prepare("INSERT INTO transactions (account_id,category_id,description,date,amount) VALUES (:account_id,:category_id,:description,:date,:amount)");
			
			$query->bindParam(":account_id",$data['id_account']);
			$query->bindParam(":category_id",$data['id_category']);
			$query->bindParam(":description",$data['description']);
			$query->bindParam(":date",$data['date']);
			$query->bindParam(":amount",$data['amount']);

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
		 * funcion Update actualiza los datos de una transaccion en la base de datos segun el id
		 * @param array $data 
		 * @return type
		 */
		public function Update($data = array()) 
		{
			$query = $this->_db->prepare("UPDATE transactions SET account_id=:account_id,category_id=:category_id,description=:description,date=:date,amount=:amount WHERE id=:id");
			
			$query->bindParam(":id",$data['id']);
			$query->bindParam(":account_id",$data['id_account']);
			$query->bindParam(":category_id",$data['id_category']);
			$query->bindParam(":description",$data['description']);
			$query->bindParam(":date",$data['date']);
			$query->bindParam(":amount",$data['amount']);

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
		 * funcion Find obtiene los datos de la base de datos segun el id
		 * @param  $id 
		 * @return type
		 */
		public function Find($id)
		{
			$query = $this->_db->prepare("SELECT * FROM transactions WHERE id=:id");
			$query->bindParam(":id",$id);
			$query->execute();
			$items = $query->fetch();
			if($items)
			{
				return $items;
			}
			else
			{
				return false;
			}
		}

		/** *//**
		 * funcion Delete elimina una trasaccion de la base de datos por id 
		 * @param  $id 
		 * @return type
		 */
		public function Delete($id)
		{
			$query = $this->_db->prepare("DELETE FROM transactions WHERE id=:id");
			
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