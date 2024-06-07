<?php include('includes/header.php'); ?>

<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-0">Products
                <a href="BYCAT-products.php" class="btn btn-secondary float-end ">By Category</a>
                <a href="BYSUP-products.php" class="btn btn-dark float-end">By Supplier</a>
            </h4>
        </div>
        <div class="card-body">
            
            <?php alertMessage() ?>
            <?php 
            $products = getAll('product');
            if(!$products){
                echo "<h4>Something went wrong!</h4>";
                return false;
            }

            if(mysqli_num_rows($products) > 0){
            ?>
            <div class = "table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>CategoryID</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>SupplierID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($products as $item): ?>
                        <tr>
                            <td><?= $item['ID']?></td>
                            <td><img src="../<?= $item['Image']?>" style="width=100px; height=100px;" alt="img">
                            <td><?= $item['Category_ID']?></td>
                            <td><?= $item['Product_name']?></td>
                            <td><?= $item['Quantity']?></td>
                            <td><?= $item['Price']?></td>
                            <td><?= $item['Supplier_ID']?></td>
                            <td>
                                <a href="edit-products.php?ID=<?= $item['ID'];?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="delete-products.php?ID=<?= $item['ID'];?>" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this product?');"
                                    >
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php
            }
            else {
                ?>
                    <h4 class="mb-0">No products found!</h4>
                <?php
            }
             ?> 
        </div>       
    </div>
</div>
<?php include('includes/footer.php'); ?>

