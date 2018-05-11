@extends('layout.admin')

@section('content')
    <button class="am-btn am-btn-default am-btn-success">
    <a href="/admin/user/create" class="am-icon-plus am-btn-default am-btn-success">新增</a>
    </button>
	
    <div class="widget-body  widget-body-lg am-fr">

    <table width="100%" class="am-table am-table-compact tpl-table-black " id="example-r">
    <thead>
        <tr>
            <th>id</th>
            <th>用户名</th>
            <th>真实姓名</th>
            <th>头像</th>
            <th>性别</th>
            <th>地址</th>
            <th>邮编</th>
            <th>电话</th>
            <th>邮箱</th>
            <th>状态</th>
            <th>创建时间</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $k => $v)
        <tr class="gradeX">
            
            <td>{{$v->uid}}</td>
            <td>{{$v->username}}</td>
            <td>{{$v->name}}</td>
            <td><img src="{{$v->profile}}" alt="" style="width: 25px;height: 25px"></td>
            <td>
                @if($v->sex == 0)
                female
                @else
                male
                @endif
            </td>
            <td>{{$v->address}}</td>
            <td>{{$v->code}}</td>
            <td>{{$v->phone}}</td>
            <td>{{$v->email}}</td>
            <td>
                @if ($v->state=='on')
                正常
                @else
                禁用
                @endif
            </td>
            <td>{{$v->addtime}}</td>
            <td>
                <div class="tpl-table-black-operation">
                    <a href="/admin/user/{{$v->uid}}/edit">
                        <i class="am-icon-pencil"></i> 编辑
                    </a>
                    <a href="/admin/user/del/{{$v->uid}}" class="tpl-table-black-operation-del">
                        
                        <i class="am-icon-trash"></i> 删除
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
        <!-- more data -->
    </tbody>
    </table>
    
    <style>
        .tpl-pagination li{
            float:left;
            padding-left: 10px;
            padding-right: 10px;
            /*background: #3f4649;*/
        }
        #cur{
            /*background: #167fa1;*/
            color: gold;
            /*border: 1px solid #167fa1;*/
            padding: 6px 12px;
        }
        #bgc{
            background-color: black;
        }
    </style>

    <div class="am-u-lg-12 am-cf">
            <div class="am-fr">
                <ul class="am-pagination tpl-pagination" id="dva">
                    <li id="dd">{{ $data->links() }}</li>
                </ul>
            </div>
    </div>
    <script>
        $("#dva").click().attr('id','cur');
        $("#dva").mouseover(function(){
            $("#dd").attr('id','bgc');
        });
    </script>>
@endsection