<?php
    /**
      * controladorPaginacao.php
      * Classe controladorPaginacao
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.0
      * @access  public
      */
    class controladorPaginacao
    {
        /*
         * Variaveis
         */        
        private $paginaAtual;
        private $limiteBusca;
        private $adjacentesPaginaAtual;
        private $totalRegistros;
        private $proximaPagina;
        private $paginaAnterior;
        private $ultimaPagina;

        private $url;

        private $paginacao;


        /*
         * Métodos
         */
        /**
          * Método Construtor
          *
          * @access private
          * @param  $paginaAtual                Página atual do usuário
          * @param  $limiteBusca                Limite de registros por página
          * @param  $adjacentesPaginaAtual      Número de páginas a esquerda e direita da pagina atual na paginação
          * @param  $controlador                Controlador que realizará a conta de registros
          * @param  $metodoContaRegistros       Método para contar os registros
          * @param  $criteria                   Critério de Seleção da busca
          * @param  $url                        Url que será usada nos links da paginação
          * @return void
          */
        public function __construct (
                                        $paginaAtual, 
                                        $limiteBusca, 
                                        $adjacentesPaginaAtual, 
                                        $controlador,
                                        $metodoContaRegistros,
                                        $criteria,
                                        $url
                                    )
        {
            //Pagina Atual, Anterior e Próxima
            $this->paginaAtual              = $paginaAtual;
            $this->proximaPagina            = $this->paginaAtual + 1;
            $this->paginaAnterior           = $this->paginaAtual - 1;
            $this->adjacentesPaginaAtual    = $adjacentesPaginaAtual;

            //Limite da Busca
            $this->limiteBusca      = $limiteBusca;

            //Inicio Limite de busca
            if($this->paginaAtual == 1)
                $this->inicio = 0;
            else
                $this->inicio = ($this->paginaAtual - 1) * $limiteBusca;

            //Busca Total de Registros
            $this->totalRegistros = (new $controlador())->$metodoContaRegistros($criteria);

            //Última Página
            $this->ultimaPagina = (ceil($this->totalRegistros / $this->limiteBusca));

            //URL
            $this->url          = $url;

            $this->paginacao    = '';

            $this->constroiPaginacao();
        }

        /**
          * Método __set
          * Seta o valor da variavel
          * 
          * @access public
          * @param  string  $propriedade    Propriedade a ser definida o valor
          * @param  mixed   $valor          Valor da Propriedade
          * @return void
          */
        public function __set($propriedade, $valor)
        {
            $this->$propriedade = $valor;
        }

        /**
          * Método __get
          * Seta o valor da variavel
          * 
          * @access public
          * @param  string $propriedade    Propriedade a ser retornada
          * @return mixed                   Valor da Propriedade
          */
        public function __get($propriedade)
        {
            return $this->$propriedade;
        }

        /**
          * Método show
          * Exibe as informações na tela
          *
          * @access public
          * @return void
          */
        public function show()
        {
            echo $this->paginacao;
        }

        /**
         * Método constroiPaginacao
         * Constroi a paginacao
         * 
         * @access private
         * @return void
         */
        private function constroiPaginacao()
        {
            if($this->paginaAtual > 1)
                $this->paginacao .= "<a href='{$this->url}/{$this->paginaAnterior}'>&lt; Anterior</a>";

            //Menos do que o numero de paginas adjacentes a esquerda, a direita e a pagina atual
            if ($this->ultimaPagina <= ((2 * $this->adjacentesPaginaAtual) +1))
            {
                for ($i=1; $i<=$this->ultimaPagina; $i++)
                {
                    if ($i == $this->paginaAtual)
                        $this->paginacao .= "<a class='paginaAtual' href='{$this->url}/{$i}'>{$i}</a>";
                    else 
                        $this->paginacao .= "<a href='{$this->url}/{$i}'>{$i}</a>";
                }
            }
            //Mais do que o numero de paginas adjacentes a esquerda, a direita e a pagina atual
            else
            {
                //Se a página atual é maior do que o número de paginas adjacentes a esquerda + 1
                if($this->paginaAtual < (1 + $this->adjacentesPaginaAtual))
                {
                    for($i=1; $i<2+$this->adjacentesPaginaAtual; $i++)
                    {
                        if ($i == $this->paginaAtual)
                            $this->paginacao .= "<a class='paginaAtual' href='{$this->url}/{$i}'>{$i}</a>";
                        else 
                            $this->paginacao .= "<a href='{$this->url}/{$i}'>{$i}</a>";
                    }

                    $this->paginacao .= '&nbsp;...&nbsp;';
                    $this->paginacao .= "<a href='{$this->url}/{$this->ultimaPagina}'>{$this->ultimaPagina}</a>";
                }
                //Se a pagina atual esta entre os dois adjacentes
                else if(($this->paginaAtual > $this->adjacentesPaginaAtual) &&
                        ($this->paginaAtual < $this->ultimaPagina- $this->adjacentesPaginaAtual))
                {
                    $this->paginacao .= "<a href='{$this->url}/1'>1</a>";
                    $this->paginacao .= '&nbsp;...&nbsp;';

                    for (
                            $i=($this->paginaAtual-$this->adjacentesPaginaAtual); 
                            $i<=($this->paginaAtual+$this->adjacentesPaginaAtual); 
                            $i++
                        )
                    {
                        if ($i == $this->paginaAtual)
                            $this->paginacao .= "<a class='paginaAtual' href='{$this->url}/{$i}'>{$i}</a>";
                        else 
                            $this->paginacao .= "<a href='{$this->url}/{$i}'>{$i}</a>";
                    }

                    $this->paginacao .= '&nbsp;...&nbsp;';
                    $this->paginacao .= "<a href='{$this->url}/{$this->ultimaPagina}'>{$this->ultimaPagina}</a>";                                                
                }
                else
                {
                    $this->paginacao .= "<a href='{$this->url}/1'>1</a>";
                    $this->paginacao .= '&nbsp;...&nbsp;';

                    for (
                            $i = $this->ultimaPagina - ($this->adjacentesPaginaAtual + $this->adjacentesPaginaAtual); 
                            $i <= $this->ultimaPagina; 
                            $i++
                        )
                    {
                       if ($i == $this->paginaAtual)
                            $this->paginacao .= "<a class='paginaAtual' href='{$this->url}/{$i}'>{$i}</a>";
                        else 
                            $this->paginacao .= "<a href='{$this->url}/{$i}'>{$i}</a>";
                    }
                }
            }

            if ($this->proximaPagina <= $this->ultimaPagina && $this->ultimaPagina > 1)
                $this->paginacao .= "<a href='{$this->url}/$this->proximaPagina'>Próximo &gt;</a>";
        }
    }
?>