<?php
/**
 * This file is part of the Platform Genie package.
 * @version     $Id: LoggerInterface.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    Class
 * @author      Biyi Akinpelu
 * @link        mailto:biyi@entilda.com
 * @copyright   Copyright (C) 2011 The Platform Project. All rights reserved.
 * @license     GNU/GPL, see LICENSE.php
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

namespace Genie\logger;

/**
 * LoggerInterface.
 *
 * @author The Platform Authors <platform@entilda.com>
 *
 * @api
 */
interface LoggerInterface
{
    /**
     * Sets the logger.
     *
     * @return void
     *
     * @api
     */
    public function set($logger);

    /**
     * Gets the logger.
     *
     * @return array A logger
     *
     * @api
     */
    public function get();

    /**
     * Gets all loggers
     *
     * If $logger is null, it returns all loggers.
     *
     * @param string $logger The logger name
     *
     * @return array An array of loggers
     *
     * @api
     */
    public function all();

}