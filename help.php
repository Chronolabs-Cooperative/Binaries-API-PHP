<?php
/**
 * Chronolabs Binary Downloads + Emailer REST API
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Cooperative http://labs.coop
 * @license         General Public License version 3 (http://labs.coop/briefs/legal/general-public-licence/13,3.html)
 * @package         binaries
 * @since           1.0.2
 * @author          Simon Roberts <wishcraft@users.sourceforge.net>
 * @version         $Id: help.php 1000 2013-06-07 01:20:22Z mynamesnot $
 * @subpackage		api
 * @description		Binary Downloads + Emailer REST API
 */

	$pu = parse_url($_SERVER['REQUEST_URI']);
	$source = (isset($_SERVER['HTTPS'])?'https://':'http://').strtolower($_SERVER['HTTP_HOST']).$pu['path'];
	$userkey = (!isset($_SESSION['userkey'])?(isset($_GET['userkey'])&!empty($_GET['userkey'])?$_SESSION['userkey'] = (string)$_GET['userkey']:md5(NULL)):$_SESSION['userkey']);
	$ua = substr(sha1($_SERVER['HTTP_USER_AGENT']), mt_rand(0,32), 9);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Binary Downloads + Emailer API || Chronolabs Cooperative</title>
<!-- AddThis Smart Layers BEGIN -->
<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f9a1c208996c1d"></script>
<script type="text/javascript">
  addthis.layers({
	'theme' : 'transparent',
	'share' : {
	  'position' : 'right',
	  'numPreferredServices' : 6
	}, 
	'follow' : {
	  'services' : [
		{'service': 'facebook', 'id': 'chronolabs'},
		{'service': 'twitter', 'id': 'negativitygear'},
		{'service': 'linkedin', 'id': 'ceoandfounder'},
		{'service': 'google_follow', 'id': '111267413375420332318'}
	  ]
	},  
	'whatsnext' : {},  
	'recommended' : {
	  'title': 'Recommended for you:'
	} 
  });
</script>
<!-- AddThis Smart Layers END -->
<style>
body {
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:85%em;
	background: #a647b7; /* Old browsers */
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+CiAgICA8c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjYTY0N2I3IiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iI2VhZTI0NiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
	background: -moz-linear-gradient(-45deg,  #a647b7 0%, #eae246 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#a647b7), color-stop(100%,#eae246)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(-45deg,  #a647b7 0%,#eae246 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(-45deg,  #a647b7 0%,#eae246 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(-45deg,  #a647b7 0%,#eae246 100%); /* IE10+ */
	background: linear-gradient(135deg,  #a647b7 0%,#eae246 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a647b7', endColorstr='#eae246',GradientType=1 ); /* IE6-8 fallback on horizontal gradient */
	text-align:justify;
}

.main {
	border:3px solid #000000;
	border-radius:15px;
	background-color:#feeebe;
	padding:39px 39px 39px 39px;
	margin:64px 64px 64px 64px;
	-webkit-box-shadow: 7px 7px 10px 0px rgba(108, 80, 99, 0.72);
	-moz-box-shadow:    7px 7px 10px 0px rgba(108, 80, 99, 0.72);
	box-shadow:         7px 7px 10px 0px rgba(108, 80, 99, 0.72);
}
h1 {
	font-weight:bold;
	font-size:1.62em;
	background-color:#FFEED9;
	border-radius:15px;
	padding:10px 10px 10px 10px;
	text-shadow: 4px 4px 2px rgba(150, 150, 150, 1);
}
h2 {
	font-weight:500;
	font-size:1.35em;
	text-shadow: 4px 4px 2px rgba(150, 150, 150, 1);
	border-bottom: 4px solid #334541;
}
h3 {
	font-weight:300;
	font-size:1.45em;
	text-shadow: 3px -2px 4px rgba(150, 150, 150, 1);
	border-bottom: 2px solid #334541;
	margin-left: 9px;
	margin-right: 19px;
}
blockquote {
	margin-left:25px;
	margin-right:25px;
	font-family:"Courier New", Courier, monospace;
	margin-bottom:25px;
	padding: 25px 25px 25px 25px;
	border:dotted;
	background-color:#fefefe;
	-webkit-box-shadow: 7px 7px 10px 0px rgba(108, 80, 99, 0.72);
	-moz-box-shadow:    7px 7px 10px 0px rgba(108, 80, 99, 0.72);
	box-shadow:         7px 7px 10px 0px rgba(108, 80, 99, 0.72);
	-webkit-border-radius: 14px;
	-moz-border-radius: 14px;
	border-radius: 14px;
	text-shadow: 2px 2px 2px rgba(103, 87, 101, 0.82);
}
p {
	margin-bottom:12px;
}
</style>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script>
	var icoroite = 9966 * Math.random() + 7755;
	setTimeout(function() {
		jQuery.getJSON( "//labs.coop/icons/java/invaders/random.json?sessionid=<?php echo session_id(); ?>", function( data ) {
			$.each(data, function( keyey, value ) {
				$( "#" + keyey ).href = value;
			});
		});
	}, icoroite);
</script>
<?php
	if ((!isset($_SESSION['icon-meta-html']) || empty($_SESSION['icon-meta-html'])) && session_id())
		$_SESSION['icon-meta-html'] = file_get_contents("//labs.coop/icons/meta/invaders/random.html?sessionid=" . session_id());
	if (isset($_SESSION['icon-meta-html']) && !empty($_SESSION['icon-meta-html']))
		echo $_SESSION['icon-meta-html'];
	else
		echo file_get_contents("http://icons.labs.coop/meta/invaders/random.html?sessionid=" . session_id());
?>
<link rel="stylesheet" href="//labs.coop/css/3/gradientee/stylesheet.css?sessionid=<?php echo session_id(); ?>" type="text/css">
<link rel="stylesheet" href="//labs.coop/css/3/shadowing/styleheet.css?sessionid=<?php echo session_id(); ?>" type="text/css">
</head>

<body>
<div class="main">
    <h1>Binary Downloads + Emailer API Services - Version 1.01</h1>
    <p>This is an API Service for providing fonts to your application or website. It provides the the listing as well as harvesting with push as well as email in both types for Binary File Downloads through several different methods and a central keying services.</p>
    <p>You will normally require a username on this api, when you have one there is an API Call as discussed to get your session key for the username, this allowed and is needed to do higher functions on the website! The userkey unless you have logged <?php echo ($userkey != md5(NULL))? " you are currently logged in and your userkey is: <strong>" . $userkey . "</strong>!":" the example in; will display as <em>md5(NULL)</em> = <strong>$userkey</strong>!";?></p>
    <h2>Code API Documentation</h2>
    <p>You can find the phpDocumentor code API documentation at the following path :: <a href="<?php echo $source; ?>docs/" target="_blank"><?php echo $source; ?>docs/</a>. These should outline the source code core functions and classes for the API to function!</p>
    <?php if ($userkey == md5(NULL)) { ?>
    <h2>SESSION Document Output</h2>
    <p>This is the routines you need to call to get a checksum like: <strong><?php echo $userkey; ?></strong> for your user sessioning key!</p>
    <blockquote>
        <font color="#009900">You need to submit this form when you have forgotten your site based username to recover your password and reset it on API!</font><br/><br/>
        <em>Form action path: <strong><?php echo $source; ?>v1/user/session.api</strong></em>
        <form name="user-session-key" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/user/session.api">
		    Return Action:
		    <select name="format" id="format">
		    	<option value="return">Return to URL</option>
		    	<option value="json">Output JSON String</option>
		    	<option value="serial">Output PHP Serialized</option>
		    	<option value="xml">Output eXtendable Markup</option>
		    </select><br/>
		    Session Valid For:
		    <select name="expire" id="expire">
		    	<option value="86400">Expire in 24 Hours</option>
		    	<option value="43200">Expire in 12 Hours</option>
		    	<option value="21600">Expire in 6 Hours</option>
		    	<option value="10800">Expire in 3 Hours</option>
		    	<option value="3600">Expire in 60 Minutes</option>
		    	<option value="1800">Expire in 30 Minutes</option>
		    	<option value="399">Expire in 399 Seconds</option>
		    </select><br/>
		    User Name / Email:
			<input type="textbox" name="alias" id="alias" maxlen="198" size="35" /><br/>
		    User's Password:
			<input type="textbox" name="pass" id="pass" maxlen="198" size="35" />&nbsp;&nbsp;<em>(md5 check-sum: passes thru</em>!)<br/>
			<input type="hidden" name="return" value="<?php echo $source; ?>?userkey=%key%&expires=%expires%">
			<input type="submit" value="Get User Session" name="submit">
		</form>
		<h3>Code Example:</h3>
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;form name=&quot;user-session-key&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot; action=&quot;<?php echo $source; ?>v1/user/session.api&quot;&gt;
    Return Action:
    &lt;select name=&quot;format&quot; id=&quot;format&quot;&gt;
    	&lt;option value=&quot;return&quot;&gt;Return to URL&lt;/option&gt;
    	&lt;option value=&quot;json&quot;&gt;Output JSON String&lt;/option&gt;
    	&lt;option value=&quot;serial&quot;&gt;Output PHP Serialized&lt;/option&gt;
    	&lt;option value=&quot;xml&quot;&gt;Output eXtendable Markup&lt;/option&gt;
    &lt;/select&gt;&lt;br/&gt;
    Session Valid For:
    &lt;select name=&quot;expire&quot; id=&quot;expire&quot;&gt;
    	&lt;option value=&quot;86400&quot;&gt;Expire in 24 Hours&lt;/option&gt;
    	&lt;option value=&quot;43200&quot;&gt;Expire in 12 Hours&lt;/option&gt;
    	&lt;option value=&quot;21600&quot;&gt;Expire in 6 Hours&lt;/option&gt;
    	&lt;option value=&quot;10800&quot;&gt;Expire in 3 Hours&lt;/option&gt;
    	&lt;option value=&quot;3600&quot;&gt;Expire in 60 Minutes&lt;/option&gt;
    	&lt;option value=&quot;1800&quot;&gt;Expire in 30 Minutes&lt;/option&gt;
    	&lt;option value=&quot;399&quot;&gt;Expire in 399 Seconds&lt;/option&gt;
    &lt;/select&gt;&lt;br/&gt;
    User Name / Email:
	&lt;input type=&quot;textbox&quot; name=&quot;alias&quot; id=&quot;alias&quot; maxlen=&quot;198&quot; size=&quot;35&quot; /&gt;&lt;br/&gt;
    User's Password:
	&lt;input type=&quot;textbox&quot; name=&quot;pass&quot; id=&quot;pass&quot; maxlen=&quot;198&quot; size=&quot;35&quot; /&gt;&nbsp;&nbsp;&lt;em&gt;(md5 check-sum: passes thru&lt;/em&gt;!)&lt;br/&gt;
	&lt;input type=&quot;hidden&quot; name=&quot;return&quot; value=&quot;<?php echo $source; ?>?userkey=%key%&expires=%expires%&quot;&gt;
	&lt;input type=&quot;submit&quot; value=&quot;Get User Session&quot; name=&quot;submit&quot;&gt;
&lt;/form&gt;
		</pre>
		</blockquote>
	<?php } ?>
    <h2>CREATE Document Output</h2>
    <p>This is done with the <em>create.api</em> extension at the end of the url, this is all the functions for creating and sessioning changes on this api! That is for a site you run that will utilize this API!</p>
    <h3>Create New User</h3>
    <blockquote>
        <font color="#009900">You need too submit a form to the following URL for using the API Content Additions adding a user is for site based sources!</font><br/><br/>
        <em>Form action path: <strong><?php echo $source; ?>v1/user/create.api</strong></em>
        <form name="site-profiler-creation" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/user/create.api">
        	Return Action:
		    <select name="format" id="format">
		    	<option value="return">Return to URL</option>
		    	<option value="json">Output JSON String</option>
		    	<option value="serial">Output PHP Serialized</option>
		    	<option value="xml">Output eXtendable Markup</option>
		    </select><br/>
		    User Name:
			<input type="textbox" name="username" id="username" maxlen="23" size="15" />	<br/>
			User's Full Name:
			<input type="textbox" name="name" id="name" maxlen="198" size="35" />	<br/>
		    User's Email Address:
			<input type="textbox" name="email" id="email" maxlen="198" size="35" />	<br/>
		    Password for editing style's profile :
			<input type="password" name="password" id="password" size="35" />&nbsp;&nbsp;<em>(md5 check-sum: passes thru</em>!)<br/>
			Confirm Password for editing:
			<input type="password" name="confirm" id="confirm" size="35" />&nbsp;&nbsp;<em>(md5 check-sum: passes thru</em>!)<br/>
			Nodes/Tags:
    		<input type="textbox" name="nodes" id="nodes" maxlen="250" size="35" />&nbsp;<strong>(Seperated <em>[,] or [;]</em>)</strong><br/>
			<input type="hidden" name="return" value="<?php echo $source; ?>?userkey=%key%">
			<input type="submit" value="Create Site Profile" name="submit">
		</form>
		<h3>Code Example:</h3>
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;form name="site-profiler-creation" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/user/create.api"&gt;
	    Return Action:
	    &lt;select name=&quot;format&quot; id=&quot;format&quot;&gt;
	    	&lt;option value=&quot;return&quot;&gt;Return to URL&lt;/option&gt;
	    	&lt;option value=&quot;json&quot;&gt;Output JSON String&lt;/option&gt;
	    	&lt;option value=&quot;serial&quot;&gt;Output PHP Serialized&lt;/option&gt;
	    	&lt;option value=&quot;xml&quot;&gt;Output eXtendable Markup&lt;/option&gt;
	    &lt;/select&gt;&lt;br/&gt;
	User Name:
	&lt;input type=&quot;textbox&quot; name=&quot;username&quot; id=&quot;username&quot; maxlen=&quot;23&quot; size=&quot;15&quot; /&gt;	&lt;br/&gt;
	User's Full Name:
	&lt;input type=&quot;textbox&quot; name=&quot;name&quot; id=&quot;name&quot; maxlen=&quot;198&quot; size=&quot;35&quot; /&gt;	&lt;br/&gt;
    User's Email Address:
	&lt;input type=&quot;textbox&quot; name=&quot;email&quot; id=&quot;email&quot; maxlen=&quot;198&quot; size=&quot;35&quot; /&gt;	&lt;br/&gt;
    Password for editing style's profile :
	&lt;input type=&quot;password&quot; name=&quot;password&quot; id=&quot;password&quot; size=&quot;35&quot; /&gt;&nbsp;&nbsp;&lt;em&gt;(md5 check-sum: passes thru&lt;/em&gt;!)&lt;br/&gt;
	Confirm Password for editing:
	&lt;input type=&quot;password&quot; name=&quot;confirm&quot; id=&quot;confirm&quot; size=&quot;35&quot; /&gt;&nbsp;&nbsp;&lt;em&gt;(md5 check-sum: passes thru&lt;/em&gt;!)&lt;br/&gt;
	Nodes/Tags:
	&lt;input type=&quot;textbox&quot; name=&quot;nodes&quot; id=&quot;nodes&quot; maxlen=&quot;250&quot; size=&quot;35&quot; /&gt;&amp;nbsp;&lt;strong&gt;(Seperated &lt;em&gt;[,] or [;]&lt;/em&gt;)&lt;/strong&gt;&lt;br/&gt;
	&lt;input type=&quot;hidden&quot; name=&quot;return&quot; value=&quot;<?php echo $source; ?>?userkey=%key%&quot;&gt;
	&lt;input type=&quot;submit&quot; value=&quot;Create Site Profile&quot; name=&quot;submit&quot;&gt;
&lt;/form&gt;
	</pre>
	</blockquote>
	<h3>Create New Site</h3>
    <blockquote>
        <font color="#009900">You need too submit a form to the following URL for using the API Content Additions adding a user is for site based sources!</font><br/><br/>
        <em>Form action path: <strong><?php echo $source; ?>v1/site/<?php echo $userkey ;?>/create.api</strong></em>
        <form name="site-profiler-creation" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/site/<?php echo $userkey ;?>/create.api">
        	Return Action:
		    <select name="format" id="format">
		    	<option value="return">Return to URL</option>
		    	<option value="json">Output JSON String</option>
		    	<option value="serial">Output PHP Serialized</option>
		    	<option value="xml">Output eXtendable Markup</option>
		    </select><br/>
        	Site Typal:
		    <select name="type" id="type">
		    	<option value="source">Binary/Source Typal</option>
		    	<option value="client">Client Site Typal</option>
		    	<option value="referee">Referee Site Typal</option>
		    	<option value="unknown">Unknown Site Typal</option>
		    </select><br/>
		    Site Name (required):
			<input type="textbox" name="name" id="name" maxlen="200" size="42" /><br/>
		    Site Domain (required):
			<input type="textbox" name="domain" id="domain" maxlen="200" size="42" /><br/>
		    Site Admin Name (required):
			<input type="textbox" name="admin-email" id="admin-email" maxlen="200" size="42" /><br/>
		    Site Admin Name (required):
			<input type="textbox" name="admin-name" id="admin-name" maxlen="200" size="42" /><br/>
			Site Support URI (not required):
			<input type="textbox" name="support-uri" id="support-uri" maxlen="200" size="42" /><br/>
		    Site Support Email (not required):
			<input type="textbox" name="support-email" id="support-email" maxlen="200" size="42" /><br/>
			Site Support Phone (not required):
			<input type="textbox" name="support-phone" id="support-phone" maxlen="200" size="42" /><br/>
			Nodes/Tags:
    		<input type="textbox" name="nodes" id="nodes" maxlen="250" size="35" />&nbsp;<strong>(Seperated <em>[,] or [;]</em>)</strong><br/>
			<input type="hidden" name="return" value="<?php echo $source; ?>?key=%key%">
			<input type="submit" value="New Site Under User Session" name="submit">
		</form>
		<h3>Code Example:</h3>
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;form name=&quot;site-profiler-creation&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot; action=&quot;<?php echo $source; ?>v1/site/<?php echo $userkey ;?>/create.api&quot;&gt;
    Return Action:
	&lt;select name=&quot;format&quot; id=&quot;format&quot;&gt;
		  &lt;option value=&quot;return&quot;&gt;Return to URL&lt;/option&gt;
		  &lt;option value=&quot;json&quot;&gt;Output JSON String&lt;/option&gt;
		  &lt;option value=&quot;serial&quot;&gt;Output PHP Serialized&lt;/option&gt;
		  &lt;option value=&quot;xml&quot;&gt;Output eXtendable Markup&lt;/option&gt;
	&lt;/select&gt;&lt;br/&gt;
    Site Typal:
	&lt;select name=&quot;type&quot; id=&quot;type&quot;&gt;
		  &lt;option value=&quot;source&quot;&gt;Binary/Source Typal&lt;/option&gt;
		  &lt;option value=&quot;client&quot;&gt;Client Site Typal&lt;/option&gt;
		  &lt;option value=&quot;referee&quot;&gt;Referee Site Typal&lt;/option&gt;
		  &lt;option value=&quot;unknown&quot;&gt;Unknown Site Typal&lt;/option&gt;
	&lt;/select&gt;&lt;br/&gt;
	Site Name (required):
	&lt;input type=&quot;textbox&quot; name=&quot;name&quot; id=&quot;name&quot; maxlen=&quot;200&quot; size=&quot;42&quot; /&gt;&lt;br/&gt;
	Site Domain (required):
	&lt;input type=&quot;textbox&quot; name=&quot;domain&quot; id=&quot;domain&quot; maxlen=&quot;200&quot; size=&quot;42&quot; /&gt;&lt;br/&gt;
	Site Admin Name (required):
	&lt;input type=&quot;textbox&quot; name=&quot;admin-email&quot; id=&quot;admin-email&quot; maxlen=&quot;200&quot; size=&quot;42&quot; /&gt;&lt;br/&gt;
	Site Admin Name (required):
	&lt;input type=&quot;textbox&quot; name=&quot;admin-name&quot; id=&quot;admin-name&quot; maxlen=&quot;200&quot; size=&quot;42&quot; /&gt;&lt;br/&gt;
	Site Support URI (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;support-uri&quot; id=&quot;support-uri&quot; maxlen=&quot;200&quot; size=&quot;42&quot; /&gt;&lt;br/&gt;
	Site Support Email (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;support-email&quot; id=&quot;support-email&quot; maxlen=&quot;200&quot; size=&quot;42&quot; /&gt;&lt;br/&gt;
	Site Support Phone (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;support-phone&quot; id=&quot;support-phone&quot; maxlen=&quot;200&quot; size=&quot;42&quot; /&gt;&lt;br/&gt;
	Nodes/Tags:
    &lt;input type=&quot;textbox&quot; name=&quot;nodes&quot; id=&quot;nodes&quot; maxlen=&quot;250&quot; size=&quot;35&quot; /&gt;&amp;nbsp;&lt;strong&gt;(Seperated &lt;em&gt;[,] or [;]&lt;/em&gt;)&lt;/strong&gt;&lt;br/&gt;
	&lt;input type=&quot;hidden&quot; name=&quot;return&quot; value=&quot;<?php echo $source; ?>?key=%key%&quot;&gt;
	&lt;input type=&quot;submit&quot; value=&quot;New Site Under User Session&quot; name=&quot;submit&quot;&gt;
&lt;/form&gt;
	</pre>
	</blockquote>
	<h3>Create New Download Binary Client</h3>
    <blockquote>
        <font color="#009900">You need too submit a form to the following URL for using the API Content Additions adding a client is for site based resources!</font><br/><br/>
        <em>Form action path: <strong><?php echo $source; ?>v1/client/<?php echo $userkey ;?>/create.api</strong></em>
        <form name="binary-client-creation" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/client/<?php echo $userkey ;?>/create.api">
        	Return Action:
		    <select name="format" id="format">
		    	<option value="return">Return to URL</option>
		    	<option value="json">Output JSON String</option>
		    	<option value="serial">Output PHP Serialized</option>
		    	<option value="xml">Output eXtendable Markup</option>
		    </select><br/>
		    Client Site Key (required):
			<select name="site-key" id="site-key">
		    	<?php echo binariesSiteKeys($userkey, 'option', '		    	'); ?>
		    </select><br/>
		    Client Access IP (not required):
			<input type="textbox" name="access-ip" id="access-ip" maxlen="23" size="15" />&nbsp;Current IP: <em><?php echo whitelistGetIP(true); ?></em><br/>
			Client User's Full Name (not required):
			<input type="textbox" name="name" id="name" maxlen="198" size="35" />	<br/>
		    Client User's Email Address (not required):
			<input type="textbox" name="email" id="email" maxlen="198" size="35" />	<br/>
		    Client Password for editing style's profile (not required):
			<input type="password" name="password" id="password" size="35" />&nbsp;&nbsp;<em>(md5 check-sum: passes thru</em>!)<br/>
			Client Confirm Password for editing (not required):
			<input type="password" name="confirm" id="confirm" size="35" />&nbsp;&nbsp;<em>(md5 check-sum: passes thru</em>!)<br/>
			Nodes/Tags:
    		<input type="textbox" name="nodes" id="nodes" maxlen="250" size="35" />&nbsp;<strong>(Seperated <em>[,] or [;]</em>)</strong><br/>
			<input type="hidden" name="return" value="<?php echo $source; ?>?userkey=%key%">
			<input type="submit" value="Create Binary Client Key" name="submit">
		</form>
		<h3>Code Example:</h3>
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;form name=&quot;binary-client-creation&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot; action=&quot;?> echo $source; ?>v1/client/?> echo $userkey ;?>/create.api&quot;&gt;
    Return Action:
	&lt;select name=&quot;format&quot; id=&quot;format&quot;&gt;
		 &lt;option value=&quot;return&quot;&gt;Return to URL&lt;/option&gt;
		 &lt;option value=&quot;json&quot;&gt;Output JSON String&lt;/option&gt;
		 &lt;option value=&quot;serial&quot;&gt;Output PHP Serialized&lt;/option&gt;
		 &lt;option value=&quot;xml&quot;&gt;Output eXtendable Markup&lt;/option&gt;
	&lt;/select&gt;&lt;br/&gt;
	Client Site Key (required):
	&lt;select name=&quot;site-key&quot; id=&quot;site-key&quot;&gt;
<?php echo binariesHTMLExample(binariesSiteKeys($userkey, 'option', '		 ')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Client Access IP (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;access-ip&quot; id=&quot;access-ip&quot; maxlen=&quot;23&quot; size=&quot;15&quot; /&gt;&amp;nbsp;Current IP: &lt;em&gt;?> echo whitelistGetIP(true); ?>&lt;/em&gt;&lt;br/&gt;
	Client User's Full Name (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;name&quot; id=&quot;name&quot; maxlen=&quot;198&quot; size=&quot;35&quot; /&gt;	&lt;br/&gt;
	Client User's Email Address (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;email&quot; id=&quot;email&quot; maxlen=&quot;198&quot; size=&quot;35&quot; /&gt;	&lt;br/&gt;
	Client Password for editing style's profile (not required):
	&lt;input type=&quot;password&quot; name=&quot;password&quot; id=&quot;password&quot; size=&quot;35&quot; /&gt;&amp;nbsp;&amp;nbsp;&lt;em&gt;(md5 check-sum: passes thru&lt;/em&gt;!)&lt;br/&gt;
	Client Confirm Password for editing (not required):
	&lt;input type=&quot;password&quot; name=&quot;confirm&quot; id=&quot;confirm&quot; size=&quot;35&quot; /&gt;&amp;nbsp;&amp;nbsp;&lt;em&gt;(md5 check-sum: passes thru&lt;/em&gt;!)&lt;br/&gt;
	Nodes/Tags:
    &lt;input type=&quot;textbox&quot; name=&quot;nodes&quot; id=&quot;nodes&quot; maxlen=&quot;250&quot; size=&quot;35&quot; /&gt;&amp;nbsp;&lt;strong&gt;(Seperated &lt;em&gt;[,] or [;]&lt;/em&gt;)&lt;/strong&gt;&lt;br/&gt;
	&lt;input type=&quot;hidden&quot; name=&quot;return&quot; value=&quot;?> echo $source; ?>?userkey=%key%&quot;&gt;
	&lt;input type=&quot;submit&quot; value=&quot;Create Binary Client Key&quot; name=&quot;submit&quot;&gt;
&lt;/form&gt;
	</pre>
	</blockquote>
	<h3>Create API Call Back</h3>
    <blockquote>
        <font color="#009900">You need too submit a form to the following URL for using the API Content Additions adding a call back for user, site & binary keys!</font><br/><br/>
        <em>Form action path: <strong><?php echo $source; ?>v1/callback/<?php echo $userkey ;?>/create.api</strong></em>
        <form name="callback-creation" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/callback/<?php echo $userkey ;?>/create.api">
        	Return Action:
		    <select name="format" id="format">
		    	<option value="return">Return to URL</option>
		    	<option value="json">Output JSON String</option>
		    	<option value="serial">Output PHP Serialized</option>
		    	<option value="xml">Output eXtendable Markup</option>
		    </select><br/>
        	Return Action:
		    <select name="type" id="type">
		    	<option value="notify">Notification API Callback</option>
		    	<option value="polled">Binary Poll API Callback</option>
		    	<option value="maximum">Maximum Hits Reached API Callback</option>
		    	<option value="expired">Download link expired API Callback</option>
		    	<option value="hit">Binary Replaced API Callback</option>
		    	<option value="replaced">Binary Replaced API Callback</option>
		    	<option value="moved">Binary Moved API Callback</option>
		    	<option value="protection">Protection Passed API Callback</option>
		    	<option value="referee">Referee API Callback</option>
		    	<option value="referees">Referees API Callback</option>
		    	<option value="statistics">Statistics API Callback</option>
		    	<option value="unknown">Unknown API Callback</option>		    		    	
		    </select><br/>
		    Site Key (required):
			<select name="site-key" id="site-key">
		    	<?php echo binariesSiteKeys($userkey, 'option', '		    	'); ?>
		    </select><br/>
		    Binary Download Key (not required):
			<select name="bin-key" id="bin-key">
		    	<?php echo binariesBinariesKeys($userkey, 'option', '		    	'); ?>
		    </select><br/>
        	Protocol:
		    <select name="protocol" id="protocol">
		    	<option value="http">http://</option>
		    	<option value="https">https://</option>
		    </select><br/>
		    Domain (required):
			<input type="textbox" name="domain" id="domain" maxlen="200" size="42" />&nbsp;<em>(See the list of <strong>%variables%</strong> that can be included with this!)</em><br/>
			URI Path (not required):
			<input type="textbox" name="path" id="path" maxlen="200" size="42" />&nbsp;<em>(See the list of <strong>%variables%</strong> that can be included with this!)</em><br/>
		    URI Query String (not required):
			<input type="textbox" name="query-string" id="query-string" maxlen="200" size="42" />&nbsp;<em>(See the list of <strong>%variables%</strong> that can be included with this!)</em><br/>
			Nodes/Tags:
    		<input type="textbox" name="nodes" id="nodes" maxlen="250" size="35" />&nbsp;<strong>(Seperated <em>[,] or [;]</em>)</strong><br/>
			<input type="hidden" name="return" value="<?php echo $source; ?>?key=%key%">
			<input type="submit" value="Create API Call-back Notification" name="submit">
		</form>
		<h3>Code Example:</h3>
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;form name=&quot;callback-creation&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot; action=&quot;<?php echo $source; ?>v1/callback/<?php echo $userkey ;?>/create.api&quot;&gt;
    Return Action:
	&lt;select name=&quot;format&quot; id=&quot;format&quot;&gt;
		&lt;option value=&quot;return&quot;&gt;Return to URL&lt;/option&gt;
		&lt;option value=&quot;json&quot;&gt;Output JSON String&lt;/option&gt;
		&lt;option value=&quot;serial&quot;&gt;Output PHP Serialized&lt;/option&gt;
		&lt;option value=&quot;xml&quot;&gt;Output eXtendable Markup&lt;/option&gt;
	&lt;/select&gt;&lt;br/&gt;
    Call-back Type:
	&lt;select name=&quot;type&quot; id=&quot;type&quot;&gt;
		 &lt;option value=&quot;notify&quot;&gt;Notification API Callback&lt;/option&gt;
		 &lt;option value=&quot;polled&quot;&gt;Binary Poll API Callback&lt;/option&gt;
		 &lt;option value=&quot;maximum&quot;&gt;Maximum Hits Reached API Callback&lt;/option&gt;
		 &lt;option value=&quot;expired&quot;&gt;Download link expired API Callback&lt;/option&gt;
		 &lt;option value=&quot;hit&quot;&gt;Binary Replaced API Callback&lt;/option&gt;
		 &lt;option value=&quot;replaced&quot;&gt;Binary Replaced API Callback&lt;/option&gt;
		 &lt;option value=&quot;moved&quot;&gt;Binary Moved API Callback&lt;/option&gt;
		 &lt;option value=&quot;protection&quot;&gt;Protection Passed API Callback&lt;/option&gt;
		 &lt;option value=&quot;referee&quot;&gt;Referee API Callback&lt;/option&gt;
		 &lt;option value=&quot;referees&quot;&gt;Referees API Callback&lt;/option&gt;
		 &lt;option value=&quot;statistics&quot;&gt;Statistics API Callback&lt;/option&gt;
		 &lt;option value=&quot;unknown&quot;&gt;Unknown API Callback&lt;/option&gt;		    		    	
	&lt;/select&gt;&lt;br/&gt;
	Site Key (required):
	&lt;select name=&quot;site-key&quot; id=&quot;site-key&quot;&gt;
<?php echo binariesHTMLExample(binariesSiteKeys($userkey, 'option', '		 ')); ?>
	&lt;/select&gt;&lt;br/&gt;
	Binary Download Key (not required):
	&lt;select name=&quot;site-key&quot; id=&quot;site-key&quot;&gt;
<?php echo binariesHTMLExample(binariesBinariesKeys($userkey, 'option', '		 ')); ?>
	&lt;/select&gt;&lt;br/&gt;
    Protocol:
	&lt;select name=&quot;protocol&quot; id=&quot;protocol&quot;&gt;
		 &lt;option value=&quot;http&quot;&gt;http://&lt;/option&gt;
		 &lt;option value=&quot;https&quot;&gt;https://&lt;/option&gt;
	&lt;/select&gt;&lt;br/&gt;
	URI Domain (required):
	&lt;input type=&quot;textbox&quot; name=&quot;domain&quot; id=&quot;domain&quot; maxlen=&quot;200&quot; size=&quot;42&quot; /&gt;&amp;nbsp;&lt;em&gt;(See the list of &lt;strong&gt;%variables%&lt;/strong&gt; that can be included with this!)&lt;/em&gt;&lt;br/&gt;
	URI Path (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;path&quot; id=&quot;path&quot; maxlen=&quot;200&quot; size=&quot;42&quot; /&gt;&amp;nbsp;&lt;em&gt;(See the list of &lt;strong&gt;%variables%&lt;/strong&gt; that can be included with this!)&lt;/em&gt;&lt;br/&gt;
	URI Query String (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;query-string&quot; id=&quot;query-string&quot; maxlen=&quot;200&quot; size=&quot;42&quot; /&gt;&amp;nbsp;&lt;em&gt;(See the list of &lt;strong&gt;%variables%&lt;/strong&gt; that can be included with this!)&lt;/em&gt;&lt;br/&gt;
	Nodes/Tags:
    &lt;input type=&quot;textbox&quot; name=&quot;nodes&quot; id=&quot;nodes&quot; maxlen=&quot;250&quot; size=&quot;35&quot; /&gt;&amp;nbsp;&lt;strong&gt;(Seperated &lt;em&gt;[,] or [;]&lt;/em&gt;)&lt;/strong&gt;&lt;br/&gt;
	&lt;input type=&quot;hidden&quot; name=&quot;return&quot; value=&quot;<?php echo $source; ?>?key=%key%&quot;&gt;
	&lt;input type=&quot;submit&quot; value=&quot;Create API Call-back Notification&quot; name=&quot;submit&quot;&gt;
&lt;/form&gt;
	</pre>
	</blockquote>
	<h3>Create New Download Site Referee</h3>
    <blockquote>
        <font color="#009900">You need too submit a form to the following URL for using the API Content Additions adding a referee to another site for permission's based on <em>REFEREE_URI</em>!</font><br/><br/>
        <em>Form action path: <strong><?php echo $source; ?>v1/referee/<?php echo $userkey ;?>/create.api</strong></em>
        <form name="referee-creation" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/referee/<?php echo $userkey ;?>/create.api">
        	Return Action:
		    <select name="format" id="format">
		    	<option value="return">Return to URL</option>
		    	<option value="json">Output JSON String</option>
		    	<option value="serial">Output PHP Serialized</option>
		    	<option value="xml">Output eXtendable Markup</option>
		    </select><br/>
		    Referee URI Site (required):
			<select name="site-key" id="site-key">
		    	<?php echo binariesSiteKeys($userkey, 'option', '		    	'); ?>
		    </select><br/>
		    Referee URI (required):
			<input type="textbox" name="request-uri" id="request-uri" maxlen="300" size="25" /><br/>
			Call Back (not required):
		    <select name="callback" id="callback">
		    	<option value="yes">Yes Call-back</option>
		    	<option value="no">No Call-back</option>
		    </select><br/>
		    Referee Call Back (not required):
			<select name="callback-referee-key" id="callback-referee-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"referee"'); ?>
		    </select><br/>
			Nodes/Tags:
    		<input type="textbox" name="nodes" id="nodes" maxlen="250" size="35" />&nbsp;<strong>(Seperated <em>[,] or [;]</em>)</strong><br/>
			<input type="hidden" name="return" value="<?php echo $source; ?>?userkey=%key%">
			<input type="submit" value="Create URI Site Referee Key" name="submit">
		</form>
		<h3>Code Example:</h3>
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;form name=&quot;referee-creation&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot; action=&quot;<?php echo $source; ?>v1/referee/<?php echo $userkey ;?>/create.api&quot;&gt;
    Return Action:
	&lt;select name=&quot;format&quot; id=&quot;format&quot;&gt;
		 &lt;option value=&quot;return&quot;&gt;Return to URL&lt;/option&gt;
		 &lt;option value=&quot;json&quot;&gt;Output JSON String&lt;/option&gt;
		 &lt;option value=&quot;serial&quot;&gt;Output PHP Serialized&lt;/option&gt;
		 &lt;option value=&quot;xml&quot;&gt;Output eXtendable Markup&lt;/option&gt;
	&lt;/select&gt;&lt;br/&gt;
	Referee URI Site (required):
	&lt;select name=&quot;site-key&quot; id=&quot;site-key&quot;&gt;
<?php echo binariesHTMLExample(binariesSiteKeys($userkey, 'option', '		    	')); ?>
	&lt;/select&gt;&lt;br/&gt;
	Referee URI (required):
	&lt;input type=&quot;textbox&quot; name=&quot;request-uri&quot; id=&quot;request-uri&quot; maxlen=&quot;300&quot; size=&quot;25&quot; /&gt;&lt;br/&gt;
	Call Back (not required):
	&lt;select name=&quot;callback&quot; id=&quot;callback&quot;&gt;
		  &lt;option value=&quot;yes&quot;&gt;Yes Call-back&lt;/option&gt;
		  &lt;option value=&quot;no&quot;&gt;No Call-back&lt;/option&gt;
	&lt;/select&gt;&lt;br/&gt;
	Referee Call Back (not required):
	&lt;select name=&quot;callback-referee-key&quot; id=&quot;callback-referee-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '		    	', '&quot;referee&quot;')); ?>
	&lt;/select&gt;&lt;br/&gt;
	Nodes/Tags:
    &lt;input type=&quot;textbox&quot; name=&quot;nodes&quot; id=&quot;nodes&quot; maxlen=&quot;250&quot; size=&quot;35&quot; /&gt;&amp;nbsp;&lt;strong&gt;(Seperated &lt;em&gt;[,] or [;]&lt;/em&gt;)&lt;/strong&gt;&lt;br/&gt;
	&lt;input type=&quot;hidden&quot; name=&quot;return&quot; value=&quot;<?php echo $source; ?>?userkey=%key%&quot;&gt;
	&lt;input type=&quot;submit&quot; value=&quot;Create URI Site Referee Key&quot; name=&quot;submit&quot;&gt;
&lt;/form&gt;
	</pre>
	</blockquote>
	<h3>Create New Domain Protected Download</h3>
    <blockquote>
        <font color="#009900">You need too submit a form to the following URL for using the API Content Additions adding a domain on <em>REFEREE_URI</em> protection to a download!</font><br/><br/>
        <em>Form action path: <strong><?php echo $source; ?>v1/protection/domain/<?php echo $userkey ;?>/create.api</strong></em>
        <form name="protection-domain-creation" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/protection/domain/<?php echo $userkey ;?>/create.api">
        	Return Action:
		    <select name="format" id="format">
		    	<option value="return">Return to URL</option>
		    	<option value="json">Output JSON String</option>
		    	<option value="serial">Output PHP Serialized</option>
		    	<option value="xml">Output eXtendable Markup</option>
		    </select><br/>
		    Site Key (required):
			<select name="site-key" id="site-key">
		    	<?php echo binariesSiteKeys($userkey, 'option', '		    	'); ?>
		    </select><br/>
		    Binary Download Key (required):
			<select name="bin-key" id="bin-key">
		    	<?php echo binariesBinariesKeys($userkey, 'option', '		    	'); ?>
		    </select><br/>
		    Referee Domain (required):
			<input type="textbox" name="domain" id="domain" maxlen="300" size="25" /><br/>
			Download Valid Till:
		    <select name="expire" id="expire">
		    	<option value="0">No Expiry</option>
		    	<option value="<?php echo time() + 86400; ?>">Expire in 24 Hours</option>
		    	<option value="<?php echo time() + 43200; ?>">Expire in 12 Hours</option>
		    	<option value="<?php echo time() + 21600; ?>">Expire in 6 Hours</option>
		    	<option value="<?php echo time() + 10800; ?>">Expire in 3 Hours</option>
		    	<option value="<?php echo time() + 3600; ?>">Expire in 60 Minutes</option>
		    	<option value="<?php echo time() + 1800; ?>">Expire in 30 Minutes</option>
		    	<option value="<?php echo time() + 399; ?>">Expire in 399 Seconds</option>
		    </select>&nbsp;<em>("0" Means no expiry of download!)</em><br/>
		    Maximum Downloads (not required):
			<input type="textbox" name="maximum" id="maximum" value="0" maxlen="250" size="35" />&nbsp;<em>("0" Means no maximum download!)</em><br/>
			Notify Call Back (not required):
			<select name="callback-notify-key" id="callback-notify-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"notify"'); ?>
		    </select><br/>
		    Polled Call Back (not required):
			<select name="callback-polled-key" id="callback-polled-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"polled"'); ?>
		    </select><br/>
		    Maximum Call Back (not required):
			<select name="callback-maximum-key" id="callback-maximum-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"maximum"'); ?>
		    </select><br/>
		    Expired Call Back (not required):
			<select name="callback-expiry-key" id="callback-expiry-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"expiry"'); ?>
		    </select><br/>
			<input type="hidden" name="return" value="<?php echo $source; ?>?userkey=%key%">
			<input type="submit" value="Create Binary Download Protection" name="submit">
		</form>
		<h3>Code Example:</h3>
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;form name=&quot;protection-domain-creation&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot; action=&quot;<?php echo $source; ?>v1/protection/domain/<?php echo $userkey ;?>/create.api&quot;&gt;
    Return Action:
	&lt;select name=&quot;format&quot; id=&quot;format&quot;&gt;
		 &lt;option value=&quot;return&quot;&gt;Return to URL&lt;/option&gt;
		 &lt;option value=&quot;json&quot;&gt;Output JSON String&lt;/option&gt;
		 &lt;option value=&quot;serial&quot;&gt;Output PHP Serialized&lt;/option&gt;
		 &lt;option value=&quot;xml&quot;&gt;Output eXtendable Markup&lt;/option&gt;
	&lt;/select&gt;&lt;br/&gt;
	Site Key (required):
	&lt;select name=&quot;site-key&quot; id=&quot;site-key&quot;&gt;
<?php echo binariesHTMLExample(binariesSiteKeys($userkey, 'option', '    	')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Binary Download Key (required):
	&lt;select name=&quot;bin-key&quot; id=&quot;bin-key&quot;&gt;
<?php echo binariesHTMLExample(binariesBinariesKeys($userkey, 'option', '    	')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Referee Domain (required):
	&lt;input type=&quot;textbox&quot; name=&quot;domain&quot; id=&quot;domain&quot; maxlen=&quot;300&quot; size=&quot;25&quot; /&gt;&lt;br/&gt;
	Download Valid Till:
    &lt;select name=&quot;expire&quot; id=&quot;expire&quot;&gt;
    	&lt;option value=&quot;0&quot;&gt;No Expiry&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 86400; ?>&quot;&gt;Expire in 24 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 43200; ?>&quot;&gt;Expire in 12 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 21600; ?>&quot;&gt;Expire in 6 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 10800; ?>&quot;&gt;Expire in 3 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 3600; ?>&quot;&gt;Expire in 60 Minutes&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 1800; ?>&quot;&gt;Expire in 30 Minutes&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 399; ?>&quot;&gt;Expire in 399 Seconds&lt;/option&gt;
    &lt;/select&gt;&lt;br/&gt;&amp;nbsp;&lt;em&gt;(&quot;0&quot; Means no expiry of download!)&lt;/em&gt;
    Maximum Downloads (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;maximum&quot; id=&quot;maximum&quot; value=&quot;0&quot; maxlen=&quot;250&quot; size=&quot;35&quot; /&gt;&amp;nbsp;&lt;em&gt;(&quot;0&quot; Means no maximum download!)&lt;/em&gt;&lt;br/&gt;
	Notify Call Back (not required):
	&lt;select name=&quot;callback-notify-key&quot; id=&quot;callback-notify-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;notify&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Polled Call Back (not required):
	&lt;select name=&quot;callback-polled-key&quot; id=&quot;callback-polled-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;polled&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Maximum Call Back (not required):
	&lt;select name=&quot;callback-maximum-key&quot; id=&quot;callback-maximum-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;maximum&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Expired Call Back (not required):
	&lt;select name=&quot;callback-expiry-key&quot; id=&quot;callback-expiry-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;expiry&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
	&lt;input type=&quot;hidden&quot; name=&quot;return&quot; value=&quot;<?php echo $source; ?>?userkey=%key%&quot;&gt;
	&lt;input type=&quot;submit&quot; value=&quot;Create Binary Download Protection&quot; name=&quot;submit&quot;&gt;
&lt;/form&gt;
	</pre>
	</blockquote>
	<h3>Create New Internet IP Protected Download</h3>
    <blockquote>
        <font color="#009900">You need too submit a form to the following URL for using the API Content Additions adding a domain on <em>REFEREE_URI</em> protection to a download!</font><br/><br/>
        <em>Form action path: <strong><?php echo $source; ?>v1/protection/network/<?php echo $userkey ;?>/create.api</strong></em>
        <form name="protection-network-creation" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/protection/network/<?php echo $userkey ;?>/create.api">
        	Return Action:
		    <select name="format" id="format">
		    	<option value="return">Return to URL</option>
		    	<option value="json">Output JSON String</option>
		    	<option value="serial">Output PHP Serialized</option>
		    	<option value="xml">Output eXtendable Markup</option>
		    </select><br/>
		    Site Key (required):
			<select name="site-key" id="site-key">
		    	<?php echo binariesSiteKeys($userkey, 'option', '		    	'); ?>
		    </select><br/>
		    Binary Download Key (required):
			<select name="bin-key" id="bin-key">
		    	<?php echo binariesBinariesKeys($userkey, 'option', '		    	'); ?>
		    </select><br/>
		    Binary Download IP (required):
			<input type="textbox" name="access-ip" id="access-ip" maxlen="23" size="15" />&nbsp;Current IP: <em><?php echo whitelistGetIP(true); ?></em><br/>
			Download Valid Till:
		    <select name="expire" id="expire">
		    	<option value="0">No Expiry</option>
		    	<option value="<?php echo time() + 86400; ?>">Expire in 24 Hours</option>
		    	<option value="<?php echo time() + 43200; ?>">Expire in 12 Hours</option>
		    	<option value="<?php echo time() + 21600; ?>">Expire in 6 Hours</option>
		    	<option value="<?php echo time() + 10800; ?>">Expire in 3 Hours</option>
		    	<option value="<?php echo time() + 3600; ?>">Expire in 60 Minutes</option>
		    	<option value="<?php echo time() + 1800; ?>">Expire in 30 Minutes</option>
		    	<option value="<?php echo time() + 399; ?>">Expire in 399 Seconds</option>
		    </select>&nbsp;<em>("0" Means no expiry of download!)</em><br/>
		    Maximum Downloads (not required):
			<input type="textbox" name="maximum" id="maximum" value="0" maxlen="250" size="35" />&nbsp;<em>("0" Means no maximum download!)</em><br/>
			Notify Call Back (not required):
			<select name="callback-notify-key" id="callback-notify-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"notify"'); ?>
		    </select><br/>
		    Polled Call Back (not required):
			<select name="callback-polled-key" id="callback-polled-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"polled"'); ?>
		    </select><br/>
		    Maximum Call Back (not required):
			<select name="callback-maximum-key" id="callback-maximum-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"maximum"'); ?>
		    </select><br/>
		    Expired Call Back (not required):
			<select name="callback-expiry-key" id="callback-expiry-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"expiry"'); ?>
		    </select><br/>
			<input type="hidden" name="return" value="<?php echo $source; ?>?userkey=%key%">
			<input type="submit" value="Create Binary Download Protection" name="submit">
		</form>
		<h3>Code Example:</h3>
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;form name=&quot;protection-network-creation&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot; action=&quot;<?php echo $source; ?>v1/protection/network/<?php echo $userkey ;?>/create.api&quot;&gt;
    Return Action:
	&lt;select name=&quot;format&quot; id=&quot;format&quot;&gt;
		 &lt;option value=&quot;return&quot;&gt;Return to URL&lt;/option&gt;
		 &lt;option value=&quot;json&quot;&gt;Output JSON String&lt;/option&gt;
		 &lt;option value=&quot;serial&quot;&gt;Output PHP Serialized&lt;/option&gt;
		 &lt;option value=&quot;xml&quot;&gt;Output eXtendable Markup&lt;/option&gt;
	&lt;/select&gt;&lt;br/&gt;
	Site Key (required):
	&lt;select name=&quot;site-key&quot; id=&quot;site-key&quot;&gt;
<?php echo binariesHTMLExample(binariesSiteKeys($userkey, 'option', '    	')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Binary Download Key (required):
	&lt;select name=&quot;bin-key&quot; id=&quot;bin-key&quot;&gt;
<?php echo binariesHTMLExample(binariesBinariesKeys($userkey, 'option', '    	')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Binary Download IP (required):
	&lt;input type=&quot;textbox&quot; name=&quot;access-ip&quot; id=&quot;access-ip&quot; maxlen=&quot;23&quot; size=&quot;15&quot; /&gt;&amp;nbsp;Current IP: &lt;em&gt;?> echo whitelistGetIP(true); ?>&lt;/em&gt;&lt;br/&gt;
	Download Valid Till:
    &lt;select name=&quot;expire&quot; id=&quot;expire&quot;&gt;
    	&lt;option value=&quot;0&quot;&gt;No Expiry&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 86400; ?>&quot;&gt;Expire in 24 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 43200; ?>&quot;&gt;Expire in 12 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 21600; ?>&quot;&gt;Expire in 6 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 10800; ?>&quot;&gt;Expire in 3 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 3600; ?>&quot;&gt;Expire in 60 Minutes&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 1800; ?>&quot;&gt;Expire in 30 Minutes&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 399; ?>&quot;&gt;Expire in 399 Seconds&lt;/option&gt;
    &lt;/select&gt;&lt;br/&gt;&amp;nbsp;&lt;em&gt;(&quot;0&quot; Means no expiry of download!)&lt;/em&gt;
    Maximum Downloads (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;maximum&quot; id=&quot;maximum&quot; value=&quot;0&quot; maxlen=&quot;250&quot; size=&quot;35&quot; /&gt;&amp;nbsp;&lt;em&gt;(&quot;0&quot; Means no maximum download!)&lt;/em&gt;&lt;br/&gt;
	Notify Call Back (not required):
	&lt;select name=&quot;callback-notify-key&quot; id=&quot;callback-notify-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;notify&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Polled Call Back (not required):
	&lt;select name=&quot;callback-polled-key&quot; id=&quot;callback-polled-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;polled&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Maximum Call Back (not required):
	&lt;select name=&quot;callback-maximum-key&quot; id=&quot;callback-maximum-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;maximum&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Expired Call Back (not required):
	&lt;select name=&quot;callback-expiry-key&quot; id=&quot;callback-expiry-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;expiry&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
	&lt;input type=&quot;hidden&quot; name=&quot;return&quot; value=&quot;<?php echo $source; ?>?userkey=%key%&quot;&gt;
	&lt;input type=&quot;submit&quot; value=&quot;Create Binary Download Protection&quot; name=&quot;submit&quot;&gt;
&lt;/form&gt;
	</pre>
	</blockquote>
	<h3>Create New Client Protected Download</h3>
    <blockquote>
        <font color="#009900">You need too submit a form to the following URL for using the API Content Additions adding a client protection to a download!</font><br/><br/>
        <em>Form action path: <strong><?php echo $source; ?>v1/protection/client/<?php echo $userkey ;?>/create.api</strong></em>
        <form name="protection-client-creation" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/protection/client/<?php echo $userkey ;?>/create.api">
        	Return Action:
		    <select name="format" id="format">
		    	<option value="return">Return to URL</option>
		    	<option value="json">Output JSON String</option>
		    	<option value="serial">Output PHP Serialized</option>
		    	<option value="xml">Output eXtendable Markup</option>
		    </select><br/>
		    Site Key (required):
			<select name="site-key" id="site-key">
		    	<?php echo binariesSiteKeys($userkey, 'option', '		    	'); ?>
		    </select><br/>
		    Binary Download Key (required):
			<select name="bin-key" id="bin-key">
		    	<?php echo binariesBinariesKeys($userkey, 'option', '		    	'); ?>
		    </select><br/>
		    Client Access IP (not required):
			<input type="textbox" name="access-ip" id="access-ip" maxlen="23" size="15" />&nbsp;Current IP: <em><?php echo whitelistGetIP(true); ?></em><br/>
			Client User's Full Name (not required):
			<input type="textbox" name="name" id="name" maxlen="198" size="35" />	<br/>
		    Client User's Email Address (not required):
			<input type="textbox" name="email" id="email" maxlen="198" size="35" />	<br/>
		    Client Password for editing style's profile (not required):
			<input type="password" name="password" id="password" size="35" />&nbsp;&nbsp;<em>(md5 check-sum: passes thru</em>!)<br/>
			Client Confirm Password for editing (not required):
			<input type="password" name="confirm" id="confirm" size="35" />&nbsp;&nbsp;<em>(md5 check-sum: passes thru</em>!)<br/>
			Download Valid Till:
		    <select name="expire" id="expire">
		    	<option value="0">No Expiry</option>
		    	<option value="<?php echo time() + 86400; ?>">Expire in 24 Hours</option>
		    	<option value="<?php echo time() + 43200; ?>">Expire in 12 Hours</option>
		    	<option value="<?php echo time() + 21600; ?>">Expire in 6 Hours</option>
		    	<option value="<?php echo time() + 10800; ?>">Expire in 3 Hours</option>
		    	<option value="<?php echo time() + 3600; ?>">Expire in 60 Minutes</option>
		    	<option value="<?php echo time() + 1800; ?>">Expire in 30 Minutes</option>
		    	<option value="<?php echo time() + 399; ?>">Expire in 399 Seconds</option>
		    </select>&nbsp;<em>("0" Means no expiry of download!)</em><br/>
		    Maximum Downloads (not required):
			<input type="textbox" name="maximum" id="maximum" value="0" maxlen="250" size="35" />&nbsp;<em>("0" Means no maximum download!)</em><br/>
			Notify Call Back (not required):
			<select name="callback-notify-key" id="callback-notify-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"notify"'); ?>
		    </select><br/>
		    Polled Call Back (not required):
			<select name="callback-polled-key" id="callback-polled-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"polled"'); ?>
		    </select><br/>
		    Maximum Call Back (not required):
			<select name="callback-maximum-key" id="callback-maximum-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"maximum"'); ?>
		    </select><br/>
		    Expired Call Back (not required):
			<select name="callback-expiry-key" id="callback-expiry-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"expiry"'); ?>
		    </select><br/>
			<input type="hidden" name="return" value="<?php echo $source; ?>?userkey=%key%">
			<input type="submit" value="Create Binary Download Protection" name="submit">
		</form>
		<h3>Code Example:</h3>
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;form name=&quot;protection-client-creation&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot; action=&quot;<?php echo $source; ?>v1/protection/client/<?php echo $userkey ;?>/create.api&quot;&gt;
    Return Action:
	&lt;select name=&quot;format&quot; id=&quot;format&quot;&gt;
		 &lt;option value=&quot;return&quot;&gt;Return to URL&lt;/option&gt;
		 &lt;option value=&quot;json&quot;&gt;Output JSON String&lt;/option&gt;
		 &lt;option value=&quot;serial&quot;&gt;Output PHP Serialized&lt;/option&gt;
		 &lt;option value=&quot;xml&quot;&gt;Output eXtendable Markup&lt;/option&gt;
	&lt;/select&gt;&lt;br/&gt;
	Site Key (required):
	&lt;select name=&quot;site-key&quot; id=&quot;site-key&quot;&gt;
<?php echo binariesHTMLExample(binariesSiteKeys($userkey, 'option', '    	')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Binary Download Key (required):
	&lt;select name=&quot;bin-key&quot; id=&quot;bin-key&quot;&gt;
<?php echo binariesHTMLExample(binariesBinariesKeys($userkey, 'option', '    	')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Client Access IP (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;access-ip&quot; id=&quot;access-ip&quot; maxlen=&quot;23&quot; size=&quot;15&quot; /&gt;&amp;nbsp;Current IP: &lt;em&gt;?> echo whitelistGetIP(true); ?>&lt;/em&gt;&lt;br/&gt;
	Client User's Full Name (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;name&quot; id=&quot;name&quot; maxlen=&quot;198&quot; size=&quot;35&quot; /&gt;	&lt;br/&gt;
	Client User's Email Address (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;email&quot; id=&quot;email&quot; maxlen=&quot;198&quot; size=&quot;35&quot; /&gt;	&lt;br/&gt;
	Client Password for editing style's profile (not required):
	&lt;input type=&quot;password&quot; name=&quot;password&quot; id=&quot;password&quot; size=&quot;35&quot; /&gt;&amp;nbsp;&amp;nbsp;&lt;em&gt;(md5 check-sum: passes thru&lt;/em&gt;!)&lt;br/&gt;
	Client Confirm Password for editing (not required):
	&lt;input type=&quot;password&quot; name=&quot;confirm&quot; id=&quot;confirm&quot; size=&quot;35&quot; /&gt;&amp;nbsp;&amp;nbsp;&lt;em&gt;(md5 check-sum: passes thru&lt;/em&gt;!)&lt;br/&gt;
	Download Valid Till:
    &lt;select name=&quot;expire&quot; id=&quot;expire&quot;&gt;
    	&lt;option value=&quot;0&quot;&gt;No Expiry&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 86400; ?>&quot;&gt;Expire in 24 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 43200; ?>&quot;&gt;Expire in 12 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 21600; ?>&quot;&gt;Expire in 6 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 10800; ?>&quot;&gt;Expire in 3 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 3600; ?>&quot;&gt;Expire in 60 Minutes&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 1800; ?>&quot;&gt;Expire in 30 Minutes&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 399; ?>&quot;&gt;Expire in 399 Seconds&lt;/option&gt;
    &lt;/select&gt;&lt;br/&gt;&amp;nbsp;&lt;em&gt;(&quot;0&quot; Means no expiry of download!)&lt;/em&gt;
    Maximum Downloads (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;maximum&quot; id=&quot;maximum&quot; value=&quot;0&quot; maxlen=&quot;250&quot; size=&quot;35&quot; /&gt;&amp;nbsp;&lt;em&gt;(&quot;0&quot; Means no maximum download!)&lt;/em&gt;&lt;br/&gt;
	Notify Call Back (not required):
	&lt;select name=&quot;callback-notify-key&quot; id=&quot;callback-notify-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;notify&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Polled Call Back (not required):
	&lt;select name=&quot;callback-polled-key&quot; id=&quot;callback-polled-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;polled&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Maximum Call Back (not required):
	&lt;select name=&quot;callback-maximum-key&quot; id=&quot;callback-maximum-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;maximum&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Expired Call Back (not required):
	&lt;select name=&quot;callback-expiry-key&quot; id=&quot;callback-expiry-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;expiry&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
	&lt;input type=&quot;hidden&quot; name=&quot;return&quot; value=&quot;<?php echo $source; ?>?userkey=%key%&quot;&gt;
	&lt;input type=&quot;submit&quot; value=&quot;Create Binary Download Protection&quot; name=&quot;submit&quot;&gt;
&lt;/form&gt;
	</pre>
	</blockquote>	
	<h3>Create New Referee URI Protection</h3>
    <blockquote>
        <font color="#009900">You need too submit a form to the following URL for using the API Content Additions adding a domain on <em>REFEREE_URI</em> protection to a download!</font><br/><br/>
        <em>Form action path: <strong><?php echo $source; ?>v1/protection/referee/<?php echo $userkey ;?>/create.api</strong></em>
        <form name="protection-referee-creation" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/protection/referee/<?php echo $userkey ;?>/create.api">
        	Return Action:
		    <select name="format" id="format">
		    	<option value="return">Return to URL</option>
		    	<option value="json">Output JSON String</option>
		    	<option value="serial">Output PHP Serialized</option>
		    	<option value="xml">Output eXtendable Markup</option>
		    </select><br/>
		    Site Key (required):
			<select name="site-key" id="site-key">
		    	<?php echo binariesSiteKeys($userkey, 'option', '		    	'); ?>
		    </select><br/>
		    Binary Download Key (required):
			<select name="bin-key" id="bin-key">
		    	<?php echo binariesBinariesKeys($userkey, 'option', '		    	'); ?>
		    </select><br/>
        	Protocol:
		    <select name="protocol" id="protocol">
		    	<option value="http">http://</option>
		    	<option value="https">https://</option>
		    </select><br/>
		    Domain (required):
			<input type="textbox" name="domain" id="domain" maxlen="200" size="42" />&nbsp;<em>(See the list of <strong>%variables%</strong> that can be included with this!)</em><br/>
			URI Path (not required):
			<input type="textbox" name="path" id="path" maxlen="200" size="42" />&nbsp;<em>(See the list of <strong>%variables%</strong> that can be included with this!)</em><br/>
		    URI Query String (not required):
			<input type="textbox" name="query-string" id="query-string" maxlen="200" size="42" />&nbsp;<em>(See the list of <strong>%variables%</strong> that can be included with this!)</em><br/>
		    Download Valid Till:
		    <select name="expire" id="expire">
		    	<option value="0">No Expiry</option>
		    	<option value="<?php echo time() + 86400; ?>">Expire in 24 Hours</option>
		    	<option value="<?php echo time() + 43200; ?>">Expire in 12 Hours</option>
		    	<option value="<?php echo time() + 21600; ?>">Expire in 6 Hours</option>
		    	<option value="<?php echo time() + 10800; ?>">Expire in 3 Hours</option>
		    	<option value="<?php echo time() + 3600; ?>">Expire in 60 Minutes</option>
		    	<option value="<?php echo time() + 1800; ?>">Expire in 30 Minutes</option>
		    	<option value="<?php echo time() + 399; ?>">Expire in 399 Seconds</option>
		    </select>&nbsp;<em>("0" Means no expiry of download!)</em><br/>
		    Maximum Downloads (not required):
			<input type="textbox" name="maximum" id="maximum" value="0" maxlen="250" size="35" />&nbsp;<em>("0" Means no maximum download!)</em><br/>
			Notify Call Back (not required):
			<select name="callback-notify-key" id="callback-notify-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"notify"'); ?>
		    </select><br/>
		    Polled Call Back (not required):
			<select name="callback-polled-key" id="callback-polled-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"polled"'); ?>
		    </select><br/>
		    Maximum Call Back (not required):
			<select name="callback-maximum-key" id="callback-maximum-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"maximum"'); ?>
		    </select><br/>
		    Expired Call Back (not required):
			<select name="callback-expiry-key" id="callback-expiry-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"expiry"'); ?>
		    </select><br/>
			<input type="hidden" name="return" value="<?php echo $source; ?>?userkey=%key%">
			<input type="submit" value="Create Binary Download Protection" name="submit">
		</form>
		<h3>Code Example:</h3>
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;form name=&quot;protection-referee-creation&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot; action=&quot;<?php echo $source; ?>v1/protection/referee/<?php echo $userkey ;?>/create.api&quot;&gt;
    Return Action:
	&lt;select name=&quot;format&quot; id=&quot;format&quot;&gt;
		 &lt;option value=&quot;return&quot;&gt;Return to URL&lt;/option&gt;
		 &lt;option value=&quot;json&quot;&gt;Output JSON String&lt;/option&gt;
		 &lt;option value=&quot;serial&quot;&gt;Output PHP Serialized&lt;/option&gt;
		 &lt;option value=&quot;xml&quot;&gt;Output eXtendable Markup&lt;/option&gt;
	&lt;/select&gt;&lt;br/&gt;
	Site Key (required):
	&lt;select name=&quot;site-key&quot; id=&quot;site-key&quot;&gt;
<?php echo binariesHTMLExample(binariesSiteKeys($userkey, 'option', '    	')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Binary Download Key (required):
	&lt;select name=&quot;bin-key&quot; id=&quot;bin-key&quot;&gt;
<?php echo binariesHTMLExample(binariesBinariesKeys($userkey, 'option', '    	')); ?>
    &lt;/select&gt;&lt;br/&gt;
    &lt;select name=&quot;protocol&quot; id=&quot;protocol&quot;&gt;
		 &lt;option value=&quot;http&quot;&gt;http://&lt;/option&gt;
		 &lt;option value=&quot;https&quot;&gt;https://&lt;/option&gt;
	&lt;/select&gt;&lt;br/&gt;
	URI Domain (required):
	&lt;input type=&quot;textbox&quot; name=&quot;domain&quot; id=&quot;domain&quot; maxlen=&quot;200&quot; size=&quot;42&quot; /&gt;&amp;nbsp;&lt;em&gt;(See the list of &lt;strong&gt;%variables%&lt;/strong&gt; that can be included with this!)&lt;/em&gt;&lt;br/&gt;
	URI Path (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;path&quot; id=&quot;path&quot; maxlen=&quot;200&quot; size=&quot;42&quot; /&gt;&amp;nbsp;&lt;em&gt;(See the list of &lt;strong&gt;%variables%&lt;/strong&gt; that can be included with this!)&lt;/em&gt;&lt;br/&gt;
	URI Query String (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;query-string&quot; id=&quot;query-string&quot; maxlen=&quot;200&quot; size=&quot;42&quot; /&gt;&amp;nbsp;&lt;em&gt;(See the list of &lt;strong&gt;%variables%&lt;/strong&gt; that can be included with this!)&lt;/em&gt;&lt;br/&gt;
    Download Valid Till:
    &lt;select name=&quot;expire&quot; id=&quot;expire&quot;&gt;
    	&lt;option value=&quot;0&quot;&gt;No Expiry&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 86400; ?>&quot;&gt;Expire in 24 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 43200; ?>&quot;&gt;Expire in 12 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 21600; ?>&quot;&gt;Expire in 6 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 10800; ?>&quot;&gt;Expire in 3 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 3600; ?>&quot;&gt;Expire in 60 Minutes&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 1800; ?>&quot;&gt;Expire in 30 Minutes&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 399; ?>&quot;&gt;Expire in 399 Seconds&lt;/option&gt;
    &lt;/select&gt;&lt;br/&gt;&amp;nbsp;&lt;em&gt;(&quot;0&quot; Means no expiry of download!)&lt;/em&gt;
    Maximum Downloads (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;maximum&quot; id=&quot;maximum&quot; value=&quot;0&quot; maxlen=&quot;250&quot; size=&quot;35&quot; /&gt;&amp;nbsp;&lt;em&gt;(&quot;0&quot; Means no maximum download!)&lt;/em&gt;&lt;br/&gt;
	Notify Call Back (not required):
	&lt;select name=&quot;callback-notify-key&quot; id=&quot;callback-notify-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;notify&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Polled Call Back (not required):
	&lt;select name=&quot;callback-polled-key&quot; id=&quot;callback-polled-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;polled&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Maximum Call Back (not required):
	&lt;select name=&quot;callback-maximum-key&quot; id=&quot;callback-maximum-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;maximum&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Expired Call Back (not required):
	&lt;select name=&quot;callback-expiry-key&quot; id=&quot;callback-expiry-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;expiry&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
	&lt;input type=&quot;hidden&quot; name=&quot;return&quot; value=&quot;<?php echo $source; ?>?userkey=%key%&quot;&gt;
	&lt;input type=&quot;submit&quot; value=&quot;Create Binary Download Protection&quot; name=&quot;submit&quot;&gt;
&lt;/form&gt;
	</pre>
	</blockquote>	
	<h3>Create New Sessioning Binary Protection</h3>
    <blockquote>
        <font color="#009900">You need too submit a form to the following URL for using the API Content Additions adding a session tokened download protection to a download!</font><br/><br/>
        <em>Form action path: <strong><?php echo $source; ?>v1/protection/session/<?php echo $userkey ;?>/create.api</strong></em>
        <form name="protection-session-creation" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/protection/session/<?php echo $userkey ;?>/create.api">
        	Return Action:
		    <select name="format" id="format">
		    	<option value="return">Return to URL</option>
		    	<option value="json">Output JSON String</option>
		    	<option value="serial">Output PHP Serialized</option>
		    	<option value="xml">Output eXtendable Markup</option>
		    </select><br/>
		    Binary Download Key (required):
			<select name="bin-key" id="bin-key">
		    	<?php echo binariesBinariesKeys($userkey, 'option', '		    	'); ?>
		    </select><br/>
        	Download Valid Till:
		    <select name="expire" id="expire">
		    	<option value="0">No Expiry</option>
		    	<option value="<?php echo time() + 86400; ?>">Expire in 24 Hours</option>
		    	<option value="<?php echo time() + 43200; ?>">Expire in 12 Hours</option>
		    	<option value="<?php echo time() + 21600; ?>">Expire in 6 Hours</option>
		    	<option value="<?php echo time() + 10800; ?>">Expire in 3 Hours</option>
		    	<option value="<?php echo time() + 3600; ?>">Expire in 60 Minutes</option>
		    	<option value="<?php echo time() + 1800; ?>">Expire in 30 Minutes</option>
		    	<option value="<?php echo time() + 399; ?>">Expire in 399 Seconds</option>
		    </select>&nbsp;<em>("0" Means no expiry of download!)</em><br/>
		    Maximum Downloads (not required):
			<input type="textbox" name="maximum" id="maximum" value="0" maxlen="250" size="35" />&nbsp;<em>("0" Means no maximum download!)</em><br/>
			Notify Call Back (not required):
			<select name="callback-notify-key" id="callback-notify-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"notify"'); ?>
		    </select><br/>
		    Polled Call Back (not required):
			<select name="callback-polled-key" id="callback-polled-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"polled"'); ?>
		    </select><br/>
		    Maximum Call Back (not required):
			<select name="callback-maximum-key" id="callback-maximum-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"maximum"'); ?>
		    </select><br/>
		    Expired Call Back (not required):
			<select name="callback-expiry-key" id="callback-expiry-key">
		    	<?php echo binariesCallbackKeys($userkey, 'option', '		    	', '"expiry"'); ?>
		    </select><br/>
			<input type="hidden" name="return" value="<?php echo $source; ?>?userkey=%key%">
			<input type="submit" value="Create Binary Download Protection" name="submit">
		</form>
		<h3>Code Example:</h3>
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;form name=&quot;protection-session-creation&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot; action=&quot;<?php echo $source; ?>v1/protection/session/<?php echo $userkey ;?>/create.api&quot;&gt;
    Return Action:
	&lt;select name=&quot;format&quot; id=&quot;format&quot;&gt;
		 &lt;option value=&quot;return&quot;&gt;Return to URL&lt;/option&gt;
		 &lt;option value=&quot;json&quot;&gt;Output JSON String&lt;/option&gt;
		 &lt;option value=&quot;serial&quot;&gt;Output PHP Serialized&lt;/option&gt;
		 &lt;option value=&quot;xml&quot;&gt;Output eXtendable Markup&lt;/option&gt;
	&lt;/select&gt;&lt;br/&gt;
	Binary Download Key (required):
	&lt;select name=&quot;bin-key&quot; id=&quot;bin-key&quot;&gt;
<?php echo binariesHTMLExample(binariesBinariesKeys($userkey, 'option', '    	')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Download Valid Till:
    &lt;select name=&quot;expire&quot; id=&quot;expire&quot;&gt;
    	&lt;option value=&quot;0&quot;&gt;No Expiry&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 86400; ?>&quot;&gt;Expire in 24 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 43200; ?>&quot;&gt;Expire in 12 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 21600; ?>&quot;&gt;Expire in 6 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 10800; ?>&quot;&gt;Expire in 3 Hours&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 3600; ?>&quot;&gt;Expire in 60 Minutes&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 1800; ?>&quot;&gt;Expire in 30 Minutes&lt;/option&gt;
    	&lt;option value=&quot;<?php echo time() + 399; ?>&quot;&gt;Expire in 399 Seconds&lt;/option&gt;
    &lt;/select&gt;&lt;br/&gt;&amp;nbsp;&lt;em&gt;(&quot;0&quot; Means no expiry of download!)&lt;/em&gt;
    Maximum Downloads (not required):
	&lt;input type=&quot;textbox&quot; name=&quot;maximum&quot; id=&quot;maximum&quot; value=&quot;0&quot; maxlen=&quot;250&quot; size=&quot;35&quot; /&gt;&amp;nbsp;&lt;em&gt;(&quot;0&quot; Means no maximum download!)&lt;/em&gt;&lt;br/&gt;
	Notify Call Back (not required):
	&lt;select name=&quot;callback-notify-key&quot; id=&quot;callback-notify-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;notify&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Polled Call Back (not required):
	&lt;select name=&quot;callback-polled-key&quot; id=&quot;callback-polled-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;polled&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Maximum Call Back (not required):
	&lt;select name=&quot;callback-maximum-key&quot; id=&quot;callback-maximum-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;maximum&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
    Expired Call Back (not required):
	&lt;select name=&quot;callback-expiry-key&quot; id=&quot;callback-expiry-key&quot;&gt;
<?php echo binariesHTMLExample(binariesCallbackKeys($userkey, 'option', '    	', '&quot;expiry&quot;')); ?>
    &lt;/select&gt;&lt;br/&gt;
	&lt;input type=&quot;hidden&quot; name=&quot;return&quot; value=&quot;<?php echo $source; ?>?userkey=%key%&quot;&gt;
	&lt;input type=&quot;submit&quot; value=&quot;Create Binary Download Protection&quot; name=&quot;submit&quot;&gt;
&lt;/form&gt;
	</pre>
	</blockquote>	
	<h3>Create New Mime-type</h3>
    <blockquote>
        <font color="#009900">You need too submit a form to the following URL for using the API Content Additions adding a user is for site based sources!</font><br/><br/>
        <em>Form action path: <strong><?php echo $source; ?>v1/mimetype/create.api</strong></em>
        <form name="mime-type-indicies" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/mimetype/create.api">
        	Return Action:
		    <select name="format" id="format">
		    	<option value="return">Return to URL</option>
		    	<option value="json">Output JSON String</option>
		    	<option value="serial">Output PHP Serialized</option>
		    	<option value="xml">Output eXtendable Markup</option>
		    </select><br/>
		    Extensions <em>(no &quot;*.&quot;)</em>:
				&nbsp;1: <input type="textbox" name="extension[]" id="extension[]" maxlen="14" size="5" />
				&nbsp;2: <input type="textbox" name="extension[]" id="extension[]" maxlen="14" size="5" />
				&nbsp;3: <input type="textbox" name="extension[]" id="extension[]" maxlen="14" size="5" />
				&nbsp;4: <input type="textbox" name="extension[]" id="extension[]" maxlen="14" size="5" />
				&nbsp;5: <input type="textbox" name="extension[]" id="extension[]" maxlen="14" size="5" />
				&nbsp;6: <input type="textbox" name="extension[]" id="extension[]" maxlen="14" size="5" />
				&nbsp;7: <input type="textbox" name="extension[]" id="extension[]" maxlen="14" size="5" />
			<br/>
			Mime-types:
				&nbsp;1: <input type="textbox" name="mimetype[]" id="mimetype[]" maxlen="32" size="18" />
				&nbsp;2: <input type="textbox" name="mimetype[]" id="mimetype[]" maxlen="32" size="18" />
				&nbsp;3: <input type="textbox" name="mimetype[]" id="mimetype[]" maxlen="32" size="18" />
				&nbsp;4: <input type="textbox" name="mimetype[]" id="mimetype[]" maxlen="32" size="18" /><br />
			<br/>
			Mime-type Description 
				<input type="textbox" name="description" id="mimetype[]" maxlen="300" size="42" /> <em>(Ammends Only if Missing or New Record!)</em></br/>
			<input type="hidden" name="return" value="<?php echo $source; ?>?key=%key%">
			<input type="submit" value="New or Add to Mime-type Index" name="submit">
		</form>
		<h3>Code Example:</h3>
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;form name=&quot;mime-type-indicies&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot; action=&quot;<?php echo $source; ?>v1/mimetype/create.api&quot;&gt;
    Return Action:
	&lt;select name=&quot;format&quot; id=&quot;format&quot;&gt;
		   &lt;option value=&quot;return&quot;&gt;Return to URL&lt;/option&gt;
		   &lt;option value=&quot;json&quot;&gt;Output JSON String&lt;/option&gt;
		   &lt;option value=&quot;serial&quot;&gt;Output PHP Serialized&lt;/option&gt;
		   &lt;option value=&quot;xml&quot;&gt;Output eXtendable Markup&lt;/option&gt;
	&lt;/select&gt;&lt;br/&gt;
	Extensions &lt;em&gt;(no &quot;*.&quot;)&lt;/em&gt;:
		&amp;nbsp;1: &lt;input type=&quot;textbox&quot; name=&quot;extension[]&quot; id=&quot;extension[]&quot; maxlen=&quot;14&quot; size=&quot;5&quot; /&gt;
		&amp;nbsp;2: &lt;input type=&quot;textbox&quot; name=&quot;extension[]&quot; id=&quot;extension[]&quot; maxlen=&quot;14&quot; size=&quot;5&quot; /&gt;
		&amp;nbsp;3: &lt;input type=&quot;textbox&quot; name=&quot;extension[]&quot; id=&quot;extension[]&quot; maxlen=&quot;14&quot; size=&quot;5&quot; /&gt;
		&amp;nbsp;4: &lt;input type=&quot;textbox&quot; name=&quot;extension[]&quot; id=&quot;extension[]&quot; maxlen=&quot;14&quot; size=&quot;5&quot; /&gt;
		&amp;nbsp;5: &lt;input type=&quot;textbox&quot; name=&quot;extension[]&quot; id=&quot;extension[]&quot; maxlen=&quot;14&quot; size=&quot;5&quot; /&gt;
		&amp;nbsp;6: &lt;input type=&quot;textbox&quot; name=&quot;extension[]&quot; id=&quot;extension[]&quot; maxlen=&quot;14&quot; size=&quot;5&quot; /&gt;
		&amp;nbsp;7: &lt;input type=&quot;textbox&quot; name=&quot;extension[]&quot; id=&quot;extension[]&quot; maxlen=&quot;14&quot; size=&quot;5&quot; /&gt;
	&lt;br/&gt;
	Mime-types:
		&amp;nbsp;1: &lt;input type=&quot;textbox&quot; name=&quot;mimetype[]&quot; id=&quot;mimetype[]&quot; maxlen=&quot;32&quot; size=&quot;18&quot; /&gt;
		&amp;nbsp;2: &lt;input type=&quot;textbox&quot; name=&quot;mimetype[]&quot; id=&quot;mimetype[]&quot; maxlen=&quot;32&quot; size=&quot;18&quot; /&gt;
		&amp;nbsp;3: &lt;input type=&quot;textbox&quot; name=&quot;mimetype[]&quot; id=&quot;mimetype[]&quot; maxlen=&quot;32&quot; size=&quot;18&quot; /&gt;
		&amp;nbsp;4: &lt;input type=&quot;textbox&quot; name=&quot;mimetype[]&quot; id=&quot;mimetype[]&quot; maxlen=&quot;32&quot; size=&quot;18&quot; /&gt;
	&lt;br/&gt;
	Mime-type Description 
	&amp;nbsp;1: &lt;input type=&quot;textbox&quot; name=&quot;description&quot; id=&quot;mimetype[]&quot; maxlen=&quot;300&quot; size=&quot;42&quot; /&gt; &lt;em&gt;(Ammends Only if Missing or New Record!)&lt;/em&gt;&lt;/br/&gt;
	&lt;input type=&quot;hidden&quot; name=&quot;return&quot; value=&quot;<?php echo $source; ?>?key=%key%&quot;&gt;
	&lt;input type=&quot;submit&quot; value=&quot;New or Add to Mime-type Index&quot; name=&quot;submit&quot;&gt;
&lt;/form&gt;
	</pre>
	</blockquote>
	<h2>FORGOTTEN Document Output</h2>
	<p>This is done with the <em>forgotton.api</em> extension at the end of the url, this is all the functions for recoverying forgotton data and resets!</p>
	<h3>Replace/Forgotten User Password</h3>
    <blockquote>
        <font color="#009900">You need to submit this form when you have forgotten your site based username to recover your password and reset it on API!</font><br/><br/>
        <em>Form action path: <strong><?php echo $source; ?>v1/user/forgotten.api</strong></em>
        <form name="user-recovery-email" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/user/forgotten.api">
		    User Name:
			<input type="textbox" name="user" id="user" maxlen="23" size="15" />	<br/>
		    User's Email Address:
			<input type="textbox" name="email" id="email" maxlen="198" size="35" />	<br/>
			<input type="hidden" name="return" value="<?php echo $source; ?>?success=%success%">
			<input type="submit" value="Forgotten Username Password" name="submit">
		</form>
		<h3>Code Example:</h3>
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;form name="site-profiler-creation" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/user/forgotten.api"&gt;
    User Name:
	&lt;input type=&quot;textbox&quot; name=&quot;user&quot; id=&quot;user&quot; maxlen=&quot;23&quot; size=&quot;15&quot; /&gt;	&lt;br/&gt;
    User's Email Address:
	&lt;input type=&quot;textbox&quot; name=&quot;email&quot; id=&quot;email&quot; maxlen=&quot;198&quot; size=&quot;35&quot; /&gt;	&lt;br/&gt;
	&lt;input type=&quot;hidden&quot; name=&quot;return&quot; value=&quot;<?php echo $source; ?>?success=%success%&quot;&gt;
	&lt;input type=&quot;submit&quot; value=&quot;Forgotten Username Password&quot; name=&quot;submit&quot;&gt;
&lt;/form&gt;
		</pre>
		</blockquote>
	
    <h2>UPLOAD Document Output</h2>
    <p>This is done with the <em>upload.api</em> extension at the end of the url, you can upload and stage fonts on the API permanently and upload them in the file formats of either singularily: *.* which are existing valued mime-types!</p>
    <blockquote>
        <font color="#009900">You need too submit a form to the following URL for the field name of <em>'<?php echo $ua; ?>'</em> containing the data for the font to be added to the API</font><br/><br/>
        <em>Form action path: <strong><?php echo $source; ?>v1/<?php echo $userkey;?>/<?php echo $ua; ?>/upload.api</strong></em>
        <form name="<?php echo $ua; ?>" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/<?php echo $userkey;?>/<?php echo $ua; ?>/upload.api">
    			 Nodes/Tags:
    		     <input type="textbox" name="nodes" id="nodes" maxlen="250" size="35" />&nbsp;<strong>(Seperated <em>[,] or [;]</em>)</strong><br/>
    			 Select image to upload:
    		     <input type="file" name="<?php echo $ua; ?>" id="<?php echo $ua; ?>">
    		     <input type="hidden" name="return" value="<?php echo $source; ?>">
   				 <input type="submit" value="Upload Image" name="submit">
		</form>
		<h3>Code Example:</h3>
		<pre style="margin: 14px; padding: 12px; border: 2px solid #ee43a4;">
&lt;form name="<?php echo $ua; ?>" method="POST" enctype="multipart/form-data" action="<?php echo $source; ?>v1/<?php echo $userkey;?>/<?php echo $ua; ?>/upload.api"&gt;
	Contact Email Address:
	&lt;!-- Email Address to send a copy of the web fonts and example CSS to as well as any API information about the Upload --&gt;
	&lt;input type="textbox" name="email" id="email" maxlen="198" size="35" /&gt;	&lt;br/&gt;
	Select image to upload:
	&lt;!-- File being Uploaded --&gt;
	&lt;input type="file" name="<?php echo $ua; ?>" id="<?php echo $ua; ?>"&gt;
	&lt;!-- Hidden Form Field for the Upload to return the browser to after uploading --&gt;
	&lt;input type="hidden" name="return" value="<?php echo $source; ?>"&gt;
	&lt;input type="submit" value="Upload Image" name="submit"&gt;
&lt;/form&gt;
		</pre>
    </blockquote>
    
	<?php if (file_exists(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'apis.html')) {
    	readfile(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'apis.html');
    }?>
	<?php if (!in_array(whitelistGetIP(true), whitelistGetIPAddy())) { ?>
    <h2>Limits</h2>
    <p>There is a limit of <?php echo MAXIMUM_QUERIES; ?> queries per hour. This will reset every hour and the response of a 404 document not found will be provided if you have exceeded your query limits. You can add yourself to the whitelist by using the following form API <a href="https://whitelist.labs.coop/">Whitelisting form</a>. This is only so this service isn't abused!!</p>
    <?php } ?>
    <h2>The Author</h2>
    <p>This was developed by Simon Roberts in 2013 and is part of the Chronolabs System and Xortify. if you need to contact simon you can do so at the following address <a href="mailto:wishcraft@users.sourceforge.net">wishcraft@users.sourceforge.net</a></p></body>
</div>
</html>
<?php 
