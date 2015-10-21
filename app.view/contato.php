<?php
    /**
      * contato.php
      * Classe contato
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class contato
    {
        /*
         * Variaveis
         */


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
                <div class='12u center'>
                    <form id="contatoForm" name='contatoForm' class='center' action="/app.control/enviaEmail.php" method="post">
                        <div class='4u -4u'>
                            <h1 class='center'>Contato</h1>
                            
                            <input 
                                type='text' 
                                id='nome' 
                                name='nome' 
                                placeholder='Nome'
                                required
                            >

                            <input 
                                type='email' 
                                id='email' 
                                name='email'  
                                placeholder='E-mail'
                                required
                            >

                            <input 
                                type='text' 
                                id='telefone' 
                                name='telefone'  
                                class='telefone'
                                placeholder='Telefone'
                                required
                            >

                            <input 
                                type='text' 
                                id='cidade' 
                                name='cidade'
                                placeholder='Cidade'
                                required
                            >

                            <input 
                                type='text' 
                                id='assunto' 
                                name='assunto'
                                placeholder='Assunto'
                                required
                            >

                            <textarea 
                                id='mensagem'
                                name='mensagem'
                                placeholder='Mensagem'
                                rows='5'
                                required
                            ></textarea>

                            <input 
                                type='submit'  
                                id='enviar' 
                                name='enviar'
                                value='Enviar' 
                            />
                        </div>
                    </form>
                </div>
            <?php
            include_once('js/jsMascaras.php');
        }
    }
?>