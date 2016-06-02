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
 * @package         bin
 * @since           1.0.2
 * @author          Simon Roberts <wishcraft@users.sourceforge.net>
 * @version         $Id: upload.php 1000 2013-06-07 01:20:22Z mynamesnot $
 * @subpackage		api
 * @description		Binary Downloads + Emailer REST API
 */


	use FontLib\Font;
	use FontLib\TrueType\Collection;

	ini_set('display_errors', true);
	ini_set('log_errors', true);
	error_reporting(E_ERROR);

	require_once  dirname(__FILE__) . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR . "FontLib". DIRECTORY_SEPARATOR . "Autoloader.php";
	
	/**
	 * Bing API Key
	 * @var string
	 */
	$account_key = 'Ywd+afQ1S4HEkYi+tupthNKU9Jnotan+9ZM9sfXlz4A';
	
	/**
	 * Bing API URL's
	 * @var array
	 */
	$url = array();
	$url['synom'] = 'https://api.datamarket.azure.com/Bing/Synonyms/GetSynonyms?$format=json&amp;Query=\'%s\'';
	$url['search'] = 'https://api.datamarket.azure.com/Bing/Search/v1/Web?\$format=json&amp;Query=\'%s\'';
	
	define('MAXIMUM_QUERIES', 25);
	ini_set('memory_limit', '128M');
	ini_set('upload_max_filesize', '399M');
	ini_set('post_max_size', '399M');
	include dirname(__FILE__).'/functions.php';
	include dirname(__FILE__).'/class/fontages.php';

	$error = array();
	if (isset($_GET['field']) || !empty($_GET['field'])) {
		if (empty($_FILES[$_GET['field']]))
			$error[] = 'No file uploaded in the correct field name of: "' . $_GET['field'] . '"';
		else {
			$fileext = strtolower(substr(basename($_FILES[$_GET['field']]['name']), strlen(basename($_FILES[$_GET['field']]['name']))-3));
			switch ($fileext)
			{
				case "otf":
				case "ttf":
				case "zip":
					break;
				default:
					$error[] = 'The file extension type of <strong>*.'.$fileext.'</strong> is not valid you can only upload the following: <em>*.otf</em>, <em>*.ttf</em> & <em>*.zip</em>!';
					break;
			}
		}
	} else 
		$error[] = 'File uploaded field name not specified in the URL!';
	
	if (isset($_REQUEST['email']) || !empty($_REQUEST['email'])) {
		if (!checkEmail($_REQUEST['email']))
			$error[] = 'Email is invalid!';
	} else
		$error[] = 'No Email Address for Notification specified!';
	
	if (!empty($error))
	{
		redirect(isset($_REQUEST['return'])&&!empty($_REQUEST['return'])?$_REQUEST['return']:'http://'. $_SERVER["HTTP_HOST"], 9, "<center><h1 style='color:rgb(198,0,0);'>Error Has Occured</h1><br/><p>" . implode("<br />", $error) . "</p></center>");
		exit(0);
	}
	
	$file = array();
	switch ($fileext)
	{
		case "otf":
		case "ttf":
			$uploadpath = DIRECTORY_SEPARATOR . $_REQUEST['email'] . DIRECTORY_SEPARATOR . microtime(true);
			if (!is_dir(constant("FONT_UPLOAD_PATH") . $uploadpath))
				mkdir(constant("FONT_UPLOAD_PATH") . $uploadpath, 0777, true);
			if (!move_uploaded_file($_FILES[$_GET['field']]['tmp_name'], $file[] = constant("FONT_UPLOAD_PATH") . $uploadpath . DIRECTORY_SEPARATOR . $_FILES[$_GET['field']]['name'])) {
				redirect(isset($_REQUEST['return'])&&!empty($_REQUEST['return'])?$_REQUEST['return']:'http://'. $_SERVER["HTTP_HOST"], 9, "<center><h1 style='color:rgb(198,0,0);'>Uploading Error Has Occured</h1><br/><p>Fonts API was unable to recieve and store: <strong>".$_FILES[$_GET['field']]['name']."</strong>!</p></center>");
				exit(0);
			}
		case "zip":
			$uploadpath = DIRECTORY_SEPARATOR . 'zipfiles';
			if (!is_dir(constant("FONT_UPLOAD_PATH") . $uploadpath))
				mkdir(constant("FONT_UPLOAD_PATH") . $uploadpath, 0777, true);
			if (!move_uploaded_file($_FILES[$_GET['field']]['tmp_name'], $zipe = constant("FONT_UPLOAD_PATH") . $uploadpath . DIRECTORY_SEPARATOR . $_FILES[$_GET['field']]['name'])) {
				redirect(isset($_REQUEST['return'])&&!empty($_REQUEST['return'])?$_REQUEST['return']:'http://'. $_SERVER["HTTP_HOST"], 9, "<center><h1 style='color:rgb(198,0,0);'>Uploading Error Has Occured</h1><br/><p>Fonts API was unable to recieve and store: <strong>".$_FILES[$_GET['field']]['name']."</strong>!</p></center>");
				exit(0);
			}
			foreach(getArchivedZIPContentsArray($zipe) as $md5 => $store)
			{
				switch ($store['type'])
				{
					case "otf":
					case "ttf":
						writeRawFile($file[] = constant("FONT_UPLOAD_PATH") . DIRECTORY_SEPARATOR . $_REQUEST['email'] . DIRECTORY_SEPARATOR . $md5 . DIRECTORY_SEPARATOR . $store['filename'], getArchivedZIPFile($zipe, $store['filename']));
						break;
				}
			}
			unlink($zipe);
			break;
		default:
			$error[] = 'The file extension type of <strong>*.'.$fileext.'</strong> is not valid you can only upload the following: <em>*.otf</em>, <em>*.ttf</em> & <em>*.zip</em>!';
			break;
	}
	
	if (!empty($error))
	{
		redirect(isset($_REQUEST['return'])&&!empty($_REQUEST['return'])?$_REQUEST['return']:'http://'. $_SERVER["HTTP_HOST"], 9, "<center><h1 style='color:rgb(198,0,0);'>Error Has Occured</h1><br/><p>" . implode("<br />", $error) . "</p></center>");
		exit(0);
	}
	
	$success = array();
	foreach($file as $fontfile)
	{
		if (is_file($fontfile))
		{
			$g = 0;
			$font = Font::load($fontfile);

			if ($font instanceof Collection) {
				continue;
			}
			if (is_object($font))
			{
				$fftp['name']['short'] = $font->getFontName();
				$fftp['name']['full'] = $font->getFontFullName();
				$fftp['name']['postscript'] = $font->getFontPostscriptName();
				$fftp['families'] = getFamiliesOnNaming(basename($fontfile), array(0 => array("name"=> $font->getFontSubfamily(), "id" => $font->getFontSubfamilyID())));
				if ($fftp['families'][0]['name'] == substr(basename($fontfile), 0, strlen(basename($fontfile))-4))
				{
					unset($fftp['families'][0]);
				}
				$fftp['weight'] = $font->getFontWeight();
				if (empty($fftp['weight'])||$fftp  == substr(basename($fontfile), 0, strlen(basename($fontfile))-4))
					$fftp['weight'] = getWeightOnNaming(basename($fontfile));
				$fftp['copyright'] = $font->getFontCopyright();
				if (empty($fftp['copyright']))
					$fftp['copyright'] = "GPL/GNU 2.0";
				$fftp['version'] =  $font->getFontVersion();
				if (empty($fftp['version']))
					$fftp['version'] = '1.01';
				$fftp['file']['source']['file'] = basename($fontfile);
				$fftp['file']['source']['size'] = filesize($fontfile);
				$fftp['file']['source']['md5'] = md5_file($fontfile);
				$fftp['file']['source']['type'] = substr($fontfile, strlen($fontfile)-3, 3);

				if (in_array(substr(basename($fontfile), 0, strlen(basename($fontfile))-4), array($fftp['name']['short'], $fftp['name']['full'], $fftp['name']['postscript'])) )
				{
					$fftp['synonyms'] = getBingAPI(sprintf($url['synom'], urlencode(str_replace(array("_", "-", "."), " ", basename($fontfile)))), $account_key);
				}
				$fftp['links'] = getBingAPI(sprintf($url['search'], urlencode( basename($fontfile))), $account_key);
				$fftp['path'] = getLocalityPath(basename($fontfile), $fftp['name']['short'], $fftp['families'], $fftp['weight']);
					
				$names = $font->getData("post", "names");
				
				$sql = "INSERT INTO `uploads` (`email`, `uploaded_file`, `uploaded_path`, `converted_path`, `uploaded`, `referee_uri`, `bytes`) VALUES ('" . mysql_escape_string($_REQUEST['email']) . "','" . mysql_escape_string(basename($fontfile)) . "','" . mysql_escape_string(dirname($fontfile)) . "','" . mysql_escape_string(cleanPath(str_replace(" ", "\ ", $fontsortd . $fftp['path']['locality']))). "','" . time(). "','" . mysql_escape_string($_SERVER['HTTP_REFERER']) . "'," . filesize($fontfile) . ")";
				if ($GLOBALS['FontsDB']->queryF($sql))
					$success[] = basename($fontfile);
				else
					unlink($fontfile);
			}
		}
	}
	redirect(isset($_REQUEST['return'])&&!empty($_REQUEST['return'])?$_REQUEST['return']:'http://'. $_SERVER["HTTP_HOST"], 18, "<center><h1 style='color:rgb(0,198,0);'>Uploading Partially or Completely Successful</h1><br/><p>The following files where uploaded and queued for conversion on the API Successfully:</p><p style='height: auto; clear: both; width: 100%;'><ul style='height: auto; clear: both; width: 100%;'><li style='width: 20%; float: left;'>".implode("</li><li style='width: 20%; float: left;'>", $success)."</li></ul></p><br/><br/><br/><p>You need to wait for the conversion maintenance to run in the next 30 minutes, you will recieve an email when done per each file!</p></center>");
	exit(0);
?>