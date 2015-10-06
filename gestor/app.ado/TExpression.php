<?php
    /**
     * TExpression.php
     * Classe abstrata para gerenciar express�es
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orieta��o a Objetos - 2� Edi��o)
     * @version 1.0     
     * @access  public
     */
    abstract class TExpression
    {
        /*
         *    Contantes
         */
        /**
         * @const string AND_OPERATOR   Valor 'AND '
         */
        const AND_OPERATOR  = 'AND ';
        /**
         * @const string OR_OPERATOR    Valor 'OR '
         */
        const OR_OPERATOR   = 'OR ';


        /*
         * M�todos
         */
        
        /**
         * M�todo dump
         * Marca m�todo dump como obrigat�rio
         *
         * @abstract
         */
         abstract public function dump();
    }
?>