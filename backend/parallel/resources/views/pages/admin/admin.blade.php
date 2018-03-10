@if($fullpage)
	@include('pages.admin.index')
@else

	<div class="col s8">
		<div class="detail-card card hoverable s12">
			<div class="card-content">
				<span class="card-title">School Widget</span>
				
			</div>
			
		</div>
	</div>

	@include('widget.clock')
	@include('widget.search')

	<div class="col s3">
		<div class="detail-card card hoverable s12">
			<div class="card-content">
				<span class="card-title">Weather <i class="material-icons">mountain</i></span>
				<p>cannot get weather data. You are not connected to the internet</p>
				
			</div>
			
		</div>
	</div>

	@include('widget.contact')
@endif