<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addUserModalLabel">Thêm nhân viên</h1>
            </div>
            <div class="modal-body px-sm-5">
                <form>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="userName" class="form-label">Tên</label></div>
                            <div class="col-9">
                                <input type="text" class="form-control name" id="userName" name="name" placeholder="Nhập tên">
                                <span class="text-error name_error d-none">
                            </div>
                        </div>
                        </span>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="userEmail" class="form-label">Email</label></div>
                            <div class="col-9">
                                <input type="email" class="form-control email" id="userEmail" name="email" placeholder="Nhập email">
                                <span class="text-error email_error d-none">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="password" class="form-label">Mật khẩu</label></div>
                            <div class="col-9">
                                <input type="password" class="form-control password" id="password" name="password" placeholder="Nhập mật khẩu">
                                <span class="text-error password_error d-none">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="confirm" class="form-label">Xác nhận</label></div>
                            <div class="col-9">
                                <input type="password" class="form-control confirm" id="confirm" name="confirm" placeholder="Xác nhận mật khẩu">
                                <span class="text-error confirm_error d-none">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label class="form-label" for="group">Nhóm</label></div>
                            <div class="col-9">
                                <select class="form-select group" name="group">
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
                            <div class="col-3 fw-bold"><label class="form-check-label" for="status">Trạng thái</label></div>
                            <div class="col-9">
                                <input class="form-check-input status" type="checkbox" value="1" id="status" name="status" checked>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-danger addUser">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>