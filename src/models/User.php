<?php
class User extends UserRepository
{
  private $id;
  private $username;
  private $password;
  private $newusername;
  private $newpassword;
  

  public function __construct($id, $username, $password, $newusername, $newpassword)
  {
    $this->id = htmlspecialchars($id);
    $this->setUsername($username);
    $this->setPassword($password);
    $this->setUsername($newusername);
    $this->setPassword($newpassword);
  }

  public function getId()
  {
    return $this->id;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function setUsername($username)
  {
    $this->username = htmlspecialchars($username);
  }

  public function getNewUsername()
  {
    return $this->newusername;
  }

  public function setNewUsername($newusername)
  {
    $this->newusername = htmlspecialchars($newusername);
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getNewPassword()
  {
    return $this->newpassword;
  }

  public function setNewPassword($newpassword)
  {
    $this->newpassword = $newpassword;
  }
}