@extends('layouts.master')

@section('title','Quản lý nhân viên')

@section('content')
    <div class="d-flex justify-content-between border-bottom pb-2">
        <h3>Nhân viên</h3>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
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
                    <i class="bi bi-pencil-fill me-1 text-info" type="button" data-bs-toggle="modal" data-bs-target="#editUserModal"></i>
                    @include('modals.edit-user')
                    <i class="bi bi-trash-fill me-1 text-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteUserModal"></i>
                    @include('modals.delete-user')
                    <i class="bi bi-person-x-fill" type="button" data-bs-toggle="modal" data-bs-target="#blockUserModal"></i>
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

{{-- @section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.add_user' ,function (e) {
                e.preventDefault();
                var data = {
                    'name': $('.userName').val(),
                    'email': $('.userEmail').val(),
                    'password': $('.password').val(),
                    'confirm': $('.confirm').val(),
                    'group': $('.group').val(),
                    'status': $('.status').val()
                }

                console.log(data);
                
                /* $.ajax({
                    type: "POST",
                    url: "/internship/users",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                    }
                }); */
            });
        });
    </script>
@endsection --}}