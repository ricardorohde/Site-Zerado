<?php
    /**
      * funcoes.php
      * Classe funcoes
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class funcoes
    {
        /*
         * Variaveis
         */
        private $funcoes;


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
            $this->funcoes = (new controladorFuncoes())->getFuncoes();
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
          * Método show
          * Exibe as informações na tela
          *
          * @access public
          * @return void
          */
        public function show()
        {
            ?>
                <span class='center'>
                    <h1 alt='Funções' title='Funções' >Funções</h1>
                </span>

                <form id="funcoesForm" name='funcoesForm' action="" method="post">
                    <div class='row' style='text-align:center;'> 
                        <div class='2u'>
                            <input 
                                type='checkbox' 
                                id='banner' 
                                name='banner' 
                                value='1' 
                                <?= $this->funcoes->banner == 1 ? 'checked' : '' ?>
                            >
                            <label for='banner'>Banner</label>
                        </div>
                        <div class='2u'>
                            <input 
                                type='checkbox' 
                                id='video' 
                                name='video' 
                                value='1'
                                <?= $this->funcoes->video == 1 ? 'checked' : '' ?>
                            >
                            <label for='video'>Video</label>
                        </div>
                        <div class='2u'>
                            <input 
                                type='checkbox' 
                                id='galeria' 
                                name='galeria' 
                                value='1'
                                <?= $this->funcoes->galeria == 1 ? 'checked' : '' ?>
                            >
                            <label for='galeria'>Galeria</label>
                        </div>
                        <div class='2u'>
                            <input 
                                type='checkbox' 
                                id='portifolio' 
                                name='portifolio' 
                                value='1'
                                <?= $this->funcoes->portifolio == 1 ? 'checked' : '' ?>
                            >
                            <label for='portifolio'>Portifólio</label>
                        </div>
                        <div class='2u'>
                            <input 
                                type='checkbox' 
                                id='ecommerce' 
                                name='ecommerce' 
                                value='1'
                                <?= $this->funcoes->ecommerce == 1 ? 'checked' : '' ?>
                            >
                            <label for='ecommerce'>E-Commerce</label>
                        </div>
                        <div class='2u'>
                            <input 
                                type='checkbox' 
                                id='delivery' 
                                name='delivery' 
                                value='1'
                                <?= $this->funcoes->delivery == 1 ? 'checked' : '' ?>
                            >
                            <label for='delivery'>Delivery</label>
                        </div>
                        <div class='2u'>
                            <input 
                                type='checkbox' 
                                id='imobiliaria' 
                                name='imobiliaria' 
                                value='1'
                                <?= $this->funcoes->imobiliaria == 1 ? 'checked' : '' ?>
                            >
                            <label for='imobiliaria'>Imobiliária</label>
                        </div>

                        <div class='12u'>
                            <input type='submit' id='salvar' value='Salvar'>
                        </div>
                    </div>
                </form>

                <!--JS-->
                <?php include_once('js/jsFuncoes.php'); ?>
            <?php
        }
    }
?>