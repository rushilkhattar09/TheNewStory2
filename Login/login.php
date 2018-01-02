<!DOCTYPE html>

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


		if (isset($_POST['submitLogin'])){

		$sql="SELECT * FROM users
                WHERE `username` = '".$_POST[username]."' AND `password`='".$_POST[password]."'";


			$result = mysql_query($sql);
			if(mysql_num_rows($result)>0)
			{
				echo("pass");
				header("location: /TheNewStory/Profile/profile.php");
			}

			else
			{	echo("error");
				$error ="Login failed please signup to continue";
				header("location :login.php");
			}
			//echo(mysql_error($con));

		}
    if (isset($_POST['submitSignup'])){

      $sql="INSERT INTO users VALUE('$_POST[namesignup]','$_POST[passwordsignup]','$_POST[usernamesignup]',0)";
      $result1=mysql_query($sql);
      if($result1)
      {
        $message="You are a member now. Login to continue";
        header("location :login.php");
      }
      else{
        $message="Some Error Occured. Try After Sometime.";
        header("location :login.php#toregister");
      }

    }

?>

 <html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <title>The New Story</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
      <video autoplay loop muted poster="screenshot.jpg" id="background">
    <source src="Login.mp4" type="video/mp4">
    </video>

        <div class="container">
            <!-- Codrops top bar -->
            <header>
                <h1><img src="https://fontmeme.com/permalink/171103/bd25454e9e2cbb25e3cf1cd5ea054510.png" alt="marvel-contest-of-champions-font" border="0">
                  <span><br><img src="https://fontmeme.com/permalink/171103/8ba76a7387ebfa0b9bf0c96bab75c8db.png" alt="spider-man-homecoming-font" border="0"></span></h1>
            </header>
            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>

					              <center><font color="red"><?php echo "$error"; ?></center></font>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="#" autocomplete="on" method="POST" name="login">
                                <h1><img src="https://fontmeme.com/permalink/171103/d48a47f4d5b4ce99f1462b461fe76494.png"  alt="LOGIN" border="0"></h1>

                                <p>
                                    <label for="username" class="uname" data-icon="u" ><font color="silver"> Your Username</font> </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername"/>
                                </p>
                                <p>
                                    <label for="password" class="youpasswd" data-icon="p"> <font color="silver">Your password </font></label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
                                </p>
                                <p class="keeplogin">
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
									<label for="loginkeeping"><font color="silver">Keep me logged in</font></label>
								</p>
                                <p class="login button">
                                    <input type="submit" name="submitLogin" value="Login" />
								</p>
                                <p class="change_link"><font color="silver">
									Not a member yet ?</font>
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>
                          <center><font color="green"><?php echo "$message" ?></center></font>
                        <div id="register" class="animate form">
                            <form  action="#" autocomplete="on" onsubmit="return check()" method="post" name="signup">
                                <h1><img src="https://fontmeme.com/permalink/171103/33f57afde6408927f786b8c48a1d2b64.png" alt="thor-ragnarok-font" border="0"></h1>
                                <p>
                                    <label for="name" class="uname" data-icon="u" ><font color="silver"> Your Name</font> </label>
                                    <input id="username" name="namesignup" required="required" type="text" placeholder="myname"/>
                                </p>
                                <p>
                                    <label for="usernamesignup" class="uname" data-icon="u"><font color="silver">
    									Your username</font></label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p>
                                    <label for="emailsignup" class="youmail" data-icon="e" ><font color="silver"> Your email</font></label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/>
                                </p>
                                <p>
                                    <label for="passwordsignup" class="youpasswd" data-icon="p"><font color="silver">Your password</font> </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p>
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p"><font color="silver">Please confirm your password</font> </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button">
									<input type="submit" name="submitSignup" value="Sign up"/>
								</p>
                                <p class="change_link"><font color="silver">
									Already a member ?</font>
									<a href="#tologin" class="to_register">Go and log in </a>
								</p>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>

		<script type="text/javascript">

			function check()
			{
				var x=0;
				if(!document.signup.namesignup.value.match(/[a-zA-Z]+/))
				{
					x++;
					alert("Learn English");
				}
				if(!document.signup.usernamesignup.value.match(/[a-zA-Z0-9_\.]+{8,16}/))
				{
					x++;
					alert("You are too short for this ride, You must be 8 characters old");
				}
				if(!document.signup.emailsignup.value.match(/[a-zA-Z0-9_\.]+@[a-zA-Z]+\.(com|in|uk|org|net|tech|surf|co\.in)/))
				{
					x++;
					alert("Please Enter a valid E-mail");
				}
				if(!document.signup.passwordsignup.value.match(/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/))
				{
					x++;
					alert("Password must be 6 characters long and must have numbers, special characters, numbers");
				}
				if(document.getElementById("passwordsignup_confirm").value!=document.getElementById("passwordsignup").value)
				{
					x++;
					alert("Please recheck your work");
				}

				if(x==0)
					return true;
				else
					return false;
			}
		</script>
    </body>
</html>
