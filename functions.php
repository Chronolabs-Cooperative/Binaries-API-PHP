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
 * @version         $Id: functions.php 1000 2013-06-07 01:20:22Z mynamesnot $
 * @subpackage		api
 * @description		Binary Downloads + Emailer REST API
 */

include_once dirname(__FILE__).'/constants.php';

if (!function_exists("whitelistGetIP")) {

	/* function whitelistGetIPAddy()
	 *
	 * 	provides an associative array of whitelisted IP Addresses
	 * @author 		Simon Roberts (Chronolabs) simon@labs.coop
	 *
	 * @return 		array
	 */
	function whitelistGetIPAddy() {
		return array_merge(whitelistGetNetBIOSIP(), file(dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'whitelist.txt'));
	}
}

if (!function_exists("whitelistGetNetBIOSIP")) {

	/* function whitelistGetNetBIOSIP()
	 *
	 * 	provides an associative array of whitelisted IP Addresses base on TLD and NetBIOS Addresses
	 * @author 		Simon Roberts (Chronolabs) simon@labs.coop
	 *
	 * @return 		array
	 */
	function whitelistGetNetBIOSIP() {
		$ret = array();
		foreach(file(dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'whitelist-domains.txt') as $domain) {
			$ip = gethostbyname($domain);
			$ret[$ip] = $ip;
		}
		return $ret;
	}
}

if (!function_exists("whitelistGetIP")) {

	/* function whitelistGetIP()
	 *
	 * 	get the True IPv4/IPv6 address of the client using the API
	 * @author 		Simon Roberts (Chronolabs) simon@labs.coop
	 *
	 * @param		$asString	boolean		Whether to return an address or network long integer
	 *
	 * @return 		mixed
	 */
	function whitelistGetIP($asString = true){
		// Gets the proxy ip sent by the user
		$proxy_ip = '';
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$proxy_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else
		if (!empty($_SERVER['HTTP_X_FORWARDED'])) {
			$proxy_ip = $_SERVER['HTTP_X_FORWARDED'];
		} else
		if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
			$proxy_ip = $_SERVER['HTTP_FORWARDED_FOR'];
		} else
		if (!empty($_SERVER['HTTP_FORWARDED'])) {
			$proxy_ip = $_SERVER['HTTP_FORWARDED'];
		} else
		if (!empty($_SERVER['HTTP_VIA'])) {
			$proxy_ip = $_SERVER['HTTP_VIA'];
		} else
		if (!empty($_SERVER['HTTP_X_COMING_FROM'])) {
			$proxy_ip = $_SERVER['HTTP_X_COMING_FROM'];
		} else
		if (!empty($_SERVER['HTTP_COMING_FROM'])) {
			$proxy_ip = $_SERVER['HTTP_COMING_FROM'];
		}
		if (!empty($proxy_ip) && $is_ip = preg_match('/^([0-9]{1,3}.){3,3}[0-9]{1,3}/', $proxy_ip, $regs) && count($regs) > 0)  {
			$the_IP = $regs[0];
		} else {
			$the_IP = $_SERVER['REMOTE_ADDR'];
		}
			
		$the_IP = ($asString) ? $the_IP : ip2long($the_IP);
		return $the_IP;
	}
}




if (!function_exists("binariesHTMLExample")) {

	/**
	 * Parses To HTML for an example
	 *
	 * @param string $html
	 */
	function binariesHTMLExample($html = '')
	{
		$html = str_replace("&", "&amp;", $html);
		$html = str_replace("<", "&lt;", $html);
		$html = str_replace(">", "&gt;", $html);
		return str_replace('"', "&quot;", $html);
	}
}



if (!function_exists("binariesPasshash")) {

	/**
	 * Parses To MD5 or passes through if an MD5
	 * 
	 * @param string $password
	 */
	function binariesPasshash($password = '')
	{
		if (strlen($password)==32 && strtolower($password) === $password)
			return $password;
		return md5($password);
	}
}


if (!function_exists("binariesCheckUserSession")) {

	/**
	 * Check User Session Token and return User-ID if valid
	 * 
	 * @param string $userkey
	 * @return integer|boolean
	 */
	function binariesCheckUserSession($userkey = '')
	{
		if ($userkey == md5(NULL))
			return $false;
		list($userid) = $GLOBALS['storeDB']->fetchRow($GLOBALS['storeDB']->queryF("SELECT `user-id` FROM `users` WHERE md5(concat(`key`,`username`,`passhash-md5`,`name`,`email`,`expiries`,`registered`)) LIKE '" . $userkey . "' WHERE `registered` < `activated`"));
		if (!empty($userid))
		{
			$GLOBALS['storeDB']->queryF("UPDATE `users` SET `loggedon` = '".time()."', `last-ip-id` = '" . binariesGetIPID(whitelistGetIP(true))  . "' WHERE `registered` < `activated` AND `user-id` = '" . $userid . "'");
			return $userid;
		}
		return false;
	}
}


if (!function_exists("binariesGetUserSession")) {

	/**
	 * Generates User Session Token or Returns current one
	 * 
	 * @param string $alias
	 * @param string $passhash
	 * @param integer $expire
	 * @return string|boolean
	 */
	function binariesGetUserSession($alias = '', $passhash = '', $expire = 43200)
	{
		if ($userkey == md5(NULL))
			return $false;
		list($userkey) = $GLOBALS['storeDB']->fetchRow($GLOBALS['storeDB']->queryF("SELECT md5(concat(`key`,`username`,`passhash-md5`,`name`,`email`,`expiries`,`registered`)) as `user-session` FROM `users` WHERE  ( `username` LIKE '" . $alias . "' OR `email` LIKE '" . $alias . "' ) AND `passhash-md5' LIKE '".binariesPasshash($passhash)."' AND `registered` < `activated` AND `expiries` >= '" . time() . "'"));
		if (!empty($userkey))
		{
			$GLOBALS['storeDB']->queryF("UPDATE `users` SET `expiries` = '".time()+$expire."' WHERE ( `username` LIKE '" . $alias . "' OR `email` LIKE '" . $alias . "' ) AND `passhash-md5' LIKE '".binariesPasshash($passhash)."' AND `registered` < `activated` AND `expiries` <= '" . time() . "'");
			list($userkey) = $GLOBALS['storeDB']->fetchRow($GLOBALS['storeDB']->queryF("SELECT md5(concat(`key`,`username`,`passhash-md5`,`name`,`email`,`expiries`,`registered`)) as `user-session` FROM `users` WHERE  ( `username` LIKE '" . $alias . "' OR `email` LIKE '" . $alias . "' ) AND `passhash-md5' LIKE '".binariesPasshash($passhash)."' AND `registered` < `activated` AND `expiries` >= '" . time() . "'"));
		}
		return (!empty($userkey)?$userkey:false);
	}
}

if (!function_exists("binariesSiteKeys")) {

	/**
	 * Get Binary Site Keys in Array, HTML based in User-ID
	 * 
	 * @param string $userkey
	 * @param string $mode
	 * @param string $spacer
	 * @return string|array|boolean
	 */
	function binariesSiteKeys($userkey = '', $mode = 'array', $spacer = '')
	{
		if ($userkey == md5(NULL) || !$userid = binariesCheckUserSession($userkey))
		{
			switch ($mode)
			{
				case "option":
				case "options":
					return $spacer . "<option value='" . $userkey . "'>Your Not Logged In Complete Session Output</option>\n";
			}
			return false;
		}
		$result = '';
		$sites = binariesGetSites($userid);
		switch ($mode)
		{
			case "option":
			case "options":
				if (count($sites))
					return $spacer . "<option value='" . md5(NULL) . "'>You need to create a Site Entry!</option>\n";
				foreach($sites as $id => $values)
				{
					$result .= $spacer . "<option value='" . $values['key'] . "'>".$values['name']."</option>\n";
				}
				break;
			default:
				return (!empty($sites)?$sites:false);
				break;
		}
		return (!empty($result)?$result:false);
	}	
}

if (!function_exists("binariesGetSites")) {

	/**
	 * Get Site's Array based on User-ID
	 * 
	 * @param integer $userid
	 * @param string $fields
	 * @return array
	 */
	function binariesGetSites($userid = 0, $fields = '`key`,`name`')
	{
		$results = array();
		$result = $GLOBALS['storeDB']->queryF("SELECT `site-id` AS 'identity', $fields FROM `sites` WHERE `user-id` = '" . $userid . '" ORDER BY `created` DESC');
		while($row = $GLOBALS['storeDB']->fetchArray($result))
		{
			$results[$row['identity']] = $row;
			unset($results[$row['identity']]['identity']);
		}
		return $results;
	}
}


if (!function_exists("binariesBinariesKeys")) {

	/**
	 * Get Binary Site Keys in Array, HTML based in User-ID
	 *
	 * @param string $userkey
	 * @param string $mode
	 * @param string $spacer
	 * @return string|array|boolean
	 */
	function binariesBinariesKeys($userkey = '', $mode = 'array', $spacer = '')
	{
		if ($userkey == md5(NULL) || !$userid = binariesCheckUserSession($userkey))
		{
			switch ($mode)
			{
				case "option":
				case "options":
					return $spacer . "<option value='" . $userkey . "'>Your Not Logged In Complete Session Output</option>\n";
			}
			return false;
		}
		$result = '';
		$files = binariesGetBinaries($userid);
		switch ($mode)
		{
			case "option":
			case "options":
				if (count($files))
					return $spacer . "<option value='" . md5(NULL) . "'>You need to create a Binary Download Entry!</option>\n";
				$result .= $spacer . "<option value='" . md5(NULL) . "'>None At All!</option>\n";
				foreach($files as $id => $values)
				{
					$result .= $spacer . "<option value='" . $values['key'] . "'>".$values['filename']."</option>\n";
				}
				break;
			default:
				return (!empty($files)?$files:false);
				break;
		}
		return (!empty($result)?$result:false);
	}
}

if (!function_exists("binariesGetBinaries")) {

	/**
	 * Get Site's Array based on User-ID
	 *
	 * @param integer $userid
	 * @param string $fields
	 * @return array
	 */
	function binariesGetBinaries($userid = 0, $fields = '`key`,`filename`')
	{
		$results = array();
		$result = $GLOBALS['storeDB']->queryF("SELECT `bin-id` AS 'identity', $fields FROM `binaries` WHERE `user-id` = '" . $userid . '" ORDER BY `created` DESC');
		while($row = $GLOBALS['storeDB']->fetchArray($result))
		{
			$results[$row['identity']] = $row;
			unset($results[$row['identity']]['identity']);
		}
		return $results;
	}
}


if (!function_exists("binariesCallbackKeys")) {

	/**
	 * Get Binary Site Keys in Array, HTML based in User-ID
	 *
	 * @param string $userkey
	 * @param string $mode
	 * @param string $spacer
	 * @return string|array|boolean
	 */
	function binariesCallbackKeys($userkey = '', $mode = 'array', $spacer = '', $range = "'notify','polled','maximum','expired','hit','replaced','moved','protection','maximum','expired','referee','referees','statistics','unknown'")
	{
		if ($userkey == md5(NULL) || !$userid = binariesCheckUserSession($userkey))
		{
			switch ($mode)
			{
				case "option":
				case "options":
					return $spacer . "<option value='" . $userkey . "'>Your Not Logged In Complete Session Output</option>\n";
			}
			return false;
		}
		$result = '';
		$callbacks = binariesGetCallbacks($userid, $range);
		switch ($mode)
		{
			case "option":
			case "options":
				if (count($callbacks))
					return $spacer . "<option value='" . md5(NULL) . "'>You need to create a API Callback Entry!</option>\n";
				$result .= $spacer . "<option value='" . md5(NULL) . "'>None At All!</option>\n";
				foreach($callbacks as $id => $values)
				{
					$result .= $spacer . "<option value='" . $values['key'] . "'>".$values['filename']."</option>\n";
				}
				break;
			default:
				return (!empty($callbacks)?$callbacks:false);
				break;
		}
		return (!empty($result)?$result:false);
	}
}

if (!function_exists("binariesGetCallbacks")) {

	/**
	 * Get Site's Array based on User-ID
	 *
	 * @param integer $userid
	 * @param string $fields
	 * @return array
	 */
	function binariesGetCallbacks($userid = 0, $fields = '`key`,concat(`type`,":-  ",`protocol`,"://",`domain`,"/",`path`) AS "name"', $range = "'notify','polled','maximum','expired','hit','replaced','moved','protection','maximum','expired','referee','referees','statistics','unknown'")
	{
		$results = array();
		$result = $GLOBALS['storeDB']->queryF("SELECT `callback-id` AS 'identity', $fields FROM `callbacks` WHERE `user-id` = '" . $userid . '" AND `type` IN ('.$range.') ORDER BY `type` DESC');
		while($row = $GLOBALS['storeDB']->fetchArray($result))
		{
			$results[$row['identity']] = $row;
			unset($results[$row['identity']]['identity']);
		}
		return $results;
	}
}


if (!function_exists("redirect")) {
	/**
	 * checkEmail()
	 *
	 * @param mixed $email
	 * @return bool|mixed
	 */
	function redirect($url = '', $seconds = 9, $message = '')
	{
		$GLOBALS['url'] = $url;
		$GLOBALS['time'] = $seconds;
		$GLOBALS['message'] = $message;
		require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'redirect.php';
		exit(-1000);
	}
}

if (!function_exists("checkEmail")) {
	/**
	 * checkEmail()
	 *
	 * @param mixed $email
	 * @return bool|mixed
	 */
	function checkEmail($email)
	{
		if (!$email || !preg_match('/^[^@]{1,64}@[^@]{1,255}$/', $email)) {
			return false;
		}
		$email_array = explode("@", $email);
		$local_array = explode(".", $email_array[0]);
		for ($i = 0; $i < sizeof($local_array); $i++) {
			if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/\=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/\=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
				return false;
			}
		}
		if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) {
			$domain_array = explode(".", $email_array[1]);
			if (sizeof($domain_array) < 2) {
				return false; // Not enough parts to domain
			}
			for ($i = 0; $i < sizeof($domain_array); $i++) {
				if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
					return false;
				}
			}
		}
		return $email;
	}
}


if (!class_exists("XmlDomConstruct")) {
	/**
	 * class XmlDomConstruct
	 * 
	 * 	Extends the DOMDocument to implement personal (utility) methods.
	 *
	 * @author 		Simon Roberts (Chronolabs) simon@labs.coop
	 */
	class XmlDomConstruct extends DOMDocument {
	
		/**
		 * Constructs elements and texts from an array or string.
		 * The array can contain an element's name in the index part
		 * and an element's text in the value part.
		 *
		 * It can also creates an xml with the same element tagName on the same
		 * level.
		 *
		 * ex:
		 * <nodes>
		 *   <node>text</node>
		 *   <node>
		 *     <field>hello</field>
		 *     <field>world</field>
		 *   </node>
		 * </nodes>
		 *
		 * Array should then look like:
		 *
		 * Array (
		 *   "nodes" => Array (
		 *     "node" => Array (
		 *       0 => "text"
		 *       1 => Array (
		 *         "field" => Array (
		 *           0 => "hello"
		 *           1 => "world"
		 *         )
		 *       )
		 *     )
		 *   )
		 * )
		 *
		 * @param mixed $mixed An array or string.
		 *
		 * @param DOMElement[optional] $domElement Then element
		 * from where the array will be construct to.
		 * 
		 * @author 		Simon Roberts (Chronolabs) simon@labs.coop
		 *
		 */
		public function fromMixed($mixed, DOMElement $domElement = null) {
	
			$domElement = is_null($domElement) ? $this : $domElement;
	
			if (is_array($mixed)) {
				foreach( $mixed as $index => $mixedElement ) {
	
					if ( is_int($index) ) {
						if ( $index == 0 ) {
							$node = $domElement;
						} else {
							$node = $this->createElement($domElement->tagName);
							$domElement->parentNode->appendChild($node);
						}
					}
					 
					else {
						$node = $this->createElement($index);
						$domElement->appendChild($node);
					}
					 
					$this->fromMixed($mixedElement, $node);
					 
				}
			} else {
				$domElement->appendChild($this->createTextNode($mixed));
			}
			 
		}
		 
	}
}

?>