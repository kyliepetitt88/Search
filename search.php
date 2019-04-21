<?php
include 'header.php';
?>

<h1>Search page</h1>
<div class="post-container">
<?php
    if(isset($_POST['submit-search'])){
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM post where postTitle LIKE '%$search%' or postContent LIKE '%$search%' or postDescription LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        
        echo "There are ".$queryResult." results!";
        
        if ($queryResult >0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<a href='post.php?title=".$row['postTitle']."&date=".$row['postDate']."><div class='post-box'> 
                    <h3>".$row['postTitle']."</h3>
                    <p>".$row['postDate']."</p>
                    <p>".$row['postDescription']."</p>
                    <p>".$row['postContent']."</p>
                </div></a>";
            }
        } else {
            echo "Search not found";
        }
    }
?>
</div>
