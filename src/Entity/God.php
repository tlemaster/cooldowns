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
    protected $name;

    /**
     * @ORM\Column(name="attackSpeed", type="decimal", precision=16, scale=2, nullable=true)
     *
     * @var int
     */
    protected $attackSpeed;

    /**
     * @ORM\Column(name="attackSpeedPerLevel", type="decimal", precision=16, scale=2, nullable=true)
     *
     * @var int
     */
    protected $attackSpeedPerLevel;

    /**
     * @ORM\Column(name="hp5PerLevel", type="decimal", precision=16, scale=2, nullable=true)
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
     * @ORM\Column(name="mp5PerLevel", type="decimal", precision=16, scale=2, nullable=true)
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
     * @ORM\Column(name="magicProtectionPerLevel", type="decimal", precision=16, scale=2, nullable=true)
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
     * @ORM\Column(name="magicalPowerPerLevel", type="decimal", precision=16, scale=2, nullable=true)
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
     * @ORM\Column(name="manaPerFive", type="decimal", precision=16, scale=2, nullable=true)
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
     * @ORM\Column(name="physicalPowerPerLevel", type="decimal", precision=16, scale=2, nullable=true)
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
     * @return int
     */
    public function getAttackSpeed()
    {
        return $this->attackSpeed;
    }

    /**
     * @param int $attackSpeed
     *
     * @return $this
     */
    public function setAttackSpeed(int $attackSpeed)
    {
        $this->attackSpeed = $attackSpeed;

        return $this;
    }

    /**
     * @return int
     */
    public function getAttackSpeedPerLevel()
    {
        return $this->attackSpeedPerLevel;
    }

    /**
     * @param int $attackSpeedPerLevel
     *
     * @return $this
     */
    public function setAttackSpeedPerLevel(int $attackSpeedPerLevel)
    {
        $this->attackSpeedPerLevel = $attackSpeedPerLevel;

        return $this;
    }

    /**
     * @return int
     */
    public function getHp5PerLevel()
    {
        return $this->hp5PerLevel;
    }

    /**
     * @param int $hp5PerLevel
     *
     * @return $this
     */
    public function setHp5PerLevel(int $hp5PerLevel)
    {
        $this->hp5PerLevel = $hp5PerLevel;

        return $this;
    }

    /**
     * @return int
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param int $health
     *
     * @return $this
     */
    public function setHealth(int $health)
    {
        $this->health = $health;

        return $this;
    }

    /**
     * @return int
     */
    public function getHealthPerFive()
    {
        return $this->healthPerFive;
    }

    /**
     * @param int $healthPerFive
     *
     * @return $this
     */
    public function setHealthPerFive(int $healthPerFive)
    {
        $this->healthPerFive = $healthPerFive;

        return $this;
    }

    /**
     * @return int
     */
    public function getHealthPerLevel()
    {
        return $this->healthPerLevel;
    }

    /**
     * @param int $healthPerLevel
     *
     * @return $this
     */
    public function setHealthPerLevel(int $healthPerLevel)
    {
        $this->healthPerLevel = $healthPerLevel;

        return $this;
    }

    /**
     * @return int
     */
    public function getMp5PerLevel()
    {
        return $this->mp5PerLevel;
    }

    /**
     * @param int $mp5PerLevel
     *
     * @return $this
     */
    public function setMp5PerLevel(int $mp5PerLevel)
    {
        $this->mp5PerLevel = $mp5PerLevel;

        return $this;
    }

    /**
     * @return int
     */
    public function getMagicProtection()
    {
        return $this->magicProtection;
    }

    /**
     * @param int $magicProtection
     *
     * @return $this
     */
    public function setMagicProtection(int $magicProtection)
    {
        $this->magicProtection = $magicProtection;

        return $this;
    }

    /**
     * @return int
     */
    public function getMagicProtectionPerLevel()
    {
        return $this->magicProtectionPerLevel;
    }

    /**
     * @param int $magicProtectionPerLevel
     *
     * @return $this
     */
    public function setMagicProtectionPerLevel(int $magicProtectionPerLevel)
    {
        $this->magicProtectionPerLevel = $magicProtectionPerLevel;

        return $this;
    }

    /**
     * @return int
     */
    public function getMagicalPower()
    {
        return $this->magicalPower;
    }

    /**
     * @param int $magicalPower
     *
     * @return $this
     */
    public function setMagicalPower(int $magicalPower)
    {
        $this->magicalPower = $magicalPower;

        return $this;
    }

    /**
     * @return int
     */
    public function getMagicalPowerPerLevel()
    {
        return $this->magicalPowerPerLevel;
    }

    /**
     * @param int $magicalPowerPerLevel
     *
     * @return $this
     */
    public function setMagicalPowerPerLevel(int $magicalPowerPerLevel)
    {
        $this->magicalPowerPerLevel = $magicalPowerPerLevel;

        return $this;
    }

    /**
     * @return int
     */
    public function getMana()
    {
        return $this->mana;
    }

    /**
     * @param int $mana
     *
     * @return $this
     */
    public function setMana(int $mana)
    {
        $this->mana = $mana;

        return $this;
    }

    /**
     * @return int
     */
    public function getManaPerFive()
    {
        return $this->manaPerFive;
    }

    /**
     * @param int $manaPerFive
     *
     * @return $this
     */
    public function setManaPerFive(int $manaPerFive)
    {
        $this->manaPerFive = $manaPerFive;

        return $this;
    }

    /**
     * @return string
     */
    public function getPantheon()
    {
        return $this->pantheon;
    }

    /**
     * @param string $pantheon
     *
     * @return $this
     */
    public function setPantheon(string $pantheon)
    {
        $this->pantheon = $pantheon;

        return $this;
    }

    /**
     * @return int
     */
    public function getPhysicalPower()
    {
        return $this->physicalPower;
    }

    /**
     * @param int $physicalPower
     *
     * @return $this
     */
    public function setPhysicalPower(int $physicalPower)
    {
        $this->physicalPower = $physicalPower;

        return $this;
    }

    /**
     * @return int
     */
    public function getPhysicalPowerPerLevel()
    {
        return $this->physicalPowerPerLevel;
    }

    /**
     * @param int $physicalPowerPerLevel
     *
     * @return $this
     */
    public function setPhysicalPowerPerLevel(int $physicalPowerPerLevel)
    {
        $this->physicalPowerPerLevel = $physicalPowerPerLevel;

        return $this;
    }

    /**
     * @return int
     */
    public function getPhysicalProtection()
    {
        return $this->physicalProtection;
    }

    /**
     * @param int $physicalProtection
     *
     * @return $this
     */
    public function setPhysicalProtection(int $physicalProtection)
    {
        $this->physicalProtection = $physicalProtection;

        return $this;
    }

    /**
     * @return int
     */
    public function getPhysicalProtectionPerLevel()
    {
        return $this->physicalProtectionPerLevel;
    }

    /**
     * @param int $physicalProtectionPerLevel
     *
     * @return $this
     */
    public function setPhysicalProtectionPerLevel(int $physicalProtectionPerLevel)
    {
        $this->physicalProtectionPerLevel = $physicalProtectionPerLevel;

        return $this;
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
     *
     * @return $this
     */
    public function setRoles(string $roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return int
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     *
     * @return $this
     */
    public function setSpeed(int $speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getApiId()
    {
        return $this->apiId;
    }

    /**
     * @param int $apiId
     *
     * @return $this
     */
    public function setApiId(int $apiId)
    {
        $this->apiId = $apiId;

        return $this;
    }

    /**
     * @return string
     */
    public function getGodCardUrl()
    {
        return $this->godCardUrl;
    }

    /**
     * @param string $godCardUrl
     *
     * @return $this
     */
    public function setGodCardUrl(string $godCardUrl)
    {
        $this->godCardUrl = $godCardUrl;

        return $this;
    }
}
