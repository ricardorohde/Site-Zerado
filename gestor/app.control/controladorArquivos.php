<?php
    /**
      * controladorArquivos.php
      * Classe de Controle controladorArquivos
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class controladorArquivos
    {
        /*
         *    Variaveis
         */


        /*
         * M�todos
         */
        /**
         * M�todo Construtor
         *
         * @access private
         * @return void
         */
        public function __construct()
        {

        }

        /**
          * M�todo __set
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
          * M�todo __get
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
         * M�todo upload()
         * Faz o upload do arquivo
         * 
         * @access  public
         * @param   string  $origem   Origem do Arquivo (Arquivo Temporario)
         * @param   string  $destino  Destino do Arquivo (nome)
         * @return  boolean           Status da opera��o
         */
        public function upload($origem, $destino)
        {
            if(move_uploaded_file($origem,$destino))
                return true;
            else
                return false;
        }

        /**
         * M�todo apagaArquivo
         * Apaga o arquivo enviado por parametro
         * 
         * @access  public
         * @param   string      $arquivo    Nome do arquivo a ser apagado
         * @return  boolean                 Status da remo��o do arquivo
         */
        public function apagaArquivo($arquivo)
        {
            return unlink('../../app.view/img/'.$arquivo);
        }
    }
?>