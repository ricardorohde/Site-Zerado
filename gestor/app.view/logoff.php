<?php
/*
 *	Arquivo  logoff.php
 *	Realiza logoff do sistema
 *	
 *	Sistema:	#SISTEMA#
 *	Autor:      Rog�rio Eduardo Pereira
 *	Data:       27/02/2015
 */

/*
 * Classe logoff
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
					top.location='?class=login';
				</script>
			";
	}
}
?>