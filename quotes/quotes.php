<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quotes Page</title>
    <link rel="stylesheet" type="text/css" href="../css/quotes_custom.css">
    <style>
        /* Additional CSS for image modal */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)}
            to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg1">
    <div id="container">
        <ul id="menu">
            <li><a href="../main.php">Home</a></li>
            <li><a href="../watch/watch.php" class="active">Watch</a></li>
            <li><a href="quotes.php">Quotes</a></li>
            <li><a href="../AskUser/AskUser.php">Chat</a>
                <ul>
                    <li><a href="../consult/consult.php">Consult</a>
                </ul>
            </li>
            <li><a href="../about/about.php">About</a></li>
            <li><a href="../register/logout.php" class="signout">Sign out</a>
                <ul>
                    <li><a href="../admin/admin_login.php">Admin</a>
                </ul>
            </li>
        </ul>
    </div>
    <div class="title">
        <h1>Read Some Quotes</h1>
    </div>
    <div class="motive">
        <?php
        $imageFolder = '../image/';
        $images = glob($imageFolder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        foreach($images as $image) {
            echo '<img src="' . $image . '" onclick="openModal(this.src)">';
        }
        ?>
    </div>
    <div class="seemore">
        <a href="https://www.brainyquote.com/topics/motivational-quotes">See More</a>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

    <script>
        // Function to open the modal
        function openModal(imgSrc) {
            var modal = document.getElementById('myModal');
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            modal.style.display = "block";
            modalImg.src = imgSrc;
            captionText.innerHTML = imgSrc; // You can change this to display image caption if available
        }

        // Function to close the modal
        function closeModal() {
            document.getElementById('myModal').style.display = "none";
        }
    </script>
</body>
</html>
