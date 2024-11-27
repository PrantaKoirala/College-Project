<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>

    <div class="content-wrapper">
        <div class="container">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-9">
                        <?php
                        // Open database connection
                        $conn = $pdo->open();

                        // Ensure 'query' parameter is set and not empty
                        if (isset($_GET['query']) && !empty($_GET['query'])) {
                            $keyword = $_GET['query'];
                            $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE name LIKE :keyword");
                            $stmt->execute(['keyword' => '%' . $keyword . '%']);
                            $row = $stmt->fetch();
                            if ($row['numrows'] < 1) {
                                echo '<h1 class="page-header">No results found for <i>' . htmlspecialchars($keyword) . '</i></h1>';
                            } else {
                                echo '<h1 class="page-header">Search results for <i>' . htmlspecialchars($keyword) . '</i></h1>';
                                try {
                                    $inc = 3;
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :keyword");
                                    $stmt->execute(['keyword' => '%' . $keyword . '%']);

                                    foreach ($stmt as $row) {
                                        $highlighted = preg_filter('/' . preg_quote($keyword, '/') . '/i', '<b>$0</b>', $row['name']);
                                        $image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
                                        $inc = ($inc == 3) ? 1 : $inc + 1;
                                        if ($inc == 1) echo "<div class='row'>";
                                        echo "
                                            <div class='col-sm-4'>
                                                <div class='box box-solid'>
                                                    <div class='box-body prod-body'>
                                                        <img src='" . $image . "' width='100%' height='230px' class='thumbnail'>
                                                        <h5><a href='product.php?product=" . $row['slug'] . "'>" . $highlighted . "</a></h5>
                                                    </div>
                                                    <div class='box-footer'>
                                                        <b>रू " . number_format($row['price'], 2) . "</b> (NPR)
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                        if ($inc == 3) echo "</div>";
                                    }
                                    if ($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>";
                                    if ($inc == 2) echo "<div class='col-sm-4'></div></div>";

                                } catch (PDOException $e) {
                                    echo "There is some problem in connection: " . $e->getMessage();
                                }
                            }
                        } else {
                            echo '<h1 class="page-header">No search query provided</h1>';
                        }

                        // Close database connection
                        $pdo->close();

                        ?>
                    </div>
                    <div class="col-sm-3">
                        <?php include 'includes/sidebar.php'; ?>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>