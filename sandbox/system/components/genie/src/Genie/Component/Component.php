<?php
/**
 * This file is part of the Platform Genie package.
 * @version     $Id: Component.php 40 2011-02-09 14:10:00Z biyi $
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

use Genie\Component\ComponentInterface;

class Component implements ComponentInterface {

	private static $component = array();

	protected function __construct(){

	}

	public function set($name, $value){
		if (isset($this->component[$name])){
				throw new Exception('Component ' . $name . ' already exists!');
		}
		return $this->component[$name] = $value;
	}

	public function get($name=null){
		if (!isset($this->component[$name])){
			throw new Exception('There is no entry for component ' . $name);
		}
		return $this->component[$name];
	}
}
