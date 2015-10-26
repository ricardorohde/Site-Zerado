<?php

    /**
      * template.php
      * Classe template
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class template
    {
        /*
         *  Variaveis
         */


        /**
         * Método construtor
         * Verifica se esta logado
         * 
         * @access public
         * @return void
         */
        public function __construct()
        {
            
        }


        /**
         * Método show
         * Exibe as informa?es da p?ina
         * 
         * @access public
         * @return void
         */
        public function show()
        {
        ?>
            <!DOCTYPE HTML>
            <html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
                <head>
                    <?php include_once 'meta.php'; ?>
                    
                    <!--CSS-->
                    <?php include_once 'css/css.php'; ?>    
                    
                    <!--JQuery-->
                    <?php include_once 'js/jsLib.php'; ?>              
                    
                    <!--JavaScript-->
                </head>
                <body>
                        #CONTENT#
                </body>
            </html>

            <script>
                skel.breakpoints({
                        xlarge: "(max-width: 1680px)",
                        large:  "(max-width: 1280px)",
                        medium: "(max-width: 780px)",
                        small:  "(max-width: 650px)",
                        xsmall: "(max-width: 480px)"
                    });
                skel.layout(
                    {
                        reset:          "full",
                        conditionals:   true,
                        grid:           true,
                    });
            </script>
        <?php
        }
    }
?>