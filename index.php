<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $loggedIn = true;
    $username = $_SESSION['username'];
} else {
    $loggedIn = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Browse Opportunities</a></li>
                <li><a href="post_opportunity.php">Post an Opportunity</a></li>
                <?php if ($loggedIn) : ?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else : ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">SignUp</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <?php if ($loggedIn) : ?>
            <div class="profile-actions">
                <ul>
                    <li><a href="edit_profile.php">Edit Profile</a></li>
                    <li><a href="upload_profile_pic.php">Upload Profile Picture</a></li>
                    <li><a href="followers.php">Check Followers</a></li>
                    <li><a href="delete_account.php">Delete Account</a></li>
                </ul>
            </div>
        <?php endif; ?>
        <div class="search-header">
            <form action="search.php" method="get">
                <input type="text" name="query" placeholder="Search opportunities...">
                <button type="submit">Search</button>
            </form>
        </div>
    </header>
    <main>
        <section class="hero">
            <h1>Explore New Opportunities!</h1>
            <p>Or, <a href="post_opportunity.php">post an opportunity</a> for free.</p>
            <form class="search-form">
                <select name="opportunity">
                    <option value="any">Any Opportunity</option>
                </select>
                <select name="region">
                    <option value="any">Any Region</option>
                </select>
                <button type="submit">Explore</button>
            </form>
        </section>
        <section class="opportunities">
            <h2>Deadline Approaching</h2>
            <div id="opportunities-container"></div>
        </section>
    </main>
    <footer>
        <div class="footer-container">
            <div class="social-media">
                <a href="#"><img src="images/twitter.png" alt="Twitter"></a>
                <a href="#"><img src="images/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="images/linkedin.png" alt="LinkedIn"></a>
                <a href="#"><img src="images/instagram.png" alt="Instagram"></a>
                <a href="#"><img src="images/youtube.png" alt="YouTube"></a>
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="#">Youth Opportunities</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Partners</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Join</a></li>
                    <li><a href="#">Local Networks</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Promote Program</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-description">
                <h3>International Youth Opportunities</h3>
                <p>Youth Opportunities is the largest opportunities discovery platform for youth across Nepal.</p>
            </div>
        </div>
        <p>&copy; 2024 Job Portal. All rights reserved.</p>
    </footer>
    <script src="scripts.js"></script>
    <script src="neonAnimation.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch("fetch_opportunities.php")
                .then((response) => response.json())
                .then((data) => {
                    const container = document.getElementById("opportunities-container");
                    data.forEach((opportunity) => {
                        const div = document.createElement("div");
                        div.classList.add("opportunity");
                        div.innerHTML = `
                            <img src="${opportunity.image_url}" alt="${opportunity.title}">
                            <h3>${opportunity.title}</h3>
                            <p>${opportunity.description}</p>
                            <p>Deadline: ${new Date(opportunity.deadline).toLocaleDateString()}</p>
                        `;
                        container.appendChild(div);
                    });
                })
                .catch((error) => console.error("Error fetching opportunities:", error));
        });
    </script>
</body>
</html>
