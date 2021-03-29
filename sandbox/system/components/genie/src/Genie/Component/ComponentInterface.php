<?php
/**
 * This file is part of the Platform Genie package.
 * @version     $Id: ComponentInterface.php 40 2011-02-09 14:10:00Z biyi $
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

namespace Genie\Component;

/**
 * ComponentInterface.
 *
 * @author The Platform Authors <platform@entilda.com>
 *
 * @api
 */
interface ComponentInterface
{
    /**
     * Sets the component.
     *
     * @return void
     *
     * @api
     */
    public function set($component);

    /**
     * Gets the componet.
     *
     * @return array A component
     *
     * @api
     */
    public function get();

    /**
     * Gets all components
     *
     * If $component is null, it returns all components.
     *
     * @param string $component The component name
     *
     * @return array An array of components
     *
     * @api
     */
    public function all();

}