<?php
	/**
	  * login.php
	  * Classe login
	  *
	  * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
	  * @version 1.0
	  * @access  public
	  */
	class login
	{
		/*
		 * Variaveis
		 */

		/*
		 * Método construtor
		 */
		public function __construct()
		{
			new TSession(1);
		}

		/*
		 * Método show
		 * Exibe as informações na tela
		 */
		public function show()
		{
			?>
				<!DOCTYPE html>
				<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
					<head>
						<?php include_once 'meta.php'; ?>
						
						<!--CSS-->
						<?php include_once 'css/css.php'; ?>
							
						<!--JQuery-->
						<?php include_once 'js/jsLib.php'; ?>
						
						<!--JavaScript-->
						<?php include_once 'js/jsInit.php'; ?>
					</head>
					<body style="text-align: center;">
						<div class='contentLogin 2u' style='margin-left: auto; margin-right: auto;'>
							<form 
								class="loginForm"
								name="login"
								id="login"
								method="post"
								onsubmit='validaLogin()'
							>
								<h1>Painel</h1>
								<input 
									type='email' 
									id='email' 
									name='email'  
									placeholder='E-mail'
									required
								/><br>
								<input 
									type='password' 
									id='senha' 
									name='senha' 
									required
									placeholder='Senha'
								><br /><br />
								<input 
									name='botaoLogin' 
									type='submit' 
									id='botaoLogin' 
									value='Login' 
								/>
							</form>
						</div>
						
						<!--JS-->
                		<?php include_once('js/jsLogin.php'); ?>
					</body>
				</html>
			<?php
		}
	}
?>