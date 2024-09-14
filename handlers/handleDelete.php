<?php
require_once '../App.php';
$id = $request->get('id');
$product_delete = $product->getProductById($id);
$result = $product->deleteProduct($id);
if ($result) {
  Img::remove($product_delete['img']);
  $session->set('success', ['Product deleted successfully']);
  $request->redirect('../index.php');
} else {
  $session->set('errors', ['Something went wrong']);
  $request->redirect('../show.php?id=' . $id);
}
