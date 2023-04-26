<html>
<head>
	<meta charset="UTF-8">
	<title>Warzywniak</title>
	<link rel="stylesheet" href="styl2.css">
</head>
<body>
	<header>
		<header>
    <div class="left-banner">
        <h1>Internetowy sklep z eko-warzywami</h1>
    </div>
    <div class="right-banner">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
        </ol>
    </div>
</header>
	<div class="main">
		<section>
			<?php
				 $conn = new mysqli("localhost", "root", "", "dane2");
				if ($conn->connect_error) {
					die("Nieudane połączenie z bazą danych: " . $conn->connect_error);
				}
				$sql = "SELECT * FROM produkty";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo '<div class="product">';
						echo '<img src="'.$row['zdjecie'].'" alt="warzywniak">';
						echo '<h5>'.$row['nazwa'].'</h5>';
						echo '<p>opis: '.$row['opis'].'</p>';
						echo '<p>na stanie: '.$row['ilosc'].'</p>';
						echo '<h2>'.$row['cena'].' zł</h2>';
						echo '</div>';
					}
				} else {
					echo "Brak produktów do wyświetlenia";
				}
				$conn->close();
			?>
		</section>
	<footer>
		<form action="sklep.php" method="POST">
			<p>Nazwa: <input type="text" name="nazwa"></p>
			<p>Cena: <input type="text" name="cena"></p>
			<input type="submit" value="Dodaj produkt" name="submit">
		</form>
		<p>Stronę wykonał: bartosz kowalski </p>
	</footer>
   <?php
$conn = new mysqli("localhost", "root", "", "dane2");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nazwa = $_POST["nazwa"];
  $cena = $_POST["cena"];
  $sql = "INSERT INTO produkty (nazwa, cena) VALUES ('$nazwa', '$cena')";
  if ($conn->query($sql) === TRUE) {
    echo "Produkt został dodany do sklepu";
  } 
}
$conn->close();
?>
        </div>
    </header>
    </body>
</html>
