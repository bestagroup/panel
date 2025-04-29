@extends('layouts.base')

@section('title', 'مدیریت نوع کاربران')

@push('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css"/>
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">لیست نوع کاربران</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserTypeModal">+ افزودن نوع کاربران</button>
            </div>
            <div class="table-responsive">
                <table id="userTypesTable" class="table table-striped table-bordered text-center">
                    <thead>
                    <tr class="table-light">
                        <th>ردیف</th>
                        <th>عنوان فارسی</th>
                        <th>عنوان انگلیسی</th>
                        <th>ویرایش / حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>استاد</td>
                        <td>teacher</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary"><i class="mdi mdi-pencil-outline"></i></button>
                            <button class="btn btn-sm btn-outline-danger"><i class="mdi mdi-delete-outline"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>طلبه</td>
                        <td>student</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary"><i class="mdi mdi-pencil-outline"></i></button>
                            <button class="btn btn-sm btn-outline-danger"><i class="mdi mdi-delete-outline"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add User Type Modal -->
    <div class="modal fade" id="addUserTypeModal" tabindex="-1" aria-labelledby="addUserTypeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="addUserTypeLabel">ورود اطلاعات نوع کاربران</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">عنوان کاربر فارسی</label>
                                <input type="text" class="form-control" placeholder="عنوان کاربر فارسی">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">عنوان کاربر انگلیسی</label>
                                <input type="text" class="form-control" placeholder="عنوان کاربر انگلیسی">
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">ذخیره اطلاعات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.5/i18n/fa.json"></script>
    <script>
        new DataTable('#userTypesTable', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.5/i18n/fa.json'
            }
        });
    </script>
@endpush
