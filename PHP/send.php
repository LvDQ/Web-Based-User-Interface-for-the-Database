<?php 
include("connect.php");
session_start();
error_reporting(0);

if($_GET["logout"]==1 && $_SESSION['id']) {
    //$message = "you have been logged out!!!";
    session_destroy();

}

        
        if($_GET['UID']) $_SESSION['UID']=$_GET['UID'];
            else {$_SESSION['UID']=$_SESSION['id']; $_GET['UID']=$_SESSION['id'];}
        
            $statusquery = "SELECT * FROM `user` Where UID=".$_SESSION['UID']."";
            $statusresult = mysqli_query($link,$statusquery);
            $statusrows = mysqli_num_rows($statusresult);


            $rows = mysqli_fetch_array($statusresult);
        if($statusrows>0){
            if($rows){
                $_SESSION['Username']=$rows['Username'];
                $_SESSION['Email']=$rows['Email'];
                $_SESSION['UID']=$rows['UID'];
                $_SESSION['Age']=$rows['Age'];
                $_SESSION['Gender']=$rows['Gender'];
                $_SESSION['Photo']=$rows['Photo'];
                $_SESSION['Address']=$rows['Address'];
                $_SESSION['Intro']=$rows['Intro'];
                $_SESSION['ProfileURL']=$rows['ProfileURL'];
                $_SESSION['PostURL']=$rows['PostURL'];
                $_SESSION['Sign_up_Time']=$rows['Sign_up_Time'];
                $_SESSION['LastLogin']=$rows['LastLogin'];
                $_SESSION['Phone']=$rows['Phone']; 

                $UID=$rows['UID'];

            }
        }

         

?>

<html>
<style type="text/css">
.c{
    background-image: url(img/blogback.jpg);
    position: absolute;
    margin-left: 300px;
    top:70px;
    width:600px;
    height: 100%;

}   
.text{
    font-size: 20px;
    margin-left: 50px;
    width:500px;
    height: 100%;
    margin-top: 80px;
}




</style>


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

<div id="searcharea" class="header1">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?UID=<?php echo $_SESSION['UID'] ?>" method="get">

        <input placeholder="search here..." type="text" id="searchbox" name="Key_Word"/>
        <input type="submit" name = "submit" value = "Search">
        </form>





</div>







<div id="profilearea" class="header1"><a href="Profile.php?UID=<?php echo $_SESSION['UID'] ?>"><img src="img/prof.png"id="profpic" /></a></div>
<div id="profilearea1" class="header1"><a href="Profile.php?UID=<?php echo $_SESSION['UID'] ?>"><p8>Profile</p8></a></div>
<div id="profilearea3" class="header1">|</div>
<div id="profilearea4" class="header1"><a href="home.php?UID=<?php echo $_SESSION['id'] ?>">Home</div>
<div id="findf" class="header1"><img src="img/frn.png"height="30"/></div>
<div id="message" class="header1"><img src="img/chat.png"height="30"/></div>
<div id="notification" class="header1"><img src="img/noti.png"height="30"/></div>
<div id="profilearea2" class="header1">|</div>
<div id="setting" class="header1"><img src="img/set.png"height="30"/></div>
<div id="logout" class="header1"><img src="img/lo.png"height="30"/></div>
</div>


<div class="bodyn">
<div id="side1" class="bodyn"><a href="Profile.php?UID=<?php echo $_SESSION['UID'] ?>"><img src="img/prof.png"id="profpic"/><a href="Profile.php"><a href="Profile.php?UID=<?php echo $_SESSION['UID'] ?>"><?php echo $_SESSION['Username'] ?></div>
<div id="side2" class="bodyn">


</div>
<div id="side3" class="bodyn"><a href="Friends.php?UID=<?php echo $_SESSION['UID'] ?>">FRIENDS</div>
<div id="side4" class="bodyn">Messages</div>
<div id="side5" class="bodyn"><a href="AddFriends.php?UID=<?php if($_SESSION['id']!=$_SESSION['UID'])echo $_SESSION['UID'] ?>">Request as friend</div>
<div id="side6" class="bodyn">PAGES</div>



<div id="side7" class="bodyn"><a href="Pages.php?PosterID=<?php echo $_SESSION['UID'] ?>&UID=<?php echo $_SESSION['UID'] ?>">User's Post</div>







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




<div class="c">
<div class="text">

<h2>Private Message System</h2><br>

<?php 

include("message_title.php");

?>
<?php
    if(isset($_GET['user'])&& !empty($_GET['user']) ){
        
?>
        
    <form method="post">
    <?php
        if(isset($_POST['message'])&& !empty($_POST['message'])){
            //echo "1234";
                $UID=$_SESSION['UID'];
                $user=$_GET['user'];
                $random_number= rand();
                $message=$_POST['message'];

                $check_on="SELECT `hash` from `message_group` WHERE (`FUID1`='$UID' and `FUID2`='$user') or (`FUID1`='$user' and `FUID2`='$UID')";
                //echo $check_on;
                $searchresult=mysqli_query($link,$check_on);
                //echo $searchresult;
                $searchrows = mysqli_num_rows($searchresult);

//echo $searchrows;

                if($searchrows==1){
                    echo "<p>Conversation already started.</p>";

                }
                else{
                     $query1="INSERT INTO `message_group` VALUES ('$UID','$user','$random_number')";
                     mysqli_query($link, $query1);
                     $query2="INSERT INTO `message` VALUES ('','$random_number','$UID','$message')";
                    mysqli_query($link, $query2);
                    //mysqli_query($link, $sql2);
                    echo "<p>Conversation started.</p>";


                }
                    
        }
    ?>
    Enter Message : <br/>
    <textarea name="message" rows="7" cols="60"></textarea>
    <br/><br/>
    <input type='submit' value="Send Message" />
    </form>

<?php
    }
    else{
        echo "<b>Select user</b>";
        $user_list="SELECT * from `user` where UID in (SELECT distinct FUID2 FROM `friends` Where FUID1=".$_SESSION['UID'].")";
        $searchresult=mysqli_query($link,$user_list);
        $searchrows = mysqli_num_rows($searchresult);
    
    
    while($rows=mysqli_fetch_array($searchresult)){
        $user=$rows['UID'];
        $Username=$rows['Username'];
        echo "<p><a href='send.php?user=$user'>$Username</a></p>";


    }

    }
    





?>


</div>
</div>








<div class="sidebox">
<div id="sidebox1" class="sidebox">
<div id="sideboxx1">Messages</div><hr>


<br><br>See all<hr>
<div id="sideboxx2">This Week</div><br><br><br>See more<hr>
<div id="sideboxx3">Recent Posts</div><br><br><br>See more<hr>
<div id="sideboxx4">You haven't posted in this days</div><br><br><br><br><br><br>See all
</div>
<div id="post1pos" class="sidebox"><a href="Newpost.php" ><input type="submit" id="buttonpost1" value="write a post"/></a>

</div>

</div>







<div class="header10"></div>



</body>
</html>