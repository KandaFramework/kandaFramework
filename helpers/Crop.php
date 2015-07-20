<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace kanda\helpers;


class Crop {

    public static function run(){
       return new Crop();
    }

        public function convertImg($path) {

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }

    /**
     * @public
     * 
     * @param array $param Valores das variáveis
     * 
     * @example $this->WideImageOne($param = array(
      'Path'=>  array($this->getPathFile('destaque')), //Destino
      'Name'=>$_POST['nome'], //Nome da Foto
      'Size'=>array('239x239'), //Tamanho da Foto
      'File'=>'foto',             //Nome do $_FILES
      //'Delete'=>$foto['foto'], //Deve ser usando quando for upadte
      ));
     * 
     * @return string Retorna o nome da foto
     */
    public function WideImageOne($param) {

        self::extensions('wideImage.lib.WideImage');

        $file = $_FILES[$param['File']];

        $type = explode('/', $file['type']);

        $name = $this->caracteres($param['Name'] . '-' . rand(1, 300) . '.' . $type[1]);

        $i = 0;
        $count = count($param['Path']);

        while ($i < $count) {

            if (!is_dir($param['Path'][$i])) {
                echo "Path \n{$param['Path'][$i]}\n naõ encotrado";
                die();
            }

            if (isset($param['Delete']) && !empty($param['Delete'])) {

            if (!$this->WideImageDelete(array(    'Path' => $param['Path'][$i], 'Name' => $param['Delete'],
                        ))) {
                    echo '';
                }
            }

            $_load = WideImage::load($file['tmp_name']);

            $size = explode('x', $param['Size'][$i]);

            $_resize = $_load->resize((int) $size[0], (int) $size[1]);

            $_resize->saveToFile($param['Path'][$i] . $name);

            unset($_load, $_resize);

            chmod($param['Path'][$i] . $name, 775);
            ++$i;
        }

        return $name;
    }

    /**
     * 
     * @param type $param
     * 
     */
    public function WideImageDelete($param) {

        $path = $param['Path'] . $param['Name'];


        if (file_exists($path)) {

            if (unlink($path)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    /**
     * @access public
     * 
     *  
     * 
     * @param string $str Recebe uma string com caracteres especiais
     * 
     * @return string Retorna a string sem caracteres, caso aja espaços serar acrescentado @_ em cada espaço da string
     *
     * @importante Metodo foi retidado da class Upload. Caso ajax mudança no metodo replicar para o metodo Upload.
     *  
     */
    public function caracteres($string) {

        $map = array(
            'á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a',
            'é' => 'e', 'ê' => 'e', 'í' => 'i', 'ó' => 'o',
            'ô' => 'o', 'õ' => 'o', 'ú' => 'u', 'ü' => 'u',
            'ç' => 'c', 'Á' => 'A', 'À' => 'A', 'Ã' => 'A',
            'Â' => 'A', 'É' => 'E', 'Ê' => 'E', 'Í' => 'I',
            'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O',
            'Ú' => 'U', 'Ü' => 'U', 'Ç' => 'C', '?' => '()');
        $str = str_replace(' ', '-', $string);
        return strtr($str, $map);
    }

}