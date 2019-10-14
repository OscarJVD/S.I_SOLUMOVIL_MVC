
<?php

function encrypt_password($password)
{
   $hash = password_hash($password,PASSWORD_BCRYPT);
   return $hash;
}

?>