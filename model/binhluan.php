<?php
function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan)
{
    $sql = "INSERT INTO `binhluan` (`idpro`,`iduser`,`noidung`,`ngaybinhluan`) VALUES('$idpro','$iduser','$noidung','$ngaybinhluan')";
    pdo_execute($sql);
}
function loadall_binhluan($idpro)
{
    $sql = "SELECT * FROM binhluan WHERE 1";
    if ($idpro > 0)
        $sql .= " AND idpro = '" . $idpro . "'";
    $sql .= " ORDER BY id DESC";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function delete_binhluan($id)
{
    $sql = "DELETE FROM binhluan WHERE id = " . $id;
    pdo_execute($sql);
}
