<?php
/**
 * File GodUpdate.php
 *
 * @package App\Service
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */

namespace App\Service;

use App\Entity\God;
use App\Provider\ApiProvider;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Psr\Log\LoggerInterface;

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

            $existingDatabaseGod = $this->entityManager
                ->getRepository(God::class)
                ->findOneBy(['name' => $apiGod->Name]);

            if (!$existingDatabaseGod) {
                $results[] = $this->createGod($apiGod);
            } else {
                $results[] = $this->updateGod($existingDatabaseGod, $apiGod);
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
    public function createGod($apiGod)
    {
        $newGod = new God();

        $newGod->setName($apiGod->Name);
        $newGod->setAttackSpeed($apiGod->AttackSpeed);
        $newGod->setAttackSpeedPerLevel($apiGod->AttackSpeedPerLevel);
        $newGod->setHp5PerLevel($apiGod->HP5PerLevel);
        $newGod->setHealth($apiGod->Health);
        $newGod->setHealthPerFive($apiGod->HealthPerFive);
        $newGod->setHealthPerLevel($apiGod->HealthPerLevel);
        $newGod->setMp5PerLevel($apiGod->MP5PerLevel);
        $newGod->setMagicProtection($apiGod->MagicProtection);
        $newGod->setMagicProtectionPerLevel($apiGod->MagicProtectionPerLevel);
        $newGod->setMagicalPower($apiGod->MagicalPower);
        $newGod->setMagicalPowerPerLevel($apiGod->MagicalPowerPerLevel);
        $newGod->setMana($apiGod->Mana);
        $newGod->setManaPerFive($apiGod->ManaPerFive);
        $newGod->setPantheon($apiGod->Pantheon);
        $newGod->setPhysicalPower($apiGod->PhysicalPower);
        $newGod->setPhysicalPowerPerLevel($apiGod->PhysicalPowerPerLevel);
        $newGod->setPhysicalProtection($apiGod->PhysicalProtection);
        $newGod->setPhysicalProtectionPerLevel($apiGod->PhysicalProtectionPerLevel);
        $newGod->setRoles($apiGod->Roles);
        $newGod->setSpeed($apiGod->Speed);
        $newGod->setTitle($apiGod->Title);
        $newGod->setType($apiGod->Type);
        $newGod->setApiId($apiGod->id);
        $newGod->setGodCardUrl($apiGod->godIcon_URL);

        try {
            $this->entityManager->persist($newGod);
        } catch(Exception $exception) {
            $this->logger->error($exception->getMessage());
        }

        $this->logger->info('Created New God in Database: ' . $newGod->getName());

        return "Created New God in Database: " . $newGod->getName();
    }

    /**
     * @param $databaseGod
     * @param $apiGod
     *
     * @return string
     */
    public function updateGod($databaseGod, $apiGod)
    {
        $this->updateGodAttribute('name', $databaseGod, 'Name', $apiGod);

        return "Updated " . $databaseGod->getName();
    }

    public function updateGodAttribute($databaseAttribute, $databaseGod, $apiAttribute, $apiGod)
    {
        $get = 'get' . $databaseAttribute;
        $set = 'set' . $databaseAttribute . '(' . $apiGod->{$apiAttribute} . ')';

        if ($databaseGod->{$get} == $apiGod->{$apiAttribute}) {
            return;
        } else {
            $databaseGod->{$set};
            $this->entityManager->persist($databaseGod);
        }

        return true;
    }

    /**
     * @return mixed
     *
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
}
