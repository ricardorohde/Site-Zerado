<?php
    /**
      * contatoModel.php
      * Classe de modelo contatoModel
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class contatoModel extends emailModel
    {
        private $nome;
        private $email;
        private $telefone;
        private $cidade;
        private $mensagem;

        private $evento;

        /**
         * Método Construtor
         *
         * @access private
         * @return void
         */
        public function __construct(
                                        $nome, 
                                        $email, 
                                        $telefone, 
                                        $cidade, 
                                        $assunto,
                                        $mensagem
                                    )
        {
            //Variaveis
            $this->nome         = $nome;
            $this->email        = $email;
            $this->telefone     = $telefone;
            $this->cidade       = $cidade;
            $this->mensagem     = $mensagem;

            
            $this->setAssunto($assunto);

            $email->constroiCorpo();
            $email->setDadosEnvio();
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
         * Método ConstroiCorpo
         * Constroi o corpo do email
         * 
         * @access private
         */
        private function constroiCorpo()
        {
            $corpoMensagem      = '';
            $corpoMensagem      .= "Foi recebido um novo contato pelo site\n\n";
            $corpoMensagem      .= "<strong>Nome:</strong> {$this->nome}\n";
            $corpoMensagem      .= "<strong>Email:</strong> {$this->email}\n";
            $corpoMensagem      .= "<strong>Telefone:</strong>{$this->telefone} \n";
            $corpoMensagem      .= "<strong>Cidade:</strong> {$this->cidade}\n";
            $corpoMensagem      .= "<strong>Assunto:</strong> {$this->getAssunto}\n";
            $corpoMensagem      .= "<strong>Mensagem:</strong>\n";
            $corpoMensagem      .= "{$this->mensagem}";

            $this->setCorpoMensagem($corpoMensagem);
        }

        /**
         * Método setDadosEnvio
         * Define informações referentes ao envio do email
         * 
         * @access private
         */
        private function setDadosEnvio()
        {
            $this->setRemetenteNome($this->nome);
            $this->setRemetente($this->email);
        }
    }
?>