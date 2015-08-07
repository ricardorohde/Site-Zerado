<?php
    include_once('../app.control/TSession.php');

    /**
      * uploader.php
      * Realiza upload de imagens
      * http://www.sanwebe.com/2012/05/ajax-image-upload-with-progressbar-with-jquery-and-php
      *
      * @author  Adpatado por Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class uploader
    {
        /*
         * Variaveis
         */
        private $files;


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
            new TSession(0);

            $this->files = scandir('../../app.view/img/');
            $this->show();
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
                <!DOCTYPE html>
                <html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
                    <head>
                        <!--CSS-->
                        <!--Fontes-->
                        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

                        <!--Icones-->
                        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

                        <!--CSS-->
                        <link rel="stylesheet" href="css/style.css">
                        <link rel="stylesheet" href="css/formulario.css">
                        <link rel="stylesheet" href="css/uploader.css">
                        
                        <!--JavaScript-->
                        <script type="text/javascript" src="js/jquery.js"></script>
                        <!--SKEL-->
                        <script type="text/javascript" src="js/skel.js"></script>
                        <!--JQUERY FORM-->
                        <script type="text/javascript" src="js/jquery.form.min.js"></script>
                    </head>
                    <body>
                        <span class='center'>
                            <h1 alt='Upload' title='Upload'>Upload</h1>
                        </span>

                        <div class='row'>
                            <div class='4u'>
                                <form id="uploadForm" action="../app.control/controladorUploader.php" method="post">
                                    <div class='center'>
                                        <label for='userImage'><h2>Selecione as imagens:</h2></label>
                                        <input 
                                            name="userImage[]" 
                                            id="userImage" 
                                            type="file" 
                                            class="demoInputBox" 
                                            accept="image/*"/
                                            required
                                            multiple
                                        />
                                        <div id='listaArquivosUpload'>

                                        </div>
                                        <input type="submit" id="btnSubmit" class="btnSubmit" value="Submit">
                                    </div>
                                    <div id="progress-div">
                                        <div id="progress-bar"></div>
                                    </div>
                                    <div id="targetLayer"></div>
                                </form>
                            </div>
                        </div>

                        <span class='center'>
                            <h1 alt='Imagens' title='Imagens'>Imagens</h1>
                        </span>

                        <input type='hidden' name='imagemSelecionada' id='imagemSelecionada' value=''>

                        <div class='row uploaderContent'>
                            <?php
                                foreach ($this->files as $file) 
                                {
                                    if(!is_dir('../../app.view/img/'.$file))
                                        echo 
                                            "
                                                <div class='2u uploaderBox'>
                                                    <div class='uploaderImg'>
                                                        <img src='{$_SESSION['dominio']}app.view/img/{$file}'>
                                                    </div>
                                                    <input 
                                                        type='button' 
                                                        name='selecionar' 
                                                        id='selecionar' 
                                                        class='uploaderSelecionar' 
                                                        value='Selecionar' 
                                                        onclick=\"selecionaImagem('{$_SESSION['dominio']}app.view/img/{$file}');\"
                                                    ><br/>
                                                    <input 
                                                        type='button' 
                                                        name='excluir' 
                                                        id='excluir' 
                                                        class='uploaderExcluir' 
                                                        value='Excluir' 
                                                        onclick=\"excluirImagem('{$_SESSION['dominio']}app.view/img/{$file}');\"
                                                    >
                                                </div>
                                            ";
                                }
                            ?>
                        </div>

                        <!--JS-->
                        <?php include_once('js/jsUpload.php'); ?>
                    </body>
                </html>
            <?php
        }
    }

    new uploader;
?>