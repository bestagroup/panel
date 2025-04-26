@extends('layouts.base')

@section('title', 'مدیریت زیرمنوهای سایت')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">لیست زیرمنوهای سایت</h5>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">افزودن زیر منو
                    سایت</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr class="table-light">
                        <th>ردیف</th>
                        <th>عنوان صفحه</th>
                        <th>آدرس صفحه</th>
                        <th>لیبل صفحه</th>
                        <th>وضعیت</th>
                        <th>تغییر</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>۲۳</td>
                        <td>شرکت‌ها</td>
                        <td>شرکت-ها</td>
                        <td></td>
                        <td><span class="badge bg-success">در حال نمایش</span></td>
                        <td>
                            <button class="btn btn-sm btn-icon btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#editModal"><i class="mdi mdi-pencil-outline"></i></button>
                            <button class="btn btn-sm btn-icon btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"><i class="mdi mdi-delete-outline"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title w-100" id="deleteModalLabel">حذف زیرمنو</h5>
                    <button type="button" class="btn-close position-absolute start-0 mx-3" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    آیا از حذف این زیرمنو مطمئن هستید؟
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-danger">حذف</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit/Add Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">ورود اطلاعات زیر منو سایت</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <form action="/your-main-save-route" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">عنوان زیرمنو سایت</label>
                                <input type="text" class="form-control" placeholder="عنوان زیرمنو سایت را وارد کنید">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">انتخاب منو</label>
                                <select class="form-select">
                                    <option>انتخاب منو</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">وضعیت نمایش</label>
                                <select class="form-select">
                                    <option>انتخاب کنید</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">عنوان تب منو سایت</label>
                                <input type="text" class="form-control" placeholder="عنوان تب سایت را وارد کنید">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">نمایش در فوتر</label>
                                <select class="form-select">
                                    <option>انتخاب کنید</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">نام کلاس کنترلر</label>
                                <input type="text" class="form-control" placeholder="نام کلاس کنترلر وارد کنید">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">عنوان صفحه سایت</label>
                            <input type="text" class="form-control" placeholder="عنوان صفحه را وارد کنید">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">کلمات کلیدی</label>
                            <input type="text" class="form-control" placeholder="کلمات کلیدی را وارد کنید">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">توضیحات صفحه برای سئو</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <div class="card-body">

                                <label class="form-label">تصویر</label>
                                <div class="dropzone" id="submenuImageUpload">
                                    <div class="dz-message needsclick">
                                        فایل را اینجا رها کنید یا کلیک کنید برای انتخاب
                                        <span class="note needsclick">(فرمت‌های مجاز: jpg, png, gif)</span>
                                    </div>
                                </div>
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
@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById('editModal');
            modal.addEventListener('shown.bs.modal', function () {
                if (!Dropzone.instances.length) {
                    new Dropzone("#submenuImageUpload", {
                        url: "/upload-endpoint",
                        maxFiles: 1,
                        acceptedFiles: "image/*",
                        dictDefaultMessage: "فایل را اینجا رها کنید یا کلیک کنید برای انتخاب",
                        addRemoveLinks: false, // ❗ مهم
                        previewTemplate: `
            <div class="dz-preview dz-file-preview card border mb-2 p-2 text-center" style="width: 140px">
              <img data-dz-thumbnail class="img-fluid rounded mb-2" style="max-height: 100px; object-fit: cover;" />
              <div class="text-truncate small" data-dz-name></div>
              <div class="text-muted small" data-dz-size></div>
              <a class="btn btn-sm text-danger mt-1" data-dz-remove>حذف فایل</a>
            </div>
          `
                    });
                }
            });
        });
    </script>
@endpush

