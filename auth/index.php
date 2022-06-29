<?php
session_start();

$message = '';
$backUrl = '';
$lang = '';
$country = '';

$password = array('8t8knhfs879ioh', '8t8knhfs879HJKRTFT' , '8t8kn56gfhfgh');

#
if(isset($_GET['back']) && $_GET['back'] != '')
{
	$backUrl = base64_decode($_GET['back']);
	$lang = $_GET['lang'];
	$country = $_GET['country'];
}

#
if(isset($_POST['password']))
{
	$currentPassword = trim($_POST['password']);
	if(in_array($currentPassword,$password))
	{
		$_SESSION['auth'] = 1;
		header('Location: '.$backUrl);
	}
	else
	{
		$message = '<p class="login-error" >Wrong password </p>';
	}
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang;?>">
<head>
    <title>Bordermodels - login</title>
    <meta content="public" />
    <meta content="max-age=3600, must-revalidate" />
    <meta charset="UTF-8">
    <meta name="description" content="Borderfield">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="all" />

    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/bordermodels/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/bordermodels/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/bordermodels/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/bordermodels/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/bordermodels/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/bordermodels/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/bordermodels/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/bordermodels/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/bordermodels/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/bordermodels/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/bordermodels/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/bordermodels/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/bordermodels/favicon-16x16.png">
    <link rel="manifest" href="/favicon/bordermodels/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/bordermodels/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link href="https://plus.google.com/108937195139060877177" rel="publisher">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="/css/site/featherlight.min.css" title="Featherlight Styles" />
    <link rel="stylesheet" href="/css/site/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/css/site/jquery.fancybox-buttons.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/css/site/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/site/slick.css"/>

    <link href="/css/borderfield/style.css" rel="stylesheet" media="all">
    <link href="/css/borderfield/style-new.css" rel="stylesheet" media="all">
    
    <script type="text/javascript" src="/js/site/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/js/borderfield/slick.min.js"></script>
    <script type="text/javascript" src="/js/site/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="/js/site/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="/js/site/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="/js/site/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript" src="/js/site/new-design/masonry.pkgd.min.js"></script>
</head>
<body>
    <div class="body-wrapper">
        <div class="container">
            <header class="header clearfix">
			    <div class="menu-mobile">
			        <i class="fas fa-bars"></i>
			    </div>
			    <div class="menu_right red-color">
			        <p class="menu_right-languages">
                        <?php if('de' == $lang):?>
                            Germany Deutsch - 
                        <?php else:?>
                            <a href="<?php echo '/'.$lang;?>" >Germany Deutsch</a> - 
                        <?php endif;?>
                        <?php if('en' == $lang):?>
                            English
                        <?php else:?>
                            <a href="<?php echo '/'.$lang;?>" >English</a>
                        <?php endif;?>
					</p>

					<p>Call 01 5155 332 323 or <a href="mailto:info@bordermodels.com">Email us</a></p>

					<p><a href="https://castingteam.com/en/register/0" target="_blank">Models Sign Up here</a></p>
			    </div>
			    <div class="menu_left">
			        <a class="logo" href="<?php echo '/'.$lang;?>">
			            <svg viewBox="0 0 307 441" fill="none" xmlns="http://www.w3.org/2000/svg">
			                <path d="M183 192.8H165C178 173.2 185.6 149.6 185.6 124.3C185.6 56.1001 130.6 0.800049 62.5 0.300049H0.5V55.8001H61.7C99.5 55.8001 130.2 86.5 130.2 124.3C130.2 162.1 99.5 192.8 61.7 192.8H0.5V248.3H61.2C61.3 248.3 61.5 248.3 61.6 248.3C61.7 248.3 61.9 248.3 62 248.3H62.5H182.1C219.9 248.3 250.6 279 250.6 316.8C250.6 354.6 219.9 385.3 182.1 385.3H121V440.8H181.7C181.8 440.8 182 440.8 182.1 440.8C182.2 440.8 182.4 440.8 182.5 440.8H183C251.1 440.3 306.1 385 306.1 316.8C306.1 248.5 251.1 193.2 183 192.8Z" fill="#F05555"/>
			            </svg>
			        </a>			        
	                <div class="groups">
	                	<ul class="group-list">
                    		<li><a href="/<?php echo $lang;?>/models-boys-men">Men</a></li>
                    		<li><a href="/<?php echo $lang;?>/models-girls-women">Women</a></li>
                    		<li><a href="/<?php echo $lang;?>/models-gentlemen">Gentlemen</a></li>
                    		<li><a href="/<?php echo $lang;?>/models-ladies">Ladies</a></li>
             				<li><a href="/<?php echo $lang;?>/models-sports-athletes">Athletes &amp; sport</a></li>
    					</ul>
	                </div>
			    </div>
			</header>
        </div>

        <div class="container">
        	<br /><br />
        	<section class="section section-intro clearfix" style="border-bottom:none;">
		        <div class="section-intro__centre">
		            <h2>Our models</h2>
		            <p>In order to view our model database, please provide a <br /> 
		               password below. If you do not have a password, kindly <br /> 
		               request one via <a href="mailto:germany@bordermodels.com">germany@bordermodels.com</a>.</p>

		            <?php echo $message;?>
		                    
		    		<form method="post" action="" >
		    			<input type="password" class="login-text" name="password" placeholder="Password" /> 
		    			<button type="submit" class="login-button" >Submit</button>
		    		</form>
		           
		        </div>		       
        	</section>

        </div>

    </div>
</body>
</html>