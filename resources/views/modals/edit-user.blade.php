<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa nhân viên</h1>
            </div>
            <div class="modal-body px-5">
                <form>
                    <input type="hidden" id="editUserId">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="editUserName" class="form-label">Tên</label></div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="editUserName" name="name" placeholder="Nhập tên">
                                <span class="text-error name_error d-none">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="editUserEmail" class="form-label">Email</label></div>
                            <div class="col-9">
                                <input type="email" class="form-control" id="editUserEmail" name="email" placeholder="Nhập email">
                                <span class="text-error email_error d-none">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="editUserPass" class="form-label">Mật khẩu</label></div>
                            <div class="col-9">
                                <input type="password" class="form-control" id="editUserPass" name="password" placeholder="Nhập mật khẩu">
                                <span class="text-error password_error d-none">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="editUserConfirm" class="form-label">Xác nhận</label></div>
                            <div class="col-9">
                                <input type="password" class="form-control" id="editUserConfirm" name="confirm" placeholder="Xác nhận mật khẩu">
                                <span class="text-error confirm_error d-none">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label class="form-label" for="editUserGroup">Nhóm</label></div>
                            <div class="col-9">
                                <select class="form-select" name="group" id="editUserGroup">
                                    <option value="">Chọn nhóm</option>
                                    @foreach ($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-error group_error d-none">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label class="form-check-label" for="editUserStatus">Trạng thái</label></div>
                            <div class="col-9">
                                <input class="form-check-input" type="checkbox" value="1" id="editUserStatus" name="status" checked>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-danger editUser">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>