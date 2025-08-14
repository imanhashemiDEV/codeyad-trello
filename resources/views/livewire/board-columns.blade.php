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
            <button class="btn btn-primary waves-effect waves-light" data-bs-target="#modalCenter"
                    data-bs-toggle="modal" type="button">ایجاد ستون
            </button>
        </div>
    </div>
    <!-- Project Cards -->
    <div wire:sortable="updateBoardColumnOrder" class="d-flex flex-nowrap overflow-scroll">
        @foreach($this->boardColumns as $column)
            <div wire:sortable.item="{{ $column->id }}" wire:key="column-{{ $column->id }}" class="col-10 col-sm-8 col-md-6 col-lg-3 mx-2"
                 x-data="{editing:false , title:'{{$column->title}} '}">
                <div class="card overflow-scroll" style="height: 65vh;">
                    <div class="card-header">
                        <div class="d-flex align-items-start" x-on:click.outside="editing=false">
                            <div class="d-flex align-items-start">
                                <div class="me-2 ms-1">
                                    <h5 class="mb-0" x-show="!editing" x-text="title"></h5>
                                    <template x-if="editing">
                                        <div class="d-flex">
                                            <input x-show="editing" class="form-control" type="text" x-model="title">
                                            <button
                                                x-on:click="editing=false; $wire.updateColumn('{{$column->id}}', title)"
                                                aria-expanded="false"
                                                class="btn p-0 mr-2"
                                                type="button">
                                                <i class="ti ti-device-floppy text-success"></i>
                                            </button>
                                        </div>
                                    </template>

                                </div>
                            </div>
                            <div class="ms-auto d-flex">
                                <div class="z-2" >
                                    <button wire:click="$set('column_id','{{$column->id}}')" data-bs-target="#createCard"
                                            data-bs-toggle="modal"
                                        aria-expanded="false"
                                        class="btn btn-success p-1 mx-1"
                                        type="button">
                                        ایجاد وظیفه
                                    </button>
                                </div>
                                <div class="dropdown z-2">
                                    <button
                                        aria-expanded="false"
                                        class="btn btn-warning dropdown-toggle p-1 mx-1"
                                        data-bs-toggle="dropdown"
                                        type="button">
                                        عملیات
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li x-on:click="editing=true" x-show="!editing"
                                            x-bind:title="'{{$column->title}}'">
                                            <a class="dropdown-item cursor-pointer"> ویرایش</a>
                                        </li>
                                        <li x-show="editing">
                                            <a class="dropdown-item cursor-pointer"> در حال ویرایش</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider"/>
                                        </li>
                                        <li>
                                            <a wire:click="$dispatch('deleteMessage',{ id : {{$column->id}} })"
                                               class="dropdown-item text-danger cursor-pointer">حذف</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="timeline pt-3 ">
                            @foreach($column->cards()->where('board_column_id',$column->id)->get() as $card)
                                <li
                                    class="timeline-item mt-4 pb-0 timeline-item-warning border-transparent">
                                <span
                                    class="timeline-indicator-advanced timeline-indicator-warning">
                                  <i class="ti ti-bell rounded-circle"></i>
                                </span>
                                    <div class="timeline-event pb-3">
                                        <div class="timeline-header">
                                            <h6 class="mb-0">{{$card->title}}</h6>
                                            <span class="text-muted">{{\Hekmatinasser\Verta\Verta::instance($card->created_at)->format('%B %d')}}</span>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-top-0 p-0"
                                            >
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                                                    <ul
                                                        class="list-unstyled users-list d-flex align-items-center avatar-group m-0 my-3 me-2">
                                                        @foreach($card->users as $user)
                                                            <li
                                                                class="avatar avatar-xs pull-up" data-bs-placement="top"
                                                                data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                aria-label="{{$user->name}}" data-bs-original-title="{{$user->name}}">
                                                                <img
                                                                    alt="{{$user->name}}"
                                                                    class="rounded-circle"
                                                                    src="{{$user->avatar}}"
                                                                />
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                    <span wire:click="$dispatch('deleteCard',{ id : {{$card->id}} })" class="cursor-pointer">
                                                      <i class="ti ti-trash text-danger rounded-circle"></i>
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modals -->
    <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true" wire:ignore.self>
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
                            <input wire:model="title" class="form-control" id="nameWithTitle"
                                   placeholder="نام ستون را وارد کنید" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal" type="button"> بستن
                    </button>
                    <button wire:click="createBoardColumn" class="btn btn-primary waves-effect waves-light"
                            type="button">ذخیره
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div aria-hidden="true" class="modal fade" id="createCard" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button
                        aria-label="Close"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        type="button"
                    ></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">کارت وظیفه</h3>
                    </div>
                    <form
                        class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
                        id="editUserForm"
                        onsubmit="return false"
                        novalidate="novalidate">
                        <div class="col-12 fv-plugins-icon-container">
                            <label class="form-label">عنوان وظیفه </label>
                            <input wire:model="card_title" class="form-control" type="text"/>
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>
                        <div class="col-12 mb-4" wire:ignore>
                            <label class="form-label" for="TagifyUserList">لیست کاربران</label>
                            <input class="form-control" id="TagifyUserList" name="TagifyUserList"/>
                        </div>
                        <div class="col-12 text-center mt-5">
                            <button wire:click="$dispatch('createCard')"
                                class="btn btn-primary me-sm-3 me-1 waves-effect waves-light"
                                type="submit">
                                ذخیره
                            </button>
                            <button
                                aria-label="Close"
                                class="btn btn-label-secondary waves-effect"
                                data-bs-dismiss="modal"
                                type="reset"
                            >
                                انصراف
                            </button>
                        </div>
                        <input type="hidden" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@assets
<link href="{{url('assets/vendor/libs/tagify/tagify.css')}}" rel="stylesheet" />
<script src="{{url('assets/vendor/libs/tagify/tagify.js')}}"></script>
@endassets

@script
<script>

    const usersList = $wire.users;
    initUsersList()
    function initUsersList() {
        const TagifyUserListEl = document.querySelector('#TagifyUserList');
        function tagTemplate(tagData) {
            return `
    <tag title="${tagData.title || tagData.email}"
      contenteditable='false'
      spellcheck='false'
      tabIndex="-1"
      class="${this.settings.classNames.tag} ${tagData.class ? tagData.class : ''}"
      ${this.getAttributes(tagData)}
    >
      <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
      <div>
        <div class='tagify__tag__avatar-wrap'>
          <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
        </div>
        <span class='tagify__tag-text'>${tagData.name}</span>
      </div>
    </tag>
  `;
        }

  function suggestionItemTemplate(tagData) {
            return `
    <div ${this.getAttributes(tagData)}
      class='tagify__dropdown__item align-items-center ${tagData.class ? tagData.class : ''}'
      tabindex="0"
      role="option">
      ${tagData.avatar ? `<div class='tagify__dropdown__item__avatar-wrap'>
          <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
        </div>` : ''}
      <div class="fw-medium">${tagData.name}</div>
      <span>${tagData.email}</span>
    </div>`;
   }

        // initialize Tagify on the above input node reference
        let TagifyUserList = new Tagify(TagifyUserListEl, {
            tagTextProp: 'name', // very important since a custom template is used with this property as text. allows typing a "value" or a "name" to match input with whitelist
            enforceWhitelist: true,
            skipInvalid: true, // do not remporarily add invalid tags
            dropdown: {
                closeOnSelect: false,
                enabled: 0,
                classname: 'users-list',
                searchKeys: ['name', 'email'] // very important to set by which keys to search for suggesttions when typing
            },
            templates: {
                tag: tagTemplate,
                dropdownItem: suggestionItemTemplate,

            },
            whitelist: usersList
        });

        // attach events listeners
        TagifyUserList.on('dropdown:select', onSelectSuggestion) // allows selecting all the suggested (whitelist) items
            .on('edit:start', onEditStart); // show custom text in the tag while in edit-mode

        function onSelectSuggestion(e) {
            // custom class from "dropdownHeaderTemplate"
            if (e.detail.elm.classList.contains(`${TagifyUserList.settings.classNames.dropdownItem}__addAll`))
                TagifyUserList.dropdown.selectAll();
        }

        function onEditStart({ detail: { tag, data } }) {
            TagifyUserList.setTagTextNode(tag, `${data.name} <${data.email}>`);
        }
    }


    $wire.on('createCard', () => {
        let users = document.getElementById('TagifyUserList');
        // console.log(users.value)
        $wire.dispatch('storeCard', {selected_users: users.value})
    });

    $wire.on('closeModal', function () {
        $('#modalCenter').modal('hide')
    })

    $wire.on('closeCardModal', function () {
        $('#createCard').modal('hide')
    })

    $wire.on('successMessage', function (event) {
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

    $wire.on('deleteMessage', function (event) {
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
                $wire.dispatch('destroyBoardColumn', {id: event.id})
            }
        });
    })

    $wire.on('deleteCard', function (event) {
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
                $wire.dispatch('destroyCard', {id: event.id})
            }
        });
    })

</script>
@endscript
