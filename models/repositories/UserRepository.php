<?php
/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 21.01.2019
 * Time: 22:42
 */

namespace app\models\repositories;

use app\models\User;


class UserRepository extends Repository
{

  protected $session;

  public function __construct() {
    parent::__construct();
      new SessionRepository ();
  }

  public function ifUserExists($formInfo) {
    $user = (new UserRepository())->getAll();
    foreach($user as $key => $value) {
      if ($value->login == $formInfo['login'] && $value->password == $formInfo['password'] ) {
        (new SessionRepository()) -> sessionMessageLogin($formInfo);
        return true;
      } elseif ($value->login == $formInfo['login']) {
        (new SessionRepository()) -> sessionMessageLoginFailed();
        return true;
      }
    }
    (new SessionRepository()) -> unsetMessage();
    return false;
  }

  public function addUserToDb($formInfo){
    $newUser = new User($formInfo['login'], $formInfo['password']);
    (new UserRepository())->insert($newUser);
    (new SessionRepository()) ->sessionMessageRegistered($formInfo);
  }

  function getFormInfo(){
    $formInfo = [];
    $formInfo['login'] = $this->clearLogin($_POST['login']);
    $formInfo['password'] = md5(md5($_POST['password']));
    return $formInfo;
  }

  public function clearLogin($login) {
    return $login=strip_tags(trim($login));
  }

  public function getTableName() :string
  {
    return 'users';
  }

  function getRecordClass()
  {
    return User::class;
  }
}