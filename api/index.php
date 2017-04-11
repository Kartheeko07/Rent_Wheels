<html>
<head>
<title> Books </title>
</head>

<body>

<table border="1">
<tr><th>book-id</th><th>title</th><th>year</th><th>price</th><th>category</th></tr>

<?php

$dbName = "test";
try{
	$db = new PDO("mysql:dbname=".$dbName.";host=localhost", "root", "root");
	$rows=$db->query("SELECT * FROM book;");
	foreach ($rows as $r) {
		
		echo "<tr><td>".$r['book_id']."</td><td>".$r['title']."</td><td>".$r['year']."</td><td>".$r['price']."</td><td>".$r['category'];"</td></tr>";
	}
	}
	
catch(Exception $ex) {
	echo "<p>error in connection</p>";
	exit;		
}


?>

</table>

</body>
</html>
