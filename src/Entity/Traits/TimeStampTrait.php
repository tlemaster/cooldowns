<?php
/**
 * Created by PhpStorm.
 * User: todd
 * Date: 2/18/18
 */

namespace App\Entity\Traits;

use DateTime;
use Doctrine\DBAL\Types\VarDateTimeType;
use Doctrine\ORM\Mapping as ORM;


trait TimeStampTrait
{
    /**
     * @ORM\Column(name="created", type="datetime", nullable=true)
     *
     * @var DateTime
     */
    protected $created;

    /**
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     *
     * @var DateTime
     */
    protected $updated;

    /**
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param $created
     *
     * @return $this
     */
    public function setCreated(DateTime $created = null)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param $updated
     *
     * @return $this
     */
    public function setUpdated(DateTime $updated = null)
    {
        $this->updated = $updated;

        return $this;
    }
}
