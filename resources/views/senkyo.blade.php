@extends('layouts.app') 

@section('content')
<div class="main-content">
    <div class="senkyo-header">
        <div class="senkyo-title"><i class="fa-regular fa-handshake fa-shake" style="color: #000000;"></i> {{$senkyotitle}} <i class="fa-regular fa-handshake fa-shake" style="color: #000000;"></i></div>
        <div class="other">
            <div class="dateinfo">
                <div >投票日：{{$kouhoshas[0]['date']}}</div>
                <div >告知日：{{$kouhoshas[0]['date2']}}</div>
            </div>
            <div class="otherinfo">
                <div >前回投票率：{{$kouhoshas[0]['past']}}</div>
                <div >定数/候補者数：{{$kouhoshas[0]['amount']}}</div>
            </div>
        </div>
        <div class="form-group-tohyo">
            <a href="/totyu/{{$kouhoshas[0]['id']}}">
                <button type="submit"><i class="fa-regular fa-eye fa-beat" style="color: #000000;"></i>途中経過を見る</button>
            </a>
        </div>
    </div>
    <div class="kouhosha-list">
    @foreach($kouhoshas as $kouhosha)
        <div class="kouhosha">        
            <div class="face">
                @if($kouhosha['face']=="no image")
                <div class="no-image">{{$kouhosha['face']}}</></div>
                @else
                <a href="{{$kouhosha['face']}}">顔画像は<br> こちら</a>
                @endif
                <!-- @if($kouhosha['face']=="no image")
                <div class="no-image"><p>{{$kouhosha['face']}}</p></div>
                @else
                <img class="faceimage" src="{{$kouhosha['face']}}" alt="" height="100px" width="100px">
                @endif -->
            </div>
            <div class="kouho-profile">
                <p class="name">{{$kouhosha['name']}}</p>
                <p class="party">{{$kouhosha['party']}}</p>
                <p class="age">{{$kouhosha['age']}}</p>
                <p class="position">{{$kouhosha['position']}}</p>
                <p class="job">{{$kouhosha['job']}}</p>
            </div>
            <div class="tohyo">
                <form type= "hidden" action="POST" class="tohyo-form">
                    @csrf
                    <input type="hidden" name="hyo" value=1>
                    <input type="hidden" name="kouho-id" value="{{$kouhoshas[0]['kouho-id']}}">
                    <input type="hidden" name="senkyo-id" value="{{$kouhoshas[0]['id']}}">
                    <div class="form-group-tohyo">
                        <button type="submit"><i class="fa-regular fa-hand-point-up"></i>投票</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
