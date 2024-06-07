<?php include('includes/header.php'); ?>

<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-0">Edit Category
                <a href="view-categories.php" class="btn btn-primary float-end">BACK</a>
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
                $category = getById('category', $parmValue);
                
                if($category['status'] == 200){
                ?>
                <input type="hidden" name="Category_ID" value="<?php echo $category['data']['ID']; ?>" />
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Category Name *</label>
                        <input type="text" name="Category_name" value="<?php $category['data']['Category_Name']; ?>" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description *</label>
                        <input type="text" name="Category_Descrip" value="<?php $category['data']['Category_Descrip']; ?>" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3 text-end">
                        <br/>
                        <button type="submit" name="updateCategory" class="btn btn-primary">Update</button>
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