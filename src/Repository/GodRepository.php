<?php
/**
 * File GodRepository.php
 *
 * @package App\Repository
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * God Repository class
 */
class GodRepository extends EntityRepository
{
    /**
     * @param $name
     *
     * @return null|object
     */
    public function findGodByName($name)
    {
        return $this->findOneBy(['name' => $name]);
    }
}
