<?php include 'view/header.php'; ?>
<?php include 'view/sidebar.php'; ?>
<section>
    <h1>Featured products</h1>
    <p>Our PC Hardware Shop has a great selection of computer parts at a very modest price.
    </p>
    <table>
    <?php foreach ($products as $product) :
        // Get product data
        $list_price = $product['listPrice'];
        $discount_percent = $product['discountPercent'];
        $description = $product['description'];
        
        // Calculate unit price
        $discount_amount = round($list_price * ($discount_percent / 100.0), 2);
        $unit_price = $list_price - $discount_amount;

        // Get first paragraph of description
        $description_with_tags = add_tags($description);
        $i = strpos($description_with_tags, "</p>");
        $description_paragraph = substr($description_with_tags, 3, $i-3);
    ?>
        <tr>
            <td class="product_image_cell">
                <img src="images/<?php echo $product['productCode']; ?>_s.png"
                     alt="&nbsp;">
            </td>
            <td class="product_info_cell">
                <p>
                    <a href="catalog?action=view_product&amp;product_id=<?php 
                              echo $product['productID']; ?>">
                        <?php echo $product['productName']; ?>
                    </a>
                </p>
                <p>
                    <b>Your price:</b>
                    $<?php echo number_format($unit_price, 2); ?>
                </p>
                <p>
                    <?php echo $description_paragraph; ?>
                </p>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</section>
<?php include 'view/footer.php'; ?>