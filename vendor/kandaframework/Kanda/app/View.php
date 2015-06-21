<?php

/**
 * 
 * @package App
 * 
 * @copyright (c) KandaFramework
 * @access public
 * 
 */

namespace app;

class View extends \app\Controller {

    public static function scriptJs($js) {
        return "<script language='javaScript'>" . $js . "</script>";
    }

    /*
     * @param $msg   String
     * @param $clss  String
     * @param $local String
     */

    public static function alert($msg, $class, $return = 'form') {

        $js = "setTimeout(function(){
                    window.location.href='" . $return . "'
               
            },2000); ";
        $html = "<div class=\"alert alert-{$class}\" style=\"display:block\"><strong>{$msg}</strong></div>";
        return self::scriptJs($js) . $html;
    }

    public static function jswindowlocation($return = 'index') {

        $js = "window.location.href='" . $return . "';";
        echo self::scriptJs($js);
    }

    public static function highchartsPie($title, $data, $list, $tooltip, $name) {


        $higcharts = "<script type=\"text/javascript\">
   
    $(function(){
            var options  = { chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
            text: '{$title}'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}{$tooltip}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: '$name',
            data: [  $data ]
        }]
            }
          
        $('{$list}').highcharts(options);
            
    });    
    </script>";

        return $higcharts;
    }

    /**
     *  @access public
     *  
     *  @static public
     * 
     *  @param string $path Url para ser direcionado
     *  
     *  @param array $param Valores que serão gerados dinamico
     *  
     *  @param int $time Tempo de execução do alert
     * 
     *  @param string $form Nome do formulário que serar resetado
     *  
     *  @importante Quando chemar o método não esquecer de passar o parameto no @onlick setAjaxUpload()
     *   
     *  @exemplo Views::setAjaxUpload('http:://site.com.br/param',array('nome','email'),3000,'form')
     * 
     *  @return string Contendo do código javascript gerado
     * 
     * 
     */
    public static function setAjaxUpload($path, $param, $form = 'form', $key = '', $alert = 'alert', $time = 3000) {

        $script = '';
        $formdata = '';
 

        $script .= "<script>window.onload=function(){
       if(window.File && window.FileReader && window.FileList && window.Blob) { return true; }else { alert('Erro para carregar FileReader!'); }
}; var  setAjaxUpload$key = function(){ var  fl =  document.getElementById(\"{$param['id_upload']}\");
        if(window.FormData)
           formdata = new FormData();
            
           var file = fl.files;  if(file[0] != undefined){ 
               //   if(!!file[0].type.match(/image.*/)){ 
             	     render = new FileReader();  render.readAsDataURL(file[0]);      
              try{
                formdata.append('{$param['id_upload']}',file[0]);
                               
	     }catch(e){
		formdata.appnd('{$param['id_upload']}',file[0]);
           // }    
           } 
         }
      ";
        unset($param['id_upload']);
        foreach ($param as $campos) {
            $formdata .= "formdata.append('" . $campos . "',$('#{$campos}').val());\n";
        }
        $script .=" $formdata  $.ajax({
            url : '$path',
            type : \"POST\",
            data: formdata,
            processData : false,
            contentType : false,
            beforeSend:function(){ $(this).attr('disabled',true); $('#{$form} .spinner-mini').fadeIn(); },
            success:function(data){ var retornoClass = data.success['class'];

            setTimeout(function(){
                
            $('.$alert').fadeOut();
            $('.$alert').removeClass(retornoClass);
            $('#{$form} .spinner-mini').fadeOut();    

            if(data.success['reset']){
            document.getElementById('{$form}').reset();
                $('#imgProdutoUser').attr({src:' '});
            }
            },$time);
            $('.$alert').fadeIn().addClass(retornoClass);
            $('.$alert strong').html(data.success['msg']);  },
            error:function(){ console.log('Erro para retornar');}
       }); return false }";
        return $script .="</script>";
    }

    /**
     * @access  public
     * 
     * @static public
     * 
     * @param string $msg Messagem que serar apresentada
     * 
     * @param string $class Nome da classe
     * 
     * @param int $reset Para resetar campos do formulario
     * 
     * @param string $json Formato de retorno, por @default json
     * 
     * @importante  as classes do alert são @success, @danger, @warning, @info
     * 
     * @exemplo Views::alertjson('Cadastrado com sucesso','success',1);
     * 
     */
    public static function alertjson($msg, $class, $reset = '', $type = 'json') {
        header('Content-type:application/' . $type);
        $json = array();
        $json['success']['msg'] = $msg;
        $json['success']['class'] = 'alert-' . $class;
        $json['success']['reset'] = $reset;

        echo json_encode($json);
        exit;
    }

    /**
     * @access public
     * 
     * @static public
     * 
     * @descrição 
     * 
     */
    public static function post($path, $formId, $alert = 'alert', $key = '') {

        $script = "<script>\n  var post$key = function(){ var valorForm =  $('#{$formId}').serialize(); $('#{$formId}.spinner-mini').fadeIn(); $.post('$path',valorForm,function(data){
                
                $('#alertShow').attr({'data-noty-options':'{\"text\":\"'+data.text+'\",\"layout\":\"top\",\"type\":\"success\"}'}).click();
            },'Json'); return false; } \n</script>\n";

        return $script;
    }
 
}