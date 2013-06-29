<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Clan Comet CMS Installer</title>

	<link href='http://fonts.googleapis.com/css?family=Alef:400,700|Orienta' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.2.0/pure-min.css">
	<link rel="stylesheet" href="<?php echo base_url('_install/assets/main.css') ?>">
</head>
<body>

	<div id="wrapper">

		<nav>
			<ul>
				<li>
					<h3>1</h3>
					<p>WELCOME <br /> <span>Preface</span></p>
				</li>
				<li>
					<h3>2</h3>
					<p>REQUIREMENTS <br /> <span>System config</span></p>
				</li>
				<li>
					<h3>3</h3>
					<p>CONNECT <br /> <span>Database &amp; user info</span></p>
				</li>
				<li>
					<h3>4</h3>
					<p>FINISH <br /> <span>Congratulations</span></p>
				</li>
			</ul>
		</nav>

		<section id="content">

			<div class="pure-g">
				<div class="pure-u-1">

					<?php echo $template['body']; ?>

				</div>
			</div>

		</section>

		<section class="action-bar">
			<?php if($stepLink == 'step4'): ?>
				<button class="pure-button install-button" type="submit" onclick="document.forms[0].submit();">Next</button>
			<?php elseif($stepLink == 'finish'): ?>
				<a href="<?php echo base_url(); ?>" class="pure-button install-button">Visit website</a>
			<?php else: ?>
				<a href="<?php echo base_url(); ?>install/<?php echo $stepLink; ?>" class="pure-button install-button">Next</a>
			<?php endif; ?>
		</section>

	</div>

</body>
</html>