<?php include('includes/header.php'); ?>

<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-0">Products
                <a href="view-products.php" class="btn btn-primary float-end">View Products</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage()?>
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-12 mb-3">
                        <label for="">Select Category *</label>
                        <select name="category_id" required class="form-select">
                            <option value="">Select Category</option>
                            <?php 
                            $categories = getAll('category');
                            if($categories){
                                if(mysqli_num_rows($categories) > 0){
                                    foreach($categories as $catItem){
                                        echo "<option value='".$catItem['ID']."'>".$catItem['Category_Name']."</option>";
                                    }
                                } else{
                                    echo "<option value=''>No Category Found</option>";
                                }
                            } else {
                                echo "<option value=''>Something Went Wrong!</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Product Name *</label>
                        <input type="text" name="Product_name" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Price *</label>
                        <input type="text" name="Price" required class="form-control" />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Quantity *</label>
                        <input type="text" name="Quantity" required class="form-control" />
                    </div>

                    

                    <div class="col-md-12 mb-3">
                        <label for="">Select Supplier *</label>
                        <select name="supplier_id" required class="form-select">
                            <option value="">Select Supplier</option>
                            <?php 
                            $supplier = getAll('supplier');
                            if($supplier){
                                if(mysqli_num_rows($supplier) > 0){
                                    foreach($supplier as $supItem){
                                        echo "<option value='".$supItem['ID']."'>".$supItem['Supplier_Name']."</option>";
                                    }
                                } else{
                                    echo "<option value=''>No Supplier Found</option>";
                                }
                            } else {
                                echo "<option value=''>Something Went Wrong!</option>";
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label for="">Image *</label>
                        <input type="file" name="image" class="form-control" />
                    </div>

                    <div class="col-md-12 mb-3 text-end">
                        <button type="submit" name="saveProduct" class="btn btn-primary">Save</button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>    
<?php include('includes/footer.php'); ?>