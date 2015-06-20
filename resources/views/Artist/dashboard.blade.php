@extends('App')

@section('content')
    <div class="container" >
        <div class="row">
            <div class="col-md-4">
                <div class="profile-container">
                    <div class="profile-name">{!! $user->name !!}</div>
                    <div class="profile-image-container" align="center">
                        <img class="circle profile-image" src="{{asset('image/2.jpg')}}" alt=""/>
                        {{--<span><i class="fa fa-pencil"></i></span>--}}
                    </div>
                    <div class="profile-location">
                        @if(!is_null($user->province))
                            {!! $user->province->name !!}
                        @endif
                    </div>
                    <div class="follow-container" align="center">
                        <div class="col-sm-4 follow-item">200 Follower</div>
                        <div class="col-sm-4 follow-item follow-item-center">25 Post</div>
                        <div class="col-sm-4 follow-item">145 Following</div>
                    </div>
                    {{--<div class="follow-button">--}}
                    {{--<a href="#"><i class="fa fa-plus"></i>&nbsp;Follow</a>--}}
                    {{--</div>--}}
                    <div>
                        <ul class="list">
                            <li class="list-item"><a class="list-item-link" href="{{ url('/dashboard') }}"><i class="fa fa-th-large"></i> &nbsp; Dashboard</a></li>
                            <li class="list-item"><a class="list-item-link" href="{{ url('/upload') }}"><i class="fa fa-upload"></i> &nbsp; Upload</a></li>
                            <li class="list-item"><a class="list-item-link" href="{{ url('/artist', Auth::user()->username )}}"><i class="fa fa-user"></i> &nbsp; Profile</a></li>
                            <li class="list-item"><a class="list-item-link" href="{{ url('/artist/dashboard') }}"><i class="fa fa-envelope-o"></i> &nbsp; Message</a></li>
                            <li class="list-item"><a class="list-item-link" href="{{ url('/artist/dashboard') }}"><i class="fa fa-bullhorn"></i> &nbsp; Notification</a></li>
                            <li class="list-item"><a class="list-item-link" href="{{ url('/artist/dashboard') }}"><i class="fa fa-shopping-cart"></i> &nbsp; Order</a></li>
                            <li class="list-item"><a id="nav-menu" data-id="setting" class="list-item-link" href="#"><i class="fa fa-cogs"></i> &nbsp; Setting</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 no-padding">
                <div class="profile-content-container">
                    <div class="profile-header">
                        <a href="#" class="col-sm-4 profile-header-menu-active">
                            <i class="fa fa-rocket"></i> &nbsp;Activity
                        </a>
                        <a href="#" class="col-sm-4 profile-header-menu">
                            <i class="fa fa-picture-o"></i> &nbsp;Gallery
                        </a>
                        <a href="#" class="profile-header-menu">
                            <i class="fa fa-qrcode"></i> &nbsp;Collection
                        </a>
                    </div>
                    <div class="profile-content">
                        falsdkghalks
                    </div>
                </div>
            </div>
        </div>
    <script>
        $(document).ready(function(){
            $('#nav-menu').click(function(){
                var id = $(this).data("id");
                var rootPath = "http://localhost:8000";
//                alert(rootPath + '/dashboard/nav/'+id);
                $.ajax({
                    url: '/dashboard/nav/'+id,
                    type: "GET", // not POST, laravel won't allow it
                    success: function(data){
                        $data = $(data); // the HTML content your controller has produced
                        $('.profile-content-container').fadeOut().html($data).fadeIn();
                    }
                });
            });
        });
    </script>
@endsection