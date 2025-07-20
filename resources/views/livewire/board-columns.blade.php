<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div
                    class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4"
                >
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img
                            alt="تصویر "
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"
                            src="{{url('assets/img/avatars/1.png')}}"
                        />
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4"
                        >
                            <div class="user-profile-info">
                                <h4>{{$board->title}}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2"
                                >
                                    <li class="list-inline-item d-flex gap-1">
                                        <i class="ti ti-color-swatch"></i>
                                        {{$board->description}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="my-3">
        <div class="mt-3">
            <!-- Button trigger modal -->
            <button class="btn btn-primary waves-effect waves-light" data-bs-target="#modalCenter" data-bs-toggle="modal" type="button">ایجاد ستون</button>
            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">ایجاد ستون پروژه</h5>
                            <button aria-label="بستن" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label" for="nameWithTitle">نام ستون</label>
                                    <input wire:model="title" class="form-control" id="nameWithTitle" placeholder="نام ستون را وارد کنید" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal" type="button"> بستن</button>
                            <button wire:click="createBoardColumn" class="btn btn-primary waves-effect waves-light" type="button">ذخیره</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project Cards -->
    <div class="d-flex flex-nowrap overflow-scroll">
        @foreach($this->boardColumns as $column)
            <div class="col-3 mx-2" x-data="{editing:false , title:'{{$column->title}} '}">
                <div class="card overflow-scroll" style="height: 65vh;">
                    <div class="card-header">
                        <div class="d-flex align-items-start" x-on:click.outside="editing=false">
                            <div class="d-flex align-items-start">
                                <div class="me-2 ms-1">
                                        <h5 class="mb-0" x-show="!editing" x-text="title"></h5>
                                    <template x-if="editing">
                                        <div class="d-flex">
                                            <input x-show="editing" class="form-control" type="text" x-model="title">
                                            <button x-on:click="editing=false; $wire.updateColumn('{{$column->id}}', title)"
                                                aria-expanded="false"
                                                class="btn p-0 mr-2"
                                                type="button">
                                                <i class="ti ti-device-floppy text-success"></i>
                                            </button>
                                        </div>
                                    </template>

                                </div>
                            </div>
                            <div class="ms-auto">
                                <div class="dropdown z-2">
                                    <button
                                        aria-expanded="false"
                                        class="btn dropdown-toggle hide-arrow p-0"
                                        data-bs-toggle="dropdown"
                                        type="button"
                                    >
                                        <i class="ti ti-dots-vertical text-muted"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li x-on:click="editing=true" x-show="!editing" x-bind:title="'{{$column->title}}'">
                                            <a class="dropdown-item cursor-pointer"> ویرایش</a>
                                        </li>
                                        <li  x-show="editing">
                                            <a class="dropdown-item cursor-pointer"> در حال ویرایش</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger cursor-pointer">حذف</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" >
                        <ul class="timeline pt-3 ">
                            <li class="timeline-item mt-4 pb-0 timeline-item-warning border-transparent">
                                    <span class="timeline-indicator-advanced timeline-indicator-warning">
                                        <i class="ti ti-bell rounded-circle"></i>
                                    </span>
                                <div class="timeline-event pb-3">
                                    <div class="timeline-header">
                                        <h6 class="mb-0">عنوان</h6>
                                        <span class="text-muted">7 دی</span>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-top-0 p-0">
                                            <div class="d-flex flex-wrap align-items-center">
                                                <ul class="list-unstyled users-list d-flex align-items-center avatar-group m-0 my-3 me-2">
                                                    <li class="avatar avatar-xs pull-up" data-bs-placement="top" data-bs-toggle="tooltip" data-popup="tooltip-custom" aria-label="مهرداد محمدی" data-bs-original-title="مهرداد محمدی">
                                                        <img alt="آواتار" class="rounded-circle" src="../../assets/img/avatars/5.png">
                                                    </li>
                                                    <li class="avatar avatar-xs pull-up" data-bs-placement="top" data-bs-toggle="tooltip" data-popup="tooltip-custom" aria-label="صدف طاهری" data-bs-original-title="صدف طاهری">
                                                        <img alt="آواتار" class="rounded-circle" src="../../assets/img/avatars/12.png">
                                                    </li>

                                                </ul>

                                            </div>
                                            <button class="btn btn-outline-primary btn-sm my-sm-0 my-3 waves-effect">مشاهده</button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap pb-0 px-0">
                                            <div class="d-flex flex-sm-row flex-column align-items-center">
                                                <img alt="آواتار" class="rounded-circle me-3" height="40" src="../../assets/img/avatars/4.png" width="40">
                                                <div class="user-info">
                                                    <p class="my-0">شرح تسک</p>
                                                    <span class="text-muted">تاریخ</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="timeline-item mt-4 pb-0 timeline-item-warning border-transparent">
                                    <span class="timeline-indicator-advanced timeline-indicator-warning">
                                        <i class="ti ti-bell rounded-circle"></i>
                                    </span>
                                <div class="timeline-event pb-3">
                                    <div class="timeline-header">
                                        <h6 class="mb-0">عنوان</h6>
                                        <span class="text-muted">7 دی</span>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-top-0 p-0">
                                            <div class="d-flex flex-wrap align-items-center">
                                                <ul class="list-unstyled users-list d-flex align-items-center avatar-group m-0 my-3 me-2">
                                                    <li class="avatar avatar-xs pull-up" data-bs-placement="top" data-bs-toggle="tooltip" data-popup="tooltip-custom" aria-label="مهرداد محمدی" data-bs-original-title="مهرداد محمدی">
                                                        <img alt="آواتار" class="rounded-circle" src="../../assets/img/avatars/5.png">
                                                    </li>
                                                    <li class="avatar avatar-xs pull-up" data-bs-placement="top" data-bs-toggle="tooltip" data-popup="tooltip-custom" aria-label="صدف طاهری" data-bs-original-title="صدف طاهری">
                                                        <img alt="آواتار" class="rounded-circle" src="../../assets/img/avatars/12.png">
                                                    </li>

                                                </ul>

                                            </div>
                                            <button class="btn btn-outline-primary btn-sm my-sm-0 my-3 waves-effect">مشاهده</button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap pb-0 px-0">
                                            <div class="d-flex flex-sm-row flex-column align-items-center">
                                                <img alt="آواتار" class="rounded-circle me-3" height="40" src="../../assets/img/avatars/4.png" width="40">
                                                <div class="user-info">
                                                    <p class="my-0">شرح تسک</p>
                                                    <span class="text-muted">تاریخ</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="timeline-item mt-4 pb-0 timeline-item-warning border-transparent">
                                    <span class="timeline-indicator-advanced timeline-indicator-warning">
                                        <i class="ti ti-bell rounded-circle"></i>
                                    </span>
                                <div class="timeline-event pb-3">
                                    <div class="timeline-header">
                                        <h6 class="mb-0">عنوان</h6>
                                        <span class="text-muted">7 دی</span>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-top-0 p-0">
                                            <div class="d-flex flex-wrap align-items-center">
                                                <ul class="list-unstyled users-list d-flex align-items-center avatar-group m-0 my-3 me-2">
                                                    <li class="avatar avatar-xs pull-up" data-bs-placement="top" data-bs-toggle="tooltip" data-popup="tooltip-custom" aria-label="مهرداد محمدی" data-bs-original-title="مهرداد محمدی">
                                                        <img alt="آواتار" class="rounded-circle" src="../../assets/img/avatars/5.png">
                                                    </li>
                                                    <li class="avatar avatar-xs pull-up" data-bs-placement="top" data-bs-toggle="tooltip" data-popup="tooltip-custom" aria-label="صدف طاهری" data-bs-original-title="صدف طاهری">
                                                        <img alt="آواتار" class="rounded-circle" src="../../assets/img/avatars/12.png">
                                                    </li>

                                                </ul>

                                            </div>
                                            <button class="btn btn-outline-primary btn-sm my-sm-0 my-3 waves-effect">مشاهده</button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap pb-0 px-0">
                                            <div class="d-flex flex-sm-row flex-column align-items-center">
                                                <img alt="آواتار" class="rounded-circle me-3" height="40" src="../../assets/img/avatars/4.png" width="40">
                                                <div class="user-info">
                                                    <p class="my-0">شرح تسک</p>
                                                    <span class="text-muted">تاریخ</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
@script
<script>
    $wire.on('closeModal' , function (){
        $('#modalCenter').modal('hide')
    })

    $wire.on('successMessage' , function (event){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: event[0].title,
            confirmButtonText: 'باشه',
            showConfirmButton: false,
            timer: 1500,
            customClass: {
                confirmButton: 'btn btn-primary waves-effect waves-light'
            },
            buttonsStyling: false
        });
    })

    $wire.on('deleteMessage' , function (event){
        Swal.fire({
            title: 'آیا از حذف مطمئن هستید؟',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'بله',
            cancelButtonText: 'خیر',
            customClass: {
                confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
                cancelButton: 'btn btn-label-secondary waves-effect waves-light'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                $wire.dispatch('destroyBoard', { id : event.id})
            }
        });
    })

</script>
@endscript
