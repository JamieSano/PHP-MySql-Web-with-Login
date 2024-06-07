<?php include('includes/header.php'); ?>

<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-0">Products by Supplier
            <a href="view-products.php" class="btn btn-primary float-end">BACK</a>
            </h4>
        </div>
        <div class="card-body">
            <?php 
                $query = "SELECT p.*, s.* FROM product p, supplier s WHERE p.Supplier_ID = s.ID ORDER BY p.Supplier_ID ASC"; 
                $products = mysqli_query($conn, $query);
                if($products){
                    if(mysqli_num_rows($products) > 0){
                        ?>
                        <table class="table table-bordered align-items-center justify-content-center">
                            <thead>
                                <tr>
                                <th>Supplier ID</th>
                                    <th>Company Name</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Contact Person</th>
                                    <th>Phone Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($products as $prodItem):?> 
                                    <tr>
                                        <td class="fw-bold"><?= $prodItem['Supplier_ID']?></td>
                                        <td class="fw-bold"><?= $prodItem['Supplier_Name']?></td>  
                                        <td><?= $prodItem['Product_name']?></td> 
                                        <td><img src="../<?= $prodItem['Image']?>" style="width=100px; height=100px;" alt="img"></td> 
                                        <td><?= $prodItem['Supplier_Contact']?></td>  
                                        <td><?= $prodItem['Supplier_PhoneNum']?></td>  
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