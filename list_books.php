<!DOCTYPE html>
<html lang="cs">
  <head>
    <meta charset="UTF-8" />
    <title>Evidence knih</title>
    <link rel="stylesheet" href="styles.css" />
  </head>

  <body>
    <div class="container">
      <header>
      <h1><a href="index.php" style="color: white; text-decoration: none;">Evidence Knih</a></h1>
        <nav>
          <ul>
            <li><a href="insert_book.php">Vkládání nových knih</a></li>
            <li><a href="list_books.php">Přehled knih</a></li>
            <li><a href="search_books.php">Vyhledávání knih</a></li>
          </ul>
        </nav>
      </header>
    </div>
    
    <div class="list_books"> 
    <?php
include 'db_connect.php';

$query = "SELECT * FROM books";
$result = $conn->query($query);

while($row = $result->fetch_assoc()) {
    echo "ISBN: " . $row["ISBN"] . ", Autor: " . $row["author_first_name"] . " " . $row["author_last_name"] . ", Název: " . $row["title"] . ", Popis: " . $row["description"] . "<br>";
}
?>
</div>

  </body>
</html>





