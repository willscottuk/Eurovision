<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

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
            margin-top: -1px;
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


</head>
<body>
	<header>
    <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <strong>Eurovision <?php echo date("Y"); ?></strong>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/about">About</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/users/logout">Logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!--/.Navbar-->
	</header>

        <?= $this->fetch('content') ?>
    </div>
    </div>
    <footer>
	    <?= $this->Flash->render() ?>
    </footer>

     <?= $this->Html->script('jquery-2.2.3.min.js') ?>
     <?= $this->Html->script('tether.min.js') ?>
     <?= $this->Html->script('bootstrap.min.js') ?>
     <?= $this->Html->script('mdb.min.js') ?>

    <script>
    new WOW().init();
    </script>

    <script language="javascript" type="text/javascript">
    function limitText(limitField, limitCount, limitNum) {
    	if (limitField.value.length > limitNum) {
    		limitField.value = limitField.value.substring(0, limitNum);
    	} else {
    		limitCount.value = limitNum - limitField.value.length;
    	}
    }
    </script>

</body>
</html>
