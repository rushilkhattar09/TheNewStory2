<!DOCTYPE html>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
    initia-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css"
     href="profilePageCSS.css">
    </head>
    <style>

    body, html {
      height: 100%;
      margin: 0;
      font: 400 15px/1.8 "Lato", sans-serif;
      color: #777;
    }

    .bgimg-1, .bgimg-2, .bgimg-3, .bdimg-4 {
      position: relative;

      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;

    }
    .bgimg-1 {
      background-image: url("movie.jpg");
      min-height: 80%;
    }


    .bgimg-3 {
      background-image: url("tvshow.jpg");
      min-height: 80%;
    }

    .bgimg-4 {
      background-image: url("anime1.jpg");
      min-height: 40%;
    }

    .caption {
      position: absolute;
      left: 0;
      top: 50%;
      width: 100%;
      text-align: center;
      color: #000;
    }

    .caption span.border {
      background-color: #111;
      color: #fff;
      padding: 18px;
      font-size: 25px;
      letter-spacing: 10px;
    }

    body {margin:0;}

#logout{
  /*float: right;*/
  background-image: url("https://fontmeme.com/permalink/171116/358a443e73622473fb87087373b551bd.png");
  width: 172px;
  height: 38px;
  background-color: #333;
  float: right;
  margin: 10px 20px 7px 50px;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
    background-color: #4CAF50;
    color: white;
}

input[type=text] {
    width: 130px;
    margin: 7px 170px 7px 80px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: #333;
    background-image: url('searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    height: 45px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 25%;
}

    </style>
    <script type="text/javascript">
        document.getElementById("logout").onclick = function () {
            location.href = "";
        };
    </script>

    <body>
    
<form action="search.php" method="POST">
      <div class="topnav">
        <a href="#"><img src="https://fontmeme.com/permalink/171116/246a528c7bbfd3df5e5e7a68266cfb62.png" alt="HOME" border="0"></a>
        <a href="/TheNewStory/movie/movie.php"><img src="https://fontmeme.com/permalink/171116/77a63acaed095f8daf42e843f24fb5c6.png" alt="MOVIES" border="0"></a>
        <a href="/TheNewStory/tvshow/tvshow.php"><img src="https://fontmeme.com/permalink/171116/147704f14472f1a5d2d9d14780f292ab.png" alt="TV SHOWS" border="0"></a>
        <a href="/TheNewStory/myforum/main_forum.php"><img src="https://fontmeme.com/permalink/171118/549bbad061e5ff20b4e6389f301ca7b1.png" alt="FORUMS" border="0"></a>

          <input type="text" name="search" placeholder="Search..">
			<input type="submit" id="searchButton" style="width:1px; visibility:hidden;" />

          <input type="button" onclick="window.location.href=Login/login.php'" name="logout" id="logout">
      </div>
</form>



      <div class="bgimg-1">
        <div class="caption">
          <span class="border">MOVIES</span>
        </div>
      </div>


      <div class="mainBlock" id="mainBlockId">
        <div class="horizontalscroll">
		<?php

			$hostname="localhost";
			$username="root";
			$password="";
			$error = "";
			$message="";
			$con=mysql_connect($hostname,$username,$password);
			if(!$con)
            {die('Could not connect'.mysql_error());}
			mysql_select_db("thenewstory",$con);
			$query="SELECT * FROM `table 6` ORDER BY imdbRating DESC LIMIT 10";
			$result = mysql_query($query);


			  while($row= mysql_fetch_assoc($result))
			  {
				echo $row['const'];
				echo('<div style="background-image:url(`'.$row["const"].'.jpg`)"></div>');
				//print($row['const']);
			  }

		?>
        </div>
      </div>



  <div class="bgimg-3">
    <div class="caption">
      <span class="border" >TV SHOWS</span>
    </div>
  </div>


  <div class="mainBlock" id="mainBlockId">
    <div class="horizontalscroll">
      <?php
			$hostname="localhost";
			$username="root";
			$password="";
			$error = "";
			$message="";
			$con=mysql_connect($hostname,$username,$password);
			if(!$con)
            {die('Could not connect'.mysql_error());}
			mysql_select_db("thenewstory",$con);

			$query="SELECT * FROM `table 7` ORDER BY `imdbRating` DESC LIMIT 10";
			$result = mysql_query($query);


			  while($row= mysql_fetch_assoc($result))
			  {
				echo $row['const'];
				echo('<div style="background-image:url(`'.$row["const"].'.jpg`)"></div>');
				//print($row['const']);
			  }

		?>
    </div>
  </div>

  <div class="bgimg-4">
  </div>


</body>
</html>
