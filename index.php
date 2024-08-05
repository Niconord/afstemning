<?php
require "settings/init.php";

// Hent billeder fra databasen
$sql = "SELECT id, lokation, rejsebillede FROM rejser";
$billeder = $db->sql($sql, [], true);
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Sigende titel</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<header class="bg-light p-3">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img class="logo" src="uploads/LogoLysnobg.png" alt="Your Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto p-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#follow">Socials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#LatestVideo">Latest video</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Poll">Viewer Poll</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Contact">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div class="container-fluid header d-flex align-items-center justify-content-center p-3" id="follow">
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="textbox bg-light bg-opacity-50 p-3 rounded d-flex flex-column flex-md-row align-items-center justify-content-center">
                <div class="text-content text-wrap p-5">
                    <h1 class="text-center text-md-left">Simon Andersen - Train, Travel & Transport</h1>
                    <p class="text-center text-md-left"> Bla bla bla  Bla bla bla  Bla bla bla  Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla</p>
                </div>
                <div class="container text-center">
                    <h2>Social channels</h2>
                    <div class="button-group d-flex flex-wrap justify-content-center">
                        <a href="https://www.youtube.com/@Simon-Andersen" class="button button-primary m-2">YouTube</a>
                        <a href="https://www.instagram.com/nuggetwarrior52" class="button button-secondary m-2">Instagram</a>
                        <a href="https://www.example.com" class="button button-tertiary m-2">Twitter</a>
                        <a href="https://www.example.com" class="button button-quaternary m-2">TikTok</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="separator"></div>

<div class="container-fluid SenesteVideo d-flex flex-column justify-content-center align-items-center" id="LatestVideo">
    <h1 class="p-3">My latest video</h1>
    <div class="video-container">
        <iframe src="https://www.youtube.com/embed/gLowUjTF6Og" allowfullscreen></iframe>
    </div>
</div>

<div class="separator"></div>

<div class="afstemning container-fluid justify-content-center text-center align-content-center" id="Poll">
    <h1>Afstemning</h1>
        <div class="row" id="imageContainer">
            <?php foreach ($billeder as $billede): ?>
                <div class="col-12 col-md-6 col-lg-3 mb-3">
                    <img src="uploads/<?php echo htmlspecialchars($billede->rejsebillede); ?>"
                        alt="<?php echo htmlspecialchars($billede->lokation); ?>"
                        data-id="<?php echo $billede->id; ?>"
                        data-voted="false">
                    <p class="lokation-text"><?php echo htmlspecialchars($billede->lokation); ?></p>
                    <p class="vote-count" style="display: none;">Stemmer: 0</p> <!-- Initially hidden -->
                </div>
            <?php endforeach; ?>
        </div>
    <button id="resetVotesButton" class="btn btn-secondary mt-3" style="display: none;">Vote Again</button>
</div>


<div class="separator"></div>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" id="Gallery">
        <div class="carousel-item active">
            <img class="d-block w-100" src="uploads/galleri1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="uploads/galleri2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="uploads/galleri3.jpg" alt="Third slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="uploads/galleri4.jpg" alt="Fourth slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="uploads/galleri5.jpg" alt="Fifth slide">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="separator"></div>

<footer>
    <div class="kontakt text-white text-center py-4" id="Contact">
        <div class="container">
            <h3 class="p-2">Text me @ mail or socials</h3>
            <p class="mb-2">Press the icons to go to the desired social media</p>
            <div class="d-flex justify-content-center">
                <a href="mailto:example@example.com" class="text-white me-3">
                    <i class="fas fa-envelope fa-2x"></i>
                </a>
                <a href="https://www.facebook.com" class="text-white me-3">
                    <i class="fab fa-facebook fa-2x"></i>
                </a>
                <a href="https://www.youtube.com" class="text-white me-3">
                    <i class="fab fa-youtube fa-2x"></i>
                </a>
                <a href="https://www.instagram.com" class="text-white">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="copyright text-center">
        <div class="container">
            <p class="mb-0">2024 Simon Andersen - Travel. &copy; All Rights Reserved.</p>
        </div>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myCarousel = document.querySelector('#carouselExampleControls');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000,
            ride: 'carousel'
        });
    });
</script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var images = document.querySelectorAll('.afstemning img');
        var voteCounts = {};
        var hasVoted = false;
        var resetButton = document.getElementById('resetVotesButton');
        var imageContainer = document.getElementById('imageContainer');

        // Check if user has voted
        var voted = localStorage.getItem('hasVoted');
        if (voted === 'true') {
            hasVoted = true;
            hideImages(); // Gemmer billederne, når bruger har stemt
            showResetButton(); // Viser "vote again" knap
            updateVotes();
        }

        images.forEach(function(img) {
            var id = img.getAttribute('data-id');
            voteCounts[id] = 0;

            img.addEventListener('click', function() {
                if (hasVoted) return; // Gør så der ikke kan voteres igen

                voteCounts[id]++; //
                localStorage.setItem('voteCounts', JSON.stringify(voteCounts)); // Gemmer votes
                localStorage.setItem('hasVoted', 'true'); //
                hasVoted = true; // Gør så der ikke kan voteres igen
                hideImages(); // Gemmer billederne, når bruger har stemt
                showResetButton(); // Viser "vote again" knap
                updateVotes();
            });
        });

        // Load saved votes
        var savedVotes = localStorage.getItem('voteCounts');
        if (savedVotes) {
            voteCounts = JSON.parse(savedVotes);
            if (hasVoted) {
                hideImages(); // Gemmer billederne, når bruger har stemt
                showResetButton(); // Viser "vote again" knap
            }
            updateVotes();
        }

        function hideImages() {
            images.forEach(function(img) {
                img.style.display = 'none'; // Gemmer billeder
            });
        }

        function showResetButton() {
            resetButton.style.display = 'block'; // Vis knappen
        }

        function updateVotes() {
            images.forEach(function(img) {
                var id = img.getAttribute('data-id');
                var voteCount = voteCounts[id] || 0;
                var voteCountElem = img.nextElementSibling.nextElementSibling;
                if (voteCountElem) {
                    voteCountElem.textContent = "Stemmer: " + voteCount; // Opdatere votes med antal klik
                    voteCountElem.style.display = 'block'; // Viser votes
                }
            });
        }

        // Nulstilling af afstemning
        resetButton.addEventListener('click', function() {
            localStorage.removeItem('voteCounts'); // Fjerne vote
            localStorage.removeItem('hasVoted'); // Fjerner at brugeren "har stemt"
            voteCounts = {}; // Resetter votes
            hasVoted = false; // Gør så brugeren kan stemme igen
            imageContainer.style.display = 'flex'; // Viser billederne
            resetButton.style.display = 'none'; // Gemmer "vote again" knap
            images.forEach(function(img) {
                img.style.display = 'block'; // Viser billederne
                var voteCountElem = img.nextElementSibling.nextElementSibling;
                if (voteCountElem) {
                    voteCountElem.style.display = 'none'; // Gemmer votes
                }
            });
        });
    });
</script>
</body>
</html>

