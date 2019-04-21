<?php
include 'header.php';
?>

<form action="search.php" method="POST">
    <input type="text" name="search" placeholder="Search">
    <button type="submit" name="submit-search">Go</button>
</form>

<h1>Front Page </h1>
<h2>All posts:</h2>
<div class="post-container">
    <?php
        $sql ="SELECT * FROM post";
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