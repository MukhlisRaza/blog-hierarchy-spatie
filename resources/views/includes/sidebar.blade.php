<div class="card-body">
    <ul>
        <li><a href="{{url('/')}}">View Posts </a></li>
        @role('Admin')
        <li><a href="{{url('register_blogger')}}">Register Blogger </a></li>
        @endrole

        @role('Blogger')
        <li><a href="{{url('register_moderator')}}">Register Moderator </a></li>
        @endrole
    </ul>
</div>