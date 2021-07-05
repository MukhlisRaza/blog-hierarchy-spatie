<div class="card-body">
    <ul>

        @foreach($bloggerModerator as $bloggerModerators)
        <li><a href="{{url('dashboard/blogger/'.$bloggerModerators['id'])}}">{{$bloggerModerators['name']}} </a> </li>
        @endforeach

    </ul>
</div>