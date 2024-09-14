<?php
class MySql
{
  private $host = 'localhost';
  private $user = 'root';
  private $password = '190698';
  private $database = 'online_shop';
  protected $connection;
  public function __construct()
  {
    $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);
  }
}
