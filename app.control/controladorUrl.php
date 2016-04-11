<?php
    /**
      * controladorUrl.php
      * Classe de Controle controladorUrl
      *     1.1 Método corrigeUrlAmigavel
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.1
      * @access  public
      */
    class controladorUrl
    {
        /*
         *    Variaveis
         */


        /*
         * Métodos
         */
        /**
         * Método Construtor
         *
         * @access private
         * @return void
         */
        public function __construct()
        {

        }

        /**
          * Método __set
          * Seta o valor da variavel
          * 
          * @access public
          * @param  string  $propriedade    Propriedade a ser definida o valor
          * @param  mixed   $valor          Valor da Propriedade
          * @return void
          */
        public function __set($propriedade, $valor)
        {
            $this->$propriedade = $valor;
        }

        /**
          * Método __get
          * Seta o valor da variavel
          * 
          * @access public
          * @param  string $propriedade    Propriedade a ser retornada
          * @return mixed                   Valor da Propriedade
          */
        public function __get($propriedade)
        {
            return $this->$propriedade;
        }

        /**
         * Método urlAmigavel
         * Transforma a string do parametro para um formato de URL Amigavel
         * 
         * @access  public
         * @param   string $string  String a ser convertida em URL Amigável
         * @return  string          Url Amigavel
         */
        public static function urlAmigavel($string)
        {
            $urlAmigavel    = $string;
            $urlAmigavel    = str_replace("\n",     '',     $urlAmigavel);
            $urlAmigavel    = str_replace(',',      '',     $urlAmigavel);
            $urlAmigavel    = str_replace('-',      '',     $urlAmigavel);
            $urlAmigavel    = str_replace('.',      '-',    $urlAmigavel);
            $urlAmigavel    = str_replace(' ',      '-',    $urlAmigavel);
            $urlAmigavel    = str_replace('--',     '-',    $urlAmigavel);
            $urlAmigavel    = urlencode($urlAmigavel);

            //Tira caracteres Especiaiss
            setlocale(LC_ALL, 'en_US.UTF8');
            $urlAmigavel = iconv('UTF-8',                         'ASCII//TRANSLIT',    $urlAmigavel);
            $urlAmigavel = preg_replace("/[^a-zA-Z0-9\/_%| -]/",  '',                   $urlAmigavel);
            $urlAmigavel = preg_replace("/[\/| -]+/",             '-',                  $urlAmigavel);

            return $urlAmigavel;
        }

        /**
         * Método corrigeUrlAmigavel
         * Corrige a url amigavel para um formato que pode ser entendido
         * 
         * @access  public
         * @param   string $urlAmigavel     URL amigavel
         * @return  string                  Texto corrigido
         * @since   1.1
         */
        public static function corrigeUrlAmigavel($urlAmigavel)
        {
            $string = str_replace('-', ' ', $urlAmigavel);
            $string = str_replace('_', ' - ', $string);


            return $string;
        }
    }
?>