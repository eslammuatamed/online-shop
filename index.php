<?php include './inc/header.php'; ?>
<?php require_once './App.php' ?>
<?php
$products = $product->getProducts();
?>

<div class="container my-5">
  <?php
  if ($session->has('success')) {
    foreach ($session->get('success') as $error) {
      echo '<div class="alert alert-success">' . $error . '</div>';
    }
    $session->remove('success');
  }
  ?>
  <?php if (!empty($products)) : ?>
    <div class="row">
      <?php foreach ($products as $product) : ?>
        <div class="col-lg-4 mb-3">
          <div class="card">
            <img src="images/<?= $product['img'] ?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">
                <?= $product['name'] ?>
              </h5>
              <p class="text-muted">
                <?= $product['price'] ?>
                EGP</p>
              <p class="card-text">
                <?= $str->limit($product['desc']) ?>
              </p>
              <a href="show.php?id=<?= $product['id'] ?>" class="btn btn-primary">Show</a>
              <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-info">Edit</a>
              <a href="handlers/handleDelete.php?id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <div class="alert alert-info">No products found</div>
  <?php endif; ?>
</div>

<?php include './inc/footer.php'; ?>