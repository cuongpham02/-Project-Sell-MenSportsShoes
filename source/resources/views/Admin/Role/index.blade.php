@extends('admin_layout')
@section('admin_conten')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê roles
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-4 m-b-xs">
                    <a href="{{route('Admin.add-roles')}}" class="btn btn-sm btn-success">Thêm Roles</a>
                </div>
                <div class="col-sm-5">
                </div>
                <div class="col-sm-3">
                </div>
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span style="color:red" class="text-alert" >'.$message.'</span>';
                    Session::put('message',null);
                }
                $i=1;
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:15px;">Stt</th>
                        <th>Name role</th>
                        <th>Description</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $key => $role)
                        <tr>
                            <td>{{ $index ? $index++ : '' }}</td>
                            <td>{{ $role->role_name }}</td>
                            <td>{{ $role->desc }}</td>
                            <td>
                                <a href="{{route('admin.roles.edit',$role->id)}}" class="active" ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i></a><br>
                                <form action="{{ route('admin.roles.delete',$role->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Bạn muốn xóa Role này?')">
                                        <i style="text-align: center;" class="fa fa-times text-danger text"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-5 text-right text-center-xs">

                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                             {!!$roles->render()!!}
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
