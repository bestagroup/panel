@extends('layouts.base')

@section('title', 'مدیریت کاربران سایت')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">لیست کاربران سایت</h5>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">افزودن کاربر جدید</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr class="table-light">
                        <th>ردیف</th>
                        <th>نام و نام خانوادگی</th>
                        <th>نام کاربری</th>
                        <th>ایمیل</th>
                        <th>موبایل</th>
                        <th>وضعیت</th>
                        <th>تاریخ ثبت نام</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>۱</td>
                        <td>محمد محمدی</td>
                        <td>mohammad123</td>
                        <td>mohammad@gmail.com</td>
                        <td>09120000000</td>
                        <td><span class="badge bg-success">فعال</span></td>
                        <td>۱۴۰۳/۰۲/۱۰</td>
                        <td>
                            <button class="btn btn-sm btn-icon btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="mdi mdi-pencil-outline"></i></button>
                            <button class="btn btn-sm btn-icon btn-outline-danger" onclick="confirmDelete()"><i class="mdi mdi-delete-outline"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation" class="mt-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#">قبلی</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">بعدی</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ثبت اطلاعات کاربر جدید</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">نام و نام خانوادگی</label>
                                <input type="text" class="form-control" placeholder="نام و نام خانوادگی را وارد کنید">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">نام کاربری</label>
                                <input type="text" class="form-control" placeholder="نام کاربری را وارد کنید">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">آدرس ایمیل</label>
                                <input type="email" class="form-control" placeholder="آدرس ایمیل را وارد کنید">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">شماره موبایل</label>
                                <input type="text" class="form-control" placeholder="شماره موبایل را وارد کنید">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">رمز عبور</label>
                                <input type="password" class="form-control" placeholder="رمز عبور را وارد کنید">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">تکرار رمز عبور</label>
                                <input type="password" class="form-control" placeholder="تکرار رمز عبور">
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">ذخیره اطلاعات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal (مشابه افزودن کاربر) -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ویرایش اطلاعات کاربر</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">نام و نام خانوادگی</label>
                                <input type="text" class="form-control" value="محمد محمدی">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">نام کاربری</label>
                                <input type="text" class="form-control" value="mohammad123">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">آدرس ایمیل</label>
                                <input type="email" class="form-control" value="mohammad@gmail.com">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">شماره موبایل</label>
                                <input type="text" class="form-control" value="09120000000">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">رمز عبور جدید</label>
                                <input type="password" class="form-control" placeholder="در صورت نیاز تغییر دهید">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">تکرار رمز عبور</label>
                                <input type="password" class="form-control" placeholder="تکرار رمز عبور">
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">ویرایش اطلاعات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'آیا مطمئن هستید؟',
                text: 'این کاربر حذف خواهد شد!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله، حذف شود!',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('حذف شد!', 'کاربر با موفقیت حذف شد.', 'success');
                }
            });
        }
    </script>
@endpush
