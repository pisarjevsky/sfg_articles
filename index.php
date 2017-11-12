<?php include 'includes/header.php';?>

<?php
$query = mysqli_query($db_connect, "SELECT * FROM `articles` ORDER BY `id` desc");
$row_count = mysqli_num_rows($query);
if(!$row_count): echo "No articles";
else:
    while($art = mysqli_fetch_assoc($query)):
if($art['display']== 1){
?>
<div>
	<p>Id: <?=$art['id']?></p>
	<p>Title: <?=$art['title']?></p>
	<p>Content: <?=$art['text']?></p>
	<p>Date: <?=$art['date']?></p>
    <p>Display: <?=$art['display']?></p>
</div>
<hr>
<?php } endwhile; ?>
<?php endif; ?>

<?php require 'includes/footer.php';?>
