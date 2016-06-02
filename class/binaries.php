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
 * @subpackage		database
 * @description		Binary Downloads + Emailer REST API
 */



/**
 * Database Constants
 *
 * @abstract
 * @author     Simon Roberts <wishcraft@users.sourceforge.net>
 * @package    binaries
 * @subpackage database
 */


/**
 * @var string		Database Name (Database Source One)
 */
define('DB_BINARIES_NAME', 'binaries');

/**
 * @var string		Database Username (Database Source One)
 */
define('DB_BINARIES_USER', 'binaries');

/**
 * @var string		Database Password (Database Source One)
 */
define('DB_BINARIES_PASS', 'poop00wee');

/**
 * @var string		Database Host Address/IP (Database Source One)
 */
define('DB_BINARIES_HOST', 'localhost');

/**
 * @var string		Database Character Set (Global)
 */
define('DB_BINARIES_CHAR', 'utf8');

/**
 * @var string		Database Persistency Connection (Global)
 */
define('DB_BINARIES_PERS', false);

/**
 * @var string		Database Types (Global)
 */
define('DB_BINARIES_TYPE', 'mysql');

/**
 * @var string		Database Prefix (Global)
 */
define('DB_BINARIES_PREF', '');

require_once dirname(__FILE__) . '/database.php';
require_once dirname(__FILE__) . '/databasefactory.php';

/**
 * @var object		Database Handler Object (Globals)
 */
$GLOBALS['storeDB'] = BinariesDatabaseFactory::getDatabaseConnection();

?>
