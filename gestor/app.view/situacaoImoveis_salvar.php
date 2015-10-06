<?php
    /**
      * situacaoImoveis_salvar.php
      * Classe situacaoImoveis_salvar
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class situacaoImoveis_salvar
    {
        /*
         * Variaveis
         */
        private $codigo;
        private $situacao;


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
                $this->situacao = (new tbSituacaoImoveis())->load($this->codigo);        
            }
            else
            {
                $this->codigo = NULL;
                $this->situacao = new tbSituacaoImoveis;
            }
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
                    <h1 alt='Situa��o Im�veis' title='Situa��o Im�veis' >Situa��o Im�veis</h1>
                </span>

                <form id="situacaoImoveisForm" name='situacaoImoveisForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?= $this->codigo; ?>'>

                    <div class='row'>
                        <div class='4u'>
                            <label for='nome'>
                                Situa��o dos Im�veis
                            </label>
                            <input 
                                type='text' 
                                id='situacao' 
                                name='situacao'  
                                maxlength='100'
                                placeholder='Situa��o dos Im�veis (Aluguel, Venda, Arrendamento)'
                                value="<?= $this->situacao->situacao ?>"
                                required
                            >
                        </div>

                        <div class='4u'>
                            <label for='ativo'>
                                Ativo
                            </label>
                            <select name='ativo' id='ativo'>
                                <?php
                                    if($this->codigo != NULL)
                                    {
                                        ?>
                                            <option value='1' <?= $this->situacao->ativo == 1 ? 'selected' : '' ?>>Sim</option>
                                            <option value='0' <?= $this->situacao->ativo == 0 ? 'selected' : '' ?>>N�o</option>
                                        <?php
                                    }
                                    else
                                        echo 
                                            "
                                                <option value='1' selected>Sim</option>
                                                <option value='0'>N�o</option>
                                            ";
                                ?>
                            </select>
                        </div>

                        <div class='clear'></div>

                        <div class='12u'>
                            <input type='submit' id='salvar' value='Salvar'>
                        </div>

                        <!--JS-->
                        <?php include_once('js/jsSituacaoImoveis.php'); ?>
                    </div>
                </form>
            <?php
        }
    }
?>