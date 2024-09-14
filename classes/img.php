<?php
class Img
{
  private $name;
  private $tmp;
  public $new_name;
  public function __construct(array $img)
  {
    $this->name = $img['name'];
    $this->tmp = $img['tmp_name'];
    $ext = pathinfo($this->name, PATHINFO_EXTENSION);
    $this->new_name = uniqid() . '.' . $ext;
  }
  public function upload()
  {
    move_uploaded_file($this->tmp, '../images/' . $this->new_name);
  }
  public static function remove($img)
  {
    if (file_exists('../images/' . $img)) {
      unlink('../images/' . $img);
    }
  }
}
