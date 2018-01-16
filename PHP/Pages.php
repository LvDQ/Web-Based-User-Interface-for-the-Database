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


<!-- 
<div class="post00">
</div>
<div class="post10">
</div><div class="post20">
</div><div class="post30">
</div><div class="post40">
</div><div class="post50">
</div> -->




<div class="post1"><br>
<h1>Blogs
</h1>
<?php 



if($PrivacyType=='Public'){

    echo $Title;
    echo $Time;
}elseif ($PrivacyType=='To Friends') {
    if($isfriend) echo $Title;
    else header("Location:No_Authority.php");
    # code...
}elseif ($PrivacyType=='Private') {
    # code...
    if($PosterID==$$_SESSION['id'])
        echo $Title;
    else header("Location:No_Authority.php");
}


?> 


<br><br>


    <?php

    if ($_SERVER["REQUEST_METHOD"] == "GET" ) {
    $Key_Word = test_input($_GET["Key_Word"]);
    $PosterID = test_input($_GET["PosterID"]);
    }
    function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
    }

    if($Key_Word!=""){
    $searchquery = "SELECT * FROM `user` Where Username like '%$Key_Word%'";
    


            $searchresult = mysqli_query($link,$searchquery);
            $searchrows = mysqli_num_rows($searchresult);

            echo "Relative people:";
            if($searchrows==0) echo " No relative people!";
            echo "<br/>";
              while($rows = mysqli_fetch_array($searchresult)){

                $UID=$rows['UID'];
                $Username=$rows['Username'];
                $Intro=$rows['Intro'];
                echo $Username;
                echo "'s intro: ";
                echo $Intro;
                echo "   ";
                echo "<br/>";
                echo "<a href='home.php?UID=$UID'>View the Profile</a>";
                echo "   |   ";
                echo "<a href='home.php?UID=$UID'>Go to the home page.</a>";
                echo "<br/>";
              } 

              echo "<br/>";
              echo  "Relative Post:";

            if($Key_Word!="")
                $searchquery = "SELECT * FROM `post` join `user` on PosterID=UID left outer join `location` on Location=Lname Where Title like '%$Key_Word%'";
            

            $searchresult = mysqli_query($link,$searchquery);
            $searchrows = mysqli_num_rows($searchresult);


            if($searchrows==0) echo " No relative post!";
            echo "<br/>";
              while($rows = mysqli_fetch_array($searchresult)){
                $PostID=$rows['PostID'];
                $UID=$rows['PosterID'];
                $Title=$rows['Title'];
                $Time=$rows['PostTime'];
                $Username=$rows['Username'];
                $Location=$rows['Location'];
                $Lname=$rows['Lname'];
                $LID=$rows['LID'];
                $PrivacyType=$rows['PrivacyType'];


                 echo "<a href='Post.php?PostID=$PostID'>$Title</a>";

                 echo "——";


                echo "   Poster:   ";

                echo "<a href='Profile.php?UID=$UID'>$Username</a>";
                echo "<br/>";
                echo "Post time:   $Time";
                echo "     |     ";
                if($Location==$Lname)
                    {echo "Location:   "; echo "<a href='Map.php?LID=$LID'>$Location</a>";}
                else 
                    {echo "Location:   "; echo $Location;}
                echo "     |     ";
                echo "PrivacyType: $PrivacyType ";
                echo "<br/>";
              } 

          }
          elseif ($PosterID!="") {
              # code...

            $searchquery = "SELECT * FROM `post` left outer join `location` on Location=Lname Where PosterID = '$PosterID' order by PostTime DESC";
            $searchresult = mysqli_query($link,$searchquery);
            $searchrows = mysqli_num_rows($searchresult);
            if($searchrows==0) echo " No post yet!";
            echo "<br/>";
              while($rows = mysqli_fetch_array($searchresult)){
                $PostID=$rows['PostID'];
                
                $Title=$rows['Title'];
                $Time=$rows['PostTime'];
                $PrivacyType=$rows['PrivacyType'];
                $Location=$rows['Location'];
                $Lname=$rows['Lname'];
                $LID=$rows['LID'];
                ?>
                <h3 style="background-color:grey;color:rgb(0, 180, 255)">
                <?php

                 echo "<a href='Post.php?PostID=$PostID'>$Title</a>"; ?></h3>
  


<?php
                echo "<br/>";
                echo "Post time:   $Time";
                echo "     |     ";
                if($Location==$Lname)
                    {echo "Location:   "; echo "<a href='Map.php?LID=$LID'>$Location</a>";}
                else 
                    {echo "Location:   "; echo $Location;}
                
                echo "     |     ";
                echo "PrivacyType: $PrivacyType ";
                echo "<br/>";
              } 

          }
          else $searchquery=-1;























    ?>


<br><br>



<div id="post2text" class="post1"></div>



</div>








<div class="sidebox">
<div id="sidebox1" class="sidebox">
<div id="sideboxx1">Messages</div><hr>
<?php 
       
            $messagequery = "SELECT Username,UID FROM `request` join `user` on UID1=UID Where UID2=".$_SESSION['id']." and `status`='Pending'";
            $messageresult = mysqli_query($link,$messagequery);
            $messagerows = mysqli_num_rows($messageresult);

            while($rows = mysqli_fetch_array($messageresult)){
                $UID=$rows['UID'];
                $Username=$rows['Username'];

                echo "<a href='Pages.php?UID=$UID'>$Username</a>";

                echo " wants to add you as his/her friend.";

                echo "<br/>";

                echo "<a href='Accept.php?UID=$UID'>Accept</a>";
                echo "   ";
                echo "<a href='Reject.php?UID=$UID'>Reject</a>";
                echo "<br/>";
            }

        

?>

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