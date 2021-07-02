<?php

/**
 * The file that is an FetchPublicApiData class.
 *
 * @package Assignment\Rest;
 */

declare(strict_types=1);

namespace Assignment\Rest;

/**
 * FetchPublicApiData class.
 */
class FetchPublicApiData
{
	/**
	 * Private API key used for authentification.
	 *
	 * @var string
	 */
	private $apiKey;

	/**
	 * Base public API url.
	 *
	 * @var string
	 */
	private $baseUrl;

	/**
	 * Construct object.
	 */
	public function __construct()
	{
		$this->baseUrl = API_BASE_URL;
		$this->apiKey = API_KEY;
	}

	/**
	 * Uses parameters from custom REST route to send request and forward
	 * data from to public API.
	 *
	 * @see          https://mediastack.com/documentation
	 * @param  array $params Array of parameters.
	 * @return array
	 */
	public function getApiData(array $params)
	{
		$baseUrl = $this->baseUrl;
		$apiKey = $this->apiKey;

		if (count($params) > 0) {
			$baseUrl .= http_build_query($params);
			$baseUrl .= '&';
		}

		$baseUrl .= 'access_key=' . $apiKey;
		$response = \wp_remote_get($baseUrl);

		return $response;
	}
}
