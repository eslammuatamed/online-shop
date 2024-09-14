<?php
require_once 'MySql.php';
class Product extends MySql
{
  public function getProducts()
  {
    $query = "SELECT * FROM products";
    $result = mysqli_query($this->connection, $query);
    $products = [];
    if (!empty($result)) {
      $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return $products;
  }
  public function getProductById($id)
  {
    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($this->connection, $query);
    $product = [];
    if (!empty($result)) {
      $product = mysqli_fetch_assoc($result);
    }
    return $product;
  }
  public function createProduct($data)
  {
    $data['name'] =  mysqli_escape_string($this->connection, $data['name']);
    $data['desc'] =  mysqli_escape_string($this->connection, $data['desc']);
    $query = "INSERT INTO products(`name`, `desc`, `price`, `img`) VALUES('{$data['name']}', '{$data['desc']}', {$data['price']}, '{$data['img']}')";
    $result = mysqli_query($this->connection, $query);
    if ($result) {
      return true;
    }
    return false;
  }
  public function updateProduct($data, $id)
  {
    $data['name'] =  mysqli_escape_string($this->connection, $data['name']);
    $data['desc'] =  mysqli_escape_string($this->connection, $data['desc']);
    $query = "UPDATE products SET `name`='{$data['name']}', `desc`='{$data['desc']}', `price`={$data['price']}, `img`='{$data['img']}' WHERE id = $id";
    $result = mysqli_query($this->connection, $query);
    if ($result) {
      return true;
    }
    return false;
  }
  public function deleteProduct($id)
  {
    $query = "DELETE FROM products WHERE id = $id";
    $result = mysqli_query($this->connection, $query);
    if ($result) {
      return true;
    }
    return false;
  }
}
