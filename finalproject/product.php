<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $products = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$products) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>
<?=template_header('Product')?>

<div class="product content-wrapper">
    <img src="imgs/<?=$products['img']?>" width="500" height="500" alt="<?=$products['name']?>">
    <div>
        <h1 class="name"><?=$products['name']?></h1>
        <span class="price">
            &dollar;<?=$products['price']?>
        </span>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$products['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="id" value="<?=$products['id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$products['desc']?>
        </div>
    </div>
</div>

<?=template_footer()?>
