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
                        <table class="table">
                          <thead>
                          <tr>
                            <th align="center" style="text-align:center;"><h2>Points</h2></th>
                            <th align="center" style="text-align:center;"><h2>Country</h2></th>
                            <th align="center" style="text-align:center;"><h2>Score</h2></th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td><h3>12</h3></td>
                            <td><h3><?php echo $leaderboard['0']['name']; ?></h3></td>
                            <td><h3><?php echo $leaderboard['0']['final_score']; ?></h3></td>
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
</div>
<!--/.Carousel Wrapper-->
