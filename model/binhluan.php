<?php 

function insert_binhluan($idpro, $noidung,$iduser){
        
    $ngaybinhluan = date("d-m-y");
        $sql = "INSERT INTO binhluan(noidung, iduser, idpro, ngaybinhluan)
         VALUES ('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}
function delete_binhluan($id){
    $sql = "DELETE FROM binhluan where id=" .$id;
    pdo_execute($sql);
}

?>