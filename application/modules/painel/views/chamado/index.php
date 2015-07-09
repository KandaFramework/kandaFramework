<?php
static::$title = 'Chamados';
use helps\Url;
use widgets\GridView;
 

function TdDinamic($td){
     return "<td>$td</td>";
}
 $status = ['', 'Aberto', 'Concluído', 'Pendente', 'Andamento'];

?>

<div class="module">
    <div class="module-head">
        <h3><?php echo static::$title ?></h3>
        <a href="<?php echo Url::base('create') ?>" class="btn btn-small btn-success param">Abrir Chamado</a>
        
    </div>
    <div class="module-body">
            
        <br> 
        <table class="table datatable-1 table-striped table-bordered table-condensed dataTable">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Chamado</th>

                    <th>Criação</th>
                    <?php
                    $i = 0;
                    $order = [];
                    foreach ($table['thead'] as $theade) {
                        $theade = (object) $theade; 
                        ?>
                        <th><?php echo $theade->name ?></th>
                        <?php
                        ++$i;
                    }
                    ?>
                    <th>Ação</th>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                
                <?php
                foreach ($table['tbody'] as $tbody):
                   
                ?>
                <tr>
                    <td><?php echo $status[$tbody['status']] ?></td>
                    <td><?php echo $tbody['tickt'] ?></td>
                    <td><?php echo $tbody['criacao'] ?></td>
                    <?php
                    $td = '';
                    $j=0;   
                    if(isset($tbody['dinamic'])):
                    foreach ($tbody['dinamic'] as $key => $type){
                       
                        if($type[2])
                            $td .= TdDinamic ($type[2]);
                        
                        if($type[1])
                           $td .= TdDinamic ($type[1]);
                        
                        if($type[3])
                           $td .= TdDinamic ($type[3]);
                       
                        ++$j;
                    } 
                    endif;
                    /**
                         * Caso não tenha a coluna, serar criado a td
                         */
                        if ($i > $j) {
                            for ($j; $j < $i; $j++)
                                $td .= "<td>-</td>";
                        }
                       echo $td;
                    ?>
                     
                    <td>
                        <a title="editar" href="<?php echo Url::base("tramit/{$tbody['id']}") ?>"><i class="menu-icon icon-edit"></i></a>
                    </td>
                </tr>
                 <?php
                endforeach;
                ?>
            </tbody>
        </table>

    </div><!-- /.box-body -->
    </div><!-- /.box-body -->
    
    <script>
    
    </script>
    
            