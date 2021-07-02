<?php

/**
 * The class register route for $className endpoint
 *
 * @package Assignment\Rest\Routes
 */

declare(strict_types=1);

namespace Assignment\Rest\Routes;

use Assignment\Config\Config;
use AssignmentVendor\EightshiftLibs\Rest\Routes\AbstractRoute;
use AssignmentVendor\EightshiftLibs\Rest\CallableRouteInterface;

/**
 * Class NewsRouteRoute
 */
class NewsRouteRoute extends AbstractRoute implements CallableRouteInterface
{

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
	 * Get the base url of the route
	 *
	 * @return string The base URL for route you are adding.
	 */
	protected function getRouteName(): string
	{
		return '/news-route';
	}

	/**
	 * Get callback arguments array
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
	 * Method that returns rest response
	 *
	 * @param \WP_REST_Request $request Data got from endpoint url.
	 *
	 * @return \WP_REST_Response|mixed If response generated an error, WP_Error, if response
	 *                                is already an instance, WP_HTTP_Response, otherwise
	 *                                returns a new WP_REST_Response instance.
	 */
	public function routeCallback(\WP_REST_Request $request)
	{
		$response = json_decode($request->get_body(), true);

		return \rest_ensure_response($response);
	}
}
