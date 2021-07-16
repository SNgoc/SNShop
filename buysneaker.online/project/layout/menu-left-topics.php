<div class="card">
	<article class="card-group-item">
		<header class="card-header"><h3 class="title"><a href="blog.php">View on Topic</a></h3></header>
		<div class="filter-content">
            <div class="list-group list-group-flush">
            <?php
            // Display TOPIC
            $query = 'SELECT * FROM topics';
            $topicList = executeResult($query);
            
            foreach ($topicList as $topic): 
                //Code display total news in per topic
                $topic_name_count = $topic['topic_name'];
                $query_count = "SELECT COUNT(*) AS total_news FROM topics 
                JOIN posts ON topics.id = posts.topic_id WHERE topic_name = '$topic_name_count'";
                $row_count = executeSingleResult($query_count);
                $total_news = $row_count['total_news'];
                // END
                if ($total_news > 0) {
                    echo '<a class="list-group-item" href="blog.php?topic_id='.$topic['id'].'">'.$topic['topic_name'].'</a>';
                }
                ?>
            <?php endforeach; ?>
            </div>  <!-- list-group .// -->
            <form method="get">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search by title name" id="titlename" name="titlename">
                    <button type="submit" class="btn btn-success" style="margin-block-start: 10px;">Search</button>
                </div>
            </form>
		</div>
	</article> <!-- card-group-item.// -->
    <div class="banner-left">
        <a href="#">
            <img src="img/product/banner_left.jpg" alt="">
        </a>
    </div>
</div> <!-- card.// -->