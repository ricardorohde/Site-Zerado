<?php
    /**
      * tbImoveis.php
      * Classe de modelo tbImoveis
      *     1.1 -   Remoção de metragem Terrno
      *             Adição de: 
      *                 codigoInterno, 
      *                 metragemFrente, 
      *                 metragemFundos,
      *                 metragemEsquerda,
      *                 metragemDireita,
      *                 metragemConstrucao,
      *                 proprietario,
      *                 telefoneProprietario,
      *                 corretor (foreign key para usuarios),
      *                 quartos
      *
      * @author  Rogério Eduardo Pereira <rogerio@domynio.com.br>
      * @version 1.1
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
          * @var    int             Código
          */
        protected $codigo;
        /**
          * @access protected
          * @var    string          Código Interno
          */
        protected $codigoInterno;
        /**
          * @access protected
          * @var    string          Endereço do Imóvel
          */
        protected $endereco;
        /**
          * @access protected
          * @var    int             Número do Endereço do Imóvel
          */
        protected $numero;
        /**
          * @access protected
          * @var    string          Complemento do Endereço
          */
        protected $complemento;
        /**
          * @access protected
          * @var    string          Bairro do Imóvel
          */
        protected $bairro;
        /**
          * @access protected
          * @var    string          CEP do Imóvel
          */
        protected $cep;

        /**
          * @access protected
          * @var    string          Cidade do Imóvel
          */
        protected $cidade;

        /**
          * @access protected
          * @var    string          Estado do Imóvel
          */
        protected $estado;

        /**
          * @access protected
          * @var    double          Valor do Imóvel
          */
        protected $preco;

        /**
          * @access protected
          * @var    string          Situação do Imóvel (Alguel, Venda, Arrendamento)
          */
        protected $situacao;

        /**
          * @access protected
          * @var    string          Categoria do Imóvel (Casa, Apartamento, Terreno)
          */
        protected $categoria;

        /**
          * @access protected
          * @var    string          Categoria do Alguel do Imóvel (0 - Residencial; 1 - Comercial)
          */
        protected $categoriaAluguel;

        /**
          * @access protected
          * @var    boolean         Imóvel em destaque
          */
        protected $destaque;
        /**
          * @access protected
          * @var    double          Metragem do Terreno
          */
        protected $metragemFrente;
        /**
          * @access protected
          * @var    double          Metragem do Terreno
          */
        protected $metragemFundos;
        /**
          * @access protected
          * @var    double          Metragem do Terreno
          */
        protected $metragemEsquerda;
        /**
          * @access protected
          * @var    double          Metragem do Terreno
          */
        protected $metragemDireita;
        /**
          * @access protected
          * @var    double          Metragem do Imóvel
          */
        protected $metragemConstrucao;
        /**
          * @access protected
          * @var    int             Numero de Quartos
          */
        protected $quartos;
        /**
          * @access protected
          * @var    string          Nome do Proprietario
          */
        protected $proprietario;
        /**
          * @access protected
          * @var    string          Telefone do proprietario
          */
        protected $telefoneProprietario;
        /**
          * @access protected
          * @var    int             Corretor
          */
        protected $corretor;
        /**
          * @access protected
          * @var    string          Descrição do imóvel
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
         * Métodos
         */
        
    }
?>