<?php
    /**
      * TList.php
      * Lista todos os elementos e exibe em formato de tabela
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.0
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


        /*
         * Métodos
         */
        public function setTituloPagina($tituloPagina)
        {
            $this->tituloPagina = $tituloPagina;
        }
        public function getTituloPagina()
        {
            return $this->tituloPagina;
        }

        /**
         * Método Construtor
         *
         * @access private
         * @return void
         */
        public function __construct()
        {
            $this->criteria = new TCriteria;
            $this->addColumn('codigo');
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
            $conteudo = "";
            $conteudo = "
                            <div id='listagem'>
                                <span class='center'>
                                    <h1 
                                        alt='{$this->tituloPagina}' 
                                        title='{$this->tituloPagina}'
                                    >
                                        {$this->tituloPagina}
                                    </h1>
                                </span>

                                <input 
                                    type='button' 
                                    name='Incluir' 
                                    id='Incluir' 
                                    value='Incluir' 
                                    onclick=\"top.location='/{$this->entity[0]}/salvar';\"
                                >
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
                    $col = ucfirst($coluna);
                    $conteudo .= "<th>{$col}</th>";
                }
                     
                foreach ($collection as $object) 
                {
                    $conteudo .= 
                                "
                                  <tr>
                                    <td>
                                        <!--Apagar-->
                                        <a 
                                            href='#' 
                                            title='Apagar' 
                                            alt='Apagar' 
                                            onclick=\"apagar('{$this->entity[0]}',{$object->codigo});\"
                                        >
                                            <img src='/app.view/img/delete.png' alt='Apagar' title='Apagar'>
                                        </a>

                                        <!--Editar-->
                                        <a 
                                            href='#' 
                                            title='Editar' 
                                            alt='Editar' 
                                            onclick=\"top.location='{$this->entity[0]}/salvar/{$object->codigo}';\"
                                        >
                                            <img src='/app.view/img/edit.png' alt='Editar' title='Editar'>
                                        </a>
                                  </td>
                                ";
                    foreach ($this->columns as $coluna) 
                    {
                        if($coluna == 'imagem')
                        {
                          $conteudo .= "<td><img src='{$object->$coluna}' title='Imagem' alt='Imagem' class='listImage'></td>";
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