<?php
    /**
      * videos_salvar.php
      * Classe videos_salvar
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class videos_salvar
    {
        /*
         * Variaveis
         */
        private $codigo;
        private $video;


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
                $this->video = (new tbVideos())->load($this->codigo);           
            }
            else
            {
                $this->codigo = NULL;
                $this->video = new tbVideos;
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
                    <h1 alt='Videos' title='Videos' >Videos</h1>
                </span>

                <form id="videosForm" name='videosForm' action="" method="post">
                    <input type='hidden' name='codigo' id='codigo' value='<?php echo $this->codigo; ?>'>

                    <div class='row'>    

                        <div class='4u'>
                            Imagem
                            <input type='hidden' name='imagem' id='imagem' value='<?php echo $this->video->imagem; ?>'>
                            <div id='imagemUploader'>
                                <?php 
                                    if (($this->video->imagem != NULL) || ($this->video->imagem != ''))
                                        echo "<img src='{$this->video->imagem}'>";
                                    else
                                        echo "<img src='/app.view/img/no-image.jpg'>";
                                ?>
                            </div>
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
                                value="<?php echo $this->video->titulo; ?>"
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
                                value="<?php echo $this->video->descricao; ?>"
                            >
                        </div>

                        <div class='4u'>
                            <label for='video'>
                                Video
                            </label>
                            <input 
                                type='text' 
                                id='video' 
                                name='video' 
                                placeholder='Video Youtube'
                                value="<?php echo $this->video->video; ?>"
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
                                        if($this->video->ativo == 1)
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
                            <input type='submit' id='salvar' value='Salvar'>
                        </div>

                        <!--JS-->
                        <?php include_once('js/jsVideos.php'); ?>
                    </div>
                </form>
            <?php
        }
    }
?>