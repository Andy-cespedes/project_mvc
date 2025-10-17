<?php

  include_once "models/config/config_products.php";
  include_once 'models/db.class.php';
  include_once 'models/product.class.php';
  include_once 'models/productRepository.class.php';


    // Inicializar variables para la vista
    $products = [];
    $errorMessage = null;


  try{

  $db = new Db();
  $productRepo= new ProductRepository($db);
  $products=$productRepo->findAll();
  $db->close();

  }catch(Exception $e){

  // Capturar el mensaje de error para mostrarlo en la vista
    $errorMessage = "Error al cargar los productos: " . $e->getMessage();
    
    // En producción, registrar el error en un log
    // error_log($e->getMessage());
  }

  $totalProducts=count($products);
  
  // Incluir la vista
include_once  "views/product_boot_list.php";
  






