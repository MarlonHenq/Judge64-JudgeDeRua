<?php
//Delete session cookie
setcookie('auth_token', '', time() - 3600, '/');
header('Location: index.php');