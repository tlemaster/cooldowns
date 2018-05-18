<?php
/**
 * File GodUpdate.php
 *
 * @package App\Service
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */

namespace App\Service;

use App\Entity\God;
use App\Model\ApiGod;
use App\Provider\ApiProvider;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Psr\Log\LoggerInterface;
use stdClass;

/**
 * Service class that updates god db data from HiRezAPI endpoint
 *
 * @package App\Service
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */
class DatabaseUpdateManager
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var ApiProvider
     */
    private $apiProvider;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var array
     */
    private $updateActions = [];


    /**
     * DatabaseUpdateManager constructor.
     *
     * @param LoggerInterface $logger
     * @param ApiProvider $apiProvider
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        LoggerInterface $logger,
        ApiProvider $apiProvider,
        EntityManagerInterface $entityManager
    )
    {
        $this->logger = $logger;
        $this->apiProvider = $apiProvider;
        $this->entityManager = $entityManager;
    }

    /**
     * @return array
     *
     * @throws Exception
     */
    public function updateGods()
    {
        $this->logger->info('Gods Update Started');

        $apiGods = $this->getAllGodsApiData();

        foreach ($apiGods as $apiGod) {
            if (!$apiGod) {
                continue;
            }

            $apiGodModel = new ApiGod($apiGod);

            $existingDatabaseGod = $this->entityManager
                ->getRepository(God::class)
                ->findOneBy(['name' => $apiGod->Name]);

            if (!$existingDatabaseGod) {
                $results[] = $this->createGod($apiGodModel);
            } else {
                $results[] = $this->updateGod($existingDatabaseGod, $apiGodModel);
            }
        }

        if (empty($results)) {
            $this->logger->info('No Gods Were Updated');
            return ["No Gods Were Updated"];
        }

        $this->entityManager->flush();

        $this->logger->info('Gods Update completed');

        return $results;
    }


    /**
     * @param $apiGod
     *
     * @return string
     */
    public function createGod(ApiGod $apiGod)
    {
        $newGod = new God();

        $newGod->setName($apiGod->getName());
        $newGod->setUltimateCooldown($apiGod->getUltimateCooldown());
        $newGod->setAttackSpeed($apiGod->getAttackSpeed());
        $newGod->setAttackSpeedPerLevel($apiGod->getAttackSpeedPerLevel());
        $newGod->setHp5PerLevel($apiGod->getHp5PerLevel());
        $newGod->setHealth($apiGod->getHealth());
        $newGod->setHealthPerFive($apiGod->getHealthPerFive());
        $newGod->setHealthPerLevel($apiGod->getHealthPerLevel());
        $newGod->setMp5PerLevel($apiGod->getMp5PerLevel());
        $newGod->setMagicProtection($apiGod->getMagicProtection());
        $newGod->setMagicProtectionPerLevel($apiGod->getMagicProtectionPerLevel());
        $newGod->setMagicalPower($apiGod->getMagicalPower());
        $newGod->setMagicalPowerPerLevel($apiGod->getMagicalPowerPerLevel());
        $newGod->setMana($apiGod->getMana());
        $newGod->setManaPerFive($apiGod->getManaPerFive());
        $newGod->setPantheon($apiGod->getPantheon());
        $newGod->setPhysicalPower($apiGod->getPhysicalPower());
        $newGod->setPhysicalPowerPerLevel($apiGod->getPhysicalPowerPerLevel());
        $newGod->setPhysicalProtection($apiGod->getPhysicalProtection());
        $newGod->setPhysicalProtectionPerLevel($apiGod->getPhysicalProtectionPerLevel());
        $newGod->setRoles($apiGod->getRoles());
        $newGod->setSpeed($apiGod->getSpeed());
        $newGod->setTitle($apiGod->getTitle());
        $newGod->setType($apiGod->getType());
        $newGod->setApiId($apiGod->getApiId());
        $newGod->setGodCardUrl($apiGod->getGodCardUrl());

        try {
            $this->entityManager->persist($newGod);
        } catch(Exception $exception) {
            $this->logger->error($exception->getMessage());
        }

        $this->logger->info('Created New God in Database: ' . $newGod->getName());

        return "Created New God in Database: " . $newGod->getName();
    }


    /**
     * @param God $databaseGod
     * @param $apiGod $apiGod
     * @return array
     */
    public function updateGod(God $databaseGod, ApiGod $apiGod)
    {
        $this->updateGodField($databaseGod, $apiGod, 'name');
        $this->updateGodField($databaseGod, $apiGod, 'ultimateCooldown');
        $this->updateGodField($databaseGod, $apiGod, 'attackSpeed');
        $this->updateGodField($databaseGod, $apiGod, 'attackSpeedPerLevel');
        $this->updateGodField($databaseGod, $apiGod, 'hp5PerLevel');
        $this->updateGodField($databaseGod, $apiGod, 'health');
        $this->updateGodField($databaseGod, $apiGod, 'healthPerFive');
        $this->updateGodField($databaseGod, $apiGod, 'healthPerLevel');
        $this->updateGodField($databaseGod, $apiGod, 'mp5PerLevel');
        $this->updateGodField($databaseGod, $apiGod, 'magicProtection');
        $this->updateGodField($databaseGod, $apiGod, 'magicProtectionPerLevel');
        $this->updateGodField($databaseGod, $apiGod, 'magicalPower');
        $this->updateGodField($databaseGod, $apiGod, 'magicalPowerPerLevel');
        $this->updateGodField($databaseGod, $apiGod, 'mana');
        $this->updateGodField($databaseGod, $apiGod, 'manaPerFive');
        $this->updateGodField($databaseGod, $apiGod, 'pantheon');
        $this->updateGodField($databaseGod, $apiGod, 'physicalPower');
        $this->updateGodField($databaseGod, $apiGod, 'physicalPowerPerLevel');
        $this->updateGodField($databaseGod, $apiGod, 'physicalProtection');
        $this->updateGodField($databaseGod, $apiGod, 'physicalProtectionPerLevel');
        $this->updateGodField($databaseGod, $apiGod, 'roles');
        $this->updateGodField($databaseGod, $apiGod, 'speed');
        $this->updateGodField($databaseGod, $apiGod, 'title');
        $this->updateGodField($databaseGod, $apiGod, 'type');
        $this->updateGodField($databaseGod, $apiGod, 'apiId');
        $this->updateGodField($databaseGod, $apiGod, 'godCardUrl');

        return $this->updateActions;
    }

    /**
     * @param God $databaseGod
     * @param ApiGod $apiGod
     * @param $property
     */
    private function updateGodField(God $databaseGod, ApiGod $apiGod, $property)
    {
        if (
            !($dbGodValue = $databaseGod->get($property)) ||
            !($apiGodValue = $apiGod->get($property))
        ) {
            return;
        }

        if ($apiGodValue == $dbGodValue) {
            return;
        }

        $databaseGod->set($property, $apiGodValue);

        $this->entityManager->persist($databaseGod);

        $this->logger->info('Updated ' . $property  . ' field on ' . $databaseGod->getName());
        $this->updateActions[] = 'Updated ' . $property . ' field on ' . $databaseGod->getName();
    }


    /**
     * @return array
     * @throws Exception
     */
    public function getAllGodsApiData()
    {
        $responseData = $this->apiProvider->requestEndpoint('getgods', [1]);

        if (!$responseData) {
            throw new Exception('GetGods API endpoint error');
        }

        return $responseData;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function getAllItemsApiData()
    {
        $responseData = $this->apiProvider->requestEndpoint('getitems', [1]);

        if (!$responseData) {
            throw new Exception('GetItems API endpoint error');
        }

        return $responseData;
    }
}
