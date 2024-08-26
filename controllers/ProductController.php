<?php 
    
	require_once('models/Product.php');
	class ProductController{
		var $cate_model;

		function __construct(){
			$this->cate_model = new product();
		}

		public function list(){
			$data = array();
			$line = $_GET['line'];
			$data = $this->cate_model->All($line, 12,0);
			require_once('views/product/product_list.php');
		}

		// public function detail(){
		// 	$id = isset($_GET['id'])?$_GET['id']:0;

		// 	$data = $this->cate_model->find($id);
		// 	require_once('views/product/product_detail.php');
		// }

		public function detail(){
			$views = array();
			$data = array();
			$views['productCode'] = isset($_GET['id'])?$_GET['id']:0;
			$views['views'] = isset($_GET['views'])?$_GET['views']:0;
			$views['views'] = $views['views'] + 1; 
			$status = $this->cate_model->increase($views);
			$data = $this->cate_model->find($views['productCode']);
			require_once('views/product/product_detail.php');
		}
	}
 ?>