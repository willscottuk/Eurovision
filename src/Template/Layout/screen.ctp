<?php
$cakeDescription = 'Eurovision';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('mdb.min.css') ?>

    <style rel="stylesheet">
        /* TEMPLATE STYLES */

        html,
        body,
        .view {
            height: 100%;
        }

        main {
	        margin-top: 3rem;
        }

        /* Navigation*/

        .navbar {
            background-color: #1C2331;
        }

        .scrolling-navbar {
            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }

        .top-nav-collapse {
            background-color: #1C2331;
        }

        footer.page-footer {
           background-color: #1C2331;
            margin-top: -50px;
        }

        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #1C2331;
            }
        }
        /*Call to action*/

        .flex-center {
        }

        .view {
            background: url("/img/arena.jpg")no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        /* Carousel*/

        .carousel,
        .carousel-item,
        .active {
            height: 100%;
        }

        .carousel .h1-responsive {
	        font-size: 400%;
        }

        .carousel-inner {
            height: 100%;
        }
        /*Caption*/

        @media (min-width: 776px) {
            .carousel .view ul li {
                display: inline;
            }
            .carousel .view .full-bg-img ul li .flex-item {
                margin-bottom: 1.5rem;
            }
        }
    </style>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script('jquery-2.2.3.min.js') ?>
    <script>
  		/* AJAX request to checker */
  		function check(){
  			$.ajax({
  				type: 'POST',
  				url: '/control',
  				dataType: 'json',
  				data: {
  					counter:$('#counter').data('counter')
  				}
  			}).done(function( response ) {
  				/* update counter */
  				$('#counter').data('counter',response.data.current);
  				/* check if with response we got a new update */
  				if(response.data.update==true){
  					// $('#message-list').html(response.news);
            location.reload();
  				}
  			});
  		}
  		//Every 20 sec check if there is new update
  		// setInterval(check,20000);
      //Every 5 sec check if there is new update
  		setInterval(check,5000);
  	</script>


</head>
<body>
	<header>
    <!-- No NavBar -->
	</header>
  <div id="counter" data-counter="<?php echo $modearray['id']; ?>"> </div>
        <?= $this->fetch('content') ?>
    <footer>
	    <?= $this->Flash->render() ?>
    </footer>
     <?= $this->Html->script('tether.min.js') ?>
     <?= $this->Html->script('bootstrap.min.js') ?>
     <?= $this->Html->script('mdb.min.js') ?>

    <script>
    new WOW().init();
    </script>

</body>
</html>
