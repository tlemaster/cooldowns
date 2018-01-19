<?php
/**
 * File DefaultController.php
 *
 * @package App\Controller
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;


/**
 * @package App\Controller
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */
class DefaultController
{
    public function index()
    {
        return new Response('Testing: This is the home page for now');
    }
}
