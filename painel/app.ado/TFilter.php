<?php
  /**
   * TFilter.php
   * Esta classe provê uma interface para definições de fitros de seleção
   *    1.1 Correção de filtro quando tem . (método transform)
   *
   * @author  Pablo D'allOgglio (Livro PHP Programando com Orietação a Objetos - 2ª Edição)
   * @version 1.1     
   * @access  public
   */
  class TFilter extends TExpression
  {
    /*
     *    Variaveis
     */    
    /**
      * @access private
      * @var    string  Variável do banco de dados
      */
    private $variable;
    /**
      * @access private
      * @var    string  Operador da operação
      */
    private $operator;
    /**
      * @access private
      * @var    string  Valor da variável
      */
    private $value;


    /*
     * Métodos
     */
    

    /**
     * Método __contruct()
     * Instancia um novo Filtro
     *
     * @access  private
     * @param   $variable    = variável;
     * @param   $operator    = operador (<,>)
     * @param   $value       = valor a ser comparado
     * @return  void
     */
    public function __construct($variable, $operator, $value)
    {
        //Armazena as propriedades
        $this->variable = $variable;
        $this->operator = $operator;
        
        //Trasnforma o valor de acordo com certas regras
        //Antes de atribuir à proprieade $this->value
        $this->value    = $this->transform($value);
    }

    /**
     * Método transform()
     * Recebe um valor a faz as modificações necessárias
     * para ele se interceptado pelo banco de dados
     * podendo ser um integer/string/boolean ou array
     * 
     * @access  private
     * @param   $value = valor a ser transformado
     * @return  Valor transformdo para o banco de dados
     */
    private function transform($value)
    {
        //Caso seja um array
        if(is_array($value))
        {
            //Percorre os valores
            foreach($value as $x)
            {
                //Se for inteiro
                if(is_integer($x))
                {
                  $foo[] = $x;
                }
                //Se for string
                else if (is_string($x))
                {
                  //Se for string, adiciona aspas
                  $foo[] = "'$x'";
                }
            }

            //Converte o array em string separada por ","
            $result = '(' . implode(',' , $foo) . ')';
        }
      
        //Caso seja uma string
        else if(is_string($value))
        {
            /*
             * HACK PARA REPOSITORY COM MAIS DE UMA TABELA E CONDIÇÕES DO TIPO T1.COD = T2.COD
             * NA LINHA 107 ESTÁ SOMANDO O NUMERO DE PONTO PARA PERMITIR CONSULTAS COM EMAIL E SITES EMAIL = 'EMAIL@EMAIL.COM.BR'
             */
            if(strpos($value, '.') == false)
            {
                //Adiciona string normal
                $result = "'$value'";
            }
            else
            {
                if(strpos($value, '.') > 1)
                {
                    //Adiciona string normal
                    $result = "'$value'";
                }
                else
                {
                    //Adiciona sem as aspas
                    $result = $value;
                }
            }
            //$result = "'$value'";
        }

        //Caso seja um valor nulo
        else if(is_null($value))
        {
            //Armazena NULL
            $result = 'NULL';
        }

        //Caso seja booleano
        else if(is_bool($value))
        {
            //Armazena TRUE ou FALSE
            $result = $value ? 'TRUE' : 'FALSE';
        }

        //Nenhum caso acima
        else
        {
            $result = $value;
        }

        return $result;
    }

    /**
     * Método dump()
     * Retorna o filtro em forma de expressão
     * 
     * @access  public
     * @return  Expressão em formato SQL
     */
    public function dump()
    {
        //Concatena a expressão
        return "{$this->variable} {$this->operator} {$this->value}";
    }
  }
?>