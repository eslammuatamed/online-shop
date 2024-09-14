<?php
require_once '../App.php';
if ($request->hasRequest('submit')) {
  $name = $request->post('name');
  $price = $request->post('price');
  $desc = $request->post('desc');
  $img_array = $request->file('img');
  $validate->rules('name', $name, ['required', 'str', 'max']);
  $validate->rules('price', $price, ['required', 'number']);
  $validate->rules('desc', $desc, ['required', 'str']);
  $validate->rules('img', $img_array['name'], ['required', 'img']);
  if (empty($validate->errors)) {
    $img = new Img($img_array);
    $new_product = [
      'name' => $name,
      'price' => $price,
      'desc' => $desc,
      'img' => $img->new_name
    ];
    $result = $product->createProduct($new_product);
    if ($result) {
      $img->upload();
      $session->set('success', ['Product added successfully']);
      $request->redirect('../index.php');
    } else {
      $session->set('errors', ['Something went wrong']);
      $request->redirect('../add.php');
    }
  } else {
    $session->set('name', $name);
    $session->set('price', $price);
    $session->set('desc', $desc);
    $session->set('errors', $validate->errors);
    $request->redirect('../add.php');
  }
} else {
  $request->redirect('../add.php');
}
