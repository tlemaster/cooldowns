<?php
/**
 * File DefaultController.php
 *
 * @package App\Controller
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Provider\ApiProvider;


/**
 * @package App\Controller
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */
class DefaultController extends Controller
{

    /**
     * @Route("/", name="home_page")
     *
     * @param \App\Provider\ApiProvider $apiProvider
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index(ApiProvider $apiProvider)
    {
        $responseData = $apiProvider->requestEndpoint('getgods', [1]);

        return new JsonResponse($responseData);
    }

    /**
     * @Route("/please-work", name="test_page")
     *
     * @param \App\Provider\ApiProvider $apiProvider
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function test(ApiProvider $apiProvider)
    {
        return new Response('testing again');
    }
}
