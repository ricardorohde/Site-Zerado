<?php
    /**
     * TCriteria.php
     * Essa classe provê uma interface utilizada para definir critérios
     *      1.1 Adicionado método addFilter($variable, $operator, $value)
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
     * @version 1.1     
     * @access  public
     */
    class TCriteria extends TExpression
    {
        /*
         * Variaveis
         */

        /**
          * @access private
          * @var    string  Armazena a lista de exporessões
          */ 
        private $expressions;

        /**
          * @access private
          * @var    string  Armazena a lista de operadores
          */ 
        private $operators;

        /**
          * @access private
          * @var    string  Propriedades do critério
          */ 
        private $properties;



        /*
         * Métodos
         */
       
        /**
         * Método Construtor
         *
         * @access private
         * @return void
         */
        public function __construct()
        {
            $this->expressions    = array();
            $this->operators      = array();
        }

        /**
         * Método add
         * Adiciona uma expressão ao critério
         *  
         * @access  private
         * @param   $expression  = expressão (objeto TExpression)
         * @param   $operator    = operador lógico de comparação
         * @return  void
         */
        private function add(TExpression $expression, $operator = self::AND_OPERATOR)
        {
            //Na primeira vez, não precisamos do operador lógico para concatenar
            if(empty($this->expressions))
            {
                $operator = NULL;
            }

            //Agrega o resultado da expressão à lista de expressões
            $this->expressions[]    = $expression;
            $this->operators[]      = $operator;
        }

        /**
         * Método addFilter
         * Adiciona uma nova expressão do critério
         * 
         * @since   1.1
         * @param   $variable    = variável;
         * @param   $operator    = operador (<,>)
         * @param   $value       = valor a ser comparado
         * @return  void
         */
        public function addFilter($variable, $operator, $value)
        {
            $filter = new TFilter($variable, $operator, $value);

            $this->add($filter);
        }

        /**
         * Método dump
         * Retorna a expressão final
         * 
         * @access public
         * @return Expressão final
         */
        public function dump()
        {
            //Concatena a lista de expressões
            if(is_array($this->expressions))
            {
                if(count($this->expressions) > 0)
                {
                    $result = '';
                
                    foreach($this->expressions as $i => $expression)
                    {
                        $operator = $this->operators[$i];
                        
                        //Concatena o operador com a respectiva expressão
                        $result .= $operator . $expression->dump() . ' ';
                    }
                    
                    $result = trim($result);
                    return "({$result})";
                }
            }
        }

        /**
         *  Método setProperty()
         *  Define o valor a da uma propriedade
         *
         * @access  public
         * @param   $property   = propriedade
         * @param   $value      = valor
         * @return  void
         */
        public function setProperty($property, $value)
        {
            if(isset($value))
            {
                $this->properties[$property] = $value;
            }
            else
            {
                $this->properties[$property] = NULL;
            }
        }
        
        /**
         *  Método getProperty()
         *  Retorna o valor de uma propriedade
         * 
         * @access  public
         * @param   $property = propriedade
         * @return  void
         */
        public function getProperty($property)
        {
            if(isset($this->properties[$property]))
            {
                return $this->properties[$property];
            }
        }
    }
?>