<?php
    /**
      * imoveis_salvar.php
      * Classe imoveis_salvar
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class imoveis_salvar
    {
        /*
         * Variaveis
         */        
        private $codigo;
        private $imovei;
        private $collectionCategoriaImoveis;
        private $collectionSituacaoImoveis;


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
            if(isset($_GET['cod']))
            {
                $this->codigo = $_GET['cod'];
                $this->imovel = (new tbImoveis())->load($this->codigo);            
            }
            else
            {
                $this->codigo = NULL;
                $this->imovel = new tbImoveis();
            }

            $this->collectionSituacaoImoveis    = (new controladorSituacaoImoveis())->getSituacoes();
            $this->collectionCategoriaImoveis   = (new controladorCategoriaImoveis())->getCategorias();
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
          * M�todo show
          * Exibe as informa��es na tela
          *
          * @access public
          * @return void
          */
        public function show()
        {
            ?>
                <span class='center'>
                    <h1 alt='Im�veis' title='Im�veis' >Im�veis</h1>
                </span>

                <div id='retorno'></div>

                <form id="imoveisForm" name='imoveisForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?php echo $this->codigo; ?>'>

                    <div class='row'> 
                        <div class='6u'>
                            <label for='endereco'>Endereco</label>
                            <input 
                                type='text' 
                                id='endereco' 
                                name='endereco'  
                                maxlength='100'
                                placeholder='Endereco'
                                value="<?php echo $this->imovel->endereco; ?>"
                                required
                            >
                        </div>
                        <div class='6u'>
                            <label for='numero'>N�mero</label>
                            <input 
                                type='number' 
                                id='numero' 
                                name='numero'  
                                min="1"
                                step='1'
                                placeholder='N�mero'
                                value="<?php echo $this->imovel->numero; ?>"
                                required
                            >
                        </div>
                        <div class='6u'>
                            <label for='bairro'>Bairro</label>
                            <input 
                                type='text' 
                                id='bairro' 
                                name='bairro'  
                                maxlength='50'
                                placeholder='Bairro'
                                value="<?php echo $this->imovel->bairro; ?>"
                                required
                            >
                        </div>
                        <div class='6u'>
                            <label for='bairro'>CEP</label>
                            <input 
                                type='text' 
                                id='cep' 
                                name='cep' 
                                class='cep' 
                                maxlength='10'
                                placeholder='CEP'
                                value="<?php echo $this->imovel->cep; ?>"
                                required
                            >
                        </div>
                        <div class='6u'>
                            <label for='cidade'>Cidade</label>
                            <input 
                                type='text' 
                                id='cidade' 
                                name='cidade'  
                                maxlength='50'
                                placeholder='Cidade'
                                value="<?php echo $this->imovel->cidade; ?>"
                                required
                            >
                        </div>
                        <div class='6u'>
                            <label for='estado'>Estado</label>
                            <select name='estado' id='estado'>
                                <option value='' <?= ($this->imovel->estado == '' ? 'selected' : '') ?>></option>
                                <option value='AC' <?= ($this->imovel->estado == 'AC' ? 'selected' : '') ?>>Acre</option>
                                <option value='AL' <?= ($this->imovel->estado == 'AL' ? 'selected' : '') ?>>Alagoas</option>
                                <option value='AP' <?= ($this->imovel->estado == 'AP' ? 'selected' : '') ?>>Amap�</option>
                                <option value='AM' <?= ($this->imovel->estado == 'AM' ? 'selected' : '') ?>>Amazonas</option>
                                <option value='BA' <?= ($this->imovel->estado == 'BA' ? 'selected' : '') ?>>Bahia</option>
                                <option value='CE' <?= ($this->imovel->estado == 'CE' ? 'selected' : '') ?>>Cear�</option>
                                <option value='DF' <?= ($this->imovel->estado == 'DF' ? 'selected' : '') ?>>Distrito Federal</option>
                                <option value='ES' <?= ($this->imovel->estado == 'ES' ? 'selected' : '') ?>>Esp�rito Santo</option>
                                <option value='GO' <?= ($this->imovel->estado == 'GO' ? 'selected' : '') ?>>Goi�s</option>
                                <option value='MA' <?= ($this->imovel->estado == 'MA' ? 'selected' : '') ?>>Maranh�o</option>
                                <option value='MT' <?= ($this->imovel->estado == 'MT' ? 'selected' : '') ?>>Mato Grosso</option>
                                <option value='MS' <?= ($this->imovel->estado == 'MS' ? 'selected' : '') ?>>Mato Grosso do Sul</option>
                                <option value='MG' <?= ($this->imovel->estado == 'MG' ? 'selected' : '') ?>>Minas Gerais</option>
                                <option value='PA' <?= ($this->imovel->estado == 'PA' ? 'selected' : '') ?>>Par�</option>
                                <option value='PB' <?= ($this->imovel->estado == 'PB' ? 'selected' : '') ?>>Para�ba</option>
                                <option value='PR' <?= ($this->imovel->estado == 'PR' ? 'selected' : '') ?>>Paran�</option>
                                <option value='PE' <?= ($this->imovel->estado == 'PE' ? 'selected' : '') ?>>Pernambuco</option>
                                <option value='PI' <?= ($this->imovel->estado == 'PI' ? 'selected' : '') ?>>Piau�</option>
                                <option value='RJ' <?= ($this->imovel->estado == 'RJ' ? 'selected' : '') ?>>Rio de Janeiro</option>
                                <option value='RN' <?= ($this->imovel->estado == 'RN' ? 'selected' : '') ?>>Rio Grande do Norte</option>
                                <option value='RS' <?= ($this->imovel->estado == 'RS' ? 'selected' : '') ?>>Rio Grande do Sul</option>
                                <option value='RO' <?= ($this->imovel->estado == 'RO' ? 'selected' : '') ?>>Rond�nia</option>
                                <option value='RR' <?= ($this->imovel->estado == 'RR' ? 'selected' : '') ?>>Roraima</option>
                                <option value='SC' <?= ($this->imovel->estado == 'SC' ? 'selected' : '') ?>>Santa Catarina</option>
                                <option value='SP' <?= ($this->imovel->estado == 'SP' ? 'selected' : '') ?>>S�o Paulo</option>
                                <option value='SE' <?= ($this->imovel->estado == 'SE' ? 'selected' : '') ?>>Sergipe</option>
                                <option value='TO' <?= ($this->imovel->estado == 'TO' ? 'selected' : '') ?>>Tocantins</option>
                            </select>
                        </div>
                        <div class='6u'>
                            <label for='situacao'>Situa��o</label>
                            <select name='situacao' id='situacao'>
                                <option value='' <?= ($this->imovel->situacao == '' ? 'selected' : '') ?>></option>
                                <?php 
                                    foreach($this->collectionSituacaoImoveis as $situacao)
                                    {
                                        $selected = '';

                                        if ($this->imovel->situacao == $situacao->codigo)
                                            $selected = 'selected';

                                        echo 
                                            "<option value='{$situacao->codigo}' {$selected}>{$situacao->situacao}</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class='6u'>
                            <label for='categoria'>Categoria</label>
                            <select name='categoria' id='categoria'>
                                <option value='' <?= ($this->imovel->categoria == '' ? 'selected' : '') ?>></option>
                                <?php 
                                    foreach($this->collectionCategoriaImoveis as $categoria)
                                    {
                                        $selected = '';

                                        if ($this->imovel->categoria == $categoria->codigo)
                                            $selected = 'selected';

                                        echo 
                                            "<option value='{$categoria->codigo}' {$selected}>{$categoria->categoria}</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class='6u'>
                            <label for='categoriaAluguel'>Categoria Im�vel</label>
                            <select name='categoriaAluguel' id='categoriaAluguel'>
                                <option value='' <?= ($this->imovel->categoriaAluguel == '' ? 'selected' : '') ?>></option>
                                <option value='1' <?= ($this->imovel->categoriaAluguel == '0' ? 'selected' : '') ?>>Residencial</option>
                                <option value='0' <?= ($this->imovel->categoriaAluguel == '1' ? 'selected' : '') ?>>Comercial</option>
                            </select>
                        </div>
                        <div class='6u'>
                            <label for='preco'>Valor</label>
                            <input 
                                type='text' 
                                id='preco' 
                                name='preco'
                                class='dinheiro'
                                placeholder='Valor'
                                value='<?= number_format($this->imovel->preco, 2) ?>'
                                required
                            >
                        </div>
                        <div class='clear'></div>
                        <div class='6u'>
                            <label for='destaque'>Destaque</label>
                            <select name='destaque' id='destaque'>
                                <option value='0' <?= ($this->imovel->destaque == '0' ? 'selected' : '') ?>>N�o</option>  
                                <option value='1' <?= ($this->imovel->destaque == '1' ? 'selected' : '') ?>>Sim</option>
                            </select>
                        </div>
                        <div class='6u'>
                            <label for='ativo'>Ativo</label>
                            <select name='ativo' id='ativo'>
                                <option value='1' <?= ($this->imovel->ativo == '1' ? 'selected' : '') ?>>Sim</option>
                                <option value='0' <?= ($this->imovel->ativo == '0' ? 'selected' : '') ?>>N�o</option>
                            </select>
                        </div>

                        <?php include_once('galeria.php'); ?>
                        
                        <div class='12u'>
                            <input type='submit' id='salvar' value='Salvar'>
                        </div>
                    </div>
                </form>

                <!--JS-->
                <?php 
                    include_once('js/jsImoveis.php'); 
                    include_once('js/jsMascaras.php');
                ?>
            <?php
        }
    }
?>