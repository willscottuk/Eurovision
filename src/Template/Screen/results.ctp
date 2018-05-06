<!--Carousel Wrapper-->
<div id="carousel-example-3" class="carousel slide carousel-fade white-text" data-ride="carousel" data-interval="8000">

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

        <!-- First slide -->
        <div class="carousel-item active view hm-black-strong" style="background-image: url('/img/arena.jpg'); background-repeat: no-repeat; background-size: cover;">
            <?php $average=round((($scores['ave_staging'] + $scores['ave_song'] + $scores['ave_singer'] + $scores['ave_overall']) /4),1); ?>
            <!-- Caption -->
            <div class="full-bg-img flex-center white-text">
                <ul class="animated fadeInUp col-md-12">
                    <li>
                        <h1 class="h1-responsive flex-item"><?php echo $countrydetails['name']?></h1>
                    </li>
                    <li>
                        <h1 class="h1-responsive">Overall: <?php echo $average?></h1>
                    </li>
                    <li>
                        <br />
                        <h1 class="h1-responsive">Staging: <strong><?php echo $scores['ave_staging']; ?></strong></h1>
                    </li>
                    <li>
                        <h1 class="h1-responsive">Song: <strong><?php echo $scores['ave_song']; ?></strong></h1>
                    </li>
                    <li>
                        <h1 class="h1-responsive">Singer: <strong><?php echo $scores['ave_singer']; ?></strong></h1>
                    </li>
                    <li>
                        <h1 class="h1-responsive">Performance: <strong><?php echo $scores['ave_overall']; ?></strong></h1>
                    </li>
                </ul>
            </div>
            <!-- /.Caption -->

        </div>
        <!-- /.First slide -->

    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-3" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-3" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
<?php if (empty($comments)) {

}
else { ?>
<div class="footer">
  <h1 class="comments"><marquee>Comments: <?php foreach ($comments as $comment) { echo $comment['comments'];} ?></marquee></h3>
</div>
<?php
}
?>
