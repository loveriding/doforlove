
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
</head>
<body>
    <div id="wrapper">
        <?php
            include("common.php");
        ?>
        <div id="page-wrapper" class="text-center" style="margin: auto">
            <img src="asset/images/welcom_admin.png" alt="welcome admin" class="rounded mx-auto d-block">
            <h2>Welcome <?php echo $_SESSION['username']?></h2>
            <p>
                Bạn có thể quản lí các user và phim bằng cách hành động thêm xóa sửa chúng !!!
            </p>
        </div>
    </div>

    <?php include("libs/script.php");?>
</body>
</html>
