<?php
/**
 * Chronolabs REST GeoSpatial Places API
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
 * @package         places
 * @since           1.0.2
 * @author          Simon Roberts <wishcraft@users.sourceforge.net>
 * @version         $Id: functions.php 1000 2013-06-07 01:20:22Z mynamesnot $
 * @subpackage		api
 * @description		REST GeoSpatial Places API
 */


/**
 * Database Class Factory
 *
 * @abstract
 * @author     Simon Roberts <wishcraft@users.sourceforge.net>
 * @package    places
 * @subpackage database
 */
class DebauchDatabaseFactory
{

    /**
     * Get a reference to the only instance of database class and connects to DB
     *
     * if the class has not been instantiated yet, this will also take
     * care of that
     *
     * @static
     * @staticvar DebauchDatabase The only instance of database class
     * @return DebauchDatabase Reference to the only instance of database class
     */
    static function getDatabaseConnection()
    {
        static $instance;
        if (!isset($instance)) {
            if (file_exists($file = dirname(__FILE__) . '/' . DB_DEBAUCH_TYPE . 'database.php')) {
                require_once $file;

                if (!defined('DB_DEBAUCH_PROXY')) {
                    $class = 'Debauch' . ucfirst(DB_DEBAUCH_TYPE) . 'DatabaseSafe';
                } else {
                    $class = 'Debauch' . ucfirst(DB_DEBAUCH_TYPE) . 'DatabaseProxy';
                }

                /* @var $instance DebauchDatabase */
                $instance = new $class();
                $instance->setPrefix(DB_DEBAUCH_PREF);
                if (!$instance->connect()) {
                    trigger_error('notrace:Unable to connect to database', E_USER_ERROR);
                }
            } else {
                trigger_error('notrace:Failed to load database of type: ' . DB_DEBAUCH_TYPE . ' in file: ' . __FILE__ . ' at line ' . __LINE__, E_USER_WARNING);
            }
        }
        return $instance;
    }

    /**
     * Gets a reference to the only instance of database class. Currently
     * only being used within the installer.
     *
     * @static
     * @staticvar DebauchDatabase The only instance of database class
     * @return DebauchDatabase Reference to the only instance of database class
     */
    static function getDatabase()
    {
        static $database;
        if (!isset($database)) {
            if (file_exists($file = dirname(__FILE__) . '/' . DB_DEBAUCH_TYPE . 'database.php')) {
                include_once $file;
                if (!defined('DB_DEBAUCH_PROXY')) {
                    $class = 'Debauch' . ucfirst(DB_DEBAUCH_TYPE) . 'DatabaseSafe';
                } else {
                    $class = 'Debauch' . ucfirst(DB_DEBAUCH_TYPE) . 'DatabaseProxy';
                }
                unset($database);
                $database = new $class();
            } else {
                trigger_error('notrace:Failed to load database of type: ' . DB_DEBAUCH_TYPE . ' in file: ' . __FILE__ . ' at line ' . __LINE__, E_USER_WARNING);
            }
        }
        return $database;
    }
}