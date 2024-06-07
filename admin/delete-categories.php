<?php
require '../config/function.php';

$paramResultId = checkParamID('ID');
if(is_numeric($paramResultId)){
    $categoryId = validate($paramResultId);
    $category = getByID('category', $categoryId);
    if($category['status'] == 200){
        $categoryDel = delete('category', $categoryId);
        if($categoryDel){
            redirect('view-categories.php', 'Category deleted successfully');
        }else{
            $_SESSION['status'] = 'Failed to delete category';
            $_SESSION['alertType'] = 'danger';
            redirect('view-categories.php', 'Failed to delete category');
        }
    }else{
        $_SESSION['status'] = 'Category not found';
        $_SESSION['alertType'] = 'warning';
        redirect('view-categories.php', 'Category not found');
    }
} else{
    $_SESSION['status'] = 'Invalid parameter';
    $_SESSION['alertType'] = 'danger';
    redirect('view-categories.php', 'Invalid parameter');
}
?>