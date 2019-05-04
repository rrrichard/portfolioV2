<?php
require_once 'php/functions.php';
require_once 'db/db_query.php';

$db = getDbConnection();
$paragraphs = addAboutMe($db);
$paragraphResult = addParagraphs($paragraphs);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Richard Rabulan | Web Developer</title>
    <link rel= "stylesheet" type="text/css" href= "normalize.css">
    <link rel= "stylesheet" type="text/css" href= "style.css">
</head>
<body>
    <a name="top"></a>
    <header class="navBar featureImage">
        <div class="container">
                <ul>
                    <li><a href="#top" class="navDefault">HOME</a></li>
                    <li><a href="#about">ABOUT ME</a></li>
                    <li><a href="#feature">PORTFOLIO</a></li>
                    <li><a href="#footer">CONTACT</a></li>
                    <li><a href="#top" class="navHidden">HOME</a></li>
                </ul>
            <h1>RICHARD RABULAN</h1>
            <p>Web Developer</p>
            <a href="#feature" class="more">MORE</a>
        </div>
    </header>
    <section class="portfolio">
        <a id="feature" name="feature"></a>
        <div class="workSection">
            <h3>PORTFOLIO</h3>
            <div class="projectBox project1 projectDone">
                <h3>
                        PROJECT 1
                </h3>
            </div>
            <div class="projectBox project2 projectDone">
                <h3>
                    <a href="https://github.com/rrrichard/solarv2" target="_blank">
                        PROJECT 2
                    </a>
                </h3>
            </div>
            <div class="projectBox project3 projectDone">
                <h3>
                    <a href="https://dev.maydenacademy.co.uk/projects/2019Feb/2019-paint-app/" target="_blank">
                        PROJECT 3
                    </a>
                </h3>
            </div>
            <div class="projectBox project4">
                <h4>PROJECT 4</h4>
                <p>UNDER CONSTRUCTION</p>
            </div>
            <div class="projectBox project5">
                <h4>PROJECT 5</h4>
                <p>UNDER CONSTRUCTION</p>
            </div>
            <div class="projectBox project6">
                <h4>PROJECT 6</h4>
                <p>UNDER CONSTRUCTION</p>
            </div>
        </div>
    </section>
    <section class="otherWork">
        <h2>Other Works</h2>
        <h4>Feb 11 2019</h4>
        <div class="line">
        </div>
        <div class="circle">
        </div>
        <div class="line">
    </section>
    <section class="aboutMe container">
        <a name="about"></a>
        <div>
            <h2>ABOUT ME</h2>
            <?php echo $paragraphResult; ?>
        </div>
    </section>
    <footer class="footer">
        <a name="footer"></a>
        <section class="contact">
                <h2>CONTACT ME</h2>
                <p><a href="tel:07708021930">Phone</a>
                </p>
                <p><a href="mailto:richard.rabulan@hotmail.co.uk">Email</a></p>
        </section>
        <div>
            <a href="#top" class="backUp">Back to Top</a>
        </div>

        <div class="container">
            <div class="logoContainer">
                <a href="https://github.com/rrrichard" target="_blank">
                    <img src="images/github.svg" alt="github logo">
                </a>
                <a href="https://uk.linkedin.com/in/richard-mc-rabulan-ba7a94170" target="_blank">
                    <img src="images/linkedin.svg" alt="linkedin logo">
                </a>
                <a href="https://www.codewars.com/users/richarduuu" target="_blank">
                    <img src="images/codewars.svg" alt="codewars logo">
                </a>
                <a href="https://www.instagram.com/totallynotrichard/" target="_blank">
                    <img src="images/instagram.svg" alt="instagram logo">
                </a>
                <a href="php/admin_page.php" target="_blank">
                    <img src="images/admin.svg" alt="admin logo">
                </a>
            </div>
        </div>
        <div class="container">
            <p class="copyright">
                &copy; 2019 Richard Rabulan, All rights reserved.
            </p>
        </div>
    </footer>
</body>
</html>