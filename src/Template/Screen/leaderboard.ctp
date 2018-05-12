<!--Carousel Wrapper-->
<div id="carousel-example-3" class="carousel slide carousel-fade white-text" data-ride="carousel" data-interval="8000">

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

        <!-- First slide -->
        <div class="carousel-item active view hm-black-strong" style="background-image: url('/img/arena.jpg'); background-repeat: no-repeat; background-size: cover;">
            <!-- Caption -->
            <div class="full-bg-img flex-center white-text">
                <ul class="animated fadeInUp col-md-12">
                    <li>
                        <table class="table table-striped table-bordered">
                          <thead class="thead-dark">
                          <tr>
                            <th>Points</th>
                            <th>Country</th>
                            <th>Score</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td>12</td>
                            <td><?php echo $leaderboard['0']['name']; ?></td>
                            <td><?php echo $leaderboard['0']['final_score']; ?></td>
                          </tr>
                          <tr>
                            <td>10</td>
                            <td><?php echo $leaderboard['1']['name']; ?></td>
                            <td><?php echo $leaderboard['1']['final_score']; ?></td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td><?php echo $leaderboard['2']['name']; ?></td>
                            <td><?php echo $leaderboard['2']['final_score']; ?></td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td><?php echo $leaderboard['3']['name']; ?></td>
                            <td><?php echo $leaderboard['3']['final_score']; ?></td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td><?php echo $leaderboard['4']['name']; ?></td>
                            <td><?php echo $leaderboard['4']['final_score']; ?></td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td><?php echo $leaderboard['5']['name']; ?></td>
                            <td><?php echo $leaderboard['5']['final_score']; ?></td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td><?php echo $leaderboard['6']['name']; ?></td>
                            <td><?php echo $leaderboard['6']['final_score']; ?></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td><?php echo $leaderboard['7']['name']; ?></td>
                            <td><?php echo $leaderboard['7']['final_score']; ?></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td><?php echo $leaderboard['8']['name']; ?></td>
                            <td><?php echo $leaderboard['8']['final_score']; ?></td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td><?php echo $leaderboard['9']['name']; ?></td>
                            <td><?php echo $leaderboard['9']['final_score']; ?></td>
                          </tr>
                          </tbody>
                        </table>
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
