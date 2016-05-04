<?php
    /**
      * contato.php
      * Classe contato
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class contato
    {
        /*
         * Variaveis
         */
        private $collectionEmails;
        private $collectionTelefones;
        private $controladorEmails;
        private $controladorTelefones;


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
            $this->controladorTelefones = new controladorTelefones();
            $this->controladorEmails    = new controladorEmails();
            $this->collectionTelefones  = $this->controladorTelefones->getTelefones();
            $this->collectionEmails     = $this->controladorEmails->getEmails();
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
                <div class='12u'>
                    <h1 class='center'>Contato</h1>
                    <div class='row'>
                        <div class='6u'>
                            <table>
                                <tr>
                                    <td><strong>Endereço:&nbsp;</strong></td>
                                    <td>
                                        <?= $_SESSION['configuracoes']->endereco?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Bairro:&nbsp;</strong></td>
                                    <td><?= $_SESSION['configuracoes']->bairro ?></td>
                                </tr>
                                <tr>
                                    <td><strong>CEP:&nbsp;</strong></td>
                                    <td><?= $_SESSION['configuracoes']->cep ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Cidade:&nbsp;</strong></td>
                                    <td>
                                        <?= $_SESSION['configuracoes']->cidade.' - '.$_SESSION['configuracoes']->estado ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='vertical-align: top;'>
                                        <strong>
                                            Email<?= (count($this->collectionEmails) > 1) ? 's' : '' ?>:&nbsp;
                                        </strong>
                                    </td>
                                    <td>
                                        <?php
                                            foreach ($this->collectionEmails as $email) 
                                            {
                                                echo 
                                                    "
                                                        <a 
                                                            href='mailto:{$email->email}' 
                                                            alt='{$email->email}' 
                                                            title='{$email->email}'
                                                            class='linkTexto'
                                                        >
                                                            {$email->email}
                                                        </a><br/>
                                                    ";
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='vertical-align: top;'><strong>Telefone:&nbsp;</strong></td>
                                    <td>
                                        <?php
                                            foreach ($this->collectionTelefones as $telefone) 
                                            {
                                                $telLink = $telefone->telefone;
                                                $telLink = str_replace(' ', '', $telLink);
                                                $telLink = str_replace('-', '', $telLink);
                                                $telLink = str_replace('(', '', $telLink);
                                                $telLink = str_replace(')', '', $telLink);


                                                echo 
                                                    "
                                                        <a 
                                                            href='tel:{$telLink}'
                                                            alt='Ligar para: +55 {$telefone->telefone}' 
                                                            title='Ligar para: +55 {$telefone->telefone}'
                                                            class='linkTexto'
                                                        >
                                                            +55 {$telefone->telefone}
                                                        </a><br/>
                                                    ";
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </table>

                            <div class="google-maps">
                                <iframe 
                                  src="" 
                                  width="600" 
                                  height="450" 
                                  frameborder="0" 
                                  style="border:0;" 
                                  allowfullscreen
                                ></iframe>
                            </div>
                        </div>

                        <div class='5u -1u'>
                            <form 
                                id="contatoForm" 
                                name='contatoForm' 
                                class='center' 
                                method="post"
                            >
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
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            include_once('js/jsMascaras.php');
        }
    }
?>