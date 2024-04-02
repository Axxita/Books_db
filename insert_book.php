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
    
    <?php

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn = $_POST['isbn'];
    $author_first_name = $_POST['author_first_name'];
    $author_last_name = $_POST['author_last_name'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO books (isbn, author_first_name, author_last_name, title, description) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $isbn, $author_first_name, $author_last_name, $title, $description);
    $stmt->execute();
    echo "Kniha byla úspěšně vložena.";
}
?>

<form action="" method="post">
    ISBN: <input type="text" name="isbn"><br>
    Křestní jméno autora: <input type="text" name="author_first_name"><br>
    Příjmení autora: <input type="text" name="author_last_name"><br>
    Název knihy: <input type="text" name="title"><br>
    Popis: <textarea name="description"></textarea><br>
    <input type="submit" value="Vložit knihu">
</form>

  </body>
</html>



