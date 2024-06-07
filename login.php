<?php include('<inc_out/header.php');
if(isset($_SESSION['loggedIn'])){
    ?>
    <script>
        window.location.href = 'home.php';
    </script>
    <?php
}
?>
<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-2 fw-bold">KOFI-KO DASHBOARD
            </h4>
        </div>
        
        <div class="card-body">
            <?php alertMessage(); ?>
            <form action="code_logs.php" method="POST">
                <div class="row">
                    
                    <div class="col-md-12 mb-3">
                        <label for="">Username *</label>
                        <input type="text" name="username" required class="form-control" />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Password *</label>
                        <input type="password" name="password" required class="form-control" />
                    </div>

                    <div class="col-md-12 mb-3 text-end">
                        <br/>
                        <button type="submit" name="login" class="btn btn-primary">LOGIN</button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>
 
<?php include('inc_out/footer.php'); ?>
