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

$isbn = $author_first_name = $author_last_name = $title = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $isbn = $_POST['isbn'] ?? '';
    $author_first_name = $_POST['author_first_name'] ?? '';
    $author_last_name = $_POST['author_last_name'] ?? '';
    $title = $_POST['title'] ?? '';


    $conditions = [];
    $params = [];
    $types = '';

    if (!empty($isbn)) {
        $conditions[] = "isbn LIKE ?";
        $params[] = "%$isbn%";
        $types .= 's';
    }
    if (!empty($author_first_name)) {
        $conditions[] = "author_first_name LIKE ?";
        $params[] = "%$author_first_name%";
        $types .= 's';
    }
    if (!empty($author_last_name)) {
        $conditions[] = "author_last_name LIKE ?";
        $params[] = "%$author_last_name%";
        $types .= 's';
    }
    if (!empty($title)) {
        $conditions[] = "title LIKE ?";
        $params[] = "%$title%";
        $types .= 's';
    }

    $query = "SELECT * FROM books";
    if (!empty($conditions)) {
        $query .= " WHERE " . implode(' AND ', $conditions);
    }

    $stmt = $conn->prepare($query);
    if ($types) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>ISBN: " . $row["ISBN"] . ", Autor: " . $row["author_first_name"] . " " . $row["author_last_name"] . ", Název: " . $row["title"] . ", Popis: " . $row["description"] . "</li>";
    }
    echo "</ul>";
}
?>

<form action="" method="post">
    ISBN: <input type="text" name="isbn"><br>
    Křestní jméno autora: <input type="text" name="author_first_name"><br>
    Příjmení autora: <input type="text" name="author_last_name"><br>
    Název knihy: <input type="text" name="title"><br>
    <input type="submit" value="Vyhledat knihy">
</form>

  </body>
</html>










