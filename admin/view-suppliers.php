<?php include('includes/header.php'); ?>

<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-0">Suppliers List
                <a href="add-suppliers.php" class="btn btn-primary float-end">Add Supplier</a>
            </h4>
        </div>
        <div class="card-body">
            
            <?php alertMessage() ?>
            <?php 
            $supplier = getAll('supplier');
            if(!$supplier){
                echo "<h4>Something went wrong!</h4>";
                return false;
            }

            if(mysqli_num_rows($supplier) > 0){
            ?>
            <div class = "table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Supplier ID</th>
                            <th>Supplier Name</th>
                            <th>Supplier Contact Person</th>
                            <th>Supplier Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($supplier as $item): ?>
                        <tr>
                            <td><?= $item['ID']?></td>
                            <td><?= $item['Supplier_Name']?></td>
                            <td><?= $item['Supplier_Contact']?></td>
                            <td><?= $item['Supplier_PhoneNum']?></td>
                            <td>
                                <a href="edit-suppliers.php?ID=<?= $item['ID'];?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="delete-suppliers.php?ID=<?= $item['ID'];?>" 
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
                    <h4 class="mb-0">No Suppliers found!</h4>
                <?php
            }
             ?> 
        </div>       
    </div>
</div>
<?php include('includes/footer.php'); ?>
