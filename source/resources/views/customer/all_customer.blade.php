@extends('admin_layout')
@section('admin_conten')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê users
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-2 m-b-xs">
      </div>
      <div class="col-sm-4 m-b-xs">

      </div>
      <div class="col-sm-4">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span style="color:red;font-size: 21px;" class="text-alert" >'.$message.'</span>';
                                Session::put('message',null);
                            }
                            $i=1;
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:15px;">Stt</th>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Phone</th>
            <!-- <th>Password</th> -->
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($admin as $key => $user)
              <tr>
                <td><?= $i++;  ?></td>
                <td>{{ $user->name }}</td>
                <td>
                  {{ $user->email }}
                  <input type="hidden" name="admin_email" value="{{ $user->email }}">
                  <input type="hidden" name="admin_id" value="{{ $user->id }}">
                </td>
                <td>{{ $user->phone }}</td>
                <!-- <td>{{ $user->password }}</td> -->
              <td>
                 {{-- <a href="{{route('Admin.edit-users',$user->id)}}" class="active" ui-toggle-class=""> --}}
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a><br>
                <a  onclick="return confirm('Bạn muốn xóa Users này?')" href="{{route('Admin.delete-customer',$user->id)}}">
                  <i style="text-align: center;" class="fa fa-times text-danger text"></i></a>
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
            {!!$admin->render()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
