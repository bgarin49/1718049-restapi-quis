<?php
  function get_CURL($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
  
    return json_decode($result, true);
  }
  
  $result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UC9zY_E8mcAo_Oq772LEZq8Q&key=AIzaSyAAdJFgSBKFHUlGujzY1zI44ZIHvR33IgY');

  $youtubeProfilePicture = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
  $channelName = $result['items'][0]['snippet']['title'];
  $channelDescription = $result['items'][0]['snippet']['description'];

  $urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyAAdJFgSBKFHUlGujzY1zI44ZIHvR33IgY&channelId=UC9zY_E8mcAo_Oq772LEZq8Q&maxResults=1&order=date&part=snippet';
  $result = get_CURL($urlLatestVideo);
  $lastestVideo = $result['items'][0]['id']['videoId']
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Rest-API</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">Budi Garinanto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="list.php">List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="latest.php">Latest</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="<?= $youtubeProfilePicture; ?>" class="rounded-circle img-thumbnail">
          <h1 class="display-4"><?= $channelName; ?></h1>
          <h3 class="lead"><?= $channelDescription; ?></h3>
        </div>
      </div>
    </div>

    <!-- Youtube -->
    <section class="youtube" id="youtube">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Lastest Upload</h2>
            <h1></h1>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col">
            <div class="row">
            </div>
            <div class="row">
              <div class="col">
                <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $lastestVideo; ?>?rel=0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

    
    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2020.</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>