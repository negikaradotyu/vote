@extends('layouts.app2') 

@section('kensenkyo')

    <div class="senkyo-header">
        <div class="senkyo-title">{{$senkyotitle}}</div>
        <div class="senkyo-title">{{$kouhoshas[0]['date']}}</div>
        <div class="senkyo-title">{{$kouhoshas[0]['id']}}</div>
        <div class="senkyo-title">{{$kouhoshas[0]['date2']}}</div>
        <div class="senkyo-title">{{$kouhoshas[0]['past']}}</div>
        <div class="senkyo-title">{{$kouhoshas[0]['amount']}}</div>
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
@endsection
