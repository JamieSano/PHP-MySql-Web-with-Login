<?php include('includes/header.php'); ?>

<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-0">Edit Supplier
                <a href="view-suppliers.php" class="btn btn-primary float-end">BACK</a>
            </h4>
        </div>
        <div class="card-body">
            <form action="code.php" method="POST">
           
                <?php 
                alertMessage();
                $parmValue = checkParamID('ID');
                if(!is_numeric($parmValue)){
                    echo '<h4>'.$parmValue.'</h4>';
                    return false;
                }
                $category = getById('supplier', $parmValue);
                
                if($category['status'] == 200){
                ?>
                <input type="hidden" name="Supplier_ID" value="<?php echo $category['data']['ID']; ?>" />
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Supplier Company Name *</label>
                        <input type="text" name="Supplier_Name" value="<?php $category['data']['Supplier_Name']; ?>" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Supplier Contact Person *</label>
                        <input type="text" name="Supplier_Contact" value="<?php $category['data']['Supplier_Contact']; ?>" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Supplier Phone Number *</label>
                        <input type="text" name="Supplier_PhoneNum" value="<?php $category['data']['Supplier_PhoneNum']; ?>" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3 text-end">
                        <br/>
                        <button type="submit" name="updateSupplier" class="btn btn-primary">Update</button>
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