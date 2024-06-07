<?php include('inc_out/header.php'); ?>
<div class = "container-fluid px-4">
    <?php alertMessage()?>
    <div class="card mt-4 shadow sm">
        <div class="card-header">

            <h4 class="mb-0">Order Form
                <a href="home-products.php" class="btn btn-primary float-end">View Products</a>
            </h4>
        </div>
        <div class="card-body">
        <?php alertMessage()?>
            <form action="code_logs.php" method="POST">
            
            <!--   <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Customer Name *</label>
                        <input type="text" name="customer_name" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Customer Address *</label>
                        <input type="text" name="customer_add" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Contact Number *</label>
                        <input type="text" name="contact_no" required class="form-control" />
                    </div>
                </div> -->

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Select Product *</label>
                        <select name="product_id" required class="form-select mySelect2">
                            <option value="">-- All Products --</option>
                            <?php 
                            $product = getAll('product');
                            if($product){
                                if(mysqli_num_rows($product) > 0){
                                    foreach($product as $prodItem){
                                        echo "<option value='".$prodItem['ID']."'>".$prodItem['Product_name']."</option>";
                                    }
                                } else{
                                    echo "<option value=''>No Product Found</option>";
                                }
                            } else {
                                echo "<option value=''>Something Went Wrong!</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="">Quantity *</label>
                        <input type="number" name="quantity" value= "1" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3 text-end">
                        <br/>
                        <button type="submit" name="addItem" class="btn btn-primary">Add Item</button>
                    </div> 
                </div>
                
            </form>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
        <?php alertMessage()?>
            <h4 class="mb-0">Order Summary</h4>
            <?php 
            if(isset($_SESSION['productItems'])){
                $sessionProducts = $_SESSION['productItems'];
                if(empty($sessionProducts)){
                    unset($_SESSION['productItems']);
                    unset($_SESSION['productItemsIDs']);
                }
              ?>
              <div class ="table-responsive mb-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                         $i = 1;
                         $totalPrice = 0;
                         foreach($sessionProducts as $key => $item): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $item['product_name']; ?></td>
                            <td><img src="../<?= $item['image']; ?>" style="width: 100px; height: 100px;" alt="img"></td>
                            <td><?= $item['price']; ?></td>
                            <td><?= $item['quantity']; ?>
                             <!--   <div class="input-group qtyBox">
                                    <input type="hidden" value="<?= $item['product_id'];?>" class="prodID" />
                                    <button class = "input-group-text decrement">-</button> 
                                    <input type="number" value="<?= $item['quantity']; ?>" class="qty quantityInput" />
                                    <button class="input-group-text increment">+</button> 
                                </div> -->
                            </td>
                            
                            <td>
                                <a href="order-item-delete.php?index=<?= $key; ?>" class="btn btn-danger btn-sm">
                                    Remove
                                </a>
                        </tr>
                        
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="5" class="text-end">Total:</td>
                            <td><?= $totalPrice += $item['price']?></td>
                        </tr>
                    </tbody>
                </table>
              </div>
              
              <div class="mt-2">
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label> Select Payment Method</label>
                        <select id="payment_mode" class="form-select">
                            <option value="">-- Select Payment Method --</option>
                            <option value="Cash">Pay-on-the-Counter</option>
                            <option value="Card">Gcash</option>
                        </select>
                    </div>
                   <!-- <div class="col-md-4">
                        <label> Enter Customer Phone Number</label>
                        <input type="number" id="contact_no" class="form-control" value="" />
                    </div> -->
                    <div class="col-md-4">
                        <br/>
                        <button type="button" name = "proceedToPlaceBtn" class="btn btn-warning w-100">Place Order</button>
                    </div>
                </div>
              </div>
              <?php 
            }
            else{
                echo '<h4 class="text-center">No Item Added</h4>';
            }
              
            ?>
        </div>
    </div>
</div>  
<?php include('inc_out/footer.php'); ?>