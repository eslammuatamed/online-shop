<?php
require_once '../App.php';
$id = $request->get('id');
if ($request->hasRequest('submit')) {
  $name = $request->post('name');
  $price = $request->post('price');
  $desc = $request->post('desc');
  $img_array = $request->file('img');
  $validate->rules('name', $name, ['required', 'str', 'max']);
  $validate->rules('price', $price, ['required', 'number']);
  $validate->rules('desc', $desc, ['required', 'str']);
  $validate->rules('img', $img_array['name'], ['img']);
  if (empty($validate->errors)) {
    $old_product = $product->getProductById($id);
    if ($img_array['name']) {
      $img = new Img($img_array);
      $new_product = [
        'name' => $name,
        'price' => $price,
        'desc' => $desc,
        'img' => $img->new_name
      ];
      $result = $product->updateProduct($new_product, $id);
      if ($result) {
        $img->upload();
        $img->remove($old_product['img']);
        $session->set('success', ['Product edit successfully']);
        $request->redirect('../index.php');
      } else {
        $session->set('errors', ['Something went wrong']);
        $request->redirect('../edit.php?id=' . $id);
      }
    } else {
      $new_product = [
        'name' => $name,
        'price' => $price,
        'desc' => $desc,
        'img' => $old_product['img']
      ];
      $result = $product->updateProduct($new_product, $id);
      if ($result) {
        $session->set('success', ['Product edit successfully']);
        $request->redirect('../index.php');
      } else {
        $session->set('errors', ['Something went wrong']);
        $request->redirect('../edit.php?id=' . $id);
      }
    }
  } else {
    $session->set('errors', $validate->errors);
    $request->redirect('../edit.php?id=' . $id);
  }
} else {
  $request->redirect('../index.php');
}
