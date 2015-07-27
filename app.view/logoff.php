<?php

	/**
      * logoff.php
      * Classe logoff
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
	class logoff
	{
		/*
		 * Variaveis
		 */

		/*
		 * Método construtor
		 */
		public function __construct()
		{
			session_destroy();
			echo
				"
					<script>
						top.location='/login';
					</script>
				";
		}
	}
?>