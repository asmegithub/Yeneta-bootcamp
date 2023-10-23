  <?php
    require "db.php";
    
    $sql = "SELECT * FROM product";
    $result=$conn->query($sql);
    
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of products</h2>
        <a class="btn btn-primary" role="button" href="./create.php"> New Product</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>price</th>
                    <th>availability</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>    
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td> <?php echo $row['price']?>$</td>
                        <td><?php echo $row['quantity']>0? 'available': 'out of stock' ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="edit.php?id=<?= $row['product_name'] ?>">Edit</a>
                             <a class="btn btn-danger btn-sm" href="delete.php?id=<?= $row['product_name'] ?>">Delete</a>
                        </td>
                    </tr> 
               <?php endwhile; ?>
               
            </tbody>
        </table>
    </div>
</body>
</html>