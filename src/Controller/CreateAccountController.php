<?php

    namespace Vanestarre\Controller;

    use Vanestarre\View\CreateAccountView;

    /**
     * Class CreateAccountController
     *
     * Controller for the create account page
     *
     * @author RADJA Samy
     * @package Vanestarre\Controller
     */
    class CreateAccountController implements IController
    {
        /**
         * @var CreateAccountView View associated with this Controller
         */
        private $view;

        /**
         * CreateAccountController constructor.
         */
        public function __construct() {
            $this->view = new CreateAccountView();
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
            // TODO: Handle errors
            $this->view->echo_contents();
        }

        /**
         * @inheritDoc
         */
        public function get_title(): string {
            return 'Create account';
        }

        /**
         * @inheritDoc
         */
        public function get_stylesheets(): array {
            return ['/styles/create_account.css'];
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