<?php
session_start();

require 'dbcon.php';
// Input field validation
function validate($inputData){
    global $conn;
    $validatedData = mysqli_real_escape_string($conn, $inputData);
    return trim($validatedData);
}

// Redirect from 1 page to another with the message
function redirect($url, $status){
    $_SESSION['status'] = $status;
    header('Location: ' . $url);
    exit(0);
}

// Display status after any process
function alertMessage(){
    if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
        $alertType = isset($_SESSION['alertType']) ? $_SESSION['alertType'] : 'success'; // Default to 'success' if not set
        $alertClass = 'alert-' . $alertType;

        echo '<div class="alert '. $alertClass .' alert-dismissible fade show" role="alert">
        <strong>'. ucfirst($alertType) .'!</strong> <h6>'. $_SESSION['status'] .'</h6>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        unset($_SESSION['status']);
        unset($_SESSION['alertType']);
    }
}

// Insert record using this function
function insertRecord($tableName, $data){
    global $conn;
    $table = validate($tableName);
    $columns = array_keys($data);
    $values= array_values($data);

    $finalcolumn = implode(',', $columns);
    $finalvalues = "'".implode("','", $values)."'";

    $query = "INSERT INTO $table ($finalcolumn) VALUES ($finalvalues)";
    $result = mysqli_query($conn, $query);
    return $result;
}
 //update data using this function
 function update($tableName, $id, $data){
    global $conn;
    $table = validate($tableName);
    $id = validate($id);
    $updateDataString = ""; // Initialize the variable with an empty string
    foreach($data as $column => $value){
        $updateDataString .= $column . '=' ."'$value',";
    }

    $finalUpdateData = substr(trim($updateDataString), 0, -1);

    $query = "UPDATE $table SET $finalUpdateData WHERE ID = $id";
    $result = mysqli_query($conn, $query);
    return $result;
 }

 function getAll($tableName, $status = NULL){
    global $conn;

    $table = validate($tableName);
    $status = validate($status);

    if($status == 'status'){
        $query = "SELECT * FROM $table WHERE status = '0'";
    }
    else{
        $query = "SELECT * FROM $table";
    }
    return mysqli_query($conn, $query);
 }

 function getByID($tableName, $id){
    global $conn;
    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE ID ='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result) == 1){
           $row = mysqli_fetch_assoc($result);
           $response = [
            'status' => 200,
            'data' => $row,
            'message' => 'Record found!'
            ];
            return $response;
        } else{
            $response = [
                'status' => 404,
                'message' => 'No record found!'
            ];
            return $response;
        }
    } else{
        $response = [
            'status' => 500,
            'message' => 'Something went wrong!'
        ];
        return $response;
    }

 }

// Delete data from database using id
function delete($tableName, $id){
    global $conn;
    $table = validate($tableName);
    $id = validate($id);

    $query = "DELETE FROM $table WHERE ID = '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    return $result;
}

function checkParamID($type){
    if(isset($_GET[$type])){
        if($_GET[$type] != ''){
            
            return $_GET[$type];
        } else{

            return '<h5>ID Not Found.</h5>';
        } 
    }else{
        
        return '<h5>Invalid ID.</h5>';
    }
}

function getSameID($type){
    global $conn;
    if(isset($_GET[$type])){
        if($_GET[$type] != ''){
            $category_id = $_GET[$type];
            $query = "SELECT * FROM product WHERE Category_ID = $category_id";
            $result = mysqli_query($conn, $query);
            return $result;
        } else{
            return '<h5>ID Not Found.</h5>';
        } 
    }else{
        return '<h5>Invalid ID.</h5>';
    }
}

function getCount($tablename){
    global $conn;
    $table = validate($tablename);
    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $totalCount = mysqli_num_rows($query_run);
        return $totalCount;
    }else{
        return "Something went wrong!";
    }
}


function getProductCountByCategory() {
    // Assuming you have a database connection established
    global $conn;

    // SQL query to count products per category
    $query = "SELECT c.Category_Name AS Category_Name, COUNT(p.ID) AS product_count
              FROM category c
              LEFT JOIN product p ON c.ID = p.Category_ID
              GROUP BY c.ID";

    $result = mysqli_query($conn, $query);

    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    return $data;
}

function logoutSession(){
    unset($_SESSION['loggedIn']);
    unset($_SESSION['loggedInUser']);

}

function jsonResponse($status, $status_type, $message){
    $response = [
        'status' => $status,
        'status_type' => $status_type, 
        'message' => $message
    ];
    echo json_encode($response);
    return;
}
?>