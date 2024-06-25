<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    // Here, you would typically save the data to a database

    echo "Opportunity posted successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post an Opportunity</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Browse Opportunities</a></li>
                <li><a href="post_opportunity.php">Post an Opportunity</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="post-form">
            <h1>Post an Opportunity</h1>
            <form action="post_opportunity.php" method="POST">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
                <label for="deadline">Deadline:</label>
                <input type="date" id="deadline" name="deadline" required>
                <button type="submit">Post Opportunity</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Job Portal. All rights reserved.</p>
    </footer>
</body>
</html>
