<li class="tab" id="data-index" url="/admission"><a class="@if($page == 'index') active @endif waves-effect">Manage</a></li>
<li class="tab" id="data-add" url="/admission/new" id="new_admission"><a class="@if($page == 'add') active @endif waves-effect">New</a></li>


<!-- Tap Target Structure -->
  <div class="tap-target" data-activates="new_admission">
    <div class="tap-target-content">
      <h5>New Admission</h5>
      <p>Tap Here to create new admission</p>
    </div>
  </div>