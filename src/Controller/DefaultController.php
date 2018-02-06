<?php
/**
 * File DefaultController.php
 *
 * @package App\Controller
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Provider\ApiProvider;


/**
 * @package App\Controller
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */
class DefaultController extends Controller
{
    public function index(ApiProvider $apiProvider)
    {
        $responseData = $apiProvider->requestEndpoint('getgods', [1]);

        return new JsonResponse($responseData);
    }
}
