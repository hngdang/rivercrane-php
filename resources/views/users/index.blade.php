@extends('layouts.master')

@section('title','Quản lý nhân viên')

@section('content')
<h1></h1>
    <div class="d-flex justify-content-between border-bottom pb-2">
        <h3>Nhân viên</h3>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" id="addUserButton" data-bs-target="#addUserModal">
            <i class="bi bi-person-plus-fill me-2"></i>Thêm mới
        </button>
        @include('modals.add-user')
    </div>

    <div class="container-fluid mt-3">
        <form action="" method="GET">
            <div class="row">
                <div class="col-md-3">
                    <label class="d-block fw-bold" for="name">Tên</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Nhập họ tên">
                </div>
                <div class="col-md-3">
                    <label class="d-block fw-bold" for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" placeholder="Nhập email">
                </div>
                <div class="col-md-3">
                    <label class="d-block fw-bold" for="group">Nhóm</label>
                    <select class="form-select" name="group">
                        <option value="">Chọn nhóm</option>
                        @foreach ($groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="d-block fw-bold" for="status">Trạng thái</label>
                    <select class="form-select" name="status">
                        <option value="">Chọn trạng thái</option>
                        <option value="1">Đang hoạt động</option>
                        <option value="-1">Tạm khóa</option>
                    </select>
                </div>
            </div>

            <div class="my-3">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="bi bi-search me-2"></i>Tìm kiếm
                </button>
                <a href="{{route('get.users')}}" type="button" class="btn btn-warning btn-sm" id="deleteSearch">
                    <i class="bi bi-x-lg me-2"></i>Xóa tìm
                </a>
            </div>
        </form>
    </div>

    @if(!empty($users))
        <div class="d-flex justify-content-center">
            {{ $users->appends(request()->except('page'))->links('components.pagination') }}
        </div>
    @endif

    <table class="table">
        <thead class="bg-danger text-light">
            <tr>
                <th>#</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Nhóm</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->group->name}}</td>
                <td class="{{$user->getStatus($user->is_active)['class']}}">{{$user->getStatus($user->is_active)['name']}}</td>
                <td>
                    <button type="button" class="btn btn-sm editButton" value="{{$user->id}}">
                        <i class="bi bi-pencil-fill text-info"></i>
                    </button>
                    @include('modals.edit-user')
                    <button type="button" class="btn btn-sm deleteButton" value="{{$user->id}}">
                        <i class="bi bi-trash-fill text-danger"></i>
                    </button>
                    @include('modals.delete-user')
                    <button type="button" class="btn btn-sm blockButton" value="{{$user->id}}">
                        <i class="bi bi-person-x-fill"></i>
                    </button>
                    @include('modals.block-user')
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>

    @if(!empty($users))
        <div class="d-flex justify-content-center">
            {{ $users->appends(request()->except('page'))->links('components.pagination') }}
        </div>
    @endif

    @empty($user)
        <h5 class="text-center fw-bold text-primary">Không có dữ liệu.</h5>
    @endempty
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.addUser', function (e) {
                e.preventDefault();
                var data = {
                    'name': $('.name').val(),
                    'email': $('.email').val(),
                    'password': $('.password').val(),
                    'confirm': $('.confirm').val(),
                    'group': $('.group').val(),
                    'status': $(".status:checked").val()
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/rivercrane/users",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 200){
                            $(document).ajaxStop(function(){
                                window.location.reload();
                            });
                        }else{
                            $.each(response.errors, function (key, value) { 
                                $('span.'+key+'_error').html("");
                                $('span.'+key+'_error').removeClass("d-none");
                                $('span.'+key+'_error').text(value[0]);
                            });
                        }
                    }
                });
            });

            $(document).on('click', '.editButton', function (e) {
                e.preventDefault();
                var userId = $(this).val();
                $('#editUserModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "/rivercrane/users/edit/"+userId,
                    success: function (response) {
                        if(response.status == 200){
                            $('#editUserName').val(response.user.name);
                            $('#editUserEmail').val(response.user.email);
                            $('#editUserGroup').val(response.user.group_role);
                            $('#editUserStatus').val(response.user.is_active);
                            $('#editUserId').val(response.user.id);
                        }
                    }
                });
            });

            $(document).on('click', '.editUser', function (e) {
                e.preventDefault();
                var userId = $('#editUserId').val();

                var data = {
                    'name': $('#editUserName').val(),
                    'email': $('#editUserEmail').val(),
                    'password': $('#editUserPass').val(),
                    'confirm': $('#editUserConfirm').val(),
                    'group': $('#editUserGroup').val(),
                    'status': $("#editUserStatus:checked").val()
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/rivercrane/users/edit/"+userId,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 200){
                            $(document).ajaxStop(function(){
                                window.location.reload();
                            });
                        }else{
                            $.each(response.errors, function (key, value) { 
                                $('span.'+key+'_error').html("");
                                $('span.'+key+'_error').removeClass("d-none");
                                $('span.'+key+'_error').text(value[0]);
                            });
                        }
                    }
                });
            });

            
            $(document).on('click', '.deleteButton', function (e) {
                e.preventDefault();
                var userId = $(this).val();
                $('#deleteUserId').val(userId);
                $('#deleteUserModal').modal('show');
            });

            $(document).on('click', '.deleteUser', function (e) {
                e.preventDefault();
                var userId = $('#deleteUserId').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/rivercrane/users/delete/"+userId,
                    success: function (response) {
                        if(response.status == 200){
                            $(document).ajaxStop(function(){
                                window.location.reload();
                            });
                        }
                    }
                });
            });

            $(document).on('click', '.blockButton', function (e) {
                e.preventDefault();
                var userId = $(this).val();
                $('#blockUserId').val(userId);
                $('#blockUserModal').modal('show');
            });

            $(document).on('click', '.blockUser', function (e) {
                e.preventDefault();
                var userId = $('#blockUserId').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/rivercrane/users/block/"+userId,
                    success: function (response) {
                        if(response.status == 200){
                            $(document).ajaxStop(function(){
                                window.location.reload();
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection