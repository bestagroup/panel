@extends('layouts.base')

@section('title', 'مدیریت اسلایدها')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">لیست اسلایدها</h5>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">افزودن اسلاید</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr class="table-light">
                        <th>ردیف</th>
                        <th>تصویر</th>
                        <th>تیتر اول</th>
                        <th>منو</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>۱</td>
                        <td><img src="{{ asset('assets/img/slide-demo.jpg') }}" alt="demo" class="img-thumbnail" style="max-width: 80px;"></td>
                        <td>عنوان تستی</td>
                        <td>درباره ما</td>
                        <td><span class="badge bg-success">فعال</span></td>
                        <td>
                            <button class="btn btn-sm btn-icon btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal"><i class="mdi mdi-pencil-outline"></i></button>
                            <button class="btn btn-sm btn-icon btn-outline-danger" onclick="confirmDelete()"><i class="mdi mdi-delete-outline"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit/Add Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">افزودن / ویرایش اسلاید</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">تیتر اول</label>
                                <input type="text" class="form-control" placeholder="تیتر اول را وارد کنید">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">تیتر دوم</label>
                                <input type="text" class="form-control" placeholder="تیتر دوم را وارد کنید">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">تیتر سوم</label>
                                <input type="text" class="form-control" placeholder="تیتر سوم را وارد کنید">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">انتخاب منو</label>
                                <select class="form-select">
                                    <option>انتخاب کنید</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">وضعیت نمایش</label>
                                <select class="form-select">
                                    <option>فعال</option>
                                    <option>غیرفعال</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">نمایش در فوتر</label>
                                <select class="form-select">
                                    <option>خیر</option>
                                    <option>بله</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">موارد نمایش در اسلاید</label>
                            <select class="form-select" multiple>
                                <option>کلیدواژه ۱</option>
                                <option>کلیدواژه ۲</option>
                                <option>کلیدواژه ۳</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">توضیحات</label>
                            <div id="quill-editor"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">تصویر</label>
                            <div class="dropzone" id="slideImageUpload" style="border: 1px dashed">
                                <div class="dz-message needsclick">
                                    فایل را اینجا رها کنید یا کلیک کنید برای انتخاب
                                    <span class="note needsclick">(فرمت‌های مجاز: jpg, png, gif)</span>
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

@push('head')
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'آیا مطمئن هستید؟',
                text: 'این عملیات قابل بازگشت نیست!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله، حذف شود!',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('حذف شد!', 'اسلاید با موفقیت حذف شد.', 'success');
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById('editModal');

            modal.addEventListener('shown.bs.modal', function () {
                // Dropzone Initialization
                if (!Dropzone.instances.length) {
                    new Dropzone("#slideImageUpload", {
                        url: "/upload-endpoint",
                        maxFiles: 1,
                        acceptedFiles: "image/*",
                        dictDefaultMessage: "فایل را اینجا رها کنید یا کلیک کنید برای انتخاب",
                        addRemoveLinks: false,
                        previewTemplate: `
              <div class="dz-preview dz-file-preview card border mb-2 p-2 text-center" style="width: 140px">
                <img data-dz-thumbnail class="img-fluid rounded mb-2" style="max-height: 100px; object-fit: cover;"  alt="" src=""/>
                <div class="text-truncate small" data-dz-name></div>
                <div class="text-muted small" data-dz-size></div>
                <a class="text-danger mt-1" data-dz-remove>حذف فایل</a>
              </div>
            `
                    });
                }

                // Quill Initialization
                if (!window.quillEditor) {
                    const quill = new Quill('#quill-editor', {
                        theme: 'snow',
                        modules: {
                            toolbar: [
                                [{ 'font': [] }, { 'size': [] }],
                                ['bold', 'italic', 'underline', 'strike'],
                                [{ 'color': [] }, { 'background': [] }],
                                [{ 'script': 'super' }, { 'script': 'sub' }],
                                [{ 'header': '1' }, { 'header': '2' }, 'blockquote', 'code-block'],
                                [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }],
                                [{ 'direction': 'rtl' }, { 'align': [] }],
                                ['link', 'image', 'video'],
                                ['clean']
                            ]
                        }
                    });

                    // Set default direction to RTL
                    quill.root.setAttribute('dir', 'rtl');
                    quill.format('direction', 'rtl');
                    quill.format('align', 'right');

                    window.quillEditor = quill;
                }
            });
        });
    </script>
@endpush

