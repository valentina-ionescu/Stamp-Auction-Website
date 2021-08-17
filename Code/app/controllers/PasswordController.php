<?php



class PasswordHash{

    // https://www.php.net/manual/en/function.password-hash.php
    public static function hashPassword($password){
      $options = [
          'cost' => 12,
      ];
      $hashPassword= password_hash($password, PASSWORD_BCRYPT, $options);

      return $hashPassword;

    }

    public static function checkPassword($password, $dbpassword){
      //https://www.php.net/manual/en/function.password-verify.php
         if (password_verify($password, $dbpassword)) {
          return true;
      } else {
          return false;
      }

    }



}




 ?>
