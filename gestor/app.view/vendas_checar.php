<?php
    /**
      * vendas_checar.php
      * Classe vendas_checar
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class vendas_checar
    {
        /*
         * Variaveis
         */
        private $codigo;
        private $venda;


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
            $this->codigo = $_GET['cod'];
            $this->venda = (new tbVendas())->load($this->codigo); 
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
                    <h1 alt='Venda' title='Venda' >Venda</h1>
                </span>

                <strong>Codigo:</strong> <?php echo $this->codigo; ?><br/>
                <strong>Data Compra:</strong> <?php echo $this->venda->dataHora; ?><br/>
                
                <hr>
                <strong>TipoEntrega:</strong> <?php echo $this->venda->tipoEntrega; ?><br/>
                <strong>Valor:</strong> <?php echo $this->venda->valor; ?><br/>
                <strong>Desconto:</strong> <?php echo $this->venda->desconto; ?><br/>
                <strong>Frete:</strong> <?php echo $this->venda->frete; ?><br/>
                <strong>Valor Total:</strong> <?php echo ($this->venda->valor - $this->venda->desconto + $this->venda->frete); ?><br/>
                
                <hr>
                <strong>Cliente:</strong> <?php echo $this->venda->cliente->nome; ?><br/>
                <strong>Endereço:</strong> 
                    <?php echo $this->venda->enderecoEntrega; ?> - <?php echo $this->venda->cliente->numeroEntrega; ?><br/>
                <strong>Bairro:</strong> <?php echo $this->venda->cliente->bairroEntrega; ?><br/>
                <strong>Cidade:</strong> 
                    <?php echo $this->venda->cliente->cidadeEntrega; ?> - <?php echo $this->venda->cliente->estadoEntrega; ?><br/>
                <strong>CEP:</strong> <?php echo $this->venda->cepEntrega; ?><br/>
                
                <hr>
                <form id="vendaForm" name='vendaForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?php echo $this->codigo; ?>'>

                    <div class='row'>
                        <div class='6u'>
                            <label for='status'>
                                Status
                            </label>
                            <select name='status' id='status'>
                                <option value='1'>Aberto</option>
                                <option value='2'>Processando</option>
                                <option value='3'>Postado no Correio</option>
                                <option value='4'>Entregue</option>
                            </select>
                        </div>

                        <div class='6u' id='divCodigoRastreio'>
                            <label for='codigoRastreio'>
                                Código de Rastreio
                            </label>
                            <input
                                type='text' 
                                id='codigoRastreio' 
                                name='codigoRastreio' 
                                maxlength='20'
                                placeholder='Código de Rastreio'
                                value="<?php echo $this->venda->codigoRastreio; ?>"
                            />
                        </div>

                        <div class='12u center'>
                            <br/>
                            <input type='submit' id='salvar' value='Salvar'>
                            <br/>
                            <hr>
                        </div>
                    </div>
                </form>

                <?php include_once('js/jsVendas.php'); ?>
            <?php
        }
    }
?>