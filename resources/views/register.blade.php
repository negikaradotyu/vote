@extends('layouts.app2') 

@section('content')
<div class="register-content">
    <h3>新規アカウント作成</h3>
    <form onsubmit="return validateForm();" class="regist" method='POST' action="/store" name="store">
    @csrf
        <div class="phrase"><p>User Name (半角英数字・記号のみ)</p>
            <textarea required oninput="this.value=this.value.replace(/[^a-zA-Z0-9!@#$%^&*()_+={}[\]:;<>,.?~\\/-@]/g,'');" class="form-control"  name="username" rows="1" placeholder="enter your username"></textarea>
        </div>
        <div class="phrase"><p>e-mail (半角英数字・記号のみ)</p>
            <textarea  required oninput="this.value=this.value.replace(/[^a-zA-Z0-9!@#$%^&*()_+={}[\]:;<>,.?~\\/-@]/g,'');" class="form-control"  name="email" rows="1" placeholder="enter your username"></textarea>
        </div>
        <div class="phrase"><p>Password (半角英数字・記号のみ)</p>
            <input  type="password" required oninput="this.value=this.value.replace(/[^a-zA-Z0-9!@#$%^&*()_+={}[\]:;<>,.?~\\/-@]/g,'');" class="form-control"  name="password" rows="1" placeholder="enter your username"></input>
        </div>
        <div class="phrase"><p>もう一度、Password (半角英数字・記号のみ)</p>
            <input  type="password" required oninput="this.value=this.value.replace(/[^a-zA-Z0-9!@#$%^&*()_+={}[\]:;<>,.?~\\/-@]/g,'');" class="form-control"  name="confirmed-password" rows="1" placeholder="enter your username"></input>
        </div>
        <div class="phrase"><p>被選挙区</p>
            <select class="form-select" name="location">
                <option value= 0 disabled selected>お住まいの都道府県を選択</option>
                @foreach($kens as $ken)
                <option value="{{$ken['kenkanji']}}">{{$ken['kenkanji']}}</option>
                @endforeach
            </select>
        </div>
        <div class="phrase"><p>年代</p>
            <select class="form-select" name="age_group">
            <option value=8 disabled selected>年代を選択</option>
                <option value=0>18歳未満</option>
                <option value=1>18歳～29歳</option>
                <option value=2>30歳～39歳</option>
                <option value=3>40歳～49歳</option>
                <option value=4>50歳～59歳</option>
                <option value=5>60歳～69歳</option>
                <option value=6>70歳～79歳</option>
                <option value=7>80歳以上</option>
            </select>
        </div>
        <div class="phrase"><p>性別</p>
            <select class="form-select" name="gender">
            <option value= 3 disabled selected>性別を選択</option>
                <option value=0>男性</option>
                <option value=1>女性</option>
                <option value=2>未選択</option>
            </select>
        </div>
        <button type="submit">登録</button>
    </form>
    <script>
        function validateForm() {
            var password = document.getElementsByName('password')[0].value;
            var confirmedPassword = document.getElementsByName('confirmed-password')[0].value;

            if (password !== confirmedPassword) {
                alert('パスワードが一致しません');
                return false; // 送信を阻止
            }
            return true; // フォームを送信
        }
    </script>
</div>
@endsection