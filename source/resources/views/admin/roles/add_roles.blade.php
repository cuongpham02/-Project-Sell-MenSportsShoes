@extends('admin_layout')
@section('admin_conten')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm Role
                        </header>
                       
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{route('admin.save-roles')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Role</label><span style="color:red;"> *</span>
                                    <input type="text" name="roles_name" value="{{ old('roles_name') }}" class="form-control" placeholder="Tên roles">
                                </div>
                                @if ($errors->has('roles_name'))
                                    <p style="color:red;">{{$errors->first('roles_name') }}</p>
                                @endif
                                @foreach($permission as $per)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="permission[]" value="{{$per->id}}">
                                    <label for="exampleCheck">{{$per->name}}</label>
                                </div>
                                @endforeach
                                <button type="submit" name="add_roles" class="btn btn-info">Thêm role</button>
                                </form>
                            </div>
                        </div>
                    </section>

            </div>
@endsection