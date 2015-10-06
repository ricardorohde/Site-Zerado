<?php
    /**
     * TCriteria.php
     * Essa classe prov� uma interface utilizada para definir crit�rios
     *      1.1 Adicionado m�todo addFilter($variable, $operator, $value)
     *
     * @author  Pablo D'allOgglio (Livro PHP Programando com Orieta��o a Objetos - 2� Edi��o)
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
          * @var    string  Armazena a lista de exporess�es
          */ 
        private $expressions;

        /**
          * @access private
          * @var    string  Armazena a lista de operadores
          */ 
        private $operators;

        /**
          * @access private
          * @var    string  Propriedades do crit�rio
          */ 
        private $properties;



        /*
         * M�todos
         */
       
        /**
         * M�todo Construtor
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
         * M�todo add
         * Adiciona uma express�o ao crit�rio
         *  
         * @access  private
         * @param   $expression  = express�o (objeto TExpression)
         * @param   $operator    = operador l�gico de compara��o
         * @return  void
         */
        private function add(TExpression $expression, $operator = self::AND_OPERATOR)
        {
            //Na primeira vez, n�o precisamos do operador l�gico para concatenar
            if(empty($this->expressions))
            {
                $operator = NULL;
            }

            //Agrega o resultado da express�o � lista de express�es
            $this->expressions[]    = $expression;
            $this->operators[]      = $operator;
        }

        /**
         * M�todo addFilter
         * Adiciona uma nova express�o do crit�rio
         * 
         * @since   1.1
         * @param   $variable    = vari�vel;
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
         * M�todo dump
         * Retorna a express�o final
         * 
         * @access public
         * @return Express�o final
         */
        public function dump()
        {
            //Concatena a lista de express�es
            if(is_array($this->expressions))
            {
                if(count($this->expressions) > 0)
                {
                    $result = '';
                
                    foreach($this->expressions as $i => $expression)
                    {
                        $operator = $this->operators[$i];
                        
                        //Concatena o operador com a respectiva express�o
                        $result .= $operator . $expression->dump() . ' ';
                    }
                    
                    $result = trim($result);
                    return "({$result})";
                }
            }
        }

        /**
         *  M�todo setProperty()
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
         *  M�todo getProperty()
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