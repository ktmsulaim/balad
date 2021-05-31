@if (session()->has('success'))
<div class="style-msg successmsg">
    <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Well done!</strong> {{ session()->get('success') }}</div>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
</div>
@endif