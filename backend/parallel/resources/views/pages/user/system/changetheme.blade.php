<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>

<form id="change_widget_form">
	<div class="row s8">
		<div class="col s12">
			<div class="input-field col s12">
			    <select id="theme_select" name="theme">
	      			<option value="default" @if(Auth::user()->theme == 'default') selected @endif>default</option>
	      			<option value="ocean" @if(Auth::user()->theme == 'ocean') selected @endif>ocean</option>
	      			<option value="mountain" @if(Auth::user()->theme == 'mountain') selected @endif>mountain</option>
	      			<option value="sunset" @if(Auth::user()->theme == 'sunset') selected @endif>sunset</option>
			    </select>
			    <label>Theme</label>
			</div>
		</div>
	</div>
</form>