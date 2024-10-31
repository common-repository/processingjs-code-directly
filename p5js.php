<?php
/*
Plugin Name: Processing code directly in your web page | p5js
Plugin URI:
Description: shortcode to highlight syntax and create processingjs canvas
syntax highlighter by lea verou http://prismjs.com/
Version: 1.4.8.1
Author: @benoitWimart 
Author URI: https://twitter.com/BenoitWimart
License: GPL2
*/

/* Registers the script tag in Wordpress */
function add_js_css(){
  wp_enqueue_script('jquery');
  wp_enqueue_script('processing', plugins_url('processing.min.js', __FILE__), false, '1.4.7');
  wp_enqueue_script('prism', plugins_url('prism.js', __FILE__), false, '10');
  wp_enqueue_script('p5js', plugins_url('p5js.js', __FILE__), false, '10');
  wp_enqueue_style( 'style-css', plugins_url('prism.css', __FILE__));
}

add_action( 'wp_enqueue_scripts', 'add_js_css',11);

/* for remove br and p */
remove_filter( 'the_content', 'wpautop' );


add_filter( 'no_texturize_shortcodes', 'shortcodes_to_exempt_from_wptexturize' );

function shortcodes_to_exempt_from_wptexturize($shortcodes){
    $shortcodes[] = 'p5js';
    return $shortcodes;
}

function get_flags($atts) {
    $flags = array();
    if (is_array($atts)) {
        foreach ($atts as $key => $value) {
            if ($value != '' && is_numeric($key)) {
                array_push($flags, $value);
            }
        }
    }
    return $flags;
}

/* Main Code */
function addp5js( $params, $content= "" ) {


global $post;
$id="pjs-".$post->ID;

$content=ltrim($content);

return
  (!in_array('code', get_flags($params))?'':'<p class="bw"><span class="show genericon genericon-show">show code</span></p><pre><code class="language-processingjs">'.htmlentities($content).'</code></pre>').
  (!in_array('canvas', get_flags($params))?'':'<script type="application/processing" data-processing-target="'.$id.'">'.html_entity_decode($content).'</script>'.
	'<canvas class="p5js" id="'.$id.'"> </canvas>');
	}

/* Generating the shortcode */
add_shortcode("p5js", "addp5js");


// Add buttons to html editor
add_action('admin_print_footer_scripts','eg_quicktags');
function eg_quicktags() {
?>
<script type="text/javascript" charset="utf-8">
/* Adding Quicktag buttons to the editor Wordpress ver. 3.3 and above
* - Button HTML ID (required)
* - Button display, value="" attribute (required)
* - Opening Tag (required)
* - Closing Tag (required)
* - Access key, accesskey="" attribute for the button (optional)
* - Title, title="" attribute (optional)
* - Priority/position on bar, 1-9 = first, 11-19 = second, 21-29 = third, etc. (optional)
QTags.addButton( 'eg_paragraph', 'p', '<p>', '</p>', 'p' );
*/
QTags.addButton( 'eg_p5js', 'p5js','[p5js code canvas]', '[/p5js]', '' );
</script>
<?php
}
?>
