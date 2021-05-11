<?php

/**
 * TechDivision\Import\Converter\Customer\Attribute\Listeners\ReduceCustomAttributeOptionValueListener
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Martin Eissenführer <m.eisenfuehrer@techdivision.com>
 * @copyright 2021 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-converter-customer-attribute
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Converter\Customer\Attribute\Listeners;

use TechDivision\Import\Converter\Customer\Attribute\Observers\CustomerToAttributeOptionValueConverterObserver;
use TechDivision\Import\Listeners\ReduceAttributeOptionValueListener;

/**
 * An listener implementation that reduces and sorts the array with the exported attribute option values.
 *
 * @author    Martin Eissenführer <m.eisenfuehrer@techdivision.com>
 * @copyright 2021 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-converter-customer-attribute
 * @link      http://www.techdivision.com
 */
class ReduceCustomAttributeOptionValueListener extends ReduceAttributeOptionValueListener
{
    /**
     * return the artefact name from option values
     *
     * @return string
     */
    public function getArtefactName()
    {
        return CustomerToAttributeOptionValueConverterObserver::ARTEFACT_TYPE;
    }
}
