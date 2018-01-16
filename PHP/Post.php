
<?php

    include("connect.php");
    session_start();
    error_reporting(0);

    if($_GET["logout"]==1 && $_SESSION['id']) {
        //$message = "you have been logged out!!!";
        session_destroy();

    }

        date_default_timezone_set("America/New_York");
        $Request_time = date("Y-m-d H:i:s");



    if($_GET['PostID']) $PostID=$_GET['PostID'];

   
            $searchquery = "SELECT * FROM `post` left outer join `location` on Location=Lname Where PostID = $PostID";
    
            $searchresult = mysqli_query($link,$searchquery);
            $searchrows = mysqli_num_rows($searchresult);


            if($searchrows!=0){

                $rows = mysqli_fetch_array($searchresult);
                $PostID=$rows['PostID'];
                $PosterID=$rows['PosterID'];
                $Title=$rows['Title'];
                $Time=$rows['PostTime'];
                $Body=$rows['Body'];
                $Location=$rows['Location'];
                $Photo=$rows['Photo'];
                $Lname=$rows['Lname'];
                $LID=$rows['LID'];
                $PrivacyType=$rows['PrivacyType'];
                $Video=$rows['Video'];

            }



            $searchquery = "SELECT * FROM `friends` Where FUID1=".$_SESSION['id']." and FUID2=$PosterID";
    
            $searchresult = mysqli_query($link,$searchquery);
            $searchrows = mysqli_num_rows($searchresult);


            if($searchrows>0){

            $isfriend=1;
            }




if(isset($_POST['submit'])){

    if($_POST['submit']=="Submit your comment"){

            if($_POST['Comments']!=""){
            $Addquery = "INSERT INTO `pcomments`(`UID`,`PostID`,`CTime`,`Body`) VALUES ('".$_SESSION['id']."','".$PostID."','".$Request_time."','".$_POST['Comments']."' )";
            $Addresult = mysqli_query($link,$Addquery);

        }
        // header('Location:Post.php?PostID='.$PostID);


    }
}





    if($_GET['Like']=='1'){

           $searchquery = "SELECT * FROM `post_like` Where PostID=$PostID and UID='".$_SESSION['id']."'" ;
    
            $searchresult = mysqli_query($link,$searchquery);
            $searchrows = mysqli_num_rows($searchresult);
            if($searchrows!=0){

                // echo "You have already liked this post!";
                ;
            }
            else{
                $searchquery = "INSERT INTO `post_like`(`UID`,`PostID`) VALUES ('".$_SESSION['id']."','".$PostID."') " ;
    
                $searchresult = mysqli_query($link,$searchquery);
            }
        }
    
// search nums of likes

            $searchquery = "SELECT Count(*) as NUM FROM `post_like` Where PostID=$PostID";
    
            $searchresult = mysqli_query($link,$searchquery);
            $searchrows = mysqli_num_rows($searchresult);
            if($searchrows!=0){

                $rows = mysqli_fetch_array($searchresult);
                $Like = $rows['NUM'];

            }
            else{
                $Like=0;
            }
?>

<!DOCTYPE html>
<html lang="en">
<style>
body{
    background-color: #525252;
}
.centered-form{
    margin-top: 60px;
}

.centered-form .panel{
    background: rgba(255, 255, 255, 0.8);
    box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
.signup-form-control{

    width:100%;
    margin:auto;

}
.panel{
    word-wrap: break-word;

    width:440px;
    height:100%;

}
.radio-inline{
    margin-left:10px;
}
.checkbox-font{
    color: grey;
}
</style>

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OUTDOOR</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top" onclick=$("#menu-close").click();>Start Bootstrap</a>
            </li>
            <li>
                <a href="home.php?UID=<?php echo $_SESSION['id'] ?>" onclick=$("#menu-close").click();>Home</a>
            </li>
            <li>
                <a href="#about" onclick=$("#menu-close").click();>About</a>
            </li>
            <li>
                <a href="#services" onclick=$("#menu-close").click();>Services</a>
            </li>
            <li>
                <a href="#portfolio" onclick=$("#menu-close").click();>Portfolio</a>
            </li>
            <li>
                <a href="index.php?logout=1" onclick=$("#menu-close").click();>Log_out</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header">
        <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <h2 class="panel-title">  <?php 
                               
if($PrivacyType=='Public'){

 echo $Title;
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


?>    </h2> 
                             </div>
                        <div class="panel-body">
                        <form role="form" method="post">
                            
                            <div class="form-group">

<?php 
                echo $Body;             

                echo "<br><br>";
                if($Photo){
                echo "<img src='$Photo', width='400', height='270'>";
                echo "<br/>";
                echo "<br/>";
            }
                if($Video)
                echo "<embed src='$Video', width='430', height='300' ,type='application/x-shockwave-flash'>";
                echo "<br/>";
                echo "Post time:   $Time";
                echo "     |     ";
                if($Location==$Lname)
                    {echo "Location:   "; echo "<a href='Map.php?LID=$LID'>$Location</a>";}
                else 
                    {echo "Location:   "; echo $Location;}
                echo "<br/>";

                echo $Like;
                echo " person liked this post.    ";
                $YES=1;
                echo "<a href='Post.php?PostID=$PostID&Like=$YES'>Like</a>";

?>

            

                            </div>

  __________________________________________________________<br>


<?php
            $searchquery = "SELECT * FROM `pcomments` natural join `user` Where PostID=$PostID";
    
            $searchresult = mysqli_query($link,$searchquery);
            $searchrows = mysqli_num_rows($searchresult);


              while($rows = mysqli_fetch_array($searchresult)){
                $PostID=$rows['PostID'];
                $Username=$rows['Username'];
                $Title=$rows['Title'];
                $CBody=$rows['Body'];
                $UID=$rows['UID'];

                $CTime=$rows['CTime'];


                 echo "<a href='home.php?UID=$UID'>$Username: </a>";

                
                echo "<br/>";
                echo "      ";
                echo $CBody;
                echo "<br/>";
                echo "Comment time:   $CTime";
                echo "<br/>";
                echo "<br/>";
              }


?>

                            <div class="form-group">
                                <input type="text" name="Comments" id="Comments" class="signup-form-control input-sm" placeholder="What's in your mind" ">
                            </div>
                            <input type="submit" name="submit" value="Submit your comment" " class="btn btn-info btn-block">
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </header>

 
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Outdoor</strong>
                    </h4>
                    <p>3481 Melrose Place
                        <br>Beverly Hills, CA 90210</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (123) 456-7890</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:name@example.com">name@example.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </div>
        <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
    // Disable Google Maps scrolling
    // See http://stackoverflow.com/a/25904582/1607849
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function(event) {
        var that = $(this);
        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }
    var onMapClickHandler = function(event) {
            var that = $(this);
            // Disable the click handler until the user leaves the map area
            that.off('click', onMapClickHandler);
            // Enable scrolling zoom
            that.find('iframe').css("pointer-events", "auto");
            // Handle the mouse leave event
            that.on('mouseleave', onMapMouseleaveHandler);
        }
        // Enable map zooming with mouse scroll when the user clicks the map
    $('.map').on('click', onMapClickHandler);
    </script>

</body>

</html>
