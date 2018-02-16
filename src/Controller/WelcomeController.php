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
class WelcomeController extends Controller
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

        return $this->render(
            'welcome/welcome_index.html.twig',
            ['gods' => $responseData]
        );
    }
}
