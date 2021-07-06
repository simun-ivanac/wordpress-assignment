<?php

/**
 * Template for the Latest Posts view.
 *
 * @package Assignment
 */

use Assignment\Rest\FetchPublicApiData;
use AssignmentVendor\EightshiftLibs\Helpers\Components;

$manifest = Components::getManifest(__DIR__);

$blockClass = Components::checkAttr('blockClass', $attributes, $manifest);
$serverSideRender = Components::checkAttr('serverSideRender', $attributes, $manifest);

$apiData = new FetchPublicApiData();
$apiData = $api->getApiData();
$apiData = \json_decode($apiData);

?>

<<div class="<?php echo \esc_attr($blockClass); ?>">
	<?php echo \wp_kses_post($content); ?>
</>
