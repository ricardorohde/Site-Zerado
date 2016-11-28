<?php
    /**
      * tbProdutos.php
      * Classe de modelo tbProdutos
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class tbProdutos extends TRecord
    {
        /*
         * Contantes
         */
        /**
         * @const string TABLENAME Nome da tabela
         */
        const TABLENAME = 'produtos';


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
          * @var    string          Nome
          */
        protected $nome;
         /**
          * @access protected
          * @var    string          Descrição
          */
        protected $descricao;
         /**
          * @access protected
          * @var    double          Valor
          */
        protected $valor;
         /**
          * @access protected
          * @var    int             Peso
          */
        protected $peso;
        /**
          * @access private
          * @var    int             Categoria do Produto
          */
        protected $categoria;
        /**
          * @access private
          * @var    int             Subcategoria do Produto
          */
        protected $subCategoria;
        /**
          * @access private
          * @var    string          Link do video
          */
        protected $video;
        /**
          * @access private
          * @var    string          Imagem do Video
          */
        protected $imagemVideo;
         /**
          * @access protected
          * @var    int           Estoque
          */
        protected $estoque;
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
            if($propriedade == 'categoria')
            {
                $categoria = new tbCategoriaProdutos;
                $categoria = $categoria->load($this->$propriedade);
                return $categoria->categoria;
            }

            if($propriedade == 'subCategoria')
            {
                $subcategoria = new tbSubCategoriaProdutos;
                $subcategoria = $subcategoria->load($this->$propriedade);
                return $subcategoria->subCategoria;
            }

            return $this->$propriedade;
        }
    }
?>