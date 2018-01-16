
<?php

include("connect.php");
session_start();
error_reporting(0);

if($_GET["logout"]==1 && $_SESSION['id']) {
    //$message = "you have been logged out!!!";
    session_destroy();

}



  //  $_POST['id']=$_GET['UID'];
            if($_GET['UID']) $_SESSION['UID']=$_GET['UID'];

        
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

            }
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
    
    width:400px;
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
                        <h3 class="panel-title">Profile<small>  <a href="Edit.php">Edit</a></small></h3> 
                        </div>
                        <div class="panel-body">
                        <form role="form" method="post">
                        <img src="<?php $_SESSION['Photo']?>">
                                
                                    <div class="form-group">
                                    UID:  &nbsp&nbsp<?php  echo $_SESSION['UID']  ?>
                                    </div>
                               
                                

                            <div class="form-group">
                                Username:  &nbsp&nbsp<?php  echo $_SESSION['Username']  ?>
                            </div>

                            <div class="form-group">
                                Email:  &nbsp&nbsp<?php  echo $_SESSION['Email']  ?>
                            </div>

                            <div class="form-group">
                                Age:  &nbsp&nbsp<?php  echo $_SESSION['Age']  ?>
                            </div>

                            <div class="form-group">
                                Gender:  &nbsp&nbsp<?php  echo $_SESSION['Gender']  ?>
                            </div>

                            <div class="form-group">
                                Phone:  &nbsp&nbsp<?php  echo $_SESSION['Phone']  ?>
                            </div>

                            <div class="form-group">
                                Address:  &nbsp&nbsp<?php  echo $_SESSION['Address']  ?>
                            </div>

                            <div class="form-group">
                                Intro:  &nbsp&nbsp<?php  echo $_SESSION['Intro']  ?>
                            </div>

                            <div class="form-group">
                                Sign_up_time:  &nbsp&nbsp<?php  echo $_SESSION['Sign_up_Time']  ?>
                            </div>

                            <div class="form-group">
                                Last_login:  &nbsp&nbsp<?php  echo $_SESSION['LastLogin']  ?>
                            </div>
     

                        
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
