<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Client\FactFinderNg\Plugin;

use SprykerEco\Client\Search\Plugin\SearchHandlerPluginInterface;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Search\Dependency\Plugin\QueryInterface;

/**
 * @method \SprykerEco\Client\FactFinderNg\FactFinderNgClientInterface getClient()
 */
class FactFinderNgSuggestHandlerPlugin extends AbstractPlugin implements SearchHandlerPluginInterface
{
    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\QueryInterface $searchQuery
     * @param array $resultFormatters
     * @param array $requestParameters
     *
     * @return mixed
     */
    public function handle(QueryInterface $searchQuery, array $resultFormatters = [], array $requestParameters = [])
    {
        return $this->getClient()->suggest($searchQuery, $resultFormatters, $requestParameters);
    }

    /**
     * @param array $requestParameters
     *
     * @return bool
     */
    public function isApplicable(array $requestParameters): bool
    {
        if (isset($requestParameters['suggest']) && $requestParameters['suggest']) {
            return true;
        }

        return false;
    }
}
