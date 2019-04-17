<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- SEO -->
    <title>Armand Bozsik</title>
    <meta name="description" content="Here you can take a look at my CV and contact me if you wish."/>
    <meta name="robots" content="index, follow"/>
    <meta name="referrer" content="always"/>
    <meta name="theme-color" content="#000000"/>

    <!-- Facebook & Twitter -->
    <meta property="og:title" content="Armand Bozsik"/>
    <meta property="og:description" content="Here you can take a look at my CV and contact me if you wish."/>
    <meta property="og:image" content="https://bozsikarmand.github.io/images/social.jpg">
    <meta property="og:url" content="https://bozsikarmand.github.io/"/>
    <meta name="twitter:title" content="Armand Bozsik">
    <meta name="twitter:description" content="Armand Bozsik"/>
    <meta name="twitter:image" content="https://bozsikarmand.github.io/images/social.jpg"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@bozsikarmand"/>
    <meta name="twitter:creator" content="@bozsikarmand"/>

    <!-- Favicon -->

    <link rel="apple-touch-icon" sizes="180x180" href="../assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/icons/favicon-16x16.png">
    <link rel="manifest" href="../assets/icons/site.webmanifest">
    <link rel="mask-icon" href="../assets/icons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">

    <link rel='stylesheet' href='../assets/css/style.css' type='text/css' media='screen'/>
    <link rel='stylesheet' href='../assets/fonts/fontawesome/css/all.min.css' type='text/css' media='screen'/>

    <meta name="viewport" content="width=device-width,initial-scale=1"/>
</head>

<body id="single-page" class="page-landing">
<div class="sp-landing">
    <div class="image">
        <picture>
            <source srcset="../assets/images/main/main.webp" type="image/webp">
            <source srcset="../assets/images/main/main.png" type="image/png">
            <img src="../assets/images/main/main.png" alt="My profile picture">
        </picture>
    </div>
    <div class="content" style="overflow: auto;">
        <div class="center">
            <nav class="navigation-links">
                <div class="navigation-link">
                    <ul>
                        <li>
                            <a href="../index.php" class="actual">
                                <i class="fas fa-home"></i> Home
                            </a>
                            <a href="../portfolio.php">
                                <i class="fas fa-briefcase"></i> Portfolio
                            </a>
                            <a href="../includes/login.php" class="login-button-header">
                                <i class="fas fa-user"></i> Log in
                            </a>
                            <a href="../includes/contact.php">
                                <i class="fas fa-envelope"></i> Contact me
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="introduction">
                <h1>Successful registration</h1>
                <span class="self-identification">YAY!</span>
            </div>
            <div class="contact">
                <?php

                session_start();

                /* Session parameter uzenetek */
                $_SESSION["SessionIsRegisterSuccessfulMessage"] = "You have registered successfully!";

                if ($_SESSION["SessionIsRegisterSuccessful"] = true) {
                    echo $_SESSION["SessionIsRegisterSuccessfulMessage"] . "<br />";
                }
                ?>

                <form action="../logic/login.php" method="post" class="form-login">
                    <button name="form-login-button" class="form-login-button">
                        <i class="fas fa-arrow-alt-circle-left"></i> Go back to login page
                    </button>
                </form>
            </div>
            <div class="social-media-profiles">
                <div class="social-media-profile">
                    <h3>Connect</h3>
                    <ul>
                        <li>
                            <a href="https://reddit.com/u/armandbozsik">
                                <i class="fab fa-reddit"></i> Reddit
                            </a>
                        </li>
                        <li>
                            <a href="mailto:me@armands.site">
                                <i class="fas fa-envelope"></i> Email
                            </a>
                        </li>
                        <li>
                            <a href="https://blog.bozsikarmand.hu/">
                                <i class="fas fa-blog"></i> Blog
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="social-media-profile">
                    <h3>Social</h3>
                    <ul>
                        <li>
                            <a href="https://instagram.com/bozsikarmand">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                        </li>
                        <li>
                            <a href="https://dribbblle.com/bozsikarmand">
                                <i class="fab fa-dribbble"></i> Dribbble
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/bozsikarmand">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="social-media-profile">
                    <h3>Network</h3>
                    <ul>
                        <li>
                            <a href="https://facebook.com/bozsikarmand">
                                <i class="fab fa-facebook"></i> Facebook
                            </a>
                        </li>
                        <li>
                            <a href="https://keybase.io/bozsikarmand">
                                <i class="fab fa-youtube"></i> Keybase
                            </a>
                        </li>
                        <li>
                            <a href="http://www.youtube.com/c/ArmandBozsik">
                                <i class="fab fa-keybase"></i> YouTube
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <footer class="footer-links">
                <div class="footer-link">
                    <ul>
                        <li>
                            <a href="privacy-policy.php">
                                <i class="fas fa-user-secret"></i> Privacy Policy
                            </a>
                            <a href="cookie-policy.php">
                                <i class="fas fa-cookie-bite"></i> Cookie Policy
                            </a>
                        </li>
                    </ul>
                </div>
            </footer>
            <div class="copyright">
                <p class="copyright-year">
                    &copy;
                    <?php

                    require_once("misc/currentYear.php");

                    echo currentYear() ?>
                    Armand Bozsik
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>