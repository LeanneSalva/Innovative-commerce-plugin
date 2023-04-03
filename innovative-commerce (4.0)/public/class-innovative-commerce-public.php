<?php

// Variable to set the USD Bitcoin price
$bitcoin_price_usd = 24432.67;

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://https://github.com/LeanneSalva
 * @since      1.0.0
 *
 * @package    Innovative_Commerce
 * @subpackage Innovative_Commerce/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Innovative_Commerce
 * @subpackage Innovative_Commerce/public
 * @author     Leanne R Salva <lrsg0706@gmail.com>
 */
class Innovative_Commerce_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Innovative_Commerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Innovative_Commerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/innovative-commerce-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Innovative_Commerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Innovative_Commerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/innovative-commerce-public.js', array( 'jquery' ), $this->version, false );
		
	}

	// Action when user logs into admin panel
	public function add_shortcode() {
		add_shortcode('external_data', array($this, 'callback_function_name'));
	}

public function callback_function_name( $atts ) {
	if ( is_admin() ) {
		return '<p>This is where the shortcode [external_data] will show up.</p>';
	}

    $defaults = [
      'title'  => 'Table title'
    ];
      
    $atts = shortcode_atts(
        $defaults,
        $atts,
        'external_data'
    );          

    $url = 'https://jsonplaceholder.typicode.com/users';
    
    $arguments = array(
        'method' => 'GET' 
	);

    $response = wp_remote_get($url, $arguments);

    if (is_wp_error($response) ) {
        $error_message = $response->get_error_message();
        return "Something went wrong: $error_message";
    } 
    
    $results = json_decode( wp_remote_retrieve_body($response) );
        
    $html = '<h2>' . $atts['title'] . '</h2>
		<table>
			<tr>
				<td>1 Bitcoin price (USD): $ 24,432.67 USD/BTC</td>

			</tr>';
    
    foreach( $results as $result ) {
		$html .= '<tr>' ;
		$html .= '<td>'  .  '1 Bitcoin price (USD): $ ' . $bitcoin_price_usd . ' USD/BTC. </td>' ;
		$html .= '</ tr>' ;
    }

    $html .= '</table>' ;

    return $html ;    
}    
}
