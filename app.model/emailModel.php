<?php
    require_once ('../app.control/class.phpmailer.php');

    /**
      * emailModel.php
      * Classe de modelo emailModel
      *     1.1 Refatoração para usar controlador de arquivos INI
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.1
      * @access  public
      */
    class emailModel
    {   
        private $mail;

        private $header;
        private $destinatario;
        private $remetenteNome;
        private $remetente;
        private $assunto;
        private $corpoMensagem;

        private function setHeader()
        {
            $this->header = "MIME-Version: 1.1\n";
            $this->header .= "Content-type: text/html; charset=UTF-8\n";   
            $this->header .= "From: {$this->getRemetenteNome()} <{$this->getRemetente()}>\n"; 
            $this->header .= "Return-Path: {$this->getRemetente()}\n";
            $this->header .= "Reply-To: {$this->getRemetente()}\n";
        }

        public function setRemetenteNome($remetenteNome)
        {
            $this->remetenteNome = $remetenteNome;
        }

        public function setRemetente($remetente)
        {
            $this->remetente = $remetente;
        }

        public function setDestinatario($destinatario)
        {
            $this->destinatario = $destinatario;
        }

        public function setAssunto($assunto)
        {
            $this->assunto = $assunto
        }

        public function setCorpoMensagem($corpoMensagem)
        {
            $this->corpoMensagem = $corpoMensagem;
        }

        private function getHeader()
        {
            return $this->header;
        }

        public function getRemetenteNome()
        {
            return $this->remetenteNome;
        }

        public function getRemetente()
        {
            return $this->remetente;
        }

        public function getDestinatario()
        {
            return $this->destinatario;
        }

        public function getAssunto()
        {
            return $this->assunto;
        }

        public function getCorpoMensagem()
        {
            return $this->corpoMensagem;
        }


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

        private function configuraEmail()
        {
            $configMail = controladorArquivosIni::getConfig('mail');
            
            $this->mail = new PHPMailer();
            $this->mail->isSmtp();
            $this->mail->IsHTML(true);
            $this->mail->CharSet      = 'utf-8';

            $this->mail->Host         = $configMail['host'];
            $this->mail->SMTP_PORT    = $configMail['smtpPort'];
            $this->mail->SMTPAuth     = $configMail['smtpAuth'];
            $this->mail->SMTPSecure   = $configMail['smtpSecure'];
            $this->mail->Username     = $configMail['username'];
            $this->mail->Password     = $configMail['password'];
            $this->mail->SMTPDebug    = $configMail['smtpDebug'];

            $this->mail->From         = $this->getRemetente();
            $this->mail->FromName     = $this->getRemetenteNome();

            $this->mail->Subject      = $this->getAssunto();
            $this->mail->Body         = $this->getCorpoMensagem();

            $this->mail->AddAddress($this->getDestinatario());
            $this->mail->AddReplyTo($this->getRemetente());
        }

        public function enviaEmail()
        {
            $this->configuraEmail();
            $this->setHeader();
            //$this->send();
            $this->send2();
        }

        /**
         * Método send
         * Envia o email através da classe mail
         * 
         * @access private
         * @return void
         */
        private function send()
        {
            // Limpa os destinatários e os anexos
            $this->mail->ClearAllRecipients();
            $this->mail->ClearAttachments();

            //Envia
            $enviado = $this->mail->Send();
            
            if ($enviado)
                return true
            else
                return false;

        }
        
        /**
         * Método send2
         * Envia o email pela função mail
         * 
         * @access private
         * @return void
         */
        private function send2()
        {
            if(mail(
                        $this->getDestinatario(), 
                        $this->getAssunto(), 
                        $this->getCorpoMensagem(), 
                        $this->getHeaders(), 
                        '-r'.$this->getRemetente()
                    ))
                return true
            else
                return false;
        }

        public abstract function constroiCorpo();
    }
?>