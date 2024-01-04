<?php
    require_once 'dashboard/config/connect.php';


// Fetch data for the page
    $works_query = "SELECT `id`, `image`, `orders` FROM `main` ORDER BY `orders` ASC";
    $result = mysqli_query($connect, $works_query);
    $works = mysqli_fetch_all($result, MYSQLI_ASSOC);  // Fetch as an associative array for clearer usage

    include('includes/header.php');
?>

    <header>
    
        <div class="header-container">
            
         <nav>
            <a href="index.php">
                <img src="imgs/logo.svg" alt="Line Studios" class="logo">
            </a>
            <a href="work.php">
                <img src="imgs/galaxy.svg" alt="Spiral">
                WORK
            </a>
        </nav>
         
            <div class="intro">
                
                <!--   <p>-->
                <!--    Editorial Direction &nbsp;&nbsp;—&nbsp;&nbsp; Social Media Content-->
                <!--    &nbsp;&nbsp;—&nbsp;&nbsp; General Styling &nbsp;&nbsp;—-->
                <!--    &nbsp;&nbsp; Interior &nbsp;&nbsp;—&nbsp;&nbsp;Research-->
                <!--</p>-->
                
                <div class="intro-text">
                      <p>Editorial Direction</p>  <p>—</p>  <p>Social Media Content  </p><p>—</p> <p> General Styling</p><p>—</p><p>Interior</p> <p>—</p>  <p>Research</p>
                    
                </div>
                
                <div class="intro-images">
                    <div >
                        <!--<img src="imgs/lintro-img-1.JPG" alt="">-->
                        <img src="<?= "imgs/intro/". $works[0]['image'] ?>" alt="">
                
                      
                        <ol>
                          
                            <li>id&#233;e fixe FW23 Campaign on Film</li>
                        </ol>
                    </div>
                    <div >
                        <!--<img src="imgs/intro-img-2.jpg" alt="">-->
                        <img src="<?= "imgs/intro/". $works[1]['image'] ?>" alt="">

                        <ol>
                            <li></li>
                            <li>id&#233;e fixe SS23 Campaign on Film</li>

                        </ol>
                    </div>
                </div>
                <div class="intro-txt" >
                    <p>
                        Creating imagery with no fuss. Words - less, but with greater
                        meaning. <br> Space - for the mind to unwind.
                    </p>
                </div>
            </div>
            
                <a href="work.php" class="work-link">
                    <img src="imgs/galaxy.svg" alt="Spiral">
                    WORK
                </a>
        </div>
    </header>


 <?php
// Include the header
include('includes/footer.php');
?>