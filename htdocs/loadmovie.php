<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PTCS Entertainment</title>
  <meta content="" name="keywords">
  <meta content="" name="description">


  <link rel="stylesheet" type="text/css" href="css/fetch_advertisment.css" />

  <?php include './headerScript.php'; ?>

</head>

<body>

  <div class="welcome">
    <div class="container-flex">
      <div class="row">
        <div class="col-xs-2">
          <div class=welcomelogin>
            <?php
       $nametype=$_GET['mname'];
       $nametype=substr($nametype, 8,strlen($nametype));
       $nametype=substr($nametype, 0,strpos($nametype, "/"));
       echo "<a href='".$nametype.".php'><button><b>Back</b></button> </a>";
       ?>

          </div>
        </div>
        <div class="col-xs-10">
          <div class="welcomemsg">
            <marquee><B><I>
                  <h1>WELCOME TO INDIAN RAILWAYS !!</h1>
                </I></B></marquee>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
    include ('_add.php')
    ?>
  <?php

 include ('fetch_advertisement.php');
 include(__DIR__ . '/content/database/videoAdvertismentTime.php');
?>

  <div class="container-flex">
    <div class="row">
      <div class="videoplayer">

        <div class="col-lg-9">

          <!-- <h1>
                        Requested content
                    </h1> -->

          <?php
                    $moviename=$_GET['mname'];
                    echo "<video id='video-player'  controlsList='nodownload'   controls   ";
                    echo "<source src='".$moviename."' type='video/mp4'>";
                    echo "</video>";
                    ?>
          <!-- ################## -->
          <!-- Advertisment Part for video only  -->
          <div id="myModal">

            <video id="video_ad" autoplay controls controlsList="nodownload"></video>
            <img id="image_ad" style="display: none;">
            <progress id="seekbar_ad" value="0" max="100" style="display: none;"></progress>
            <progress id="seekbar_ad2_img" value="0" max="100" style="display: none;"></progress>

            <!-- <progress id="seekbar_ad" value="0" max="100"></progress> -->

          </div>
          <!-- /////################## -->

          <div id="moviename">
            <?php
            $moviename2=$_GET['mname'];
            $songtype1=substr($moviename2,strripos($moviename2, "/")+1,strlen($moviename2));
            echo "<h1>";
            echo rtrim($songtype1,".mp4");
            echo "</h1>";
            ?>
          </div>




        </div>
        <div class="col-lg-3">
          <h1>Content</h1>
          <ul id='video-list'>

            <ul id="playlistItems">
              <?php
                            $moviename1=$_GET['mname'];
                            $songtype=substr($moviename1, 8,strripos($moviename1, "/")-7);
                            $folderPath = "content/poster/".$songtype."";      // Read all files in the folder
                            $files = scandir($folderPath);
                            $processedFiles = array();
                            // Extract folder name from the folder path
                            $folderName = basename($folderPath);
                            //echo $folderName;
                            // Iterate over each file
                            foreach ($files as $file) {
                                // Exclude current directory (.) and parent directory (..)
                                if ($file !== '.' && $file !== '..') {
                                // echo $file;
                                $filenameWithoutExt = pathinfo($file, PATHINFO_FILENAME);
                                //echo $filenameWithoutExt;
                                if (!isset($processedFiles[$filenameWithoutExt])) {
                                    // Check if PNG version of the file exists
                                    if (in_array($filenameWithoutExt . '.png', $files)) {
                                        // If PNG version exists, set the filename to the PNG version
                                        $file = $filenameWithoutExt . '.png';
                                    } else {
                                        // If PNG version doesn't exist, set the filename to the JPG version
                                        $file = $filenameWithoutExt . '.jpg';
                                    }
                                // Process the file
                                //$moviename=str_replace(".jpg",".mp4","$file");

                                $moviename=str_replace([".jpg",".png"],".mp4","$file");
                                echo "<a href='loadmovie.php?mname=content/".$songtype.$moviename."'>";
                                echo "<img  src='content/poster/".$songtype.$file."' class='model' >";
                                echo "</a>";

                                echo "<br><br>";
                                $processedFiles[$filenameWithoutExt] = true;
                                }
                            }
                        }
                            ?>
            </ul>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <?php
    // Include your footer section here
    include('_footer.php');
    ?>








  <script>
  var advertisementFiles = <?php echo json_encode($advertisementFiles); ?>;
  var directory = "<?php echo $directory; ?>";
  // console.log(advertisementVideos); //   complete data of advertisement folder except . and ..
  // Use PHP output directly in JavaScript
  var userTimeInMinute = <?php echo json_encode($fileContent); ?>;
  </script>


  <script src="js/fetch_advertisment.js"></script> <!-- Include separate JavaScript file -->






</body>

</html>