<?php include('includes/header.php'); ?>

<div class = "container-fluid px-4">
    <div class="card mt-4 shadow sm">
        <div class="card-header">
            <h4 class="mb-0">Category List
                <a href="add-categories.php" class="btn btn-primary float-end">Add Category</a>
            </h4>
        </div>
        <div class="card-body">
            
            <?php alertMessage() ?>
            <?php 
            $category = getAll('category');
            if(!$category){
                echo "<h4>Something went wrong!</h4>";
                return false;
            }

            if(mysqli_num_rows($category) > 0){
            ?>
            <div class = "table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($category as $item): ?>
                        <tr>
                            <td><?= $item['ID']?></td>
                            <td><?= $item['Category_Name']?></td>
                            <td><?= $item['Category_Descrip']?></td>
                            <td>
                                <a href="edit-categories.php?ID=<?= $item['ID'];?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="delete-categories.php?ID=<?= $item['ID'];?>" 
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
                    <h4 class="mb-0">No categories found!</h4>
                <?php
            }
             ?> 
        </div>       
    </div>
</div>
<?php include('includes/footer.php'); ?>

