<?php

/**
 *  Repositorio: Product
 * 
 */
class ProductRepository
{
    /** DB conecta base de datos*/
    private Db $db;

     /** Le pasa parametros que es la conexxion de datos*/

 /**
* Constructor: Instancia de la clase Db
*/
    
public function __construct(Db $db)
{
$this->db = $db;
}

 /**
     * Obtiene todos los productos
     * 
     * @return array Array de objetos Product
     */
    public function findAll(): array
    {
        $rows = $this->db->findAll('products', '*');

        return array_map(function ($row) {
            return $this->hydrate($row);
        }, $rows);
    }

/**
     * Convierte un array en un objeto Product
     * 
     * @param array $row
     * @return Product
     */
    private function hydrate(array $row): Product
    {
        return new Product(
            (int)$row['id_product'],
            $row['product_name'],
            (float) $row['price']
        );
    }




}
