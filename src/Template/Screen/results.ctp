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
                        <h1 class="h1-responsive flex-item"><?php echo $countrydetails['name']?>: <?php echo $average?></h1>
                    </li>
                    <?php if (empty($comments)) {

                    }
                    else { ?>
                      <?php foreach ($comments as $comment) { ?>
                      <li>
                          <h1 class="h1-responsive"><?php echo $comment['comments']; ?></h1>
                      </li>
                    <?php
                    }
                    }
                    ?>
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
<div class="footer">
  <h1 class="scores">Staging: <strong><?php echo $scores['ave_staging']; ?></strong> &nbsp;&nbsp;&nbsp;&nbsp; Song: <strong><?php echo $scores['ave_song']; ?></strong> &nbsp;&nbsp;&nbsp;&nbsp; Singer: <strong><?php echo $scores['ave_singer'];?></strong> &nbsp;&nbsp;&nbsp;&nbsp; Performance: <strong><?php echo $scores['ave_overall']; ?></strong></h1>
</div>
<script>
(function($) {
    $.fn.textWidth = function(){
         var calc = '<span style="display:none">' + $(this).text() + '</span>';
         $('body').append(calc);
         var width = $('body').find('span:last').width();
         $('body').find('span:last').remove();
        return width;
    };

    $.fn.marquee = function(args) {
        var that = $(this);
        var textWidth = that.textWidth(),
            offset = that.width(),
            width = offset,
            css = {
                'text-indent' : that.css('text-indent'),
                'overflow' : that.css('overflow'),
                'white-space' : that.css('white-space')
            },
            marqueeCss = {
                'text-indent' : width,
                'overflow' : 'hidden',
                'white-space' : 'nowrap'
            },
            args = $.extend(true, { count: -1, speed: 1e1, leftToRight: false }, args),
            i = 0,
            stop = textWidth*-1,
            dfd = $.Deferred();

        function go() {
            if(!that.length) return dfd.reject();
            if(width == stop) {
                i++;
                if(i == args.count) {
                    that.css(css);
                    return dfd.resolve();
                }
                if(args.leftToRight) {
                    width = textWidth*-1;
                } else {
                    width = offset;
                }
            }
            that.css('text-indent', width + 'px');
            if(args.leftToRight) {
                width++;
            } else {
                width--;
            }
            setTimeout(go, args.speed);
        };
        if(args.leftToRight) {
            width = textWidth*-1;
            width++;
            stop = offset;
        } else {
            width--;
        }
        that.css(marqueeCss);
        go();
        return dfd.promise();
    };
})(jQuery);

$('.scoresmarquee').marquee({ speed: 5, count: 1});
</script>
