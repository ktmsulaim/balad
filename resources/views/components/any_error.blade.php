@if($errors->any())
<div class="style-msg errormsg">
    <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong> {{$errors->first()}}</div>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
</div>
@endif