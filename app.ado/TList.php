<?php
    /**
      * TList.php
      * Lista todos os elementos e exibe em formato de tabela
      *    1.1 Listagem de Pedido
      *
      * @author  Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
      * @version 1.1
      * @access  public
      */
    class TList extends TRepository
    {
        /*
         *    Variaveis
         */
        /**
         * @access  private
         * @var     TCriteria   Critério de Seleção
         */
        private $criteria;
        private $tituloPagina;
        private $isPedido;


        /*
         * Métodos
         */
        public function setCriteria($criteria)
        {
            $this->criteria = $criteria;
        }

        public function setTituloPagina($tituloPagina)
        {
            $this->tituloPagina = $tituloPagina;
        }
        public function getTituloPagina()
        {
            return $this->tituloPagina;
        }

        public function setIsPedido($isPedido)
        {
            $this->isPedido = $isPedido;
        }
        public function getIsPedido()
        {
            return $this->isPedido;
        }

        /**
         * Método Construtor
         *
         * @access private
         * @return void
         */
        public function __construct()
        {
            $this->isPedido = false;
            $this->criteria = new TCriteria;
            //$this->addColumn('codigo');
        }

        /**
         * Método show()
         * Exibe as informações na tela
         * 
         * @access  public
         * @return  string
         */
        public function show()
        {
            $tabela = $this->entity[0];

            if(strpos($tabela, ' ') != false)
            {
                $tabela = explode(' ', $tabela);
                $tabela = $tabela[0];
            }

            $conteudo = "";
            $conteudo .= "
                            <div id='listagem'>
                                <span class='center'>
                                    <h1 
                                        alt='{$this->tituloPagina}' 
                                        title='{$this->tituloPagina}'
                                    >
                                        {$this->tituloPagina}
                                    </h1>
                                </span>
                            ";

            if($this->isPedido == false)
                $conteudo .= 
                            "                
                                <input 
                                    type='button' 
                                    name='Incluir' 
                                    id='Incluir' 
                                    value='Incluir' 
                                    onclick=\"top.location='/{$tabela}/salvar';\"
                                >
                            ";

            $conteudo .= "      
                            <br/><br/>
                            <hr>
                            <br/>
                        ";

            $collection = $this->load($this->criteria);

            if(count($collection) > 0)
            {
                $conteudo .= 
                            "
                                <table>
                                    <th style='background-color: #ffffff; border: none;'>
                                    </th>                       
                            ";

                foreach ($this->columns as $coluna) 
                {
                    if(strpos($coluna, '.') == 1)
                    {
                        $coluna = explode('.', $coluna);
                        $coluna = $coluna[1];
                    }

                    $col = ucfirst($coluna);
                    $conteudo .= "<th>{$col}</th>";
                }
                     
                foreach ($collection as $object) 
                {
                    if($this->isPedido == false)
                        $conteudo .= 
                                    "
                                      <tr>
                                        <td>
                                            <!--Apagar-->
                                            <a 
                                                href='#' 
                                                title='Apagar' 
                                                alt='Apagar' 
                                                onclick=\"apagar('{$tabela}',{$object->codigo});\"
                                            >
                                                <img src='/app.view/img/delete.png' alt='Apagar' title='Apagar'>
                                            </a>

                                            <!--Editar-->
                                            <a 
                                                href='#' 
                                                title='Editar' 
                                                alt='Editar' 
                                                onclick=\"top.location='{$tabela}/salvar/{$object->codigo}';\"
                                            >
                                                <img src='/app.view/img/edit.png' alt='Editar' title='Editar'>
                                            </a>
                                      </td>
                                    ";
                    else
                        $conteudo .= 
                                    "
                                      <tr>
                                        <td>
                                            <!--Editar-->
                                            <a 
                                                href='#' 
                                                title='Editar' 
                                                alt='Editar' 
                                                onclick=\"top.location='{$tabela}/checar/{$object->codigo}';\"
                                            >
                                                <img src='/app.view/img/view.png' alt='Visualizar' title='Visualizar'>
                                            </a>
                                      </td>
                                    ";

                    foreach ($this->columns as $coluna) 
                    {
                        if(strpos($coluna, '.') == 1)
                        {
                            $coluna = explode('.', $coluna);
                            $coluna = $coluna[1];
                        }

                        if($coluna == 'imagem')
                        {
                          $conteudo .= "<td><img src='{$object->$coluna}' title='Imagem' alt='Imagem' class='listImage'></td>";
                        }
                        else if(($coluna == 'inicio') || ($coluna == 'fim'))
                        {
                          $conteudo .= "<td>{controladorData::converteData($object->$coluna)}</td>";
                        }
                        else if($coluna == 'ativo')
                        {
                          if($object->$coluna == 0)
                            $conteudo .= "<td><span style='color: red;'>Inativo</span></td>";
                          else
                            $conteudo .= "<td><span style='color: green;'>Ativo</span></td>";
                        }
                        else
                          $conteudo .= '<td>'.$object->$coluna.'</td>';
                    }

                    $conteudo .= '</tr>';
                }
                  
                $conteudo .= "</table></div>";
            }
            else
              $conteudo .= 'Não há nenhum item!';

            return $conteudo;
        }
    }
?>