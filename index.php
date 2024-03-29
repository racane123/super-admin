<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Towntech Innovations</title>
</head>

<body id="background">
    <?php
    include('header.php');
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="logo-icon" src="image/logo.png" alt="Logo" height="30">
                <span class="logo-text">TownTech Innovations</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contacts">Contacts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/faq">FAQ</a>
                    </li>
                </ul>
                <div class="buttons">
                    <button id="btn" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </nav>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="layer1">
        <h1>TownTech<br>Innovations</h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus eos impedit et possimus quibusdam
          cumque quos natus, corrupti veniam doloribus?</p>
        <div class="layer1-button">
          <button class="btn btn-primary">Contact Us</button>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <img class="logo-main" src="image/Business-bro.png" alt="">
    </div>
  </div>
</div>
<?php
    include('login.php');
    ?>
    <div class="main-contents">
        <h1>What we do:</h1>
        <div class="contents-sections">
            <div class="contents">
                <div class="cards">
                    <img src="image/philippines.jpg" alt="" srcset="" />
                    <h3>Geograpical Data</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti corporis quas, repudiandae
                        iure blanditiis ipsam adipisci est obcaecati consectetur vitae enim repellat sequi consequuntur
                        id, incidunt totam in labore minus eaque minima nostrum! Aut itaque libero cupiditate harum
                        eveniet similique ducimus nam quibusdam sed quidem deserunt repellat amet veritatis asperiores
                        numquam culpa natus iste iure officia nulla, quia voluptatem, qui ipsam. Nobis provident quia
                        non molestias tenetur rerum. Architecto nulla enim dolorem! Laboriosam nemo ipsum officiis amet
                        animi iste! Voluptatibus similique officia nihil laboriosam consectetur vero, eveniet adipisci
                        neque praesentium autem eius molestias accusantium. Vero quidem quasi esse! Aspernatur, ducimus.
                    </p>
                </div>
            </div>
            <div class="contents">
                <div class="cards">
                    <img src="image/financial.jpg" alt="" srcset="" />
                    <h3>financial Analysis</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti corporis quas, repudiandae
                        iure blanditiis ipsam adipisci est obcaecati consectetur vitae enim repellat sequi consequuntur
                        id, incidunt totam in labore minus eaque minima nostrum! Aut itaque libero cupiditate harum
                        eveniet similique ducimus nam quibusdam sed quidem deserunt repellat amet veritatis asperiores
                        numquam culpa natus iste iure officia nulla, quia voluptatem, qui ipsam. Nobis provident quia
                        non molestias tenetur rerum. Architecto nulla enim dolorem! Laboriosam nemo ipsum officiis amet
                        animi iste! Voluptatibus similique officia nihil laboriosam consectetur vero, eveniet adipisci
                        neque praesentium autem eius molestias accusantium. Vero quidem quasi esse! Aspernatur, ducimus.
                    </p>
                </div>
            </div>
            <div class="contents">
                <div class="cards">
                    <img src="image/social-welfare.jpg" alt="" srcset="" />
                    <h3>Social Welfare</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti corporis quas, repudiandae
                        iure blanditiis ipsam adipisci est obcaecati consectetur vitae enim repellat sequi consequuntur
                        id, incidunt totam in labore minus eaque minima nostrum! Aut itaque libero cupiditate harum
                        eveniet similique ducimus nam quibusdam sed quidem deserunt repellat amet veritatis asperiores
                        numquam culpa natus iste iure officia nulla, quia voluptatem, qui ipsam. Nobis provident quia
                        non molestias tenetur rerum. Architecto nulla enim dolorem! Laboriosam nemo ipsum officiis amet
                        animi iste! Voluptatibus similique officia nihil laboriosam consectetur vero, eveniet adipisci
                        neque praesentium autem eius molestias accusantium. Vero quidem quasi esse! Aspernatur, ducimus.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="javascript/app.js"></script>
</body>

</html>