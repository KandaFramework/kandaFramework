<?php

/**
 * @copyright (c) KandaFramework 2014
 * @access public
 *
 *
 * @GridView Criação de tables dinâmicas
 *
 */

namespace widgets;

use app\Controller;
use base\AbstractWidget; 
use helps\Html;
use helps\Bootstrap;

class GridView extends AbstractWidget {

    /**
     * @access public
     *
     * @static
     *
     * @description Gerar table dinâmicamente.
     * Conforme os parametros do SQL
     *
     *
     * @param arary $dataProvider Serar carregado os dados recupedados conforme
     * os parametros montado no sql
     *
     * @param array $columns Colunas a ser exibidas na table
     *
     * @param arary $actionColumns Ações para update, delete, view.
     * A url base é carregada conforme a view
     *
     *
     * @example
     * <code>
     *  columns =>[
     *      @string nome,
     *      @array  nivel =>[
     *              @string 'header'=>'Kanda',
     *              @object 'container' => function( @object $model, @int $key){
     *               @model Valores do dataProvaider
     *               @key   Valor do id da dataProvaider_@primary_key
     *              }
     *      ]
     *  ];
     * </code>
     *

     *
     * @description Os valores da $dataProvider deve ser no padrão do ActiveRecord
     *
     * @example
     *
     * <code>
     * array_merge(
      ['data'=> Kanda::find_by_sql("SELECT nome FROM kanda ")],
      Kanda::attributeLabels(),['primary_key'=>Kanda::$primary_key, ]
      );
     *
     * </code>
     *
     * @example
     *
     * <code>
     *   echo GridView::widget([
     *      'dataProvider' => $dataProvider,
      'columns' => [
      'nivel' => [
      'header'=>'KandaFramework',
      'container'=> function($model,$key){
      return $key;
      }
      ],
      'nome',
      ],
      'actionColumns'=>['update','delete'],
     *  ]);
     * </code>
     */
    public static function widget($param) {

        $tbody = '';
        $thead = Html::tr();
        $table = '';


        foreach ($param['columns'] as $columns) {
 
            if (is_array($columns)) {
                $thead .= Html::th($columns['header']);
            } else {
                if (isset($param['dataProvider'][$columns]))
                    $thead .= Html::th($param['dataProvider'][$columns]);
                else {
                    $thead .= Html::th(ucfirst($columns));
                }
            }
        }

        $thead .= Html::th('Açao');
        $thead .= Html::endtr();

        $i = 0;
        $page = 0;
        /**
         * Paginação
         */
        if (isset($_GET['pg']) && !empty($_GET['pg']))
            $page = $_GET['pg'] - 1;

        $dataProvider = $param['dataProvider']['data'];

        if (!$param['dataTable'] && isset($param['dataTable'])) {
            $dataProvider = array_chunk($param['dataProvider']['data'], $param['result']);
            $count = count($dataProvider);
            $dataProvider = $dataProvider[$page];
        }

        /**
         * Montando a table
         */
        foreach ($dataProvider as $column) {

            $primary_key = $column->$param['dataProvider']['primary_key'];

            $tbody .= Html::tr(['id' => 'dataProvider_' . $primary_key]);

            foreach ($param['columns'] as $columns) {

                if (is_array($columns)) {
                    $tbody .= Html::td($columns['container']($param['dataProvider']['data'][$i], $primary_key));
                } else {
                    if (isset($column->$columns))
                        $tbody .= Html::td($column->$columns);
                    else
                        $tbody .= Html::td('-');
                }
            }
            $tbody .= Html::td(self::createActionColumns($param['actionColumns'], $param['dataProvider']['primary_key'], $primary_key));
            $tbody .= Html::endtr();
            ++$i;
        }

        if (!$param['dataTable'] && isset($param['dataTable'])) {
            $li = '';
            for ($j = 1; $j < $count + 1; ++$j) {
                $li .=  Html::li(Html::a($j, "?pg=$j"));
            }

            $classPaginate = (isset($param['classPaginate'])) ? $param['classPaginate'] : '';

            $tfoot =  Html::tr().Html::td(Bootstrap::pagination($li)).Html::endtr();
                     
        }
 
        return Html::table($thead, $tbody, $tfoot, ['class'=>"table {$param['classTable']} "]);
    }

    /**
     *
     * @param  type $action
     * @return type
     */
    protected static function createActionColumns($action, $param, $id) {


        $i = 0;
        $count = count($action);
        $Action = [];

        $url =  Controller::$baseUrl . '/' . Controller::$base; 
        
        $actionColumn = [
            'update' => Html::a('editar',"$url/update/$id", ['class'=>'btn btn-info']),
            'delete' => Html::a('deletar',"$url/delete/$id", ['class'=>'btn btn-danger','onclick'=>"if(confirm('Deseja excluir esse item?')){return true;}else{return false;};"]), 
            'view'   => Html::a('visualizar',"$url/view/$id", ['class'=>'btn btn-success']), 
        ];
        foreach ($action as $columns) {

            if (is_array($columns)) {

                $Action[] = $columns['container']($id);
            } else {
                while ($i < $count) {
                    $Action[] = $actionColumn[$action[$i]];
                    ++$i;
                }
            }
        }
        return implode(' ', $Action);
    }

}