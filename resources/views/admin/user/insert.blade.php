@extends('layouts.admin')
@section('content')
		@if (count($errors) > 0)
      <div class="alert alert-danger" style="background-color: #ffcbca;;margin:60px 0px -65px 200px;width:360px">
          <p style="font-size:20px;">警告:</p>
              @foreach ($errors->all() as $error)
                  <p style="color:red;size:12px;margin-left:45px">{{ $error }}</p>
              @endforeach
          
      </div>
    @endif
  
          <div class="result_wrap" style="width:1024px;margin:60px 0px 0px 200px">
            <div class="result_content">
            <h1>用户详情</h1>         

<hr>
<form action="/admin/user/data" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">用户名</label>
          @if(session('errora'))
          <p style="color:red;size:12px">{{ session('errora') }}</p>
          @endif
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{ old('username') }}" name="username">
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">密码</label>
          <input type="password" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{ old('password') }}" name="password">
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">头像</label>
          @if(session('error'))
          <p style="color:red;size:12px">{{ session('error') }}</p>
          @endif
          <input type="file" name="photo" class="photo" value="">
        </div>

        <script type="text/javascript">
        $('.photo').change(function(){

          var path=$('.photo').val();
          
          $('.photos').val(path);
          
        });
        </script>


         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">个性签名</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:400px"
          value="{{ old('sign') }}" name="sign">
        </div>
        <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">昵称</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{ old('name') }}" name="name">
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">电话</label>
          <input type="text" class="form-control" id="inputSuccess1" style="width:250px"
          value="{{ old('tel') }}" name="tel">
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">生日</label>
          <select id="form_dob_year" name="year">
              <option value="-">年</option>
              <option value="2011">2011</option>
              <option value="2010">2010</option>
              <option value="2009">2009</option>
              <option value="2008">2008</option>
              <option value="2007">2007</option>
              <option value="2006">2006</option>
              <option value="2005">2005</option>
              <option value="2004">2004</option>
              <option value="2003">2003</option>
              <option value="2002">2002</option>
              <option value="2001">2001</option>
              <option value="2000">2000</option>
              <option value="1999">1999</option>
              <option value="1998">1998</option>
              <option value="1997">1997</option>
              <option value="1996">1996</option>
              <option value="1995">1995</option>
              <option value="1994">1994</option>
              <option value="1993">1993</option>
              <option value="1992">1992</option>
              <option value="1991">1991</option>
              <option value="1990">1990</option>
              <option value="1989">1989</option>
              <option value="1988">1988</option>
              <option value="1987">1987</option>
              <option value="1986">1986</option>
              <option value="1985">1985</option>
              <option value="1984">1984</option>
              <option value="1983">1983</option>
              <option value="1982">1982</option>
              <option value="1981">1981</option>
              <option value="1980">1980</option>
              <option value="1979">1979</option>
              <option value="1978">1978</option>
              <option value="1977">1977</option>
              <option value="1976">1976</option>
              <option value="1975">1975</option>
              <option value="1974">1974</option>
              <option value="1973">1973</option>
              <option value="1972">1972</option>
              <option value="1971">1971</option>
              <option value="1970">1970</option>
              <option value="1969">1969</option>
              <option value="1968">1968</option>
              <option value="1967">1967</option>
              <option value="1966">1966</option>
              <option value="1965">1965</option>
              <option value="1964">1964</option>
              <option value="1963">1963</option>
              <option value="1962">1962</option>
              <option value="1961">1961</option>
              <option value="1960">1960</option>
              <option value="1959">1959</option>
          </select>
          <select id="form_dob_month" name="month">
              <option value="-">月</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
          </select>
          <select id="form_dob_day" name="day">
              <option value="-">日</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
          </select>
           
        </div>
         <div class="form-group has-success">
          <label class="control-label" for="inputSuccess1">邮箱</label>
          <input type="text" class="form-control" id="email" style="width:400px" value="{{ old('email') }}" name="email">
        </div>

        <div class="form-group has-success" style="margin-bottom: 40px">
        <label class="control-label" for="inputSuccess1">性别</label>
         <label>

            <input type="radio" id="checkboxError" value="m" name="sex">男
        
            <input type="radio" id="checkboxError" value="w" name="sex">女

            </label>
        </div>

        <button type="submit" class="btn btn-success" style="margin-bottom: 70px">提交</button> 
</form>


@endsection