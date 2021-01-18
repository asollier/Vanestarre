<?php
    namespace Vanestarre\View;

    /**
     * Class CreateAccountView
     *
     * View for the create account page
     *
     * @author RADJA Samy
     * @package Vanestarre\View
     */
    class CreateAccountView implements IView
    {
        /**
         * @inheritDoc
         */
        public function echo_contents() {
            echo <<<'HTML'
                    <div class="create-account-box">
                        <h1>Créez un compte</h1>        
                                
                        <form action="/RegisterController.php" method="post">
                            <p>Identifiant :</p>
                            <input type="text" name="username" class="input-zone" style="color: black"/><br/>
                                               
                            <p>Email :</p>
                            <input type="text" name="email" class="input-zone" style="color: black"/><br/>
                            
                            <p>Mot de passe :</p>
                            <input type="password" name="mdp" class="input-zone" style="color: black"/><br/>
                            
                            <input type="submit" name="envoie" class="submit-button" value="Créer votre compte">
                        </form>
                        
                    <div/>
            HTML;

        }
    }
?>