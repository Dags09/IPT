<?php
session_start();

// Check if the session username is set
if (!isset($_SESSION['username'])) {
    // Redirect to login.php if the session is not set
    header('Location: index.php');
    exit();
}

// Check if the user's XML file exists in the users folder
$user_file = 'users/' . $_SESSION['username'] . '.xml';
$admin_file = 'admin_user/' . $_SESSION['username'] . '.xml';

if (!file_exists($user_file) && !file_exists($admin_file)) {
    // Redirect to login.php if neither the user nor admin file exists
    header('Location: main.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="css/Custom.css">
</head>
<body>
    <div class="background1">
        <img class="wall1" src="img/background1.png">
        <nav class="menu">
            <ul>
                <li><a href="main.php">Home</a></li>
                <li><a href="watch/watch.php" class="active">Watch</a></li>
                <li><a href="quotes/quotes.php">Quotes</a></li>
                <li><a href="AskUser/AskUser.php">Chat</a>
                    <ul>
                        <li><a href="consult/consult.php">Consult</a></li>
                    </ul>
                </li>
                <li><a href="about/about.php">About</a></li>
                <li><a href="register/logout.php" class="signout">Sign out</a>
                    <ul>
                        <li><a href="admin/admin_login.php">Admin</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="paragraph1">
            <p>THE E-MINDS SUPPORT SYSTEM: ADAPTIVE VIDEO INSPIRATION FOR<br><br>
                STUDENTS PROVIDES INTERACTIVE, FRIENDLY AND SUPPORTIVE<br><br>
                PLATFORM FOR BUILDING SELF CONFIDENCE TO ACHIEVE AND STRIVE <br><br>
                TO THEIR STUDIES.
            </p>
        </div>
    </div>
    <div class="background2">
        <img class="wall2" src="img/background3.png">
        <div class="date">
            <?php date_default_timezone_set('Asia/Manila'); ?>
            <p><?php echo date("F j, Y, g:i a"); ?></p>
        </div>
        <div class="motive">
            <a href="quotes/quotes.php"><img class="m12" src="image/m12.png">
            <img class="m11" src="image/m11.png">
            <img class="m10" src="image/m10.png">
            <img class="m9" src="image/m9.png">
            <img class="m8" src="image/m8.png">
            <img class="m7" src="image/m7.png">
            <img class="m6" src="image/m6.png">
            <img class="m5" src="image/m5.png">
            <img class="m4" src="image/m4.png">
            <img class="m3" src="image/m3.png">
            <img class="m2" src="image/m2.png">
            <img class="m1" src="image/m1.png"></a>
        </div>
        <div class="paragraph2">
            <p>
                INSPIRATIONAL QUOTES IS OFTEN HELP PEOPLE OVERCOME THESE CHALLENGING TIMES, WHETHER IT'S FROM A BOOK, MOVIE, OR FAMOUS
                PERSON, THESE WORDS OF WISDOM CAN HELP GET US THROUGH THE DAY. MOTIVATING QUOTES HAVE SUCH A POWERFUL EFFECT ON OUR MINDS AND
                EMOTIONS.
            </p>
        </div>
        <div class="footer" id="contact">
            <div class="ref">
                <a href="https://web.facebook.com/profile.php?id=100005732717636"><img src="img/fb_icon.jpg" alt="Facebook"></a>
                <a href="https://www.instagram.com/jimuel_28?igsh=NHc4MmNmaGVpdnoz"><img src="img/ig_icon.jpg" alt="Instagram"></a>
                <a href="mailto:jewellevincentatienza09@gmail.com"><img src="img/Gmail_icon.jpg" alt="Gmail"></a>
                <a href="tel:09380665907"><img src="img/phone_icon.jpg" alt="09380665907"></a>
                <br>
                &copy; <?php echo date("Y"); ?> E-MINDS - All rights reserved
            </div>
        </div>
    </div>
</body>
</html>
