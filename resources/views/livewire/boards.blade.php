<div>
    <!-- Navbar -->
    <nav class="layout-navbar navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-sm"></i>
            </a>
        </div>
        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="navbar-nav align-items-center">
                <div class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                    <a class="nav-link dropdown-toggle hide-arrow" data-bs-toggle="dropdown" href="javascript:void(0);">
                        <i class="ti ti-md"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start dropdown-styles">
                        <li>
                            <a class="dropdown-item" data-theme="light" href="javascript:void(0);">
                                        <span class="align-middle">
                                            <i class="ti ti-sun me-2"></i>
                                            روز
                                        </span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" data-theme="dark" href="javascript:void(0);">
                                        <span class="align-middle">
                                            <i class="ti ti-moon me-2"></i>
                                            شب
                                        </span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" data-theme="system" href="javascript:void(0);">
                                        <span class="align-middle">
                                            <i class="ti ti-device-desktop me-2"></i>
                                            سیستم
                                        </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" data-bs-toggle="dropdown" href="javascript:void(0);">
                        <div class="avatar avatar-online">
                            <img alt class="h-auto rounded-circle" src="assets/img/avatars/1.png"/>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img alt class="h-auto rounded-circle" src="assets/img/avatars/1.png"/>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block mb-1">نوید محمدزاده</span>
                                        <small class="text-muted">مدیرکل</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="ti ti-user-check me-2 ti-sm"></i>
                                <span class="align-middle">پروفایل من</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="ti ti-settings me-2 ti-sm"></i>
                                <span class="align-middle">تنظیمات</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                        <span class="d-flex align-items-center align-middle">
                                            <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                                            <span class="flex-grow-1 align-middle">خریدها</span>
                                            <span class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20">2
                                            </span>
                                        </span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                <span class="align-middle">خروج از حساب</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
    </nav>
    <!-- / Navbar -->
    <!-- Content -->
    <div class=" flex-grow-1 container-p-y mt-5 p-5">
        <div class="my-3">
            <div class="mt-3">
                <!-- Button trigger modal -->
                <button class="btn btn-primary waves-effect waves-light" data-bs-target="#modalCenter" data-bs-toggle="modal" type="button">ایجاد پروژه</button>
                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                @if($editIndex)
                                <h5 class="modal-title" id="modalCenterTitle">ویرایش پروژه</h5>
                                @else
                                <h5 class="modal-title" id="modalCenterTitle">ایجاد پروژه</h5>
                                @endif
                                <button aria-label="بستن" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="form-label" for="nameWithTitle">نام پروژه</label>
                                        <input wire:model="title" class="form-control" id="nameWithTitle" placeholder="نام پروژه را وارد کنید" type="text">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label" for="nameWithTitle">توضیحات پروژه</label>
                                        <input wire:model="description" class="form-control" id="nameWithTitle" placeholder="نام پروژه را وارد کنید" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button  class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal" type="button"> بستن</button>
                                @if($editIndex)
                                <button wire:click="updateBoard"  class="btn btn-info waves-effect waves-light" type="button">ویرایش</button>
                                @else
                                    <button wire:click="saveBoard"  class="btn btn-primary waves-effect waves-light" type="button">ذخیره</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($boards as $board)
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-info">
                    <div class="card-body"  style="height: 150px;">
                                <div class="d-flex align-items-center mb-2 pb-1">
                                    <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-info">
                                    <i class="ti ti-clock ti-md"></i>
                                    </span>
                                    </div>
                                    <h4 class="ms-1 mb-0">{{$board->title}}</h4>
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
                                                <li data-bs-target="#modalCenter" data-bs-toggle="modal" wire:click="editBoard({{$board->id}})">
                                                    <a class="dropdown-item" href="#">ویرایش پروژه</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider" />
                                                </li>
                                                <li wire:click="$dispatch('archivedMessage',{ id : {{$board->id}} })">
                                                    <a class="dropdown-item" href="#">آرشیو پروژه</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider" />
                                                </li>
                                                <li wire:click="$dispatch('deleteMessage',{ id : {{$board->id}} })">
                                                    <a class="dropdown-item text-danger" href="#">حذف پروژه</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-1">{{$board->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- / Content -->
    <!-- / Layout page -->
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

    $wire.on('archivedMessage' , function (event){
        Swal.fire({
            title: 'آیا از آرشیو کردن مطمئن هستید؟',
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
                $wire.dispatch('archivedBoard', { id : event.id})
            }
        });
    })
</script>
@endscript
