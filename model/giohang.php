<?php
function insert_giohang($soluong, $iduser, $idsp) {
    $sql = "INSERT INTO giohang(soluong, iduser, idsp) VALUES (?, ?, ?)";
    pdo_execute($sql, $soluong, $iduser, $idsp);
}

function check_giohang($iduser, $idsp) {
    $sql = "SELECT * FROM giohang WHERE idsp = ? AND iduser = ?";
    return pdo_query_one($sql, $idsp, $iduser);
}

function update_giohang($soluong, $id) {
    $sql = "UPDATE giohang SET soluong = ? WHERE id = ?";
    pdo_execute($sql, $soluong, $id);
}
function loadall_giohang($id){
    $sql = "SELECT giohang.idsp, giohang.id, giohang.soluong, sanpham.name,  sanpham.newprice, sanpham.hinh
    FROM giohang
    JOIN sanpham ON sanpham.id = giohang.idsp
    WHERE giohang.iduser = $id
    ORDER BY giohang.id DESC";
    $giohang = pdo_query($sql);
    return $giohang; 
}

function delete_giohang($id){
    $sql = "DELETE from giohang where id=".$id;
    pdo_execute($sql);   
}
function delete_all_giohang($iduser){
    $sql = "DELETE FROM giohang WHERE iduser= $iduser";
    pdo_execute($sql);
}

function total_prod_from_giohang($iduser){
    $sql = "SELECT sum(soluong) as tongsoluong FROM giohang where iduser = ?";
    $total = pdo_query($sql, $iduser);
    return isset($total[0]) && isset($total[0]["tongsoluong"]) ? $total[0]["tongsoluong"] : 0;
}