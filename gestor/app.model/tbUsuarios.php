<?php
    /**
      * tbUsuarios.php
      * Classe de modelo tbUsuarios
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
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
        protected $codigo;
        /**
          * @access private
          * @var    string  Nome do usuário
          */
        protected $nome;
        /**
          * @access private
          * @var    string  E-mail do usuario
          */
        protected $email;
        /**
          * @access private
          * @var    string  Senha do usuário (hash 128 caracteres)
          */
        protected $senha;
        /**
          * @access private
          * @var    boolean  Administrador
          */
        protected $administrador;
        /**
          * @access private
          * @var    boolean  Ativo/Inativo
          */
        protected $ativo;
        /**
          * @access protected
          * @var    boolean         Excluido
          */
        protected $excluido;


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
            if($propriedade == 'senha')
            {
              $this->$propriedade = hash('sha512', $valor);
            }
            else
            {
              if($valor == NULL)
                  $this->$propriedade = '';
              else
                  $this->$propriedade = $valor;
            }
        }
    }
?>