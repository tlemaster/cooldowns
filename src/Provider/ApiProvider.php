<?php
/**
 * File ApiProvider.php
 *
 * @package App\Provider
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */

namespace App\Provider;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * Additional functions for csa_guzzle client needed to make HiRez API calls
 *
 * @package App\Provider
 * @author  Todd LeMaster <tlemaste@nerdery.com>
 */
class ApiProvider
{
    /** @var string  */
    private $apiId;

    /** @var string  */
    private $apiKey;

    /** @var string  */
    private $timeStamp;

    /** @var \GuzzleHttp\Client  */
    private $apiClient;

    /** @var string */
    private $session;

    /**
     * ApiProvider constructor.
     *
     * @param $apiId
     * @param $apiKey
     * @param $apiClient
     */
    public function __construct(string $apiId, string $apiKey, Client $apiClient)
    {
        $this->apiId = $apiId;
        $this->apiKey = $apiKey;
        $dateTime = new \DateTime();
        $this->timeStamp = $dateTime->format('YmdHis');
        $this->apiClient = $apiClient;
    }


    public function requestEndpoint(string $endpoint, array $addParameters = [])
    {
        if (!$this->testSession($this->session)) {
            $this->setSession();
        }

        $uri = $this->buildRequestUri($endpoint, $addParameters);
        $response = $this->apiClient->get($uri);

        return json_decode($this->validateResponse($response));
    }

    /**
     * @return string
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @return $this
     */
    public function setSession()
    {
        $signature = $this->buildSignature('createsession');
        $sessionUri = 'createsessionjson/' . $this->apiId . '/' . $signature . '/' . $this->timeStamp;
        $response = json_decode(
            $this->validateResponse($this->apiClient->get($sessionUri))
        );

        $this->session = $response->session_id;

        return $this;
    }

    /**
     * @return bool
     */
    public function testSession()
    {
        if (!$this->session) {
            return false;
        }

        $uri = $this->buildRequestUri('testsession');
        $response = json_decode(
            $this->validateResponse($this->apiClient->get($uri))
        );

        if (!is_string($response)) {
            return false;
        }

        if (strpos($response, 'successful test') == false) {
            return false;
        }

        return true;
    }

    /**
     * @param $endpoint
     *
     * @return string
     */
    public function buildSignature(string $endpoint)
    {
        return md5($this->apiId . $endpoint . $this->apiKey . $this->timeStamp);
    }

    /**
     * @param string $endpoint
     * @param array  $addParameters
     *
     * @return string
     */
    public function buildRequestUri(string $endpoint, Array $addParameters = [])
    {
        $signature = $this->buildSignature($endpoint);
        $uri = $endpoint . 'json/' .
               $this->apiId . '/' .
               $signature . '/' .
               $this->session . '/' .
               $this->timeStamp;

        foreach ($addParameters as $parameter) {
            $uri .= '/' . $parameter;
        }

        return $uri;
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     *
     * @return \GuzzleHttp\Psr7\Stream
     */
    public function validateResponse(Response $response)
    {
        if (!$response || $response->getStatusCode() != 200) {
            //ToDo: throw exception here.
        }

        return $response->getBody();
    }
}
