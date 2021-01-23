<?php

    namespace Vanestarre\Controller;

    use Vanestarre\View\LoginView;

    /**
     * Class LoginController
     *
     * Controller for the login page
     *
     * @author RADJA Samy
     * @package Vanestarre\Controller
     */
    class LoginController implements IController
    {
        /**
         * @var LoginView View associated with this Controller
         */
        private $view;

        /**
         * AccountController constructor.
         */
        public function __construct() {
            $this->view = new LoginView();
        }

        /**
         * @inheritDoc
         */
        public function execute() {
            if (isset($_SESSION['current_user'])) {
                // User is already logged in
                http_response_code(401);
                header('Location: /account');
                return;
            }

            // Output the View contents
            // TODO: Handle login error
            $this->view->echo_contents();
        }

        /**
         * @inheritDoc
         */
        public function get_title(): string {
            return 'Login';
        }

        /**
         * @inheritDoc
         */
        public function get_stylesheets(): array {
            return ['/styles/login.css'];
        }

        /**
         * @inheritDoc
         */
        public function get_scripts(): array {
            return [];
        }

        /**
         * @inheritDoc
         */
        public function needs_standard_layout(): bool {
            session_start();
            return !isset($_SESSION['current_user']);
        }
    }

?>