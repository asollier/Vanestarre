<?php
    namespace Vanestarre\Controller\User;

    use Exception;
    use Vanestarre\Controller\IController;
    use Vanestarre\Model\AuthDB;

    /**
     * Class UserRegisterController
     *
     * Controller for the treatment of user data
     *
     * @author RADJA Samy
     * @package Vanestarre\Controller\User
     */

    class UserRegisterController implements IController
    {

        /**
         * RegisterController constructor.
         */
        public function __construct() {
        }

        /**
         * @inheritDoc
         * @throws Exception
         */
        public function execute() {
            session_start();
            if (isset($_SESSION['current_user'])) {
                // User is already logged in
                http_response_code(401);
                header('Location: /account');
                return;
            }

            $password = $_POST['mdp'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $algo = PASSWORD_DEFAULT;

            if (filter_var($email, FILTER_VALIDATE_EMAIL) and (strlen($password) <= 20) and (strlen($username) <= 15)) {
                $hashed_password = password_hash($password, $algo);
                $registering = new AuthDB();
                try {
                    $user_id = $registering->add_user($username, $email, $hashed_password);
                    $_SESSION["current_user"] = $user_id;
                } catch (Exception $exception) {
                    header('Location: /login');
                    echo 'Oopsie doopsie, looks like I messed up with your PC #Zut #Cbalo #eeeehSaluatouslézami' . PHP_EOL;
                }
                header('Location: /');
            }

            else {
                header('Location: https://developer.mozilla.org/fr/docs/Web/HTTP/Status/400');
            }

        }

        /**
         * @inheritDoc
         */
        public function get_title(): string {
            return '';
        }

        /**
         * @inheritDoc
         */
        public function get_stylesheets(): array {
            return [];
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
            return false;
        }
    }
?>