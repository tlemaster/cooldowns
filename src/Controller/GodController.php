<?php
/**
 * File GodController.php
 *
 * @package App\Controller
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\God;

/**
 * @package App\Controller
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 *
 * @Route("/gods")
 */
class GodController extends Controller
{
    /**
     * @Route("/", name="list_all_gods")
     *
     * @return object|\Symfony\Component\HttpFoundation\JsonResponse
     */
    public function listAction()
    {
        $godData = $this->getDoctrine()->getRepository(God::class)->findAll();

        return new JsonResponse($godData);
    }

    /**
     * @Route("/{god}", name="get_single_god")
     *
     * @param string $god
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function detailAction(string $god)
    {
        $godData = $this->getDoctrine()
                        ->getRepository(God::class)
                        ->findGodByName($god);

        return new JsonResponse($godData);
    }
}
