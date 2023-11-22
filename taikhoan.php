<?php 
function dang_ky($email, $user, $pass, $sdt) {
    $sql = "insert into taikhoan (taikhoan, matkhau, sdt,email ) values ('$user', '$pass', '$sdt','$email')";
    pdo_execute($sql);
}

function dang_nhap($user, $pass) {
    $sql = "select * from taikhoan where taikhoan='$user' and matkhau='$pass'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function quen_mat_khau($email) {
    $sql = "select * from taikhoan where email='".$email."' "  ;
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function edit_taikhoan($id,$hovaten,$user,$pass,$phone,$email){
    $sql = "UPDATE taikhoan SET  hovaten = '".$hovaten."', taikhoan = '".$user."', matkhau = '".$pass."',sdt = '".$phone."',email = '".$email."' WHERE id=".$id;    
    pdo_execute($sql);
    
}

?>
