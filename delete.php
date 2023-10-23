<?php 
    include './db.php';
    if ($_SERVER["QUERY_STRING"]) {
    $p_name = $_GET['id'];
    $sql = "DELETE FROM product where product_name='$p_name'";
    $conn->query($sql);
}
Header('Location:index.php');
exit;
?>