<?php
session_start();
require 'config/function.php';

// Admin Registration
if(isset($_POST['saveReg'])){
    global $conn;
    $name = validate($_POST['name']);
    $contact_no = validate($_POST['contact_no']);
    $visiting_ID = validate($_POST['visiting_ID']);
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $retry_pass = validate($_POST['retry_pass']);
    
    if($name != ''  && $contact_no != ''&& $visiting_ID != '' && $username != '' && $password != '' && $retry_pass != ''){
        $query = "SELECT * FROM admin WHERE name = '$name'";
        $name_check = mysqli_query($conn, $query);
        if($name_check){
            if(mysqli_num_rows($name_check) > 0){
                $_SESSION['status'] = 'Name already exists';
                $_SESSION['alertType'] = 'warning';
                redirect('signup.php', 'Name already exists');
            }
        }
        
        $query = "SELECT * FROM admin WHERE username = '$username'";
        $username_check = mysqli_query($conn, $query);
        if($username_check){
            if(mysqli_num_rows($username_check) > 0){
                $_SESSION['status'] = 'Username already exists';
                $_SESSION['alertType'] = 'warning';
                redirect('signup.php', 'Username already exists');
            }
        }
       
        if($password == $retry_pass){
            //$bcrypt = password_hash($password, PASSWORD_BCRYPT);
            $data = [
                'name' => $name,
                'contact_no' => $contact_no,
                'visiting_ID' => $visiting_ID,
                'username' => $username,
                'password' => $password, //md5($password)
                'retry_pass' => $retry_pass //md5($retry_pass)
            ];
            $result = insertRecord('admin', $data);
            if($result){
                $_SESSION['status'] = 'Registered Successfully';
                $_SESSION['alertType'] = 'success';
                redirect('signup.php', 'Registered Successfully');
            }
            else {
                $_SESSION['status'] = 'Failed to Register User';
                $_SESSION['alertType'] = 'danger';
                redirect('signup.php', 'Failed to Register');
            }
        }
        else {
            $_SESSION['status'] = 'Password did not match';
            $_SESSION['alertType'] = 'warning';
            redirect('signup.php', 'Password did not match');
        }
    }
    else {
        redirect('signup.php', 'All fields are required');
    }
}

// Admin Login
if (isset($_POST['login'])) {
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if ($username != '' && $password != '') {
        $query = "SELECT * FROM admin WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPass = $row['password'];
            $storePos = $row['visiting_ID'];

            // Debugging statements
            echo "Hashed Password from DB: " . $hashedPass . "<br>";
            echo "Password from user: " . $password . "<br>";
            
            if ($password != $storedPass) {
                echo "Password verification failed.<br>";
                $_SESSION['status'] = 'Incorrect Password';
                $_SESSION['alertType'] = 'warning';
                redirect('login.php', 'Incorrect Password');
            } else {
                echo "Password verification succeeded.<br>";
            }
            if($storePos == 1){
                $_SESSION['loggedIn'] = true;
                $_SESSION['loggedInUser'] = [
                'ID' => $row['ID'],
                'name' => $row['name'],
                'visiting_ID' => $row['visiting_ID'],
                'username' => $row['username']
                ];
                redirect('admin/index.php', 'Welcome ' . $_SESSION['loggedInUser']['name']);
            } else {
                $_SESSION['loggedIn'] = true;
                $_SESSION['loggedInUser'] = [
                'ID' => $row['ID'],
                'name' => $row['name'],
                'visiting_ID' => $row['visiting_ID'],
                'username' => $row['username']
                ];
                redirect('home.php', 'Welcome ' . $_SESSION['loggedInUser']['name']);
            }
            
        } else {
            $_SESSION['status'] = 'Username does not exist';
            $_SESSION['alertType'] = 'warning';
            redirect('login.php', 'Username does not exist');
        }
    } else {
        redirect('login.php', 'All fields are required');
    }
}

// create Orders 
if (!isset($_SESSION['productItems'])){
    $_SESSION['productItems'] = [];    
}
if(!isset($_SESSION['productItemsIDs'])){
    $_SESSION['productItemsIDs'] = [];    
}
if(isset($_POST['addItem']))
{
    $product_id = validate($_POST['product_id']);
    $quantity = validate($_POST['quantity']);
 
        $query = "SELECT * FROM product WHERE ID = '$product_id' LIMIT 1";
        $product_check = mysqli_query($conn, $query);
        if($product_check){
            if(mysqli_num_rows($product_check) > 0){
              $row = mysqli_fetch_assoc($product_check);
              if($row['Quantity'] < $quantity){
                $_SESSION['status'] = 'Order' .$row['Quantity']. 'quantity available!';
                $_SESSION['alertType'] = 'danger';
                redirect('create-order.php', 'Order' .$row['Quantity']. 'quantity available!');
              }
              $productData = [
                'product_id' => $row['ID'],
                'product_name' => $row['Product_name'],
                'image' => $row['Image'],
                'quantity' => $quantity, 
                'price' => $row['Price'],
                'total' => $row['Price'] * $quantity,
              ];
              if(!in_array($row['ID'], $_SESSION['productItemsIDs'])){
                array_push($_SESSION['productItemsIDs'], $row['ID']);
                array_push($_SESSION['productItems'], $productData);
              } else{
                foreach($_SESSION['productItems'] as $key => $item){
                  if($item['product_id'] == $row['ID']){
                   
                    $newQuantity = $item['quantity'] + $quantity;
                    $productData = [
                        'product_id' => $row['ID'],
                        'product_name' => $row['Product_name'],
                        'image' => $row['Image'],
                        'quantity' => $quantity,
                        'price' => $row['Price'],
                        'total' => $row['Price'] * $quantity,
                    ];
                    $_SESSION['productItems'][$key] = $productData;
                  }
                }
              }
                $_SESSION['status'] = 'Item Added Successfully!';
                $_SESSION['alertType'] = 'success';
                redirect('create-order.php', 'Item Added Successfully');
              
            } else{
                $_SESSION['status'] = 'Product does not exists';
                $_SESSION['alertType'] = 'warning';
                redirect('create-order.php', 'Product does not exists');
            }
        } else{
            $_SESSION['status'] = 'Something went wrong!';
            $_SESSION['alertType'] = 'warning';
            redirect('create-order.php', 'Something went wrong!');
        }
}
if(isset($_POST['productIncDec'])){
    $productId = validate($_POST['product_id']);
    $quantity = validate($_POST['quantity']);

    $flag = false;
    foreach($_SESSION['productItems'] as $key => $item){
        if($item['product_id'] == $productId){
            $flag = true;
            $_SESSION['productItems'][$key]['quantity'] = $quantity;
        }

    }
    if($flag){
        jsonResponse(200, 'success', 'Quantity Updated Successfully');
    }else{
        jsonResponse(500, 'error', 'Something went wrong!');
    }
}

if(isset($_POST['proceedToPlaceBtn'])){
    $phone = validate($_POST['contact_no']);
    $payment_mode = validate($_POST['payment_mode']);

   # $checkIfCustomer = mysqli_query($conn, "SELECT * FROM admin WHERE visiting_ID = 2");
   # if($checkIfCustomer){
   #     if(mysqli_num_rows($checkIfCustomer) > 0){
           $checkCustomer = mysqli_query($conn, "SELECT * FROM admin WHERE visiting_ID = 2 && contact_no = '$phone' limit 1");
            if($checkCustomer){
                if(mysqli_num_rows($checkCustomer) > 0){
                    $_SESSION['invoice_no'] = "INV".rand(100000, 999999);
                    $_SESSION['contact_no'] = $phone;
                    $_SESSION['payment_mode'] = $payment_mode;
                    echo $payment_mode;
                    $_SESSION['status'] = 'Order reserved';
                    $_SESSION['alertType'] = 'success';
                    redirect('view-invoice.php', 'Check cart items!');
                }else{
                    $_SESSION['contact_no'] = $phone;
                    $_SESSION['status'] = 'Customer not found';
                    $_SESSION['alertType'] = 'warning';
                    redirect('create-order.php', 'Customer not found');
                }
            } else{
                $_SESSION['status'] = 'Something went wrong!';
                    $_SESSION['alertType'] = 'danger';
                    redirect('create-order.php', 'Something went wrong!');
            }
        } 
 #   }
# }

?>