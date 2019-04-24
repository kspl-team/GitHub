<?php
    require 'conn.php';
    session_start();
    if(isset($_SESSION["ID"])){
        if($_SESSION["MaVaiTro"]=="ADMIN"){
            header('location:./kppsshop_admin_danhsachdonhang.php?tinhtrangdonhang=chuaxuly');
        }
        else if($_SESSION["MaVaiTro"]=="KHACHHANG"){
            header('location:./kppsshop_trangchu.php');
        }
    }
    else{
    if (isset($_POST["btndangnhap"])){
        $tendangnhap=$_POST["tendangnhap"];
        $password=$_POST["password"];
        $sql_kiemtradangnhap="select taikhoan.ID as ID,taikhoan.TenDN as TenDN,taikhoan.Password as Password,khachhang.MaVaiTro as MaVaiTro, khachhang.TenKH as TenKH from taikhoan,khachhang where taikhoan.ID=khachhang.MaKH and TenDN='$tendangnhap' and Password='$password'";
        $excute_sql_kiemtradangnhap=mysqli_query($connect,$sql_kiemtradangnhap);
        if (is_null($kiemtradangnhap=mysqli_num_rows($excute_sql_kiemtradangnhap))==false){
            $kq_kiemtradangnhap=mysqli_fetch_array($excute_sql_kiemtradangnhap);
            $_SESSION["ID"]=$kq_kiemtradangnhap["ID"];
            $_SESSION["MaVaiTro"]=$kq_kiemtradangnhap["MaVaiTro"];
            if($_SESSION["MaVaiTro"]=="ADMIN"){
                header('location:./kppsshop_admin_danhsachdonhang.php?tinhtrangdonhang=chuaxuly');
            }
            else if($_SESSION["MaVaiTro"]=="KHACHHANG"){
                header('location:./kppsshop_trangchu.php');
            }
        }
    }
    }

    if(isset($_GET["tbtaotaikhoanthanhcong"])){
        echo '<script language="javascript">
            alert("Tài khoản đã được tạo thành công, hãy đăng nhập ngay để tận hưởng ngày hội mua sắm cùng KPPSSHOP");
          </script>';
    }
?>


<title>KPPSSHOP - Đăng nhập</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link href="./css/formdangnhap.css" rel="stylesheet">


<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Đăng nhập cùng mua sắm thả ga với KPPSSHOP</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin" action="./kppsshop_dangnhap.php" method="post">
                <input type="text" class="form-control" placeholder="Tên đăng nhập" name="tendangnhap" required autofocus>
                <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required>
                <button class="btn btn-lg btn-primary btn-block" name="btndangnhap" type="submit">
                    Đăng nhập</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="./kppsshop_dangky.php" class="text-center new-account">Tạo tài khoản </a>
        </div>
    </div>
</div>