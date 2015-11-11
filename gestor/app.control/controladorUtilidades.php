<?php
    /**
      * controladorUtilidades.php
      * Classe de Controle de utilidades
      *     1.1 Validação Links Youtube
      *
      * @author  Rogério Eduardo Pereira <rogerio@rogeriopereira.info>
      * @version 1.1
      * @access  public
      */
    class controladorUtilidades
    {
        /**
         * Método corrigeNomeArquivo
         * Corrige o nome de arquivos
         * 
         * @access  public
         * @param   string $nome Nome a ser corrigido
         * @return  string Nome Corrigido
         */
        public function corrigeNomeArquivo($nome)
        {
            $nome = explode(".", $nome);

            for($i = 0; $i<count($nome); $i++)
            {
                $nome[$i] = str_replace(' ', '_', $nome[$i]);
                $nome[$i] = str_replace('/', '', $nome[$i]);
                $nome[$i] = str_replace(':', '', $nome[$i]);
                $nome[$i] = str_replace('*', '', $nome[$i]);
                $nome[$i] = str_replace('?', '', $nome[$i]);
                $nome[$i] = str_replace('"', '', $nome[$i]);
                $nome[$i] = str_replace('<', '', $nome[$i]);
                $nome[$i] = str_replace('>', '', $nome[$i]);
                $nome[$i] = str_replace('|', '', $nome[$i]);
            }

            $nome = implode('.', $nome);

            return $nome;
        }

        /**
         * Método existeArquivo
         * Adiciona '_2' no final do nome do arquivo
         * 
         * @access  public
         * @param   string $nome Nome a ser corrigido
         * @return  string Nome Corrigido
         */
        public function existeArquivo($nome)
        {
            $nomeNovo       = explode('.', $nome);
            $nomeNovo[0]    = $nomeNovo[0].'_2';
            $nomeNovo       = implode('.', $nomeNovo);

            return $nomeNovo;
        }

        /**
         * Método isValidYoutubeURL($url)
         * Verifica Validade do Link do Youtube
         * http://stackoverflow.com/questions/10426204/validate-youtube-url-and-it-should-be-exists
         * 06/08/2015 10:34
         * 
         * @since   1.1
         * @access  public
         * @param   string  $url    Url a ser verificada
         * @return  boolean         Valido/Invalido
         */
        public function isValidYoutubeURL($url) 
        {
            // Let's check the host first
            $parse = parse_url($url);
            $host = $parse['host'];
            if (strpos($host, 'youtube.com') == 0) 
                return false;

            $ch = curl_init();
            $oembedURL = 'www.youtube.com/oembed?url=' . $url.'&format=json';
            curl_setopt($ch, CURLOPT_URL, $oembedURL);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // Silent CURL execution
            $output = curl_exec($ch);
            unset($output);

            $info = curl_getinfo($ch);
            curl_close($ch);

            if ($info['http_code'] !== 404)
                return true;
            else 
                return false;
        }

        /**
         * Método getYoutubeId($url)
         * http://stackoverflow.com/questions/6556559/youtube-api-extract-video-id
         * 06/08/2015 12:37
         *
         * @since   1.1
         * @access  public
         * @param   string $url Link Youtube
         * @return  string      Youtube video id or FALSE if none found. 
         */
        function getYoutubeId($url) 
        {   
            if(strpos($url, '/watch?v=') > 0)
            {
                $url = explode('/watch?v=', $url);
            }
            return $url[1];
        }

        /**
         * Método unshorten_url($url)
         * Desencurta a URL
         * 
         * @since 1.1
         * @access  public
         * @param   string $url Url a ser desencurtada
         * @return  string      Url Desencurtada
         */
        public function unshorten_url($url) 
        {
            $ch = curl_init($url);
            curl_setopt_array($ch, array(
                                            CURLOPT_FOLLOWLOCATION => TRUE,  // the magic sauce
                                            CURLOPT_RETURNTRANSFER => TRUE,
                                            CURLOPT_SSL_VERIFYHOST => FALSE, // suppress certain SSL errors
                                            CURLOPT_SSL_VERIFYPEER => FALSE,
                                        ));
            curl_exec($ch);
            $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
            curl_close($ch);

            return $url;
        }
    }
?>