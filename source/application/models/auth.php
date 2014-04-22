<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


// -----------------------------------------------------------------------------
// LDAP Auth
// -----------------------------------------------------------------------------

// TODO: Refactor this into a model which includes the LDAP code.
// TODO: Handle errors better and log all sign in attempts.


class Auth extends CI_Model {
    function __construct() {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('Form_validation');
        $this->load->helper('um_ldap');
        $this->load->helper('url');
        $this->load->library('table');
    }

    function index() {
        $this->session->keep_flashdata('tried_to');
        $this->login();
    }

    function login($errorMsg = NULL){

        $this->session->keep_flashdata('tried_to');
        if($this->is_authenticated()) {
            // Already logged in...
            redirect('/courses/');
        } else {

        if(isset($_POST['username'])){

            // Set up rules for form validation
            $rules = $this->form_validation;
            $rules->set_rules('username', 'Username', 'required|alpha_dash');
            $rules->set_rules('password', 'Password', 'required');

            // Do the login...
            if($rules->run() && $ldap_response = @authenticateToUMLDAP(
                    $rules->set_value('username'),
                    $rules->set_value('password'))) {

                session_start();
                $_SESSION['logged_in'] = TRUE;
                $_SESSION['userdata'] = ($ldap_response);
                
                    // Login WIN!
                    if($this->session->flashdata('tried_to')) {
                        redirect($this->session->flashdata('tried_to'));
                    } else {
                        redirect('/courses/');
                    }

                } else {

                    // Login FAIL
                    $this->load->view('header');
                    $this->load->view('auth/login_view', array('login_fail_msg'
                    => "<b>LDAP authentication failed. </b><br />Invalid username or password."));
                }
            } else {
                // Login form
                $this->load->view('header');
                $this->load->view('auth/login_view');
            }
        }
    }

    function logout() {

        session_start();
        if(isset($_SESSION['logged_in'])) {
            if($_SESSION['logged_in']) {

                $data['username'] = $_SESSION['userdata']['user']['username'];
                $data['logged_in'] = TRUE;
                session_destroy();
            }
        } else {
            $data['logged_in'] = FALSE;
        }
            $this->load->view('auth/logout_view', $data);
    }

    function is_authenticated() {
        session_start();
        if(isset($_SESSION['logged_in'])) {
            if($_SESSION['logged_in']) {
                return TRUE;
            }
        }
        return FALSE;
    }
}

?>
