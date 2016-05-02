<?php
    /**
      * tbEventos.php
      * Classe de modelo tbEventos
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class tbEventos extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'eventos';


        /*
         * Colunas (Precisam ser protected)
         */
        /**
          * @access protected
          * @var    int             Código
          */
        protected $codigo;
        /**
          * @access protected
          * @var    string          Titulo
          */
        protected $titulo;
        /**
          * @access protected
          * @var    string          Descricao
          */
        protected $descricao;
        /**
          * @access protected
          * @var    string          Imagem
          */
        protected $imagem;
        /**
          * @access protected
          * @var    date            Inicio de Evento
          */
        protected $inicio;
        /**
          * @access protected
          * @var    date            Fim do Evento
          */
        protected $fim;
        /**
          * @access protected
          * @var    boolean         Ativo/Inativo
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
    }
?>