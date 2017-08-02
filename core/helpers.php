<?php
/**
+--------------------------------------------------------------------
| File    : helpers.php
| Path    : /wp-content/plugins/stress-shifter/includes/helpers.php
| Purpose : It contains all helper functions required for plugin.
| Created : 25-Oct-2016
| Author  :  Mindfire Solutions.
| Comments :
+--------------------------------------------------------------------
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( ! function_exists( 'dd' ) ) {
	/**
	 * Used for debugging purpose.
	 *
	 * @param Mixed $var - Variable whose value needs to be shown.
	 * @return void
	 */
	function dd( $var ) {
		echo '<pre>';
		print_r( $var );
		wp_die();
	}
}

if ( ! function_exists( 'highlight_max_group' ) ) {

	/**
	 * Highlights group having maximum score.
	 *
	 * @param Array $score_array - Contains all scores.
	 * @param Float $score - Conatins indivisual group score.
	 * @return String - Html.
	 */
	function highlight_max_group( $score_array, $score ) {
		$max = max( $score_array );

		return $max === $score ? 'background-color: red;color:white' : '';
	}
}

if ( ! function_exists( 'element' ) ) {
	/**
	 * Checks element exists or not.
	 *
	 * @param Mixed  $element - Variable that needs to be checked.
	 * @param String $default - Default value of element if not set.
	 * @return Mixed - actual element (set) or string (not set)
	 */
	function element( $element = '', $default = '' ) {
		return isset( $element ) ? $element : $default;
	}
}

if ( ! function_exists( 'validate_date' ) ) {
	/**
	 * Validates  date in string.
	 *
	 * @param String $date  - Date timestamp string
	 * @param String $format - Format of date time stamp.
	 * @return Boolean (true/false)
	 */
	function validate_date( $date, $format = 'Y-m-d H:i:s' ) {
		$d = DateTime::createFromFormat( $format, $date );
		return $d && $d->format( $format ) === $date;
	}
}

if ( ! function_exists( 'get_dynamic_slider_heading_shortcode') ) {
	function get_dynamic_slider_heading_shortcode($heading_content, $prev = true, $next=true) {
		$slider_html = '';

		if ( $prev ) {
			$slider_html .= '<div style="float: left">
								<a href="#" class="stress-profile-prev">
									[x_icon type="chevron-left"
											icon_color="white"
											bg_color=""
											icon_size="50px"
											bg_size=""
											bg_border_radius=""]</a>
							</div>';
		}

		if ( $next ) {
			$slider_html .= '<div style="float: right">
								<a href="#" class="stress-profile-next">
									[x_icon type="chevron-right"
											 icon_color="white"
											 bg_color=""
											 icon_size="50px"
											 bg_size=""
											 bg_border_radius=""]
								</a>
							 </div>';
		}

		$slider_html .= '<div style="background-color : #00AAEA;
				             text-align: center;
							 color: white;
							 width: 100%;
							 height: 120px;
							 padding-top: 10px" class="slide_question">';



		$slider_html .= '[cs_text class="cs-ta-center" style="color:white;"]' .
							$heading_content .
							'[/cs_text]
						</div>';

		return $slider_html;
	}
}
