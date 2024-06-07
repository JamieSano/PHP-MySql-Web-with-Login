<?php include('includes/header.php'); ?>


<div class="container-fluid px-4">
    <div class="row justify-content-sm-evenly">
    <div class="col-md-12 ">
            <h1 class="mt-4 fw-bold text-dark text-md-center">KOFI - KO Analytics</h1>
            <hr>
            <?php alertMessage(); ?>
        </div>
        <div class="col-md-12 mb mb-3">
            <img src="assets\img\Salmon Pink and Cream Vintage Coffee Mug Illustration Quote Facebook Cover .png" alt="KOFI Image" style="width: 100%; height: auto;">
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-body bg-primary p-3 ">
                <p class="text-sm mb-0 text-capitalize text-white">Total Categories</p>
                <div class="fw-bold text-white mb-0">
                    <?= getCount('category'); ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view-categories.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-body bg-dark p-3">
                <p class="text-sm mb-0 text-capitalize text-white">Total Products</p>
                <div class="fw-bold text-white mb-0">
                    <?= getCount('product'); ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view-products.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-body bg-danger p-3">
                <p class="text-sm mb-0 text-capitalize text-white">Total Suppliers</p>
                <div class="fw-bold text-white mb-0">
                    <?= getCount('supplier'); ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view-suppliers.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <!-- Add a new row for the pie chart -->
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 fw-bold text-md-center">Category with Highest Quantity</h4>
                </div>
                <div class="card-body">
                    <canvas id="quantityChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Add a new row for the pie chart -->
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 fw-bold text-md-center">No. Products by Category</h4>
                </div>
                <div class="card-body">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4">
            <div class="card mt-4 shadow sm">
                <div class="card-header">
                    <h4 class="mb-0 fw-bold text-md-center">PRODUCTS INVENTORY</h4>
                </div>
                <div class="card-body">
                    <?php alertMessage() ?>
                    <?php 
                    $products = getAll('product');
                    if(!$products){
                        echo "<h4>Something went wrong!</h4>";
                        return false;
                    }

                    if(mysqli_num_rows($products) > 0){
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-md-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($products as $item): ?>
                                <tr>
                                    <td><?= $item['ID']?></td>
                                    <td><img src="../<?= $item['Image']?>" style="width=100px; height=100px;" alt="img">
                                    <td><?= $item['Product_name']?></td>
                                    <td><?= $item['Quantity']?></td>
                                    <td><?= $item['Price']?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    }
                    else {
                        ?>
                            <h4 class="mb-0">No products found!</h4>
                        <?php
                    }
                    ?> 
                </div>       
            </div>
        </div>
    </div>
</div>

<?php
$productCountsByCategory = getProductCountByCategory();

$categoryNames = [];
$productCounts = [];

foreach ($productCountsByCategory as $category) {
    $categoryNames[] = $category['Category_Name'];
    $productCounts[] = $category['product_count'];
}

// Fetch data from the database to determine the category with the highest quantity
$query = "SELECT c.Category_Name, SUM(p.Quantity) AS totalQuantity 
          FROM product p 
          INNER JOIN category c ON p.Category_ID = c.ID 
          GROUP BY c.Category_Name 
          ORDER BY totalQuantity DESC 
          LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$categoryWithHighestQuantity = $row['Category_Name'];
$totalQuantity = $row['totalQuantity'];

$queryProducts = "SELECT * FROM product WHERE Category_ID = (SELECT ID FROM category WHERE Category_Name = '$categoryWithHighestQuantity')";
$resultProducts = mysqli_query($conn, $queryProducts);

// Initialize arrays for labels, data, and colors
$labels = [];
$data = [];
$colors = [];

// Fetch product data and generate labels, data, and colors
while ($rowProduct = mysqli_fetch_assoc($resultProducts)) {
    $labels[] = $rowProduct['Product_name'];
    $data[] = $rowProduct['Quantity'];
    $colors[] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));}

?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    // Get data for the chart
    const totalCategories = <?= getCount('category'); ?>;
    const totalProducts = <?= getCount('product'); ?>;
    const totalSuppliers = <?= getCount('supplier'); ?>;
    
    // Chart.js initialization
    const ctx = document.getElementById('overviewChart').getContext('2d');
    const overviewChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Categories', 'Products', 'Suppliers'],
            datasets: [{
                data: [totalCategories, totalProducts, totalSuppliers],
                backgroundColor: ['#007bff', '#343a40', '#dc3545'],
                hoverBackgroundColor: ['#0056b3', '#23272b', '#c82333'],
                borderColor: ['#ffffff', '#ffffff', '#ffffff'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', (event) => {
    const ctx = document.getElementById('quantityChart').getContext('2d');
    const quantityChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: <?= json_encode($labels) ?>,
            datasets: [{
                data: <?= json_encode($data) ?>,
                backgroundColor: <?= json_encode($colors) ?>,
                hoverBackgroundColor: <?= json_encode($colors) ?>,
                borderColor: ['#ffffff'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var dataset = data.datasets[tooltipItem.datasetIndex];
                            var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                return previousValue + currentValue;
                            });
                            var currentValue = dataset.data[tooltipItem.index];
                            var percent = Math.round((currentValue / total) * 100);
                            return data.labels[tooltipItem.index] + ': ' + currentValue + ' (' + percent + '%)';
                        }
                    }
                }
            }
        }
    });
});
document.addEventListener('DOMContentLoaded', (event) => {
    // Get data for the category chart
    const categoryNames = <?= json_encode($categoryNames); ?>;
    const productCounts = <?= json_encode($productCounts); ?>;

    // Chart.js initialization
    const ctxCategory = document.getElementById('categoryChart').getContext('2d');

    // Helper function to create gradient color
    function getGradientColor(value, minValue, maxValue) {
        const ratio = (value - minValue) / (maxValue - minValue);
        const darkColor = [139, 69, 19]; // SaddleBrown RGB
        const lightColor = [210, 105, 30]; // Chocolate RGB

        const r = Math.round(lightColor[0] + ratio * (darkColor[0] - lightColor[0]));
        const g = Math.round(lightColor[1] + ratio * (darkColor[1] - lightColor[1]));
        const b = Math.round(lightColor[2] + ratio * (darkColor[2] - lightColor[2]));

        return `rgb(${r}, ${g}, ${b})`;
    }

    // Calculate min and max product counts
    const minValue = Math.min(...productCounts);
    const maxValue = Math.max(...productCounts);

    // Generate gradient colors for each bar
    const backgroundColors = productCounts.map(count => getGradientColor(count, minValue, maxValue));

    const categoryChart = new Chart(ctxCategory, {
        type: 'bar',
        data: {
            labels: categoryNames,
            datasets: [{
                label: 'Number of Products',
                data: productCounts,
                backgroundColor: backgroundColors,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    display: false,
                },
                y: {
                    beginAtZero: true // Start y-axis from zero
                }
            }
        }
    });
});

</script>

<?php include('includes/footer.php'); ?>
