@extends('App')

@section('content')
    <div class="container" >
        <div class="content" style="overflow: auto">
            <div class="col-md-4 no-padding">
                <div class="profile-container">
                    <div class="profile-name">Widi Hastomo</div>
                    <div class="profile-image-container" align="center">
                        <img class="circle profile-image" src="{{asset('upload/2.jpg')}}" alt=""/>
                    </div>
                    <div class="profile-location">
                        Jawa Tengah
                    </div>
                    <div class="follow-container" align="center">
                        <div class="col-sm-4 follow-item">200 Follower</div>
                        <div class="col-sm-4 follow-item follow-item-center">25 Post</div>
                        <div class="col-sm-4 follow-item">145 Following</div>
                    </div>
                    <div class="follow-button">
                        <a href="#"><i class="fa fa-plus"></i>&nbsp;Follow</a>
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
@endsection