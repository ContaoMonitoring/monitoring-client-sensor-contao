<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2021 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2017-2021
 * @author     Cliff Parnitzky
 * @package    MonitoringClientSensorContao
 * @license    LGPL
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace Monitoring;

use Contao\CoreBundle\Util\PackageUtil;

/**
 * Class MonitoringClientSensorContao
 *
 * Special sensor for the MonitoringClient to read the Contao data.
 * @copyright  Cliff Parnitzky 2017-2021
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class MonitoringClientSensorContao extends \Backend
{
  /**
   * Constructor
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Get the data from the client.
   */
  public function readData($arrData)
  {
    $arrData['contao.version'] = PackageUtil::getContaoVersion();
    $arrData['contao.maintenanceMode'] = \Config::get('maintenanceMode') ? 'true' : 'false';
    
    return $arrData;
  }
}

?>