<?php

	/**
      * logoff.php
      * Classe logoff
      *
      * @author  Rog�rio Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
      * @access  public
      */
	class logoff
	{
		/*
		 * Variaveis
		 */

		/*
		 * M�todo construtor
		 */
		public function __construct()
		{
			$session = new TSession(0);
            $session->freeSession();
		}
	}
?>