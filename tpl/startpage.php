<!DOCTYPE html>
<html lang="en">
    <head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="canonical" href="<?= Config::get('site.url') ?>" />

	<link rel="stylesheet" media="screen" href="css/desktop.css" type="text/css" />
	<link rel="stylesheet" media="screen and (max-width: 767px)"
	      href="css/mobile.css" type="text/css" />

	<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />

	<link title="<?= Config::get('site.title') ?>" type="application/opensearchdescription+xml" rel="search" href="?opensearch">

	<title><?= Config::get('site.title') ?></title>

	<meta name="description" content="<?= Config::get('site.description') ?>">
    </head> 

    <body>
	<div class="header">
	</div>
	<div class="horizontal-wrapper">
	    <div class="vertical-wrapper">
		<div class="title">
		    <h1><?= Config::get('site.title') ?></h1>
		</div>
		<div>
		    <form action="" method="get">
			<input class="search" type="text" name="search" autofocus="autofocus" /><br/>
			<input class="button" type="submit" value="<?= Config::get('site.search') ?>" />
		    </form>
		</div>
	    </div>
	    <div class="vertical-align-helper"></div>
	</div>
	<div class="footer">
	</div>
    </body>
</html>
