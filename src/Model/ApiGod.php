<?php
/**
 * File ApiGod.php
 *
 * @package App\Model
 * @author Todd LeMaster <tlemaste@nerdery.com>
 */

namespace App\Model;

use App\Entity\Traits\VariablePropertyTrait;
use stdClass;

/**
 * Data transfer model for god data from api
 */
class ApiGod
{
    use VariablePropertyTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $ultimateCooldown;

    /**
     * @var float
     */
    protected $attackSpeed;

    /**
     * @var float
     */
    protected $attackSpeedPerLevel;

    /**
     * @var float
     */
    protected $hp5PerLevel;

    /**
     * @var int
     */
    protected $health;

    /**
     * @var int
     */
    protected $healthPerFive;

    /**
     * @var int
     */
    protected $healthPerLevel;

    /**
     * @var float
     */
    protected $mp5PerLevel;

    /**
     * @var int
     */
    protected $magicProtection;

    /**
     * @var float
     */
    protected $magicProtectionPerLevel;

    /**
     * @var int
     */
    protected $magicalPower;

    /**
     * @var float
     */
    protected $magicalPowerPerLevel;

    /**
     * @var int
     */
    protected $mana;

    /**
     * @var float
     */
    protected $manaPerFive;

    /**
     * @var int
     */
    protected $manaPerLevel;

    /**
     * @var string
     */
    protected $pantheon;

    /**
     * @var int
     */
    protected $physicalPower;

    /**
     * @var float
     */
    protected $physicalPowerPerLevel;

    /**
     * @var int
     */
    protected $physicalProtection;

    /**
     * @var float
     */
    protected $physicalProtectionPerLevel;

    /**
     * @var string
     */
    protected $roles;

    /**
     * @var int
     */
    protected $speed;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var int
     */
    protected $apiId;

    /**
     * @var string
     */
    protected $godCardUrl;

    /**
     * ApiGod constructor.
     *
     * @param stdClass $apiGod
     */
    public function __construct(stdClass &$apiGod)
    {
        $this->name = $apiGod->Name;
        $this->setUltimateCooldown($apiGod->Ability_4);
        $this->attackSpeed = $apiGod->AttackSpeed;
        $this->attackSpeedPerLevel =  $apiGod->AttackSpeedPerLevel;
        $this->hp5PerLevel = $apiGod->HP5PerLevel;
        $this->health = $apiGod->Health;
        $this->healthPerFive = $apiGod->HealthPerFive;
        $this->healthPerLevel = $apiGod->HealthPerLevel;
        $this->mp5PerLevel = $apiGod->MP5PerLevel;
        $this->magicProtection = $apiGod->MagicProtection;
        $this->magicProtectionPerLevel = $apiGod->MagicProtectionPerLevel;
        $this->magicalPower = $apiGod->MagicalPower;
        $this->magicalPowerPerLevel = $apiGod->MagicalPowerPerLevel;
        $this->mana = $apiGod->Mana;
        $this->manaPerFive = $apiGod->ManaPerFive;
        $this->manaPerLevel = $apiGod->ManaPerLevel;
        $this->pantheon = $apiGod->Pantheon;
        $this->physicalPower = $apiGod->PhysicalPower;
        $this->physicalPowerPerLevel = $apiGod->PhysicalPowerPerLevel;
        $this->physicalProtection = $apiGod->PhysicalProtection;
        $this->physicalProtectionPerLevel = $apiGod->PhysicalProtectionPerLevel;
        $this->roles = $apiGod->Roles;
        $this->speed = $apiGod->Speed;
        $this->title = $apiGod->Title;
        $this->type = $apiGod->Type;
        $this->apiId = $apiGod->id;
        $this->godCardUrl = $apiGod->godIcon_URL;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUltimateCooldown(): string
    {
        return $this->ultimateCooldown;
    }

    /**
     * @param stdClass $ability
     */
    public function setUltimateCooldown(stdClass $ability): void
    {
        $this->ultimateCooldown = $ability->Description->itemDescription->cooldown;
    }

    /**
     * @return float
     */
    public function getAttackSpeed(): float
    {
        return $this->attackSpeed;
    }

    /**
     * @return float
     */
    public function getAttackSpeedPerLevel(): float
    {
        return $this->attackSpeedPerLevel;
    }

    /**
     * @return float
     */
    public function getHp5PerLevel(): float
    {
        return $this->hp5PerLevel;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @return int
     */
    public function getHealthPerFive(): int
    {
        return $this->healthPerFive;
    }

    /**
     * @return int
     */
    public function getHealthPerLevel(): int
    {
        return $this->healthPerLevel;
    }

    /**
     * @return float
     */
    public function getMp5PerLevel(): float
    {
        return $this->mp5PerLevel;
    }

    /**
     * @return int
     */
    public function getMagicProtection(): int
    {
        return $this->magicProtection;
    }

    /**
     * @return float
     */
    public function getMagicProtectionPerLevel(): float
    {
        return $this->magicProtectionPerLevel;
    }

    /**
     * @return int
     */
    public function getMagicalPower(): int
    {
        return $this->magicalPower;
    }

    /**
     * @return float
     */
    public function getMagicalPowerPerLevel(): float
    {
        return $this->magicalPowerPerLevel;
    }

    /**
     * @return int
     */
    public function getMana(): int
    {
        return $this->mana;
    }

    /**
     * @return float
     */
    public function getManaPerFive(): float
    {
        return $this->manaPerFive;
    }

    /**
     * @return int
     */
    public function getManaPerLevel(): int
    {
        return $this->manaPerLevel;
    }

    /**
     * @return string
     */
    public function getPantheon(): string
    {
        return $this->pantheon;
    }

    /**
     * @return int
     */
    public function getPhysicalPower(): int
    {
        return $this->physicalPower;
    }

    /**
     * @return float
     */
    public function getPhysicalPowerPerLevel(): float
    {
        return $this->physicalPowerPerLevel;
    }

    /**
     * @return int
     */
    public function getPhysicalProtection(): int
    {
        return $this->physicalProtection;
    }

    /**
     * @return float
     */
    public function getPhysicalProtectionPerLevel(): float
    {
        return $this->physicalProtectionPerLevel;
    }

    /**
     * @return string
     */
    public function getRoles(): string
    {
        return $this->roles;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getApiId(): int
    {
        return $this->apiId;
    }

    /**
     * @return string
     */
    public function getGodCardUrl(): string
    {
        return $this->godCardUrl;
    }
}
