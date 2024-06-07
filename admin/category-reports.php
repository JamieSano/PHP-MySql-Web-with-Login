<?php include('includes/header.php'); ?>

<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-0">Category Report
            </h4>
        </div>
        <div class="card-body">
            <?php 
                $query = "SELECT c.date_created, c.ID, c.Category_Name, p.Product_name, s.Supplier_Contact, s.Supplier_PhoneNum, s.Supplier_Name
                FROM supplier s INNER JOIN (category c INNER JOIN product p ON c.ID = p.Category_ID) ON s.ID = p.Supplier_ID;
                "; 
                $products = mysqli_query($conn, $query);
                if($products){
                    if(mysqli_num_rows($products) > 0){
                        ?>
                        <table class="table table-bordered align-items-center justify-content-center">
                            <thead>
                                <tr>
                                <th>CATEGORY CREATED</th>
                                <th>Category ID</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Supplier Name</th>
                                <th>Contact Person</th>
                                <th>Phone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($products as $prodItem):?> 
                                    <tr>
                                        <td><?= $prodItem['date_created']?></td>  
                                        <td class="fw-bold"><?= $prodItem['ID']?></td>
                                        <td class="fw-bold"><?= $prodItem['Category_Name']?></td>
                                        <td class="fw-bold"><?= $prodItem['Product_name']?></td>
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