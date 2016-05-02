<?php
    /**
      * eventos_salvar.php
      * Classe eventos_salvar
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class eventos_salvar
    {
        /*
         * Variaveis
         */
        private $codigo;
        private $evento;


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
            if(isset($_GET['cod']))
            {
                $this->codigo = $_GET['cod'];
                $this->evento = (new tbEventos())->load($this->codigo);            
            }
            else
            {
                $this->codigo = NULL;
                $this->evento = new tbEventos;
            }
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
                    <h1 alt='Eventos' title='Eventos' >Eventos</h1>
                </span>

                <form id="eventosForm" name='eventosForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?php echo $this->codigo; ?>'>

                    <div class='row'>    

                        <div class='4u'>
                            Imagem
                            <input type='hidden' name='logotipo' id='logotipo' value='<?php echo $this->evento->imagem; ?>'>
                            <a class="fancybox fancybox.iframe" href="/app.view/uploader.php"> title='Uploader' alt='Uploader'>
                                <div id='imagemUploader'>
                                    <?php 
                                        if (($this->evento->imagem != NULL) || ($this->evento->imagem != ''))
                                            echo "<img src='{$this->evento->imagem}'>";
                                        else
                                            echo "<img src='/app.view/img/no-image.jpg'>";
                                    ?>
                                </div>
                            </a>
                        </div>

                        <div class='4u'>
                            <label for='titulo'>
                                Título
                            </label>
                            <input 
                                type='text' 
                                id='titulo' 
                                name='titulo'  
                                maxlength='100'
                                placeholder='Título'
                                value="<?php echo $this->evento->titulo; ?>"
                                required
                            >
                        </div>

                        <div class='4u'>
                            <label for='descricao'>
                                Descrição
                            </label>
                            <input 
                                type='text' 
                                id='descricao' 
                                name='descricao' 
                                placeholder='Descrição'
                                value="<?php echo $this->evento->descricao; ?>"
                            >
                        </div>

                        <div class='4u'>
                            <label for='inicio'>
                                Data Início
                            </label>
                            <input 
                                type='date' 
                                id='inicio' 
                                name='inicio' 
                                placeholder='Data Início'
                                value="<?php echo $this->evento->inicio; ?>"
                            >
                        </div>

                        <div class='4u'>
                            <label for='fim'>
                                Data Fim
                            </label>
                            <input 
                                type='date' 
                                id='fim' 
                                name='fim' 
                                maxlength='255'
                                placeholder='DeData Fimscrição'
                                value="<?php echo $this->evento->fim; ?>"
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
                                        if($this->evento->ativo == 1)
                                            echo 
                                                "
                                                    <option value='1' selected>Sim</option>
                                                    <option value='0'>Não</option>  
                                                ";
                                        else
                                            echo 
                                                "
                                                    <option value='1'>Sim</option>
                                                    <option value='0' selected>Não</option>  
                                                ";
                                    }
                                    else
                                        echo 
                                            "
                                                <option value='1' selected>Sim</option>
                                                <option value='0'>Não</option>
                                            ";
                                ?>
                            </select>
                        </div>

                        <div class='clear'></div>

                        <div class='12u'>
                            <br/>
                            <input type='submit' id='salvar' value='Salvar'>
                        </div>

                        <!--JS-->
                        <?php include_once('js/jsEventos.php'); ?>
                    </div>
                </form>
            <?php
        }
    }
?>