@extends('layout.admin')

@section('content')
<div class="widget-body am-fr">

<form class="am-form tpl-form-line-form"  action="/admin/user" method="post" enctype='multipart/form-data'>
    @if (count($errors) > 0)
            <div class="mws-form-message error">
                <ul>
                    @foreach ($errors->all() as $error)
                    <center>
                        <li style='color:red;font-size:15px;list-style:none'>{{ $error }}</li>
                    </center>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="am-form-group">
        <label for="user-name" class="am-u-sm-3 am-form-label">用户添加 <span class="tpl-form-line-small-title">UserName</span></label>
        <div class="am-u-sm-9">
            <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入用户名" name="username">
            <small>请填写用户名。</small>
        </div>
    </div>

    <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label">密码 <span class="tpl-form-line-small-title">PassWord</span></label>
        <div class="am-u-sm-9">
            <input type="password" placeholder="输入Password" name="password">
            <small>请填写密码。</small>
        </div>
    </div>

    <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label">真实姓名 <span class="tpl-form-line-small-title">RealName</span></label>
        <div class="am-u-sm-9">
            <input type="text" placeholder="输入Realname" name="name">
            <small>请填写真实姓名。</small>
        </div>
    </div>

    <div class="am-form-group">
        <label for="user-phone" class="am-u-sm-3 am-form-label">性别 <span class="tpl-form-line-small-title">Sex</span></label>
        <div class="am-u-sm-9">
            <select name=sex data-am-selected="{searchBox: 1}" style="display: none;">
              <option value="1">男</option>
              <option value="0">女</option>
            </select>
        </div>
    </div>

    <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label">邮箱 <span class="tpl-form-line-small-title">Email</span></label>
        <div class="am-u-sm-9">
            <input type="text" placeholder="输入Email" name="email">
            <small>请填写邮箱。</small>
        </div>
    </div>

    <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label">电话号码 <span class="tpl-form-line-small-title">TEL</span></label>
        <div class="am-u-sm-9">
            <input type="text" placeholder="Tel" name="phone">
            <small>请填写电话号码。</small>
        </div>
    </div>

    <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label">邮编 <span class="tpl-form-line-small-title">Code</span></label>
        <div class="am-u-sm-9">
            <input type="text" placeholder="输入Code" name="code">
            <small>请填写邮编。</small>
        </div>
    </div>

    <div class="am-form-group">
        <label for="user-weibo" class="am-u-sm-3 am-form-label">头像 <span class="tpl-form-line-small-title">Images</span></label>
        <div class="am-u-sm-9">
            <div class="am-form-group am-form-file">
                <div class="tpl-form-file-img">
                    <img src="assets/img/a5.png" alt="">
                </div>
                <button type="button" class="am-btn am-btn-danger am-btn-sm">
                    <i class="am-icon-cloud-upload"></i> 添加头像图片</button>
                <input id="doc-form-file" type="file" multiple="" name="profile">
            </div>

        </div>
    </div>

    <div class="am-form-group">
        <label for="user-intro" class="am-u-sm-3 am-form-label">状态</label>
        <div class="am-u-sm-9">
            <div class="tpl-switch">
                <input type="checkbox" class="ios-switch bigswitch tpl-switch-btn" checked="" name="state">
                <div class="tpl-switch-btn-view">
                    <div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label">地址 <span class="tpl-form-line-small-title">Address</span></label>
        <div class="am-u-sm-9">
            <input type="text" placeholder="输入Address" name="address">
            <small>请填写地址。</small>
        </div>
    </div>

    <!-- <div class="am-form-group">
        <label for="user-intro" class="am-u-sm-3 am-form-label">地址</label>
        <div class="am-u-sm-9">
            <textarea class="" rows="10" id="user-intro" placeholder="请输入地址"></textarea>
        </div>
    </div> -->

    <div class="am-form-group">
        <div class="am-u-sm-9 am-u-sm-push-3">
            {{csrf_field()}}

            <button class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
        </div>
    </div>
</form>
</div>
@endsection