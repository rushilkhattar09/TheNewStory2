<?php 
				if(preg_match("/^[  a-zA-Z]+/", $_POST['search'])){ 
				$hostname="localhost";
				$username="root";
				$password=""; 
				//connect  to the database 
				$db=mysql_connect  ($hostname, $username,$password) or die ('I cannot connect to the database  because: ' . mysql_error()); 
				//-select  the database to use 
				$mydb=mysql_select_db("thenewstory");
				  
				$name=$_POST['search'];
				
				$sql="SELECT  * FROM `table 9` WHERE title = '$name'";
				
				$result=mysql_query($sql); 
				echo $sql;
				echo mysql_error();
				
				$row= mysql_fetch_assoc($result);
				
					$newURL="http://www.imdb.com/title/".$row["const"];
					header('Location: '.$newURL);
					//header ("location:http://www.imdb.com/title/".$row["const"]."/");
					//header('Location: http://www.imdb.com/title/'.$row["const"].'/');

				   
			}  
?>