<?php include('includes/header.php'); ?>

<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-0">Suppliers List
                <a href="view-suppliers.php" class="btn btn-primary float-end">View Suppliers</a>
            </h4>
        </div>
        <div class="card-body">
            <form action="code.php" method="POST">
            
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Supplier Company Name *</label>
                        <input type="text" name="Supplier_Name" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Supplier Contact Person *</label>
                        <input type="text" name="Supplier_Contact" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Supplier Phone Number *</label>
                        <input type="text" name="Supplier_PhoneNum" required class="form-control" />
                    </div>
                    
                    <div class="col-md-12 mb-3 text-end">
                        <br/>
                        <button type="submit" name="saveSupplier" class="btn btn-primary">Save</button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>    

<?php include('includes/footer.php'); ?>