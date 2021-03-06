<?php

/**
 * TechDivision\Import\Converter\Customer\Attribute\Listeners\ReduceAttributeOptionValueListener
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-converter-customer-attribute
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Converter\Customer\Attribute\Listeners;

use League\Event\EventInterface;
use League\Event\AbstractListener;
use TechDivision\Import\Utils\CacheKeys;
use TechDivision\Import\Services\RegistryProcessorInterface;

/**
 * An listener implementation that reduces and sorts the array with the exported attribute option values.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-converter-customer-attribute
 * @link      http://www.techdivision.com
 */
class ReduceAttributeOptionValueListener extends AbstractListener
{

    /**
     * The registry processor instance.
     *
     * @var \TechDivision\Import\Services\RegistryProcessorInterface
     */
    protected $registryProcessor;

    /**
     * Initializes the listener with the registry processor instance.
     *
     * @param \TechDivision\Import\Services\RegistryProcessorInterface $registryProcessor The processor instance
     */
    public function __construct(RegistryProcessorInterface $registryProcessor)
    {
        $this->registryProcessor = $registryProcessor;
    }

    /**
     * Handle the event.
     *
     * @param \League\Event\EventInterface $event The event that triggered the listener
     *
     * @return void
     */
    public function handle(EventInterface $event)
    {

        // try to load the availalbe artefacts from the registry processor
        if ($artefacts = $this->registryProcessor->getAttribute(CacheKeys::ARTEFACTS)) {
            // query whether or not categories are available
            if (isset($artefacts[ProductToAttributeOptionValueConverterObserver::ARTEFACT_TYPE])) {
                // initialize the array for the sorted und merged categories
                $toExport = array();

                // load the categories from the artefacts
                $arts = $artefacts[ProductToAttributeOptionValueConverterObserver::ARTEFACT_TYPE];
                // iterate over the categories
                foreach ($arts as $attributeOptionValues) {
                    foreach ($attributeOptionValues as $attributeOptionValue) {
                        // Generate unique key for artefact to avoid duplicates
                        $attributeCode = md5(\json_encode($attributeOptionValue));
                        // query whether or not the attribute code has already been processed
                        if (isset($toExport[$attributeCode])) {
                            continue;
                        }

                        // if not, add it to the array
                        $toExport[$attributeCode] = $attributeOptionValue;
                    }
                }

                // replace them in the array with the artefacts
                $artefacts[ProductToAttributeOptionValueConverterObserver::ARTEFACT_TYPE] = array($toExport);
                // override the old artefacts
                $this->registryProcessor->setAttribute(CacheKeys::ARTEFACTS, $artefacts, array(), array(), true);
            }
        }
    }
}
