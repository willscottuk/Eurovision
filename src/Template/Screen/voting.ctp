<!--Carousel Wrapper-->

<div id="carousel-example-3" class="carousel slide carousel-fade white-text" data-ride="carousel" data-interval="8000">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-3" data-slide-to="0" class="active"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

        <!-- First slide -->
        <div class="carousel-item active view hm-black-strong" style="background-image: url('/img/arena.jpg'); background-repeat: no-repeat; background-size: cover;">

            <!-- Caption -->
            <div class="full-bg-img flex-center white-text">
                <ul class="animated fadeInUp col-md-12">
                    <li>
                        <h1 class="h1-responsive flex-item">Voting is open for <?php echo $countrydetails['name']?></h1>
                    </li>
                    <li>
                        <h1 class="h1-responsive"><?php echo $countrydetails['song']?> by <?php echo $countrydetails['artist']?></h1>
                    </li>
                    <li>
                        <br />
                        <h1 class="h1-responsive"><div class="countdown"></div></h1>
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


<script>
var timer2 = "3:00";
var interval = setInterval(function() {
var timer = timer2.split(':');
//by parsing integer, I avoid all extra string processing
var minutes = parseInt(timer[0], 10);
var seconds = parseInt(timer[1], 10);
--seconds;
minutes = (seconds < 0) ? --minutes : minutes;
seconds = (seconds < 0) ? 59 : seconds;
seconds = (seconds < 10) ? '0' + seconds : seconds;
//minutes = (minutes < 10) ?  minutes : minutes;
$('.countdown').html(minutes + ':' + seconds);
if (minutes < 0) clearInterval(interval);
//check if both minutes and seconds are 0
if ((seconds <= 0) && (minutes <= 0)) clearInterval(interval);
if ((seconds <= 0) && (minutes <= 0)) $.ajax({
  type: 'POST',
  url: '/control/next',
});
timer2 = minutes + ':' + seconds;
}, 1000);
</script>
