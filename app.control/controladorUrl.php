<?php
    /**
      * controladorUrl.php
      * Classe de Controle controladorUrl
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
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

        public function urlAmigavel($string)
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
    }
?>