<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // load library
        $this->load->library('nexmo');
        // set response format: xml or json, default json
        $this->nexmo->set_format('json');

        // **********************************Text Message*************************************
        $from = 'xxxxxxxx';
        $to = 'xxxxxxx';
        $message = array(
            'text' => 'test message'
        );
        $response = $this->nexmo->send_message($from, $to, $message);
        echo "<h1>Text Message</h1>";
        $this->nexmo->d_print($response);
        echo "<h3>Response Code: " . $this->nexmo->get_http_status() . "</h3>";
   
    }
}
/* End of file example.php */
/* Location: ./application/controllers/example.php */
