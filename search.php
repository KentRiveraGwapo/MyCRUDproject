<!-- search.php -->
<?php
include 'config.php';

// Assuming you have a database connection established
$pdo = new PDO("mysql:host=localhost;dbname=crud_db", "root", "");

if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Perform a search query on your database
    $query = "SELECT * FROM student WHERE lastname LIKE :search";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':search', '%' . $search . '%');
    $stmt->execute();

    // Fetch and display results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results) {
        ?>
        <style>
             .form{
        margin: 5% 30% 1% 30%;
        padding: 2% 5% 5% 5%;
        border: 1px black solid;
        border-radius: 10px;
        align-items: center;
        background-color: grey;
        color: white;

    }
        </style>
         <div class="form">
            <?php
        echo "<h2>Search Results:</h2>";
        foreach ($results as $result) {
            echo "<p>Last name: {$result['lastname']}</p>";
            echo "<p>First name: {$result['firstname']}</p>";
            echo "<p>Age: {$result['age']}</p>";
            echo "<p> Gender: {$result['gender']}</p>";
            echo "<p>Course: {$result['course']}</p>";
            echo "<p>Year and Section: {$result['year_sec']}</p>";
            echo "<p>Address: {$result['address']}</p>";
            // Display other column details as needed
        }?>
<button style="float: right; margin-top: 0;" onclick="document.location='index.php'">Back</button>

        </div>
        <?php
    } else {
        echo "<p>No results found.</p>";
    }
    
}
?>

