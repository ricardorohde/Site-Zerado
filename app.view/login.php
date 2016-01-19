<?php
	/**
	  * login.php
	  * Classe login
	  *
	  * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
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
			new session();
		}

		/*
		 * Método show
		 * Exibe as informa?es na tela
		 */
		public function show()
		{
			?>
				<!DOCTYPE html>
				<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
					<head>
						<?php include_once 'meta.php'; ?>
						
						<!--CSS-->
						<?php include_once 'css.php'; ?>
							
						<!--JQuery-->
						<?php include_once 'jsLib.php'; ?>
						
						<!--JavaScript-->
						<script type="text/javascript" src="app.view/js/login.js"></script>
					</head>
					<body>
						<div class='contentLogin'>
							<form 
								class="loginForm"
								name="login"
								id="login"
								method="post"
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
									onclick='validaLogin()'
								/>
							</form>
						</div>
					</body>
				</html>
			<?php
		}
	}
?>