<?php
    require('libs/db.php');

    if(isset($_GET["id"])){
        $filmID = $_GET['id'];
    }
    // echo $filmID;
    // exit;
    $sql2=" SELECT * FROM `episode` WHERE film_id = $filmID";

    $result = $link->query($sql2);

    if ($result->num_rows > 0) {
        ?>
        <script>
            alert("Xóa phim không thành công vì đã có tập phim");
            location.href = "manageFilm.php";
            // alert("hshshsh");
        </script>
<?php
    }else{

    
    $sql = "DELETE FROM film  WHERE id = $filmID";

    if (mysqli_query($link, $sql)) {?>
        <script>
            alert("Xóa phim thành công");
            location.href = "manageFilm.php";
            // alert("hshshsh");
        </script>

    <?php        
    } else {
        echo "Lỗi xóa phim: " . mysqli_error($conn);
    }
}
    mysqli_close($link);
    
?>