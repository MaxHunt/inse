<?php include('header.php'); ?>
	
		<section class="main">
<?php
mysql_query("INSERT INTO  `INSE_db`.`records` (`ItemID` ,`name` ,`price` ,`stock` ,`description` ,`link` ,`parentID` ,`rating` ,`tags`)
VALUES (NULL ,  '".$_POST["name"]."',  ".$_POST["price"].",  '".$_POST["stock"]."',  '".$_POST["description"]."',  '".$_FILES["file"]["name"].
"',  '1',  '".$_POST["rating"]."',  '".$_POST["tags"]."')");
move_uploaded_file($_FILES["file"]["tmp_name"],
"../images/" . $_FILES["file"]["name"]);
echo "Stored in: " . "../images/" . $_FILES["file"]["name"];
$resultProduct = mysql_query("SELECT * FROM products WHERE name = '".$_POST["name"]."'");
if (!empty($resultProduct)){
    echo "ITEM ADDED";
}
else{
    echo "Invalid file";
}
?>
</section>

<?php include('footer.php'); ?>