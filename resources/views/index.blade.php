@extends('layouts.master')
@section('content')
    <div class="header">
        <div class="container">
            <div class="header-title-container">
                <h2 class="header-title">Find Your Masterpiece</h2>
                <h3 class="header-title-desc">Dicover Extremly Exclusive Art</h3>
            </div>
            <div class="header-search-container">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                </span>
                </div>
            </div>
            <div class="or">
                -- OR --
            </div>
            <div class="header-button-container" align="center">
                <a class="btn btn-success header-button" href="#">Explore</a>
            </div>
        </div>
    </div>
    <div class="popular-container">
        <div class="container">
            <div class="home-title">
                <h3 class="title-text">Popular</h3>
                <div class="title-line"></div>
            </div>
            <div class="popular-content" align="center">
                <div class="col-sm-2 small-col">
                    <img class="popular-item" src="{{asset('upload/1.jpg')}}" alt=""/>
                </div>
                <div class="col-sm-2 small-col">
                    <img class="popular-item" src="{{asset('upload/2.jpg')}}" alt=""/>
                </div>
                <div class="col-sm-2 small-col">
                    <img class="popular-item" src="{{asset('upload/3.jpg')}}" alt=""/>
                </div>
                <div class="col-sm-2 small-col">
                    <img class="popular-item" src="{{asset('image')}}" alt=""/>
                </div>
                <div class="col-sm-2 small-col">
                    <img class="popular-item" src="{{asset('upload/5.jpg')}}" alt=""/>
                </div>
                <div class="col-sm-2 small-col">
                    <img class="popular-item" src="{{asset('upload/6.jpg')}}" alt=""/>
                </div>
            </div>
        </div>
    </div>
    <div class="recent-container">
        <div class="container">
            <div class="home-title">
                <h3 class="title-text">Recent</h3>
                <div class="title-line"></div>
            </div>
            <div class="category-container" align="center">
                <ul class="category-item">
                    <li class="category-item-list"><a class="category-item-link-active" href="#">All Categories</a></li>
                    <li class="category-item-list"><a class="category-item-link" href="#">Painting</a></li>
                    <li class="category-item-list"><a class="category-item-link" href="#">Digital</a></li>
                    <li class="category-item-list"><a class="category-item-link" href="#">Handicraft</a></li>
                    <li class="category-item-list"><a class="category-item-link" href="#">Sculpture</a></li>
                </ul>
            </div>
            <div class="recent-content" align="center">
                <div class="row">
                    @foreach ($artworks as $artwork)
                        <div class="col-sm-3 medium-col">
                            <div class="recent-item-container">
                                @foreach($artwork->photos as $photo)
                                    <img class="recent-item" src="{{route('images', [$photo->name, "medium-size"])}}" alt="{!! $artwork->title !!}"/>
                                @endforeach
                                <div class="recent-item-desc">
                                    <div class="recent-item-title">
                                        <a href="{{route('artwork', $artwork->slug)}}">{!! $artwork->title !!}</a>
                                    </div>
                                    <div class="recent-item-bar">
                                        <div class="col-sm-6 item-time">
                                            <span><i class="fa fa-clock-o"></i> &nbsp; 2 w 9 d 10 h </span>
                                        </div>
                                        <div class="col-sm-6 item-icon" align="right">
                                            <span><i class="fa fa-heart"></i>&nbsp;1</span>
                                            <span><i class="fa fa-comments"></i>1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="more-button-container">
                    <div class="more-button">
                        <button class="btn btn-success more-button">Load More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sold-container">
        <div class="container">
            <div class="home-title">
                <h3 class="title-text">Sold</h3>
                <div class="title-line"></div>
            </div>
            <div class="popular-content" align="center">
                <div class="col-sm-2 small-col">
                    <img class="popular-item" src="{{asset('upload/1.jpg')}}" alt=""/>
                </div>
                <div class="col-sm-2 small-col">
                    <img class="popular-item" src="{{asset('upload/2.jpg')}}" alt=""/>
                </div>
                <div class="col-sm-2 small-col">
                    <img class="popular-item" src="{{asset('upload/3.jpg')}}" alt=""/>
                </div>
                <div class="col-sm-2 small-col">
                    <img class="popular-item" src="{{asset('upload/4.jpg')}}" alt=""/>
                </div>
                <div class="col-sm-2 small-col">
                    <img class="popular-item" src="{{asset('upload/5.jpg')}}" alt=""/>
                </div>
                <div class="col-sm-2 small-col">
                    <img class="popular-item" src="{{asset('upload/6.jpg')}}" alt=""/>
                </div>
            </div>
        </div>
    </div>
@stop
