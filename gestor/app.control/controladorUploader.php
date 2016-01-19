<?php
    /**
    * Funcao Autoload
    * Carrega a classe quando for instanciada
    * 
    * @param  $classe     Classe a ser carregada
    * @return void
    */
    //Autoload
    function __autoload($classe)
    {
        $pastas = array('../app.widgets', '../app.ado', '../app.config', '../app.model', '../app.control','../app.view');
        foreach ($pastas as $pasta)
        {
            if (file_exists("{$pasta}/{$classe}.php"))
            {
              include_once "{$pasta}/{$classe}.php";
            }
        }
    }

    /**
    * controladorUploader.php
    * controlador de uploads
    * http://www.sanwebe.com/2012/05/ajax-image-upload-with-progressbar-with-jquery-and-php
    *
    * @author  Adpatado por Rogério Eduardo Pereira <rogerio@groupsofter.com.br>
    * @version 1.0     
    */
    error_reporting(E_WARNING);

    if(!empty($_FILES)) 
    {

        $listaArquivos  = $_FILES['userImage'];
        $listaNome      = $listaArquivos[name];
        $listaTemp      = $listaArquivos[tmp_name];

        $total          = count($listaNome);
        $contador       = 0;

        echo $total;

        for($i=0; $i<$total; $i++)
        {
            if(is_uploaded_file($listaTemp[$i]))
            {
                $nome = $listaNome[$i];
                $nome = (new controladorUtilidades())->corrigeNomeArquivo($nome);

                while(file_exists('../../app.view/img/'.$nome))
                {
                    if(file_exists('../../app.view/img/'.$nome))
                        $nome = (new controladorUtilidades())->existeArquivo($nome);
                }

                $sourcePath = $listaTemp[$i];
                $targetPath = "../../app.view/img/".$nome;

                if((new controladorArquivos())->upload($sourcePath,$targetPath)) 
                    $contador++;
            }
        }

        $imagens = scandir('../../app.view/img/');

        foreach ($imagens as $file) 
        {
            if(!is_dir('../../app.view/img/'.$file))
                echo 
                    "
                        <div class='2u uploaderBox'>
                            <div class='uploaderImg'>
                                <img src='../../app.view/img/{$file}'>
                            </div>
                            <input 
                                type='button' 
                                name='selecionar' 
                                id='selecionar' 
                                class='uploaderSelecionar' 
                                value='Selecionar' 
                                onclick=\"selecionaImagem('../../app.view/img/{$file}');\"
                            ><br/>
                            <input 
                                type='button' 
                                name='excluir' 
                                id='excluir' 
                                class='uploaderExcluir' 
                                value='Excluir' 
                                onclick=\"excluirImagem('../../app.view/img/{$file}');\"
                            >
                        </div>
                    ";
        }

        if($contador != $total)
            echo "<script>alert('Houve falhas ao fazer o upload de ".($total - $contador)." arquivos!');</script>";
    }
?>