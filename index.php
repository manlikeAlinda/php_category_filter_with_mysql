<?php include 'header.php'; ?>
<?php include 'connect.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4>How to filter/find data from DB using Multiple Checkbox in PHP MySQL</h4>
                </div>
            </div>
        </div>
        <!-- categorylist -->
        <div class="col-md-3">
            <form action="" method="GET">
            <div class="card shadow mt-3">
                <div class="card-header">
                    <h5>Filter
                        <button type="submit" class="btn btn-danger btn-sm float-end">
                            <i class="fa fa-plus">Search</i>
                    </h5>
                </div>
                <div class="card-body">
                    <h6>Category List</h6>
                    <?php
                    $category_query = 'SELECT * FROM category';
                    $category_result = mysqli_query($conn, $category_query);
                    if (mysqli_num_rows($category_result) > 0) {
                        foreach ($category_result as $category) {

                            $checked = [];
                            if (isset($_GET['category'])) {
                                $checked = $_GET['category'];
                            }
                            ?>
                            <div class="form-check">
                                 <input class="form-check-input" type="checkbox" name="category[]" value="<?php echo $category[
                                     'category_id'
                                 ]; ?>" <?php if (
    in_array($category['category_id'], $checked)
) {
    echo 'checked';
} ?>>
                                 <label class="form-check-label"><?php echo $category[
                                     'category_name'
                                 ]; ?></label>
                            </div>
                    <?php
                        }
                    } else {
                        echo 'No Category Found';
                    }
                    ?>
                </div>
            </div>
            </form>
        </div>
        <!-- items -->
        <div class="col-md-9 mt-3">
            <div class="card mt-3">
                <div class="card-body row">
                    <?php
                    if(isset($_GET['category']))
                    {
                        $categorychecked =[];
                        $categorychecked = $_GET['category'];
                        foreach($categorychecked as $rowcategory) {
                            $products = 'SELECT * FROM products WHERE category_id = '.$rowcategory;
                            $products_result = mysqli_query($conn, $products);
                            if (mysqli_num_rows($products_result) > 0) {
                                foreach ($products_result as $product): ?>
                                        <div class="col-md-4">
                                                    <div class="border px-4 py-2 mb-2 bg-success text-white">
                                                    <h6><?= $product[
                                                        'product_name'
                                                    ] ?></h6>
                                            </div>
                                        </div>
                                    <?php endforeach;
                            } else {
                                echo 'No Product Found in this Category '.$rowcategory.'';
                            }
                        }
                    } else {
                        $products = 'SELECT * FROM products';
                        $products_result = mysqli_query($conn, $products);
                        if (mysqli_num_rows($products_result) > 0) {
                            foreach ($products_result as $product): ?>
                                    <div class="col-md-4">
                                                <div class="border px-2 py-2 mb-2 bg-success text-white">
                                                <h6><?= $product[
                                                    'product_name'
                                                ] ?></h6>
                                        </div>
                                    </div>
                                <?php endforeach;
                        } else {
                            echo 'No Product Found';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
