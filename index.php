<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:ctag="http://commontag.org/ns#" lang="en" dir="ltr" version="XHTML+RDFa 1.0" >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Secret Santa</title>

		<!--CSS-->
		<link href="./includes/css/screen.css" rel="stylesheet" type="text/css" media="screen, projection" charset="utf-8" />
		<link href="./includes/css/custom.css" rel="stylesheet" type="text/css" media="screen, projection" charset="utf-8" />
		<link href="./includes/css/print.css" rel="stylesheet" type="text/css" media="print" charset="utf-8" />
		<!--[if IE]><link href="./includes/css/ie.css" rel="stylesheet" type="text/css" media="print" charset="utf-8" /><![endif]-->

		<!--JS-->
		<script type="text/javascript" src="./includes/js/email.js" charset="utf-8"></script>

		<!--Meta-->
		<meta http-equiv="X-UA-Compatible" content="chrome=1"/>
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="description" content="A simple and open source web app to do a random secret santa drawing."/>

    	<?php require_once("./config.php"); ?>

    	<link rel="canonical" href="<?php echo CANONICAL_URL; ?>" />
    	<?php $rand_key = time(); mt_srand($rand_key); $form_key = mt_rand(); ?>
	</head>
	<body class="container">

		<div class="header span-24">
			<a href="http://secret.yostivanich.com/"><h1 id="title">Secret Santa</h1></a>
			<p>by <a href="http://www.yostivanich.com" title="Justin Yost">Justin Yost</a></p>
		</div>
		<noscript><div class="span-24 notice"><p>This App Really Requires JavaScript To Work!!</p></div></noscript>
		<hr></hr>
		<div class="body span-24">
			<div id="what">
			</div>
			<div id="form">
				<form action="sendEmails.php" name="sendEmails" method="get">
					<fieldset>
						<legend>Add Each Person and Their Email</legend>
						<div class="span-6 colborder" id="formName">
							<p><label for="name_1">Name:</label><br/><input type="text" maxlength="255" value="" name="name_1" class="formNames span-5" tabindex="1"></input></p>
						</div>
						<div class="span-6 colborder" id="formEmail">
							<p><label for="email_1">Email:</label><br/><input type="email" maxlength="255" value="" name="email_1"  class="formEmails span-5" tabindex="2"></input></p>
						</div>
						<div class="span-6 colborder" id="formOther">
							<p><label for="other_1">Other Information:</label><br/><textarea value="" name="other_1"  class="formOther" tabindex="3" rows="3" cols="30"></textarea></p>
						</div>
						<div class="span-3 last">
							<p><label for="email_1">Gift Value:</label><br/>
							<select id="gift_value" name="gift_value">
								<option value="5">$5.00</option>
								<option value="10">$10.00</option>
								<option value="15">$15.00</option>
								<option value="20" selected="selected">$20.00</option>
								<option value="25">$25.00</option>
								<option value="30">$30.00</option>
								<option value="35">$35.00</option>
								<option value="40">$40.00</option>
								<option value="45">$45.00</option>
								<option value="50">$50.00</option>
							</select>
							</p>
						</div>
						<div class="span-24">
							<p><input type="button" id="addAnotherPerson" value="Add Another Person"></input></p>
							<p><input type="submit" id="submit" value="Shuffle Names and Send Emails"></input></p>
						</div>
						<input type="hidden" value="<?php echo $rand_key; ?>" name="rand_key" id="rand_key"/>
						<input type="hidden" value="<?php echo $form_key; ?>" name="form_key" id="form_key"/>
						<input type="hidden" value="1" name="number_ppl" id="number_ppl"/>
						<input type="hidden" value="sendEmails.php" name="script" id="script"/>
					</fieldset>
				</form>
			</div>
			<div id="onSubmit" class="span-24 hidden"><p class="notice">Names being shuffled and emails sent off.</p></div>
			<div id="results" class="span-24 hidden"></div>
		</div>
		<div class="footer" class="span-24">
			<p>
				<div class="span-7 colborder"><p>&copy; <?php echo date('Y'); ?> Justin Yost <a rel="license" href="http://www.opensource.org/licenses/mit-license.php">MIT Lincensed</a></p></div>
				<div class="span-8 colborder"><p>Privacy: Names and emails aren't stored in any way.</p></div>
				<div class="span-7 last"><p>Contact Me: <script type="text/javascript">emailMe();</script></p></div>
			</p>
		</div>

		<!--JS-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script type="text/javascript" src="./includes/js/secret_santa.js" charset="utf-8"></script>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?php echo GOOGLE_ANALYTICS_ID; ?>']);
			_gaq.push(['_trackPageview']);
			(function() {
    			var ga = document.createElement('script');
    			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    			ga.setAttribute('async', 'true');
    			document.documentElement.firstChild.appendChild(ga);
  			})();
		</script>
	</body>
</html>