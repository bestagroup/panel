@extends('layouts.base')

@section('title', 'مدیریت منوی سایت')
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css') }}"/>
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">{{$thispage['list']}}</h5>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">{{$thispage['add']}}</a>
            </div>

            <div class="table-responsive">
                <style> table{margin: 0 auto;width: 100% !important;clear: both;border-collapse: collapse;table-layout: fixed;word-wrap:break-word;} .dt-layout-start{margin-right: 0 !important;} .dt-layout-end{margin-left: 0 !important;}</style>
                <table id="sample1" class="table table-striped table-bordered yajra-datatable">
                    <thead>
                    <tr class="table-light">
                        <th>اولویت نمایش</th>
                        <th>نام صفحه</th>
                        <th>نام صفحه فارسی</th>
                        <th>آدرس صفحه</th>
                        <th>کلاس</th>
                        <th>کنترلر</th>
                        <th>وضعیت</th>
                        <th>تغییر</th>
                    </tr>
                    </thead>
                    <tbody>
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
                    <h5 class="modal-title w-100" id="deleteModalLabel">{{$thispage['delete']}}</h5>
                    <button type="button" class="btn-close position-absolute start-0 mx-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    آیا از حذف این منو مطمئن هستید؟
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-danger">حذف</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">{{$thispage['add']}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route(request()->segment(2).'.'.'store')}}" id="form" method="POST">
                        {{csrf_field()}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10">نام  منو داشبورد</p>
                                <input type="text" name="title" id="title" data-required="1" placeholder="نام منو داشبورد را وارد کنید" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10">نام  منو داشبورد فارسی</p>
                                <input type="text" name="label" id="label" data-required="1" placeholder="نام منو داشبورد فارسی را وارد کنید" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10">زیر  منو داشبورد</p>
                                <select name="submenu" id="submenu" class="form-control">
                                    <option value="1" selected>دارد</option>
                                    <option value="0">ندارد</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10">کلاس داشبورد</p>
                                <input type="text" name="class" id="class" data-required="1" placeholder="کلاس منو داشبورد را وارد کنید" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10">کنترلر داشبورد</p>
                                <input type="text" name="controller" id="controller" data-required="1" placeholder="کلاس منو داشبورد را وارد کنید" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10">نمایش/عدم نمایش</p>
                                <select name="status" id="status" class="form-control">
                                    <option value="4" >نمایش</option>
                                    <option value="0" >عدم نمایش</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" id="submit" class="btn btn-primary">ذخیره اطلاعات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach($menupanels as $menupanel)
    <div class="modal fade" id="editModal{{$menupanel->id}}" tabindex="-1" aria-labelledby="editModalLabel{{$menupanel->id}}" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{$menupanel->id}}">{{$thispage['edit']}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route(request()->segment(2).'.update' , $menupanel->id)}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="menu_id" id="menu_id" value="{{$menupanel->id}}" />
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10">نام  منو داشبورد</p>
                                <input type="text" name="title" id="title" value="{{$menupanel->title}}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10">نام  منو داشبورد فارسی</p>
                                <input type="text" name="label" id="label" value="{{$menupanel->label}}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10">زیر  منو داشبورد</p>
                                <select name="submenu" id="submenu" class="form-control">
                                    <option value="1" selected>دارد</option>
                                    <option value="0">ندارد</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10">کلاس داشبورد</p>
                                <input type="text" name="class" id="class" value="{{$menupanel->class}}"  class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10">کنترلر داشبورد</p>
                                <input type="text" name="controller" id="controller"  value="{{$menupanel->controller}}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <p class="mg-b-10">نمایش/عدم نمایش</p>
                                <select name="status" id="status" class="form-control">
                                    <option value="4" >نمایش</option>
                                    <option value="0" >عدم نمایش</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" id="editsubmit{{$menupanel->id}}" class="btn btn-primary">ذخیره اطلاعات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
@section('script')
    <script src="{{ 'https://cdn.datatables.net/2.2.2/js/dataTables.min.js' }}"></script>

    <script type="text/javascript">
        $(function () {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route(request()->segment(2).'.index')}}",
                columns: [
                    {data: 'id'             , name: 'id'        },
                    {data: 'title'          , name: 'title'     },
                    {data: 'label'          , name: 'label'     },
                    {data: 'slug'           , name: 'slug'      },
                    {data: 'class'          , name: 'class'     },
                    {data: 'controller'     , name: 'controller'},
                    {data: 'status'         , name: 'status'    },
                    {data: 'action'         , name: 'action', orderable: true, searchable: true},
                ]
            });

        });
    </script>
    <script>
        jQuery(document).ready(function(){
            jQuery('#submit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                    jQuery.ajax({
                        url: "{{route(request()->segment(2).'.'.'store')}}",
                        method: 'POST',
                        data: {
                            "_token"    : "{{ csrf_token() }}",
                            title       : jQuery('#title').val(),
                            label       : jQuery('#label').val(),
                            class       : jQuery('#class').val(),
                            controller  : jQuery('#controller').val(),
                            submenu     : jQuery('#submenu').val(),
                            status      : jQuery('#status').val()
                        },
                        success: function (data) {
                            if(data.success == true){
                                swal(data.subject, data.message, data.flag);
                                $('#form')[0].reset();
                            } else {
                                swal(data.subject, data.message, data.flag);
                            }
                        },
                    });
            });
        });
    </script>
    <script>
        jQuery(document).ready(function(){
            jQuery('#editsubmit{{$menupanel->id}}').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ route(request()->segment(2).'.update' , 2) }}",
                    method: 'PATCH',
                    data: {
                        "_token"        : "{{ csrf_token() }}",
                        id              : jQuery('#menu_id').val(),
                        title           : jQuery('#title').val(),
                        label           : jQuery('#label').val(),
                        class           : jQuery('#class').val(),
                        controller      : jQuery('#controller').val(),
                        submenu         : jQuery('#submenu').val(),
                        status          : jQuery('#status').val()
                    },
                    success: function (data) {
                        swal(data.subject, data.message, data.flag);
                    },
                    error: function (data) {
                        swal(data.subject, data.message, data.flag);
                    }
                });
            });
        });
    </script>
@endsection
