<div class="alert-wrapper">
    @if (isset($errors) && count($errors) > 0)
       <div class="alert alert-danger">
            <span class="close" data-dismiss="alert">&times;</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif(!empty(session("message")))
        <div class="alert {{isset(session("message")["alertType"])?session("message")["alertType"]:""}}">
            <span class="close" data-dismiss="alert">&times;</span>
            {!! session("message")["message"] !!}
        </div>
    @endif
    <div class="alert alert-javascript" style="display: none;">
    </div>
</div>