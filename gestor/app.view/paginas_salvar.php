<?php
    /**
      * paginas_salva.php
      * Classe paginas_salva
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class paginas_salvar
    {
        /*
         * Variaveis
         */
        private $codigo;
        private $pagina;
        private $localizacoes;


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
                $this->pagina = (new tbPaginas())->load($this->codigo);        
            }
            else
            {
                $this->codigo = NULL;
                $this->pagina = new tbPaginas;
            }

            $this->localizacoes = (new controladorLocalizacao())->getLocalizacoes();
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
                    <h1 alt='Páginas' title='Páginas' >Páginas</h1>
                </span>

                <form id="paginasForm" name='paginasForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?php echo $this->codigo; ?>'>

                    <div class='row'>    

                        <div class='4u'>
                            Imagem
                            <input type='hidden' name='logotipo' id='logotipo' value='<?php echo $this->pagina->imagem; ?>'>
                            <a class="fancybox fancybox.iframe" href="/app.view/uploader.php"> title='Uploader' alt='Uploader'>
                                <div id='imagemUploader'>
                                    <?php 
                                        if (($this->pagina->imagem != NULL) || ($this->pagina->imagem != ''))
                                            echo "<img src='{$this->pagina->imagem}'>";
                                        else
                                            echo "<img src='/app.view/img/no-image.jpg'>";
                                    ?>
                                </div>
                            </a>
                        </div>

                        <div class='8u'>
                            <label for='titulo'>
                                Título
                            </label>
                            <input 
                                type='text' 
                                id='titulo' 
                                name='titulo'  
                                maxlength='100'
                                placeholder='Título'
                                value="<?php echo $this->pagina->titulo; ?>"
                                required
                            >
                        </div>

                        <div class='8u'>
                            <label for='descricao'>
                                Descrição
                            </label>
                            <input 
                                type='text' 
                                id='descricao' 
                                name='descricao' 
                                maxlength='255'
                                placeholder='Descrição'
                                value="<?php echo $this->pagina->descricao; ?>"
                            >
                        </div>

                        <div class='4u'>
                            <label for='localizacao'>
                                Localizacao
                            </label>
                            <select name='localizacao' id='localizacao'>
                                <option value='' style='display:none;' selected disabled></option>
                                <?php
                                    foreach ($this->localizacoes as $localizacao) 
                                    {
                                        $selected = '';
                                        if($this->pagina->localizacao == $localizacao->codigo)
                                            $selected = 'selected';

                                        echo "<option value='{$localizacao->codigo}' {$selected}>{$localizacao->nome}</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class='4u'>
                            <label for='ativo'>
                                Ativo
                            </label>
                            <select name='ativo' id='ativo'>
                                <?php
                                    if($this->codigo != NULL)
                                    {
                                        if($this->pagina->ativo == 1)
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
                            <label for='texto'>Texto</label>
                            <br/>
                            <textarea name="texto" id='texto' class='tinymce'><?php echo $this->pagina->texto; ?></textarea>
                            <br/>
                            <input type='submit' id='salvar' value='Salvar'>
                        </div>

                        <!--JS-->
                        <?php include_once('js/jsPaginas.php'); ?>
                    </div>
                </form>
            <?php
        }
    }
?>