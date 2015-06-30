<?php
static::$title = "Contato";
?>
<div class="row">
	<div class="slide"></div>
</div>
<div class="row grid">

	<div class="col-md-9">
		<h4>Como nos encontrar </h4>

		<figure class="img_inner fleft">
			<iframe
			width="860"
			height="450"
			frameborder="0" style="border:0"
			src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDRT2U-5zaGp14iTNxysab8VVDkkVkOlPE    
			&q=Av.+Dr.+Ângelo+Teixeira+da+Costa,+44+-+Frimisa,+Santa+Luzia+-+MG,+33045-170">
		</iframe>

	</div>
	<div class="col-md-3">
		<h4>Contato</h4>
		<form class="form-inline" id="Contato">
			<div class="form-group">
				<div class="col-sm-10">
					<input type="text" class="form-control" id="Nome" placeholder="Nome">
				</div>
			</div>
			<div class="form-group">

				<div class="col-sm-10">
					<input type="text" class="form-control" id="Email" placeholder="Email">
				</div>
			</div>
			<div class="form-group">

				<div class="col-sm-10">
					<textarea name="message" class="form-control" placeholder='Mensagem' ></textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Enviar</button>
				</div>
			</div>
		</form>

	</div>
</div>