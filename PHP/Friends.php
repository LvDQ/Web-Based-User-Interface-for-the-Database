<?php
include("connect.php");
session_start();
error_reporting(0);
?>

<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

<title>OUTDOOR</title>

<link type="text/css" rel="stylesheet" href="ust.css" />

</head>
<body>


<div class="header1">
<div id="img3" class="header1"><img src="img/logo.png" id="img3" /></div>

<div id="searcharea" class="header1"><input placeholder="search here..." type="text" id="searchbox"/></div>







<div id="profilearea" class="header1"><a href="Profile.php"><img src="img/prof.png"id="profpic" /></a></div>
<div id="profilearea1" class="header1"><a href="Profile.php"><p8>Profile</p8></a></div>
<div id="profilearea3" class="header1">|</div>
<div id="profilearea4" class="header1"><a href="home.php?UID=<?php echo $_SESSION['id'] ?>" style="color:white;">Home</div>
<div id="findf" class="header1"><img src="img/frn.png"height="30"/></div>
<div id="message" class="header1"><img src="img/chat.png"height="30"/></div>
<div id="notification" class="header1"><img src="img/noti.png"height="30"/></div>
<div id="profilearea2" class="header1">|</div>
<div id="setting" class="header1"><img src="img/set.png"height="30"/></div>
<div id="logout" class="header1"><img src="img/lo.png"height="30"/></div>
</div>


<div class="bodyn">
<div id="side1" class="bodyn"><a href="Profile.php"><img src="img/prof.png"id="profpic"/><a href="Profile.php"><a href="Profile.php"><?php echo $_SESSION['Username'] ?></div>
<div id="side2" class="bodyn">


</div>
<div id="side3" class="bodyn"><a href="Friends.php">FRIENDS</div>
<div id="side4" class="bodyn">Messages</div>
<div id="side5" class="bodyn">Events</div>
<div id="side6" class="bodyn">PAGES</div>
<div id="side7" class="bodyn">Pages feed</div>
<div id="side8" class="bodyn">Like pages</div>
<div id="side9" class="bodyn">Create page</div>
<div id="side10" class="bodyn">Create ad</div>
<div id="side11" class="bodyn"><a href="send.php">Send Message</div>
<div id="side12" class="bodyn">New Message</div>

<div id="side14" class="bodyn">APPS</div>
<div id="side15" class="bodyn">Games</div>
<div id="side16" class="bodyn">On this day</div>
<div id="side17" class="bodyn">Games feed</div>
<div id="side18" class="bodyn">FRIENDS</div>
<div id="side19" class="bodyn">Close friends</div>
<div id="side20" class="bodyn">Family</div>
<div id="side21" class="bodyn">INTERESTS</div>
<div id="side22" class="bodyn">Pages and public</div>
<div id="side23" class="bodyn">EVENTS</div>
<div id="side24" class="bodyn">Create event</div>
</div>



<!div class="post00">
<!/div>
<div class="post10">



</div>

<div class="header0001">
</div>
<div class="sideboxxx">
</div>
<!div class="sideboxxxx2">
<!/div>




<div class="post1">
<img src="img/prof.png"id="profpic"/><br><br>
<a href="post.html">
         
</a>
<br><br>

<?php 


if($_GET["logout"]==1 && $_SESSION['id']) {
    //$message = "you have been logged out!!!";
    session_destroy();

}

        if($_GET['UID']) $_SESSION['UID']=$_GET['UID'];
        
            $Friendsquery = "SELECT Username, UID FROM user where UID in (SELECT distinct FUID2 FROM `friends` Where FUID1=".$_SESSION['UID'].")";

            $Friendsresult = mysqli_query($link,$Friendsquery);
            $Friendsrows = mysqli_num_rows($Friendsresult);
            echo "Friends list:";

        if($Friendsrows>0){
            while($row = mysqli_fetch_array($Friendsresult, MYSQLI_ASSOC)){
            $username = $row["Username"];
            $UID = $row["UID"];
            
            echo "<br />";
            echo "<br />";
            echo "<tr>";
            echo "<td>" ."$username:   " . "</td>";
            echo "<td>" ."<a href='home.php?UID=$UID'>Go to his/her home page   |   <a href='Profile.php?UID=$UID'>View his/her Profile</a>" . "</td>";
            echo "</tr>";
            echo "<br />";
            }
        }
        else{
            echo "This user has no friend.";
        }
  ?>


<div id="commentprof2" class="post1"><!img src="img/prof.png"id="profpic"/></div>
<div id="commentboxpos2" class="post1">
<!input type="textarea" placeholder="comment" id="commentbox"/></div>
</div>





<div class="sidebox">
<div id="sidebox1" class="sidebox">
<div id="sideboxx1">YOUR PAGES</div><hr><br><br><br>See all<hr>
<div id="sideboxx2">This Week</div><br><br><br>See more<hr>
<div id="sideboxx3">Recent Posts</div><br><br><br>See more<hr>
<div id="sideboxx4">You haven't posted in this days</div><br><br><br><br><br><br>See all
</div>
<div id="post1pos" class="sidebox"><input type="submit" id="buttonpost1" value="write a post"/></div>
</div>



</div>

<div class="header10"></div>




</body>
</html>