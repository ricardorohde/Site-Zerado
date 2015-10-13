<?php
    require_once ('class.phpmailer.php');
    
    /**
      * enviaEmail.php
      * Classe que controla o envio de e-mails da pagina Contato
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
    class enviaEmail
    {
        /**
          * @access private
          * @var    string  Nome de quem solicitou contato
          */ 
        private $nome;
        /**
          * @access private
          * @var    string  Email que ser?resposta
          */ 
        private $de;
        /**
          * @access private
          * @var    string  Assunto do E-mail
          */ 
        private $assunto;
        /**
          * @access private
          * @var    string  Mensagem do Formulario
          */ 
        private $mensagem;
        /**
          * @access private
          * @var    string  Corpo do email
          */ 
        private $corpoMensagem;
        /**
          * @access private
          * @var    string  Email Destinat?io
          */ 
        private $para;
        /**
          * @access private
          * @var    string  Email que ser?resposta
          */ 
        private $de;
        /**
          * @access private
          * @var    string  Classe de envio de email
          */ 
        private $mail;
        /**
          * @access private
          * @var    string  Telefone de Contato
          */ 
        private $telefone;
        /**
          * @access private
          * @var    string  Cidade de Contato
          */ 
        private $cidade;
        //private $headers;
        
        /**
         * Método construtor
         * Inicializa as variaveis, constroi o email, configura servidor e envia
         * 
         * @access public
         * @return void
         */
        public function __construct()
        {
            enviaEmail::getValores();
            enviaEmail::constroiEmail();
            enviaEmail::configuraEmail();
            //enviaEmail::send();
            enviaEmail::send2();
        }
        
        /**
         * Método getValores
         * Obtem os valores do formulario
         * 
         * @access private
         * @return void
         */
        private function getValores()
        {
            $this->nome     = $_POST['nome'];
            $this->de       = $_POST['email'];
            $this->assunto  = $_POST['assunto'];
            $this->mensagem = $_POST['mensagem'];
            $this->telefone = $_POST['telefone'];
            $this->cidade   = $_POST['cidade'];
        }
        
        /**
         * Método constroiEmail
         * Monta o email no formato para ser enviado
         * 
         * @access private
         * @return void
         */
        private function constroiEmail()
        {
            /*
             *  Headers
             */
            /*$this->headers = "MIME-Version: 1.1\n";
            $this->headers .= "Content-type: text/plain; charset=iso-8859-1\n"; // ou UTF-8, como queira
            $this->headers .= "From: $this->Nome <$this->de>\n";                // remetente
            $this->headers .= "Return-Path: $this->de\n";                       // return-path
            $this->headers .= "Reply-To: $this->de\n";                          // Endere? (devidamente validado) que o seu usu?io informou no contato*/
            
            $this->corpoMensagem =  "
                                        <b>Nome:</b> {$this->nome}<br>\n
                                        <b>Email:</b> {$this->de}<br>\n
                                        <b>Telefone:</b> {$this->telefone}<br>\n
                                        <b>Cidade:</b> {$this->cidade}<br>\n
                                        <b>Assunto:</b> {$this->assunto}<br>\n
                                        <b>Mensgem:</b><br>\n
                                        {$this->mensagem};
                                    ";
        }
        
        /**
         * Método configuraEmail
         * Configura parametros da classe PHPMailer
         * 
         * @access private
         * @return void
         */
        private function configuraEmail()
        {
            // verifica se existe arquivo de configura?o de email
            if (file_exists("../app.config/mail.ini"))
            {
                // l?o INI e retorna um array
                $configMail = parse_ini_file("../app.config/mail.ini");
            }
            else
            {
                // se n? existir, lan?a um erro
                throw new Exception("Arquivo mail.ini n? encontrado");
            }
            
            $this->mail = new PHPMailer;
            //Configura?es SMTP
            // l?as informa?es contidas no arquivo
            $this->mail->isSmtp();
            $this->mail->Host         = isset($configMail['host'])          ? $configMail['host']       : NULL;     //Host
            $this->mail->SMTP_PORT    = isset($configMail['smtpPort'])      ? $configMail['smtpPort']   : NULL;     //Porta
            $this->mail->SMTPAuth     = isset($configMail['smtpAuth'])      ? $configMail['smtpAuth']   : NULL;     //Liga a autentica?o de seguran?
            $this->mail->SMTPSecure   = isset($configMail['smtpSecure'])    ? $configMail['smtpSecure'] : NULL;     //Tipo de criptografia de autenticacao
            $this->mail->Username     = isset($configMail['username'])      ? $configMail['username']   : NULL;     //Usuario SMTP
            $this->mail->Password     = isset($configMail['password'])      ? $configMail['password']   : NULL;     //Senha SMTP
            $this->mail->SMTPDebug    = isset($configMail['smtpDebug'])     ? $configMail['smtpDebug']  : NULL;     //Ativa Debuga?o do codigo
            $this->mail->From         = isset($configMail['username'])      ? $configMail['username']   : NULL;     //Usuario SMTP
            //Remetente
            $this->mail->FromName     = $this->nome;                                                                //E-mail remetente
            //Destinatario
            $this->para               = $this->mail->From;
            $this->mail->AddAddress($this->para);                                                                   //E-mail destinatario
            $this->mail->AddReplyTo($this->de);
            //Define mensagem HTML
            $this->mail->IsHTML(true);                                                                              //Formato do texto em HTML
            $this->mail->CharSet      = 'utf-8';                                                                    //Caracteres do E-mail
            //Assunto                                                      
            $this->mail->Subject      = $this->assunto;                                                             //Assunto
            $this->mail->Body         = $this->corpoMensagem;                                                       //Mensagem
            //Anexos (opcional)                                                    
            //$mail->AddAttachment("");                                                                             //Anexo
        }
        
        /**
         * Método send
         * Envia o email
         * 
         * @access private
         * @return void
         */
        private function send()
        {
            //Envia
            $enviado = $this->mail->Send();
            
            // Limpa os destinat?ios e os anexos
            $this->mail->ClearAllRecipients();
            $this->mail->ClearAttachments();
            
            // Exibe uma mensagem de resultado
            if ($enviado)
            {
                echo "
                        <script type='text/javascript'> 
                            alert('Mensagem enviada com sucesso!');
                            history.back(1);
                        </script>
                    ";
            }
            else
            {
                echo "
                        <script type='text/javascript'> 
                            alert(  'Mensagem não enviada');
                            history.back(1)
                        </script>
                    ";
            }

        }
		
		/**
         * Método send2
         * Envia o email pela fun?o mail
         * 
         * @access private
         * @return void
         */
        private function send2()
        {
            if(mail($this->para, $this->assunto, $this->corpoMensagem, $this->headers, '-r'.$this->para))
            {
                echo "
                        <script type='text/javascript'> 
                            alert('Mensagem enviada com sucesso!');
                            history.back(1);
                        </script>
                    ";
            }
            else
                echo "
                        <script type='text/javascript'> 
                            alert('Mensagem n? enviada');
                            history.back(1);
                        </script>
                    ";
        }
    }
    
    new enviaEmail;
?>