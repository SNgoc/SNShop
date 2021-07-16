<div class="card">
	<article class="card-group-item">
		<header class="card-header"><h3 class="title"> Topic List</h3></header>
		<div class="filter-content">
            <div class="list-group list-group-flush">
            <?php
            // TOPIC
            $query = 'SELECT * FROM event_tp';
            $eventtp = executeResult($query);
            foreach ($eventtp as $tp): ?>
                <a class="list-group-item" href="event.php?topic_id=<?php echo $tp['id']; ?>"><?php echo $tp['name_tp'] ?></a>
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