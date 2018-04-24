    <!--Carousel Wrapper-->
    <div id="carousel-example-3" class="carousel slide carousel-fade white-text" data-ride="carousel" data-interval="6000" data-wrap="false">

        <!--Slides-->
        <div class="carousel-inner" role="listbox">


            <!-- First slide -->
            <div class="carousel-item active view hm-black-strong" style="background-image: url('/img/backgrounds/<?php echo $countries[0]['flag']; ?>.jpeg'); background-repeat: no-repeat; background-size: cover;">

                <!-- Caption -->
                <div class="full-bg-img flex-center white-text">
                    <ul class="animated fadeInUp col-md-12">
                        <li>
                            <h1 class="h1-responsive flex-item">Votes for <?php echo $countries[0]['name']; ?> are frozen</h1>
                        </li>
                        <?php if (empty($votecomments)) { ?>

                        <li>
                            <h2>Here are the results:</h2>
                        </li>
                        <?PHP } else { ?>
                        <li>
                            <h2>Here are some of the comments!</h2>
                        </li>

						<?PHP } ?>
                    </ul>
                </div>
                <!-- /.Caption -->

            </div>
            <!-- /.First slide -->

			<?PHP foreach ($votecomments as $comment) { ?>

            <!-- Comment slide -->
            <div class="carousel-item view hm-black-strong" style="background-image: url('/img/backgrounds/<?php echo $countries[0]['flag']; ?>.jpeg'); background-repeat: no-repeat; background-size: cover;">

                <!-- Caption -->
                <div class="full-bg-img flex-center white-text">
                    <ul class="animated fadeInUp col-md-12">
                        <li>
                            <h2 class="h1-responsive flex-item"><?php echo $comment['comments']; ?></h2>
                        </li>
                    </ul>
                </div>
                <!-- /.Caption -->

            </div>
            <!-- /.Comment slide -->

			<?PHP } ?>

            <!-- Final slide -->
            <div class="carousel-item view hm-black-strong" style="background-image: url('/img/backgrounds/<?php echo $countries[0]['flag']; ?>.jpeg'); background-repeat: no-repeat; background-size: cover;">
				<?php $average=round((($scores[0]['ave_staging'] + $scores[0]['ave_song'] + $scores[0]['ave_singer'] + $scores[0]['ave_overall']) /4),1); ?>
                <!-- Caption -->
                <div class="full-bg-img flex-center white-text">
                    <ul class="animated fadeInUp col-md-12">
                        <li>
                            <h1 class="h1-responsive flex-item"><?php echo $countries[0]['name']; ?>:</h1>
                        </li>
                        <li>
                            <h1 class="h1-responsive">Staging: <strong><?php echo $scores[0]['ave_staging']; ?></strong></h1>
                        </li>
                        <li>
                            <h1 class="h1-responsive">Song: <strong><?php echo $scores[0]['ave_song']; ?></strong></h1>
                        </li>
                        <li>
                            <h1 class="h1-responsive">Singer: <strong><?php echo $scores[0]['ave_singer']; ?></strong></h1>
                        </li>
                        <li>
                            <h1 class="h1-responsive">Performance: <strong><?php echo $scores[0]['ave_overall']; ?></strong></h1>
                        </li>
                        <li>
                            <h1 class="h1-responsive"><strong>OVERALL: <?php echo $average; ?></strong></h1>
                        </li>
                    </ul>
                </div>
                <!-- /.Caption -->

            </div>
            <!-- /.Final slide -->

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
