<?php

    /**
     * Interface IController
     *
     * Interface for an MVC Controller
     *
     * @author SOLLIER Alexandre
     */
    interface IController
    {
        /**
         * Executes the controller, which will get data from its Model and display it using its View
         * @return void
         */
        public function execute();

        /**
         * Returns the page title associated with this controller
         * @return string The page title
         */
        public function getTitle();
    }

?>