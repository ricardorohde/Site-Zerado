<?php
    /**
      * tbImoveis.php
      * Classe de modelo tbImoveis
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class tbImoveis extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'imoveis';


        /*
         * Colunas (Precisam ser protected)
         */
        /**
          * @access protected
          * @var    int             C�digo
          */
        protected $codigo;
        /**
          * @access protected
          * @var    string          Endere�o do Im�vel
          */
        protected $endereco;
        /**
          * @access protected
          * @var    int             N�mero do Endere�o do Im�vel
          */
        protected $numero;
        /**
          * @access protected
          * @var    string          Bairro do Im�vel
          */
        protected $bairro;
        /**
          * @access protected
          * @var    string          CEP do Im�vel
          */
        protected $cep;

        /**
          * @access protected
          * @var    string          Cidade do Im�vel
          */
        protected $cidade;

        /**
          * @access protected
          * @var    string          Estado do Im�vel
          */
        protected $estado;

        /**
          * @access protected
          * @var    double          Valor do Im�vel
          */
        protected $preco;

        /**
          * @access protected
          * @var    string          Situa��o do Im�vel (Alguel, Venda, Arrendamento)
          */
        protected $situacao;

        /**
          * @access protected
          * @var    string          Categoria do Im�vel (Casa, Apartamento, Terreno)
          */
        protected $categoria;

        /**
          * @access protected
          * @var    string          Categoria do Alguel do Im�vel (0 - Residencial; 1 - Comercial)
          */
        protected $categoriaAluguel;

        /**
          * @access protected
          * @var    boolean         Im�vel em destaque
          */
        protected $destaque;
        /**
          * @access protected
          * @var    string         Descri��o do im�vel
          */
        protected $descricao;
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
         * M�todos
         */
        
    }
?>