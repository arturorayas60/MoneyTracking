<?php  
/**
 * Database.php
 *
 * @author Arturo Adonay Rayas Vergara <arturorayas60@gmail.com>
 */

	/** *//**
	 * Clase Database
	 */	
	class Database extends PDO
	{
		/** *//**
		 * funcion constructora
		 * @return type
		 */	
		public function __construct()
		{
			parent::__construct(
				'mysql:host='.DB_HOST.';'.
				'dbname='.DB_NAME,
				DB_USER,
				DB_PASS,
				array(
					PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES '.DB_CHAR
				)
			);
		}
	}
?>