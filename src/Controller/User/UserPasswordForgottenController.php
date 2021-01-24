<?php
    namespace Vanestarre\Controller;

    use Vanestarre\View\UserPasswordForgottenView;

    /**
     * Class UserPasswordForgottenController
     *
     * Controller for the confirmation of the password sent to reset the previous forgotten one
     *
     * @author RADJA Samy
     * @package Vanestarre\Controller
     */
    class UserPasswordForgottenController implements IController
    {
        /**
         * @var UserPasswordForgottenView View associated with this controller
         */
        private $view;

        /**
         * UserPasswordForgottenController constructor.
         */
        public function __construct() {
            $this->view = new UserPasswordForgottenView();
        }

        /**
         * @inheritDoc
         */
        public function execute() {
            // Output the view contents
            $this->view->echo_contents();
        }

        /**
         * @inheritDoc
         */
        public function get_title(): string {
            return 'Mail sent!';
        }

        /**
         * @inheritDoc
         */
        public function get_stylesheets(): array {
            return ['/styles/password_forgotten.css'];
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
            return true;
        }
    }
?>