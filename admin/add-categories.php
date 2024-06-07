<?php include('includes/header.php'); ?>

<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-0">Category List
                <a href="view-categories.php" class="btn btn-primary float-end">View Category</a>
            </h4>
        </div>
        <div class="card-body">
            <form action="code.php" method="POST">
            
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Category Name *</label>
                        <input type="text" name="Category_Name" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description *</label>
                        <input type="text" name="Category_Descrip" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3 text-end">
                        <br/>
                        <button type="submit" name="saveCategory" class="btn btn-primary">Save</button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>    

<?php include('includes/footer.php'); ?>