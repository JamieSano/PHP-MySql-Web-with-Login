<?php include('includes/header.php'); ?>

<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-0">Suppliers Report
            </h4>
        </div>
        <div class="card-body">
            <?php 
                $query = "SELECT s.Supplier_Name, s.Supplier_Contact, p.Product_name, c.Category_Name, p.Price, s.Supplier_PhoneNum
                FROM supplier s INNER JOIN (category c INNER JOIN product p ON c.ID = p.Category_ID) ON s.ID = p.Supplier_ID;
                "; 
                $products = mysqli_query($conn, $query);
                if($products){
                    if(mysqli_num_rows($products) > 0){
                        ?>
                        <table class="table table-bordered align-items-center justify-content-center">
                            <thead>
                                <tr>
                                <th>Supplier Company</th>
                                <th>Contact Person</th>
                                <th>Phone Number</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($products as $prodItem):?> 
                                    <tr>
                                        <td class="fw-bold"><?= $prodItem['Supplier_Name']?></td>
                                        <td class="fw-bold"><?= $prodItem['Supplier_Name']?></td>
                                        <td class="fw-bold"><?= $prodItem['Supplier_PhoneNum']?></td> 
                                        <td><?= $prodItem['Category_Name']?></td>   
                                        <td class="fw-bold"><?= $prodItem['Product_name']?></td>  
                                        <td><?= $prodItem['Price']?></td>  
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