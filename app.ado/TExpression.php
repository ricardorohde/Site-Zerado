<?php
    /**
     * TExpression.php
     * Classe abstrata para gerenciar expressões
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
     * @version 1.0     
     * @access  public
     */
    abstract class TExpression
    {
        /*
         *    Contantes
         */
        const AND_OPERATOR  = 'AND ';
        const OR_OPERATOR   = 'OR ';


        /*
         * Métodos
         */
        
        /**
         * Método dump
         * Marca método dump como obrigatório
         *
         * @abstract
         */
         abstract public function dump();
    }
?>