<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_Model extends CI_Model {

	public function get_all_products() {
		$products_query = "SELECT 
						   products.id AS id, 
						   products.manufacturer_id AS manufacturer_id, 
						   products.name AS name, 
						   products.price AS price, 
						   products.description AS description, 
						   manufacturers.manufacturer_name AS manufacturer_name, 
						   products.created_at AS created_at 
						   FROM products
	 			  		   LEFT JOIN manufacturers
						   ON products.manufacturer_id = manufacturers.id";
		return $this->db->query($products_query)->result_array();
	}

	public function get_product($id) {
		$query = "SELECT * FROM products WHERE id = ?";
		return $this->db->query($query, array($id))->row_array();
	}

	public function get_manufacturer() {
		$query = "SELECT * FROM manufacturers";
		return $this->db->query($query)->result_array();
	}

	public function delete_product($id) {
		$delete_query = "DELETE FROM products WHERE products.id = ?";
		return $this->db->query($delete_query, array($id));
	}

	public function create_product($post) {
		$manufacturer_id = $post['manufacturer'];
		$product_name = $post['product_name'];
		$price = $post['price'];
		$description = $post['description'];
		$query = "INSERT INTO products (manufacturer_id, name, price, description, created_at, updated_at)
				  VALUES (?,?,?,?, NOW(), NOW())";
		return $this->db->query($query, array($manufacturer_id, $product_name, $price, $description));
	}

	public function edit_product($post, $id) {
		$query = "UPDATE products SET name=?, description=?, price=?, updated_at=? WHERE products.id = ?";
		$values = array($post['product_name'], $post['description'], $post['price'], date('Y-m-d H:i:s'), $id);
		return $this->db->query($query, $values); 
	}
}