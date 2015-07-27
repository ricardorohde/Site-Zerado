<?php
    /**
      * tbUsuarios.php
      * Classe de modelo tbUsuarios
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class tbUsuarios extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'usuarios';


        /*
         *  Colunas
         */
        /**
          * @access private
          * @var    int     Código do Usuário
          */
        private $codigo;
        /**
          * @access private
          * @var    string  Nome do usuário
          */
        private $nome;
        /**
          * @access private
          * @var    string  E-mail do usuario
          */
        private $email;
        /**
          * @access private
          * @var    string  Senha do usuário (hash 128 caracteres)
          */
        private $senha;
        /**
          * @access private
          * @var    boolean  Ativo/Inativo
          */
        private $ativo;


        /*
         * Métodos
         */
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
            if($propriedade != 'senha')
                $this->$propriedade = $valor;
            else
                $this->$propriedade = hash('sha512', $valor);
        }

        /**
          * Método __get
          * Seta o valor da variavel
          * 
          * @access public
          * @param  string $propriedade     Propriedade a ser retornada
          * @return mixed                   Valor da Propriedade
          */
        public function __get($propriedade)
        {
            return $this->$propriedade;
        }
    }
?>