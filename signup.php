<?php include('<inc_out/header.php'); ?>
<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-2">Registration Form
               
            </h4>
        </div>
        <?php alertMessage(); ?>
        <div class="card-body">
            <form action="code_logs.php" method="POST">
            
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Name *</label>
                        <input type="text" name="name" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Contact No. *</label>
                        <input type="text" name="contact_no" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">You'll be visiting as *</label>
                        <select name="visiting_ID" required class="form-select">
                            <option value="">Select Accordingly</option>
                            <?php 
                            $visiting = getAll('visiting');
                            if($visiting){
                                if(mysqli_num_rows($visiting) > 0){
                                    foreach($visiting as $catItem){
                                        echo "<option value='".$catItem['ID']."'>".$catItem['positions']."</option>";
                                    }
                                } else{
                                    echo "<option value=''> Not accepting guests </option>";
                                }
                            } else {
                                echo "<option value=''>Something Went Wrong!</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Username *</label>
                        <input type="text" name="username" required class="form-control" />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Password *</label>
                        <input type="text" name="password" required class="form-control" />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Retry Password *</label>
                        <input type="text" name="retry_pass" required class="form-control" />
                    </div>

                    <div class="col-md-12 mb-3 text-end">
                        <br/>
                        <button type="submit" name="saveReg" class="btn btn-primary">REGISTER</button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>    

<?php include('<inc_out/footer.php'); ?>
