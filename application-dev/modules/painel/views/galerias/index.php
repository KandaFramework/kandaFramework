<?php
static::$title = 'Galeria';
use kanda\helps\Url;
?>
<style>
	
	.bar {
    height: 18px;
    background: #B0DCA2;
}

ul#Galeria li{
	border: 1px solid #ebebeb;
    display: inline-flex;
    height: 150px;
    padding: 10px;
    position: relative;
    width: 260px;
    text-align: center;
      margin-bottom: 10px;
}
ul#Galeria li:hover  span.galeria{
	display: block;
}

ul#Galeria li span{
	 background-color: #ebebeb;
    bottom: 0;
    left: 0;
    position: absolute;
    text-align: center;
    width: 100%;
     cursor: pointer;
     display: none;

}

</style>
<div class="module">
	<div class="module-head">
		<h3><?php echo static::$title ?></h3>
	</div>
	<div class="module-body">
		<form method="GET" name=" " action="<?php echo Url::base('FileUpload') ?>" class="form-horizontal row-fluid" enctype="multipart/form-data" >
			<fieldset>
				<div class="control-group">
					<label class="control-label" for="nome">Foto</label>
					<div class="controls">
						<input type="file" multiple='4' class="input-xlarge focused"  id="fileupload" name="Galeria[file]">
					</div>
				</div>
				<div class="control-group">
					<div id="progress">
						<div class="bar" style="width: 0%;"></div>
					</div>
				</div>
			</fieldset>
		</form> 
		<div>
		<ul id="Galeria">
		<?php
			$model = $model->all();

			foreach ($model as $data)
		    {
			?>
				<li id="<?php echo $data->id ?>">
					<img src="<?php echo $assets.$data->name ?>" alt="<?php echo $data->name ?>" />
					<a href="#" onclick="Delete('<?php echo Url::base('delete/'.$data->id) ?>');return false;" ><span class="galeria">Deletar</span></a>
				</li>
			<?php
			}
		?>
		</ul>
		</div> 	
	</div>
</div>
<script src="<?php echo $this->assets('vendor') ?>fileupload/js/vendor/jquery.ui.widget.js" ></script>
<script src="<?php echo $this->assets('vendor') ?>fileupload/js/jquery.iframe-transport.js" ></script>
<script src="<?php echo $this->assets('vendor') ?>fileupload/js/jquery.fileupload.js" ></script>

<script>

   var Delete = function(url){

   	$.get(url,{},function(data){
   	     
   	     if(data.success){
   	     	$('ul#Galeria li#'+data.success).fadeOut();
   	     };

   	},'JSON');
   };

	$(function () {
		$('#fileupload').fileupload({
			dataType: 'json',
			progressall: function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .bar').css(
            'width',
            progress + '%'
        );
    		},
   		done: function (e, data) {
				$.each(data.result.files, function (index, file) {
					$('<p/>').text(file.name).appendTo(document.body);
				});
			}
		});
	});
</script>