<?php
session_start();
include "model/pdo.php";
include "global.php";
include "model/danhmuc.php";
include "view/header.php";

date_default_timezone_set('Asia/Ho_Chi_Minh');
if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
        case 'home':
            include "view/trangchu.php";
            break;
        }
     } else {
            include "view/trangchu.php";
        }
        
        
        
        include "view/footer.php";
?>