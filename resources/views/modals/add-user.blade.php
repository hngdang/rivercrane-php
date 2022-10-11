<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm nhân viên</h1>
            </div>
            <div class="modal-body px-sm-5">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="userName" class="form-label">Tên</label></div>
                            <div class="col-9"><input type="text" class="form-control userName" id="userName" name="userName" placeholder="Nhập tên" required></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="userEmail" class="form-label">Email</label></div>
                            <div class="col-9"><input type="email" class="form-control userEmail" id="userEmail" name="userEmail" placeholder="Nhập email" required></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="password" class="form-label">Mật khẩu</label></div>
                            <div class="col-9"><input type="password" class="form-control password" id="password" name="password" placeholder="Nhập mật khẩu" required></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="confirm" class="form-label">Xác nhận</label></div>
                            <div class="col-9"><input type="password" class="form-control confirm" id="confirm" name="confirm" placeholder="Xác nhận mật khẩu" required></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label class="form-label" for="group">Nhóm</label></div>
                            <div class="col-9">
                                <select class="form-select group" name="group" required>
                                    <option value="">Chọn nhóm</option>
                                    @foreach ($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label class="form-label" for="status">Trạng thái</label></div>
                            <div class="col-9">
                                <select class="form-select status" name="status" required>
                                    <option value="">Chọn trạng thái</option>
                                    <option value="1">Đang hoạt động</option>
                                    <option value="-1">Tạm khóa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger add_user">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>