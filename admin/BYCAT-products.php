<?php include('includes/header.php'); ?>

<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-0">Products by Category
            <a href="view-products.php" class="btn btn-primary float-end">BACK</a>
            </h4>
        </div>
        <div class="card-body">
            <?php 
                $query = "SELECT p.*, c.* FROM product p, category c WHERE p.Category_ID = c.ID ORDER BY p.Category_ID ASC"; 
                $products = mysqli_query($conn, $query);
                if($products){
                    if(mysqli_num_rows($products) > 0){
                        ?>
                        <table class="table table-bordered align-items-center justify-content-center">
                            <thead>
                                <tr>
                                <th>Category ID</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($products as $prodItem):?> 
                                    <tr>
                                        <td class="fw-bold"><?= $prodItem['Category_ID']?></td>
                                        <td class="fw-bold"><?= $prodItem['Category_Name']?></td>  
                                        <td><?= $prodItem['Product_name']?></td>  
                                        <td><img src="../<?= $prodItem['Image']?>" style="width=100px; height=100px;" alt="img"></td>
                                        <td><?= $prodItem['Price']?></td>  
                                        <td><?= $prodItem['Quantity']?></td>  
                                        <td>
                                            <a href="edit-products.php?ID=<?= $prodItem['ID']?>" class="btn btn-primary btn-sm">Edit</a>
                                    </tr>
                                <?php endforeach;?> 
                            </tbody>
                        <?php
                    } else{
                        echo "<h5>No Product Found!</h5>";
                    }
                } else{
                    echo "<h5>Something Went Wrong!</h5>";
                }
            ?>
    
        </div>
    </div>
</div>    

<?php include('includes/footer.php'); ?>