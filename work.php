<?php
    require_once 'dashboard/config/connect.php';
    // $images = mysqli_query($connect, "SELECT * FROM `images`");
    // $images = mysqli_fetch_all($images);
    //  // Retrieve images ordered by the image ID
    // $images = mysqli_query($connect, "SELECT * FROM `images` ORDER BY id ASC");
    // $images = mysqli_fetch_all($images);


     $sql_works = mysqli_query($connect, "SELECT * FROM `works` ORDER BY orders  ASC");

include('includes/header.php');
?>

    <header>

        <a href="index.php">
            <img src="imgs/logo.svg" alt="Line Studios" class="logo">
        </a>

        <div class="work-intro">

            <div class="work-txt">

                <p>
                    
                    Style and Consulting Duo - After years of working together on a co founded shoe brand idée fixe, we decided to broaden our scope of work and offer our vision of minimalistic aesthetic to those who share the same passion for raw unfiltered visual. No frills, just colors, textures - simple beauty.
                    
                    <br><br>
                        We’ll be accepting corporate and individual clients in the field - be it as simple as personal wardrobe or home styling to editorial direction for brands, as well as assisting in Social Media Content Development/Consulting.
                    
                    </p>

               
<pre>
WHAT WE DO 
Editorial Direction — concept, props, styling, execution 
Social Media Content — development, copywriting
General Styling — fashion, objects, wardrobe, beauty
Interior — mood board, decoration
</pre>

            </div>
        </div>
    </header>
   
    
<div class="grid-container">
    <?php 
   
    
    
    while($row_images = mysqli_fetch_assoc($sql_works)) {
        $random_duration = rand(1200, 3000);
        $imagePath = "imgs/works/" . $row_images['image']; 
         // Set the image path
        ?> 
        <div class="grid-item "  data-image-path="<?= $imagePath ?>" >
            <img src="<?= $imagePath ?>" style="<?='animation-duration:'.$random_duration.'ms'?>" class="fadeInUp" alt="Images">
        </div>
        <?php
    }
    ?> 
</div>

<div id="imageModal" class="modal">
    <span class="close" id="closeModal">&times;</span>
    <img class="modal-content" id="modalImage">
</div>




<script>
  $(document).ready(function () {
        $("#sortable-table tbody.sortable").sortable({
            handle: "td:first-child", // Make the first column the drag handle
            update: function (event, ui) {
                // Send the new order to the server using AJAX
                var newOrder = $(this).sortable('toArray', { attribute: 'data-id' });
                $.post('update-image-order.php', { order: newOrder }, function (data) {
                    if (data === 'success') {
                        console.log('Image order updated successfully');
                    } else {
                        console.error('Failed to update image order');
                    }
                });
            }
        });
        $("#sortable-table tbody.sortable").disableSelection();
    });
    
    
</script>




<?php
// Include the footer
include('includes/footer.php');
?>


