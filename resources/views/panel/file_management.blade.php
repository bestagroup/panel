@extends('layouts.base')

@section('title', 'مدیریت فایل‌ها')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title mb-0">لیست فایل‌ها</h5>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">افزودن فایل جدید</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr class="table-light">
                        <th>ردیف</th>
                        <th>فایل</th>
                        <th>نام فایل</th>
                        <th>نوع فایل</th>
                        <th>تاریخ آپلود</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>۱</td>
                        <td>
                            <a href="javascript:void(0);" onclick="previewFile('assets/uploads/sample.jpg', 'image')">
                                <img src="{{ asset('assets/uploads/sample.jpg') }}" alt="file" style="width: 40px;">
                            </a>
                        </td>
                        <td>نمونه-فایل.jpg</td>
                        <td>تصویر</td>
                        <td>۱۴۰۳/۰۲/۱۰</td>
                        <td>
                            <a href="{{ asset('assets/uploads/sample.jpg') }}" download class="btn btn-sm btn-icon btn-outline-info"><i class="mdi mdi-download-outline"></i></a>
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

    <!-- Upload Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">افزودن فایل جدید</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="dropzone" id="fileUploadZone" style="border: 1px dashed">
                            <div class="dz-message needsclick">
                                فایل را اینجا رها کنید یا کلیک کنید برای انتخاب
                                <span class="note needsclick">(فرمت‌های مجاز: jpg, png, pdf, mp4, docx)</span>
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">آپلود فایل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">پیش نمایش فایل</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body text-center" id="previewContent">
                    <!-- فایل پیش نمایش اینجا لود می‌شود -->
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
                text: 'این فایل حذف خواهد شد!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله، حذف شود!',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('حذف شد!', 'فایل با موفقیت حذف شد.', 'success');
                }
            });
        }

        function previewFile(fileUrl, fileType) {
            let previewContent = '';

            if (fileType === 'image') {
                previewContent = `<img src=\"/${fileUrl}\" class=\"img-fluid\" alt=\"Preview Image\">`;
            } else if (fileType === 'video') {
                previewContent = `<video controls style=\"width: 100%; max-height: 500px;\">
                                <source src=\"/${fileUrl}\" type=\"video/mp4\">
                                مرورگر شما از ویدیو پشتیبانی نمی‌کند.
                              </video>`;
            } else if (fileType === 'document') {
                previewContent = `<iframe src=\"/${fileUrl}\" style=\"width:100%; height:500px; border:none;\"></iframe>`;
            }

            document.getElementById('previewContent').innerHTML = previewContent;
            var previewModal = new bootstrap.Modal(document.getElementById('previewModal'));
            previewModal.show();
        }

        document.addEventListener("DOMContentLoaded", function () {
            if (!Dropzone.instances.length) {
                new Dropzone("#fileUploadZone", {
                    url: "/upload-endpoint",
                    maxFilesize: 10,
                    acceptedFiles: 'image/*,application/pdf,video/*,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    dictDefaultMessage: "فایل را اینجا رها کنید یا کلیک کنید برای انتخاب",
                    previewTemplate: `
              <div class="dz-preview dz-file-preview card border mb-2 p-2 text-center" style="width: 140px">
                <img data-dz-thumbnail class="img-fluid rounded mb-2" style="max-height: 100px; object-fit: cover;" alt="" src=""/>
                <div class="text-truncate small" data-dz-name></div>
                <div class="text-muted small" data-dz-size></div>
                <div class="progress mt-2" style="height: 5px;">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 0%;" data-dz-uploadprogress></div>
                </div>
                <a class="text-danger mt-1 d-block" data-dz-remove>حذف فایل</a>
              </div>
            `
                });
            }
        });
    </script>
@endpush
