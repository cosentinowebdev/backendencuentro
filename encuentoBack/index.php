<?php
require __DIR__ . "/inc/bootstrap.php";
 
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );
// if ((isset($uri[2]) && ($uri[2] != 'asistentes' )) || !isset($uri[3]) ) {

// }else {

// }
switch ($uri[2]) {
    case 'user':
        require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
        $objFeedController = new UserController();
        $strMethodName = $uri[3] . 'Action';
        $objFeedController->{$strMethodName}();
        break;
    case 'asistentes':
        require PROJECT_ROOT_PATH . "/Controller/Api/AsistentesController.php";
        $objFeedController = new AsistentesController();
        $strMethodName = $uri[3] . 'Action';
        $objFeedController->{$strMethodName}();
        break;
    default:
        header("HTTP/1.1 404 Not Found");
        exit();
        break;
} 

 

?>