@if (count($errors))
    <div class="style-msg2 errormsg">
        <div class="msgtitle">Fix the Following Errors:</div>
        <div class="sb-msg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
