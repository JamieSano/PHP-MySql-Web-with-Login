<?php 

require 'config/function.php';

$paramResult = checkParamID('index');
if (is_numeric($paramResult)) {
    $indexValue = validate($paramResult);
    if(isset($_SESSION['productItems']) && isset($_SESSION['productItemsIDs'])) {
        unset($_SESSION['productItems'][$indexValue]);
        unset($_SESSION['productItemsIDs'][$indexValue]);
        $_SESSION['status'] = 'Item removed successfully';
        $_SESSION['alertType'] = 'success';
        redirect('create-order.php', 'Item removed successfully');
    } else {
        $_SESSION['status'] = 'No Item';
        $_SESSION['alertType'] = 'danger';
        redirect('create-order.php', 'No Item');
    }
}
else {
    $_SESSION['status'] = 'Invalid parameter';
    $_SESSION['alertType'] = 'danger';
    redirect('create-order.php', 'Invalid parameter');

}
?>