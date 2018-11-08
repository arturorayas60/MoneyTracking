<?php  
/**
 * Model.php
 *
 * @author Arturo Adonay Rayas Vergara <arturorayas60@gmail.com>
 */

	/** *//**
	 * Clase Model
	 */	
	class AppModel
	{
		/** *//**
		 * @var $_db almacena la conexion a la base de datos
		 */
		protected $_db;

		/** *//**
		 * funcion constructora
		 * @return type
		 */
		public function __construct()
		{
			$this->_db = new Database();
		}
	}
?>