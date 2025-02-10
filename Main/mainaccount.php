            <div class="main-account">
                <div class="main-account-header">
                    <h3>Thông tin tài khoản của bạn</h3>
                    <p>Quản lý thông tin để bảo mật tài khoản</p>
                </div>
                <div class="main-account-body">
                    <div class="main-account-body-col">
                        <form action="" class="info-user">
                            <div class="form-group">
                                <label for="infoname" class="form-label">Họ và tên</label>
                                <input class="form-control" type="text" name="infoname" id="infoname" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="infophone" class="form-label">Tên đăng nhập</label>
                                <input class="form-control" type="text" name="infophone" id="infophone" disabled="true"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="infoemail" class="form-label">Email</label>
                                <input class="form-control" type="email" name="infoemail" id="infoemail"
                                    placeholder="Thêm địa chỉ email của bạn">
                                <span class="inforemail-error form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="infoaddress" class="form-label">Địa chỉ</label>
                                <input class="form-control" type="text" name="infoaddress" id="infoaddress"
                                    placeholder="Thêm địa chỉ giao hàng của bạn">
                            </div>
                        </form>
                    </div>
                    <div class="main-account-body-col">
                        <form action="" class="change-password">
                            <div class="form-group">
                                <label for="" class="form-label w60">Mật khẩu hiện tại</label>
                                <input class="form-control" type="password" name="" id="password-cur-info"
                                    placeholder="Nhập mật khẩu hiện tại">
                                <span class="password-cur-info-error form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label w60">Mật khẩu mới </label>
                                <input class="form-control" type="password" name="" id="password-after-info"
                                    placeholder="Nhập mật khẩu mới">
                                <span class="password-after-info-error form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label w60">Xác nhận mật khẩu mới</label>
                                <input class="form-control" type="password" name="" id="password-comfirm-info"
                                    placeholder="Nhập lại mật khẩu mới">
                                <span class="password-after-comfirm-error form-message"></span>
                            </div>
                        </form>
                    </div>
                    <div class="main-account-body-row">
                        <div>
                            <button id="save-info-user"><i
                                    class="fa-regular fa-floppy-disk"></i> Lưu thay đổi</button>
                        </div>
                        <div>
                            <button id="save-password"><i class="fa-regular fa-key"></i> Đổi
                                mật khẩu</button>
                        </div>
                    </div>
                </div>
            </div>