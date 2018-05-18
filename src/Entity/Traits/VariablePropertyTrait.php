<?php
/**
 * File VariablePropertyTrait.php
 *
 * @package App\Entity\Traits
 * @author Todd LeMaster <tlemaste@nerdery.com>
 */

namespace App\Entity\Traits;

/**
 * Trait to allow get and set access to Models/Entities
 */
trait VariablePropertyTrait
{
    /**
     * @param $property
     * @param $value
     *
     * @return bool
     */
    public function set($property, $value)
    {
        if (!property_exists($this, $property)) {
            return false;
        }

        $this->$property = $value;
    }

    /**
     * @param $property
     *
     * @return bool
     */
    public function get($property)
    {
        if (!property_exists($this, $property)) {
            return false;
        }

        return $this->$property;
    }
}