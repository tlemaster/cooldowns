<?php
/**
 * Created by PhpStorm.
 * User: todd
 * Date: 2/18/18
 */

namespace App\Entity;

use App\Entity\Traits\IdentityTrait;
use App\Entity\Traits\TimeStampTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class God
 * @package App\Entity
 *
 * @ORM\Table(name="gods")
 * @ORM\Entity(repositoryClass="App\Repository\GodRepository")
 */
class God
{
    use IdentityTrait;
    use TimeStampTrait;

    /**
     * @ORM\Column(name="name", type="string", length=200)
     *
     * @var string
     */
    public $name;

    /**
     * @ORM\Column(name="attackSpeed", type="decimal", precision=16, scale=4, nullable=true)
     *
     * @var int
     */
    public $attackSpeed;

    /**
     * @ORM\Column(name="attackSpeedPerLevel", type="decimal", precision=16, scale=4, nullable=true)
     *
     * @var int
     */
    protected $attackSpeedPerLevel;

    /**
     * @ORM\Column(name="hp5PerLevel", type="decimal", precision=16, scale=4, nullable=true)
     *
     * @var int
     */
    protected $hp5PerLevel;

    /**
     * @ORM\Column(name="health", type="integer", nullable=true)
     *
     * @var int
     */
    protected $health;

    /**
     * @ORM\Column(name="healthPerFive", type="integer", nullable=true)
     *
     * @var int
     */
    protected $healthPerFive;

    /**
     * @ORM\Column(name="healthPerLevel", type="integer", nullable=true)
     *
     * @var int
     */
    protected $healthPerLevel;

    /**
     * @ORM\Column(name="mp5PerLevel", type="decimal", precision=16, scale=4, nullable=true)
     *
     * @var int
     */
    protected $mp5PerLevel;

    /**
     * @ORM\Column(name="magicProtection", type="integer", nullable=true)
     *
     * @var int
     */
    protected $magicProtection;

    /**
     * @ORM\Column(name="magicProtectionPerLevel", type="decimal", precision=16, scale=4, nullable=true)
     *
     * @var int
     */
    protected $magicProtectionPerLevel;

    /**
     * @ORM\Column(name="magicalPower", type="integer", nullable=true)
     *
     * @var int
     */
    protected $magicalPower;

    /**
     * @ORM\Column(name="magicalPowerPerLevel", type="decimal", precision=16, scale=4, nullable=true)
     *
     * @var int
     */
    protected $magicalPowerPerLevel;

    /**
     * @ORM\Column(name="mana", type="integer", nullable=true)
     *
     * @var int
     */
    protected $mana;

    /**
     * @ORM\Column(name="manaPerFive", type="decimal", precision=16, scale=4, nullable=true)
     *
     * @var int
     */
    protected $manaPerFive;

    /**
     * @ORM\Column(name="pantheon", type="string", nullable=true)
     *
     * @var int
     */
    protected $pantheon;

    /**
     * @ORM\Column(name="physicalPower", type="integer", nullable=true)
     *
     * @var int
     */
    protected $physicalPower;

    /**
     * @ORM\Column(name="physicalPowerPerLevel", type="decimal", precision=16, scale=4, nullable=true)
     *
     * @var int
     */
    protected $physicalPowerPerLevel;

    /**
     * @ORM\Column(name="physicalProtection", type="integer", nullable=true)
     *
     * @var int
     */
    protected $physicalProtection;

    /**
     * @ORM\Column(name="physicalProtectionPerLevel", type="integer", nullable=true)
     *
     * @var int
     */
    protected $physicalProtectionPerLevel;

    /**
     * @ORM\Column(name="roles", type="string", length=200, nullable=true)
     *
     * @var string
     */
    protected $roles;

    /**
     * @ORM\Column(name="speed", type="integer", nullable=true)
     *
     * @var int
     */
    protected $speed;

    /**
     * @ORM\Column(name="title", type="string", length=200)
     *
     * @var string
     */
    protected $title;

    /**
     * @ORM\Column(name="type", type="string", length=200)
     *
     * @var string
     */
    protected $type;

    /**
     * @ORM\Column(name="apiId", type="integer", nullable=true)
     *
     * @var int
     */
    protected $apiId;

    /**
     * @ORM\Column(name="godCardUrl", type="string", length=200, nullable=true)
     *
     * @var string
     */
    protected $godCardUrl;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return God
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float
     */
    public function getAttackSpeed(): float
    {
        return $this->attackSpeed;
    }

    /**
     * @param float $attackSpeed
     */
    public function setAttackSpeed(float $attackSpeed): void
    {
        $this->attackSpeed = $attackSpeed;
    }

    /**
     * @return float
     */
    public function getAttackSpeedPerLevel(): float
    {
        return $this->attackSpeedPerLevel;
    }

    /**
     * @param float $attackSpeedPerLevel
     */
    public function setAttackSpeedPerLevel(float $attackSpeedPerLevel): void
    {
        $this->attackSpeedPerLevel = $attackSpeedPerLevel;
    }

    /**
     * @return float
     */
    public function getHp5PerLevel(): float
    {
        return $this->hp5PerLevel;
    }

    /**
     * @param float $hp5PerLevel
     */
    public function setHp5PerLevel(float $hp5PerLevel): void
    {
        $this->hp5PerLevel = $hp5PerLevel;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     */
    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    /**
     * @return int
     */
    public function getHealthPerFive(): int
    {
        return $this->healthPerFive;
    }

    /**
     * @param int $healthPerFive
     */
    public function setHealthPerFive(int $healthPerFive): void
    {
        $this->healthPerFive = $healthPerFive;
    }

    /**
     * @return int
     */
    public function getHealthPerLevel(): int
    {
        return $this->healthPerLevel;
    }

    /**
     * @param int $healthPerLevel
     */
    public function setHealthPerLevel(int $healthPerLevel): void
    {
        $this->healthPerLevel = $healthPerLevel;
    }

    /**
     * @return float
     */
    public function getMp5PerLevel(): float
    {
        return $this->mp5PerLevel;
    }

    /**
     * @param float $mp5PerLevel
     */
    public function setMp5PerLevel(float $mp5PerLevel): void
    {
        $this->mp5PerLevel = $mp5PerLevel;
    }

    /**
     * @return int
     */
    public function getMagicProtection(): int
    {
        return $this->magicProtection;
    }

    /**
     * @param int $magicProtection
     */
    public function setMagicProtection(int $magicProtection): void
    {
        $this->magicProtection = $magicProtection;
    }

    /**
     * @return float
     */
    public function getMagicProtectionPerLevel(): float
    {
        return $this->magicProtectionPerLevel;
    }

    /**
     * @param float $magicProtectionPerLevel
     */
    public function setMagicProtectionPerLevel(float $magicProtectionPerLevel): void
    {
        $this->magicProtectionPerLevel = $magicProtectionPerLevel;
    }

    /**
     * @return int
     */
    public function getMagicalPower(): int
    {
        return $this->magicalPower;
    }

    /**
     * @param int $magicalPower
     */
    public function setMagicalPower(int $magicalPower): void
    {
        $this->magicalPower = $magicalPower;
    }

    /**
     * @return float
     */
    public function getMagicalPowerPerLevel(): float
    {
        return $this->magicalPowerPerLevel;
    }

    /**
     * @param float $magicalPowerPerLevel
     */
    public function setMagicalPowerPerLevel(float $magicalPowerPerLevel): void
    {
        $this->magicalPowerPerLevel = $magicalPowerPerLevel;
    }

    /**
     * @return int
     */
    public function getMana(): int
    {
        return $this->mana;
    }

    /**
     * @param int $mana
     */
    public function setMana(int $mana): void
    {
        $this->mana = $mana;
    }

    /**
     * @return float
     */
    public function getManaPerFive(): float
    {
        return $this->manaPerFive;
    }

    /**
     * @param float $manaPerFive
     */
    public function setManaPerFive(float $manaPerFive): void
    {
        $this->manaPerFive = $manaPerFive;
    }

    /**
     * @return string
     */
    public function getPantheon(): string
    {
        return $this->pantheon;
    }

    /**
     * @param string $pantheon
     */
    public function setPantheon(string $pantheon): void
    {
        $this->pantheon = $pantheon;
    }

    /**
     * @return int
     */
    public function getPhysicalPower(): int
    {
        return $this->physicalPower;
    }

    /**
     * @param int $physicalPower
     */
    public function setPhysicalPower(int $physicalPower): void
    {
        $this->physicalPower = $physicalPower;
    }

    /**
     * @return int
     */
    public function getPhysicalPowerPerLevel(): int
    {
        return $this->physicalPowerPerLevel;
    }

    /**
     * @param int $physicalPowerPerLevel
     */
    public function setPhysicalPowerPerLevel(int $physicalPowerPerLevel): void
    {
        $this->physicalPowerPerLevel = $physicalPowerPerLevel;
    }

    /**
     * @return int
     */
    public function getPhysicalProtection(): int
    {
        return $this->physicalProtection;
    }

    /**
     * @param int $physicalProtection
     */
    public function setPhysicalProtection(int $physicalProtection): void
    {
        $this->physicalProtection = $physicalProtection;
    }

    /**
     * @return int
     */
    public function getPhysicalProtectionPerLevel(): int
    {
        return $this->physicalProtectionPerLevel;
    }

    /**
     * @param int $physicalProtectionPerLevel
     */
    public function setPhysicalProtectionPerLevel(int $physicalProtectionPerLevel): void
    {
        $this->physicalProtectionPerLevel = $physicalProtectionPerLevel;
    }

    /**
     * @return string
     */
    public function getRoles(): string
    {
        return $this->roles;
    }

    /**
     * @param string $roles
     */
    public function setRoles(string $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     */
    public function setSpeed(int $speed): void
    {
        $this->speed = $speed;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getApiId(): int
    {
        return $this->apiId;
    }

    /**
     * @param int $apiId
     */
    public function setApiId(int $apiId): void
    {
        $this->apiId = $apiId;
    }

    /**
     * @return string
     */
    public function getGodCardUrl(): string
    {
        return $this->godCardUrl;
    }

    /**
     * @param string $godCardUrl
     */
    public function setGodCardUrl(string $godCardUrl): void
    {
        $this->godCardUrl = $godCardUrl;
    }

    /**
     * @param string $propertyName
     * @return mixed
     */
    public function getNamedProperty(string $propertyName)
    {
        if (!$this->$propertyName) {
            return false;
        }

        return $this->$propertyName;
    }

    /**
     * @param string $propertyName
     * @param $propertyValue
     * @return bool
     */
    public function setNamedProperty(string $propertyName, $propertyValue)
    {
        if (!$this->$propertyName) {
            return false;
        }

        $this->$propertyName = $propertyValue;

        return $propertyValue;
    }
}
