<?php
/**
 * File GodUpdate.php
 *
 * @package App\Service
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */

namespace App\Service;

use Exception;
use App\Provider\ApiProvider;
use Psr\Log\LoggerInterface;

/**
 * Service class that updates god db data from HiRezAPI endpoint
 *
 * @package App\Service
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */
class DatabaseUpdateManager
{
    /** @var \Psr\Log\LoggerInterface  */
    private $logger;

    /** @var \App\Provider\ApiProvider  */
    private $apiProvider;

    /** @var \Doctrine\ORM\EntityManager */
    private $entityManager;

    /**
     * DatabaseUpdateManager constructor.
     *
     * @param \Psr\Log\LoggerInterface  $logger
     * @param \App\Provider\ApiProvider $apiProvider
     */
    public function __construct( LoggerInterface $logger, ApiProvider $apiProvider)
    {
        $this->logger = $logger;
        $this->apiProvider = $apiProvider;
    }

    public function updateGods()
    {
        $this->logger->info('Starting Gods Upate');

        $gods = $this->getAllGodsApiData();

        foreach ($gods as $god) {
            $results[] = $this->updateGod($god);
        }

        return $results;
    }

    public function getAllGodsApiData()
    {
        $responseData = $this->apiProvider->requestEndpoint('getgods', [1]);
        $testBreak = '';
    }

    public function updateGod($godData)
    {
        return;
    }
}
