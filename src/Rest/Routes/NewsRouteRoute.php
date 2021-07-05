<?php

/**
 * The class register route for $className endpoint
 *
 * @package Assignment\Rest\Routes
 */

declare(strict_types=1);

namespace Assignment\Rest\Routes;

use Assignment\Config\Config;
use Assignment\Rest\FetchPublicApiData;
use AssignmentVendor\EightshiftLibs\Rest\Routes\AbstractRoute;
use AssignmentVendor\EightshiftLibs\Rest\CallableRouteInterface;

/**
 * Class NewsRouteRoute
 */
class NewsRouteRoute extends AbstractRoute implements CallableRouteInterface
{
	/**
	 * Public API object.
	 *
	 * @var FetchPublicApiData
	 */
	private $apiData;

	/**
	 * Construct object.
	 *
	 * @param FetchPublicApiData $apiData Received public API data.
	 */
	public function __construct(FetchPublicApiData $apiData)
	{
		$this->apiData = $apiData;
	}

	/**
	 * Method that returns project Route namespace.
	 *
	 * @return string Project namespace AssignmentVendor\for REST route.
	 */
	protected function getNamespace(): string
	{
		return Config::getProjectRoutesNamespace();
	}

	/**
	 * Method that returns project route version.
	 *
	 * @return string Route version as a string.
	 */
	protected function getVersion(): string
	{
		return Config::getProjectRoutesVersion();
	}

	/**
	 * Get the base url of the route.
	 *
	 * @return string The base URL for route you are adding.
	 */
	protected function getRouteName(): string
	{
		return '/news-route';
	}

	/**
	 * Get callback arguments array.
	 *
	 * @return array Either an array of options for the endpoint, or an array of arrays for multiple methods.
	 */
	protected function getCallbackArguments(): array
	{
		return [
			'methods' => static::READABLE,
			'callback' => [$this, 'routeCallback'],
			'permission_callback' => '__return_true'
		];
	}

	/**
	 * Method that returns rest response.
	 *
	 * @param \WP_REST_Request $request Data got from endpoint url.
	 *
	 * @return \WP_REST_Response|mixed If response generated an error, WP_Error, if response
	 *                                is already an instance, WP_HTTP_Response, otherwise
	 *                                returns a new WP_REST_Response instance.
	 */
	public function routeCallback(\WP_REST_Request $request)
	{
		$params = $this->sanitizeParameters($request->get_params());
		$data = $this->apiData->getApiData($params);

		return \rest_ensure_response($data);
	}

	/**
	 * Sanitize parameters received from request. If parameter is array, perform
	 * recursive call.
	 *
	 * @param  array $params Array of parameters.
	 * @return array
	 */
	private function sanitizeParameters(array $params)
	{
		foreach ($params as $key => $param) {
			if (is_string($param)) {
				$params[$key] = \wp_unslash(\sanitize_text_field($param));
			} elseif (is_array($param)) {
				$params[$key] = $this->sanitizeParameters($param);
			}
		}

		return $params;
	}
}
