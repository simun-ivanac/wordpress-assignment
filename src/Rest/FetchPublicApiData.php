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
	 * @see          https://currentsapi.services/en/docs/latest_news
	 * @param  array $params Array of parameters.
	 * @return array
	 */
	public function getApiData(array $params = [])
	{
		$baseUrl = $this->baseUrl;
		$apiKey = $this->apiKey;
		$limit = $params['limit'] ?? 4;

		if (count($params) > 0) {
			$baseUrl = \esc_url(\add_query_arg($params, $baseUrl));
		}

		$args = [
			'headers' => [
				'Authorization' => $apiKey
			],
		];

		$response = \wp_remote_get($baseUrl, $args);
		$response = \json_decode($response['body'], true);

		// Public API doesn't accepts limit as parameter,
		// so it needs to be sliced manually.
		$response = array_slice($response['news'], 0, $limit);

		return $response;
	}
}
