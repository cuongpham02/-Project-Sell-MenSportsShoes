<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
{{--                <!-- <li>--}}
{{--                    <a class="active" href="{{URL::to('/dashboard')}}">--}}
{{--                        <i class="fa fa-dashboard"></i>--}}
{{--                        <span>Tổng quan</span>--}}
{{--                    </a>--}}
{{--                </li> -->--}}
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <!-- <li><a href="{{ route('admin.dashboard.index') }}">Thêm danh mục</a></li> -->
                        <li><a href="{{ route('admin.dashboard.index') }}">Liệt kê danh mục</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="{{ route() }}">
                        <i class="fa fa-book"></i>
                        <span>Thương hiệu sản phẩm</span>
                    </a>
{{--                    <ul class="sub">--}}
{{--                        <!-- <li><a href="{{route('admin.dashboard.index')}}" >Thêm Thương Hiệu</a></li>  -->--}}
{{--                        <li><a href="{{route('admin.dashboard.index')}}">Liệt Kê Thương Hiệu </a></li>--}}
{{--                    </ul>--}}
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản Phẩm</span>
                    </a>
                    <ul class="sub">
                        <!-- <li><a href="{{ route('admin.dashboard.index') }}">Thêm sản phẩm</a></li> -->
                        <li><a href="{{route('admin.dashboard.index')}}">Liệt kê sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Bình luân</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.dashboard.index')}}">Liệt kê bình luận</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.dashboard.index')}}">Quản lý đơn hàng</a></li>
                    </ul>
                    <!-- <ul class="sub">
						<li><a href="{{route('admin.dashboard.index')}}">Quản lý đơn hàng</a></li>
                    </ul> -->
                </li>
                <!-- kiểm tra coi id đang đăng nhập có những quyền nào -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('admin.dashboard.index')}}">Liệt kê Roles</a></li><li><a href="{{route('admin.dashboard.index')}}">Liệt kê Users</a></li>
                        <!-- <li><a href="{{route('admin.dashboard.index')}}">Liệt kê Users</a></li> -->
                        <li><a href="{{route('admin.dashboard.index')}}">Liệt kê Tk.Đăng kí</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
