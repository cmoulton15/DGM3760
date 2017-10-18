
<?php
//This is to authorize the person accessing the page
    $username = 'admin';
    $password = 'theboss';

    if (!isset($_SERVER['PHP_AUTH_USER']) || (!isset($_SERVER['PHP_AUTH_PW'])) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {

        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="Up2date"');
        exit('<h1>Please contact your supervisor for the correct login.</h1>');
    }
?>