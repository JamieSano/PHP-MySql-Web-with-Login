<?php 
    $page = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'], "/")+ 1);
    
?>
<div id="layoutSidenav_nav">        
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                
                <a class="nav-link <?=$page == 'index.php' ? 'active':'';?>" href="index.php"> 
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard 
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
        <!-- Products -->
                <a class="nav-link 
                    <?=($page == 'add-products.php') || ($page == 'view-products.php')  ? 'collapse active':'collapsed';?>"
                    href="#" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Products
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse 
                    <?=($page == 'add-products.php')||($page == 'view-products.php') ? 'show':'';?>"
                    id="collapseProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?=$page == 'add-products.php' ? 'active':'';?>" href="add-products.php">Add Products</a>
                        <a class="nav-link <?=$page == 'view-products.php' ? 'active':'';?>" href="view-products.php">View Products</a>
                    </nav>
                </div>

        <!-- Categories -->
                <a class="nav-link 
                    <?=($page == 'add-categories.php') || ($page == 'view-categories.php')  ? 'collapse active':'collapsed';?>"
                    href="#" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Categories
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse 
                    <?=($page == 'add-categories.php')||($page == 'view-categories.php') ? 'show':'';?>"
                    id="collapseCategories" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?=$page == 'add-categories.php' ? 'active':'';?>" href="add-categories.php">Add Category</a>
                        <a class="nav-link <?=$page == 'view-categories.php' ? 'active':'';?>" href="view-categories.php">View Categories</a>
                    </nav>
                </div>
        <!-- Suppliers -->
                <a class="nav-link 
                <?=($page == 'add-suppliers.php') || ($page == 'view-suppliers.php')  ? 'collapse active':'collapsed';?>"
                href="#" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapseSuppliers" aria-expanded="false" aria-controls="collapseSuppliers">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Suppliers
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse
                    <?=($page == 'add-suppliers.php')||($page == 'view-suppliers.php') ? 'show':'';?>" 
                    id="collapseSuppliers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?=$page == 'add-suppliers.php' ? 'active':'';?>" href="add-suppliers.php">Add Supplier</a>
                        <a class="nav-link <?=$page == 'view-suppliers.php' ? 'active':'';?>" href="view-suppliers.php">View Suppliers</a>
                    </nav>
                </div>
                <!-- add ons-->
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link 
                <?=($page == 'products-reports.php') || ($page == 'category-reports.php') || ($page == 'supplier-reports.php') ? 'collapse active':'collapsed';?>" 
                href="#"data-bs-toggle="collapse" 
                data-bs-target="#collapseCharts" aria-expanded="false" aria-controls="collapseCharts">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Reports
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse
                <?=($page == 'products-reports.php') || ($page == 'category-reports.php') || ($page == 'supplier-reports.php') ? 'show':'';?>"  
                id="collapseCharts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?=$page == 'products-reports.php' ? 'active':'';?>" href="products-reports.php">Product Reports</a>
                        <a class="nav-link <?=$page == 'category-reports.php' ? 'active':'';?>" href="category-reports.php">Category Reports</a>
                        <a class="nav-link <?=$page == 'supplier-reports.php' ? 'active':'';?>" href="supplier-reports.php">Suppliers Reports</a>
                    </nav>
                </div>
                
                <a class="nav-link 
                <?=($page == 'view-customers.php') ? 'collapse active':'collapsed';?>" 
                href="#"data-bs-toggle="collapse" 
                data-bs-target="#collapseCustomers" aria-expanded="false" aria-controls="collapseCustomers">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Customers
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse
                <?=($page == 'view-customers.php') ? 'show':'';?>"  
                id="collapseCustomers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?=$page == 'view-customers.php' ? 'active':'';?>" href="view-customersphp">Customer Orders</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            KOFI-KO Admin
        </div>
    </nav>
</div>