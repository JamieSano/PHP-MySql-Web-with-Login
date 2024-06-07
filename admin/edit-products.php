<?php include('includes/header.php'); ?>

<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-0">Products
                <a href="view-products.php" class="btn btn-primary float-end">View Products</a>
            </h4>
        </div>
        <div class="card-body">
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <?php alertMessage(); 
                alertMessage();
                $parmValue = checkParamID('ID');
                if(!is_numeric($parmValue)){
                    echo '<h4>'.$parmValue.'</h4>';
                    return false;
                }
                $product = getById('product', $parmValue);
                
                if($product['status'] == 200){
                ?>
                <input type="hidden" name="Product_ID" value="<?php echo $product['data']['ID']; ?>" />
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
                                        ?>
                                        <option 
                                            value = "<?= $catItem['ID']; ?>" 
                                            <?= $product['data']['Category_ID'] == $catItem['ID'] ? 'selected' : ''; ?>
                                            >
                                            <?= $catItem['Category_Name']; ?>
                                        </option>
                                     <?php
                                    }
                                }else{
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
                        <input type="text" name="Product_name" value="<?php $product['data']['Product_name'];?>" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Price *</label>
                        <input type="text" name="Price" value="<?php $product['data']['Price'];?>" required class="form-control" />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Quantity *</label>
                        <input type="text" name="Quantity" value="<?php $product['data']['Quantity'];?>" required class="form-control" />
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
                                        ?>
                                        <option 
                                            value = "<?= $supItem['ID']; ?>" 
                                            <?= $product['data']['Supplier_ID'] == $supItem['ID'] ? 'selected' : ''; ?>>

                                            <?= $supItem['Supplier_Name']; ?>
                                        </option>
                                     <?php
                                    }
                                }else{
                                    echo "<option value=''>No Category Found</option>";
                                }
                            } else {
                                echo "<option value=''>Something Went Wrong!</option>";
                            }
                            ?>
                        </select>
                    </div>

                    
                    <div class="col-md-12 mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" />
                        <img src="../<?php $product['data']['Image']; ?>" style="width: 40px; height: 40px;" alt="img">
                    </div>

                    <div class="col-md-12 mb-3 text-end">
                        <button type="submit" name="updateProduct" class="btn btn-primary">Save</button>
                    </div> 
                </div>
                <?php
                }
                else{
                    echo '<h4>'.$category['message'].'</h4>';
                }
                ?>
            </form>
        </div>
    </div>
</div>    

<?php include('includes/footer.php'); ?>