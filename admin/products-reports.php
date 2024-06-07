<?php include('includes/header.php'); ?>

<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-0">Products Report
            </h4>
        </div>
        <div class="card-body">
            <?php 
                $query = "SELECT p.ID, p.Product_name, c.Category_Name, s.Supplier_Name, s.Supplier_Contact, s.Supplier_PhoneNum, p.Price, p.Quantity
                FROM supplier s INNER JOIN (category c INNER JOIN product p ON c.ID = p.Category_ID) ON s.ID = p.Supplier_ID;                
                ";  
                $products = mysqli_query($conn, $query);
                if($products){
                    if(mysqli_num_rows($products) > 0){
                        ?>
                        <table class="table table-bordered align-items-center justify-content-center">
                            <thead>
                                <tr>
                                <th>Product ID</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Supplier Name</th>
                                <th>Contact Person</th>
                                <th>Phone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($products as $prodItem):?> 
                                    <tr>
                                        <td class="fw-bold"><?= $prodItem['ID']?></td>
                                        <td class="fw-bold"><?= $prodItem['Product_name']?></td>
                                        <td><?= $prodItem['Price']?></td>  
                                        <td><?= $prodItem['Quantity']?></td>   
                                        <td class="fw-bold"><?= $prodItem['Category_Name']?></td>
                                        <td class="fw-bold"><?= $prodItem['Supplier_Name']?></td>  
                                        <td><?= $prodItem['Supplier_Contact']?></td>  
                                        <td><?= $prodItem['Supplier_PhoneNum']?></td>    
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