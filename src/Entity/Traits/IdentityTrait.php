<?php
/**
 * Created by PhpStorm.
 * User: todd
 * Date: 2/18/18
 */

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;


trait IdentityTrait
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     *
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
