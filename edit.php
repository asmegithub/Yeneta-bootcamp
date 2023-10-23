<?php 


    include './db.php';
    if ($_SERVER["QUERY_STRING"]) {
    $p_name = $_GET['id'];
    $sql = "SELECT * FROM product where product_name='$p_name'";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
}
 if($_SERVER['REQUEST_METHOD']=='POST'){
        $description=$_POST['description'];
        $price=$_POST['price'];
        $quantity=$_POST['quantity'];
     
        do {
            if(empty($p_name)||empty($description)||empty($price)||empty($quantity)){
                $errorMessage="All fields are required";
                break;
            }

            $sql="UPDATE product set price='$price',quantity='$quantity', description='$description' where product_name='$p_name'";
            echo $sql;
            $result=$conn->query($sql);
            if(!$result){
                $errorMessage='Invalid query'.$conn->error; 
                break;
            }
            $p_name="";
            $description="";
            $price="";
            $quantity="";
            $successMessage="The new product added successfully";
            header("Location: index.php");
            exit;

        } while (false);

    }
   
        $description=$row['description'];
        $price=$row['price'];
        $quantity=$row['quantity'];
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Client</h2>
        <?php 
        if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' area-label='close'> </button>
            
            </div>
            ";
        }
        
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?= $p_name?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Product Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="product_name" value="<?php echo $p_name ?> ">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="<?php echo $description ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="price" value="<?php echo $price ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="quantity" value="<?php echo $quantity ?>">
                </div>
            </div>

            <?php 
            if(!empty($successMessage)){
                echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' area-label='close'> </button>
                            </div>
                        </div>
                    </div>
                    ";
            }   
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a  class="btn btn-outline-primary" href="/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>

    </div>
</body>
</html>