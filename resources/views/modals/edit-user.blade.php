<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa nhân viên</h1>
            </div>
            <div class="modal-body px-5">
                <form>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="userName" class="form-label">Tên</label></div>
                            <div class="col-9"><input type="text" class="form-control" name="userName" placeholder="Nhập tên"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="userEmail" class="form-label">Email</label></div>
                            <div class="col-9"><input type="email" class="form-control" name="userEmail" placeholder="Nhập email"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="password" class="form-label">Mật khẩu</label></div>
                            <div class="col-9"><input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label for="confirm" class="form-label">Xác nhận</label></div>
                            <div class="col-9"><input type="password" class="form-control" name="confirm" placeholder="Xác nhận mật khẩu"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label class="form-label" for="group">Nhóm</label></div>
                            <div class="col-9">
                                <select class="form-select" name="group">
                                    <option>Chọn nhóm</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3 fw-bold"><label class="form-label" for="status">Trạng thái</label></div>
                            <div class="col-9">
                                <select class="form-select" name="status">
                                    <option>Chọn trạng thái</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-danger">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>