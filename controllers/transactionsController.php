<?php  
/**
 * transactionsController.php
 *
 * @author Arturo Adonay Rayas Vergara <arturorayas60@gmail.com>
 */

	/** *//**
	 * Clase transactionsController
	 */	
	class transactionsController extends AppController
	{
		/** *//**
		 * funcion constructora
		 * @return type
		 */
		public function __construct()
		{
			parent::__construct();
		}

		/** */ /**
		 * funcion index se recarga
		 * @return type
		 */
		public function index()
		{
			$transaction = $this->loadModel("transaction");
			$this->_view->transactions = $transaction->GetAll();
			$this->_view->titulo="Transacciones";
			$this->_view->renderizar("index");
		}

		/** *//**
		 * funcion add se envian los datos a agregar de la transaccion al modelo
		 * @return type
		 */
		public function add()
		{
			if($_POST)
			{			
				$modelTransaction = $this->loadModel("transaction");
				$modelTransaction->Add($_POST);
				$this->redirect(array("controller"=>"transactions"));
			}
			$modelCategory = $this->loadModel("category");
			$this->_view->categories = $modelCategory->GetAll();

			$modelAccount = $this->loadModel("account");
			$this->_view->accounts = $modelAccount->GetAll();

			$this->_view->titulo="Nueva Transaccion";
			$this->_view->renderizar("add");
		}

		/** *//**
		 * funcion update se envian los datos a actualizar de la transaccion al modelo
		 * @param $id 
		 * @return type
		 */
		public function update($id=null)
		{
			if($_POST)
			{
				$modelTransaction = $this->loadModel("transaction");
				$modelTransaction->Update($_POST);

				$this->redirect(array("controller"=>"transactions"));
			}

			$modelTransaction = $this->loadModel("transaction");
			$this->_view->transaction = $modelTransaction->Find($id);

			$modelCategory = $this->loadModel("category");
			$this->_view->categories = $modelCategory->GetAll();

			$modelAccount = $this->loadModel("account");
			$this->_view->accounts = $modelAccount->GetAll();

			$this->_view->titulo="Editar Transaccion";
			$this->_view->renderizar("update");
		}

		/** *//**
		 * funcion delete se envian los datos a eliminar de la transaccion al modelo
		 * @param $id 
		 * @return type
		 */
		public function delete($id)
		{
			$modelTransaction = $this->loadModel("transaction");
			$transaction = $modelTransaction->Find($id);
			if($transaction)
			{
				$modelTransaction->Delete($id);
				$this->redirect(array("controller"=>"transactions"));
			}
		}
	}
?>