<?php

    namespace Vanestarre\Controller;

    use Vanestarre\Model\Message;
    use Vanestarre\Model\MessageReactions;
    use Vanestarre\View\HomeView;

    /**
     * Class HomeController
     *
     * Controller for the home page (website index)
     *
     * @author SOLLIER Alexandre
     * @package Vanestarre\Controller
     */
    class HomeController implements IController
    {
        /**
         * @var HomeView View associated with this Controller
         */
        private $view;

        /**
         * AccountController constructor.
         */
        public function __construct() {
            $this->view = new HomeView();
        }

        /**
         * @inheritDoc
         */
        public function execute() {
            // Set page data
            // TODO: Get the real page count
            $this->view->set_page_count(5);

            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                // We got a page number in the request, check it and set it if it's good
                $page = intval($_GET['page']);
                if ($page >= 1 && $page <= $this->view->get_page_count()) {
                    $this->view->set_current_page($page);
                }
            }

            // Add the messages to the View
            $testReactions = new MessageReactions();
            $testReactions->set_love_reaction(69);
            $testReactions->set_cute_reaction(42);
            $testReactions->set_style_reaction(1337);
            $testReactions->set_swag_reaction(420);
            $testReactions->set_love_reacted(true);
            $testReactions->set_cute_reacted(true);
            $testReactions->set_style_reacted(true);
            $testReactions->set_swag_reacted(true);

            $this->view->add_message(new Message(1, 'eske vou konéssé βtwitchprim xDDDDDDDD βxptdr', 10, $testReactions, 'https://materializecss.com/images/sample-1.jpg'));
            $this->view->add_message(new Message(0, 'yo lé besta g lancé le rézo cmt ça va xoxoxo', 0, new MessageReactions()));

            // Output the View contents
            $this->view->echo_contents();
        }

        /**
         * @inheritDoc
         */
        public function get_title(): string {
            return 'Accueil';
        }

        /**
         * @inheritDoc
         */
        public function get_stylesheets(): array {
            return ['/styles/home.css'];
        }

        /**
         * @inheritDoc
         */
        public function get_scripts(): array {
            return ['/scripts/home.js'];
        }

        /**
         * @inheritDoc
         */
        public function needs_standard_layout(): bool {
            return true;
        }
    }

?>