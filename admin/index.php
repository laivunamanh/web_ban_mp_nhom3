<?php
include "header.php";
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tendanhmuc = $_POST['tenloai'];
                insert_danhmuc($tendanhmuc);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tendanhmuc = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tendanhmuc);
                $thongbao = "UPDATE thành công";
            }
            $sql = "SELECT * FROM danhmuc order by id desc";
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
        case 'deletedm':
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                delete_danhmuc($_GET['iddm']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $giamoi = $_POST['giamoi'];
                $xuatxu = $_POST['xuatxu'];
                $soluong = $_POST['soluong'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                } else {
                }
                insert_sanpham($tensp, $mota, $giasp, $giamoi, $hinh, $xuatxu, $soluong, $iddm);
                $thongbao = 'THÊM THÀNH CÔNG';
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;
        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw  = $_POST['kyw'];
                $iddm  = $_POST['iddm'];
            } else {
                $kyw  = '';
                $iddm  = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/edit.php";
            break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $giamoi = $_POST['giamoi'];
                $xuatxu = $_POST['xuatxu'];
                $soluong = $_POST['soluong'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                echo $hinh;
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                } else {
                }
                update_sanpham($id, $iddm, $tensp, $giasp, $giamoi, $mota, $hinh, $xuatxu, $soluong);
                $thongbao = 'CẬP NHẬT THÀNH CÔNG';
                // include "sanpham/edit.php";
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
        case 'deletesp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);

            }

            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";  
            break;

    }
}
include "footer.php";
