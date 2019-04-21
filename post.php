<?php
include 'header.php';
?>

<h1>Post Page </h1>

<div class="post-container">
    <?php
        $title = mysqli_real_escape_string($conn, $_GET['title']);
        $date = mysqli_real_escape_string($conn, $_GET['date']);
        
                
        $sql ="SELECT * FROM post WHERE postTitle='$title' AND postDate='$date'";
        $result = mysqli_query($conn,$sql);
        $queryResults= mysqli_num_rows($result);
        
        if ($queryResults >0) {
            while ($row = mysqli_fetch_assoc($result)){
                echo "<div class='post-box'> 
                    <h3>".$row['postTitle']."</h3>
                    <p>".$row['postDate']."</p>
                    <p>".$row['postDescription']."</p>
                    <p>".$row['postContent']."</p>
                </div>";
            }
        }
    ?>
</div>
</body>
</html>