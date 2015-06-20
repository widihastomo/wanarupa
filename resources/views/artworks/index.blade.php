@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="content">
            <div>
                <i class="fa fa-home"></i>&nbsp;Home / Painting / Road (Mountain View)
            </div>
            <hr >
            <div class="content-title">
                <h1>Road (Mountain View)</h1>
                <div class="artwork-container">
                    <div class="col-sm-7" style="border-right: 1px solid #EFEFEF;">
                        <div class="artwork-image-container">
                            <img class="artwork-image" src="{{asset('upload/1.jpg')}}" alt="image"/>
                            <div class="artwork-description">
                                <p>Painting: Oil on Canvas. oil on linen (2014). Sides 3.5 cm painted silver. Varnished. Ready to hang (wire attached).</p>
                            </div>
                            <div class="more-container">
                                <h4>More By Widi Hastomo</h4>
                                <div class="col-sm-3 small-col">
                                    <img class="popular-item" src="{{asset('upload/1.jpg')}}" alt=""/>
                                </div>
                                <div class="col-sm-3 small-col">
                                    <img class="popular-item" src="{{asset('upload/2.jpg')}}" alt=""/>
                                </div>
                                <div class="col-sm-3 small-col">
                                    <img class="popular-item" src="{{asset('upload/3.jpg')}}" alt=""/>
                                </div>
                                <div class="col-sm-3 small-col">
                                    <img class="popular-item" src="{{asset('upload/4.jpg')}}" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 artwork-sidebar">
                        <div class="artist-container">
                            <div class="artist-image-container">
                                <img class="circle" src="{{asset('upload/1.jpg')}}" alt="image"/>
                            </div>
                            <div class="artist-desc-container">
                                <div class="artist-name">
                                    <a class="artist-name" href="#">Widi Hastomo</a>
                                    <br>
                                    <a class="artist-location" href="#">Jawa Tengah</a>
                                </div>
                            </div>
                        </div>
                        <div class="material-container">
                            <div class="col-md-6" style="padding: 0">
                                <i class="material-icon fa fa-cubes " style="line-height: 2; font-size: 8pt;"></i> &nbsp; Canvas<br>
                                <i class="fa fa-usd material-icon" style="line-height: 2; font-size: 8pt;"></i> &nbsp; Rp 25.000.000
                            </div>
                            <div class="col-md-6" style="padding: 0">
                                <i class="fa fa-expand material-icon" style="line-height: 2; font-size: 8pt;"></i> &nbsp; 180 cm x 200cm
                            </div>
                        </div>
                        <div class="auction-container">
                                <div class="auction-title">
                                    <div class="col-sm-3">Auction</div>
                                    <div class="col-sm-9 auction-time" align="right"><i class="fa fa-clock-o"></i>&nbsp;19 Day 10 Hour 21 Min</div>
                                </div>
                                <div class="auction-price">
                                    <ul class="list-price">
                                        <li class="list-price-item"><a class="green" href="#">Widi</a> : Rp 23.900.000 </li>
                                        <li class="list-price-item"><a class="green" href="#">Widi</a> : Rp 23.900.000 </li>
                                        <li class="list-price-item"><a class="green" href="#">Widi</a> : Rp 23.900.000 </li>
                                        <li class="list-price-item"><a class="green" href="#">Widi</a> : Rp 23.900.000 </li>
                                        <li class="list-price-item"><a class="green" href="#">Widi</a> : Rp 23.900.000 </li>
                                        <li class="list-price-item"><a class="green" href="#">Widi</a> : Rp 23.900.000 </li>
                                        <li class="list-price-item"><a class="green" href="#">Widi</a> : Rp 23.900.000 </li>
                                        <li class="list-price-item"><a class="green" href="#">Widi</a> : Rp 23.900.000 </li>
                                    </ul>
                                </div>
                                <div class="bid-container">
                                    <div class="col-md-5" style="padding: 0;line-height: 2;"><label>Get your place, bid now </label></div>
                                    <div class="col-md-7" style="padding: 0;" align="right">
                                        <select class="bid-price">
                                            <option>24.000.000</option>
                                            <option>24.100.000</option>
                                            <option>24.200.000</option>
                                            <option>24.300.000</option>
                                            <option>24.400.000</option>
                                        </select>
                                        <button class="btn bid-button">Bid</button>
                                    </div>
                                </div>
                                <div class="separator border-orange"></div>
                                <div class="or-auction">or</div>
                                <button class="btn get-it-button">Get It for Rp 30.000.000</button>
                        </div>
                        <div class="auction-footer">
                            {{--<div class="col-sm-6"><button class="btn btn-primary">Procedure</button></div>--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<button class="btn btn-danger">Report</button></div>--}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop