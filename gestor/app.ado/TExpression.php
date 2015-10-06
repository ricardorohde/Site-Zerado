<?php
    /**
     * TExpression.php
     * Classe abstrata para gerenciar expressѕes
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietaчуo a Objetos - 2Њ Ediчуo)
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
         * Mщtodos
         */
        
        /**
         * Mщtodo dump
         * Marca mщtodo dump como obrigatѓrio
         *
         * @abstract
         */
         abstract public function dump();
    }
?>