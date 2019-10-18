@extends('master_admin')

@section('title')
    PAASCU - Landing Page
@endsection

@section('css')
    <link href="{{ url('assets/css/image-picker.css') }}" rel="stylesheet"/>
@endsection

@section('nav')
    @include("includes.nav_admin")
@endsection

@section('main')
    <div id="content" class="bg-new">

        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">

                <a class="navbar-brand" href="#" id="sidebarCollapse">
                    <i class="fa fa-bars"></i>&nbsp;
                    Landing Page</a>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="col-md-12">
                <h1>Welcome Banners</h1>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-1 pull-right">
                                <button class="btn btn-primary btn-round btn-fill pull-right btn-sm" data-toggle="modal"
                                        data-target="#addBanner">
                                    <i class="fa fa-plus"></i>
                                    Add
                                </button>
                            </div>
                            <div class="col-md-1 pull-right">
                                <button class="btn btn-info btn-round btn-fill pull-right btn-sm"
                                        ng-click="saveBannerImage()">
                                    <i class="fa fa-floppy-o"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Image Picker Banner Image --}}
                    <div class="card">
                        <div class="card-content">
                            <div class="col-md-12">
                                <select multiple="multiple" class="image-picker" id="bannerImageSelect" required>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <h1>News and Highlights</h1>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-1 pull-right">
                                <button class="btn btn-primary btn-round btn-fill pull-right btn-sm" data-toggle="modal"
                                        data-target="#addNews">
                                    <i class="fa fa-plus"></i>
                                    Add
                                </button>
                            </div>
                            <div class="col-md-1 pull-right">
                                <button class="btn btn-info btn-round btn-fill pull-right btn-sm"
                                        ng-click="saveNewsImage()">
                                    <i class="fa fa-floppy-o"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Image Picker Banner Image --}}
                    <div class="card">
                        <div class="card-content">
                            <div class="col-md-12">
                                <select multiple="multiple" class="image-picker" id="newsImageSelect" required>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <h1>Contents</h1>
                <div class="col-md-12">
                    <h3>Content Body</h3>
                    <div class="row">
                        <div class="col-md-1 pull-right">
                            <button class="btn btn-info btn-round btn-fill pull-right" ng-click="saveContent()">
                                <i class="fa fa-floppy-o"></i>
                                Save
                            </button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <textarea name="editor_content" id="landingContent" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modals--}}

    <!-- Banner Image -->
    <div class="modal fade" id="addBanner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="addBannerLabel">Add Banner</h4>
                </div>

                <form ng-submit="addBannerImage()" id="addBannerImage">

                    <div class="alert alert-warning alert-dismissible" role="alert"
                         ng-show="addBannerImageError">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h6>Add Record Error
                        </h6>
                        <p><span style="color: white" ng-repeat="error in addBannerImageError">-@{{ error }} </span></p>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="titlebanner">Title</label>
                                <input type="text" id="titleBanner" placeholder="Title" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <center
                                style='background-image: url("{{ url('assets/img/placeholder.svg') }}"); background-repeat: no-repeat;background-size: 100% 100%;'>
                                <img class="thumb" ng-src="@{{img}}"
                                     style="max-width: 100%; height: 400px"/>
                            </center>
                            <br>
                            <input type='file' class="float-right" id="documentBanner"
                                   accept="image/*"
                                   ng-model-instant onchange="angular.element(this).scope().imageUpload(event)"
                                   required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                        <div class="divider"></div>
                        <button type="submit" class="btn btn-info btn-simple" ng-disabled="isLoading">Save
                            <div class="ld ld-ring ld-spin" ng-show="isLoading"></div>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- News Image -->
    <div class="modal fade" id="addNews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="addNewsLabel">Add News</h4>
                </div>

                <form ng-submit="addNewsImage()" id="addNewsImage">

                    <div class="alert alert-warning alert-dismissible" role="alert"
                         ng-show="addNewsImageError">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h6>Add Record Error
                        </h6>
                        <p><span style="color: white" ng-repeat="error in addNewsImageError">-@{{ error }} </span></p>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="titleNews">Title</label>
                                <input type="text" id="titleNews" placeholder="Title" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <center
                                style='background-image: url("{{ url('assets/img/placeholder.svg') }}"); background-repeat: no-repeat;background-size: 100% 100%;'>
                                <img class="thumb" ng-src="@{{img}}"
                                     style="max-width: 100%; height: 400px"/>
                            </center>
                            <br>
                            <input type='file' class="float-right" id="documentNews"
                                   accept="image/*"
                                   ng-model-instant onchange="angular.element(this).scope().imageUpload(event)"
                                   required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                        <div class="divider"></div>
                        <button type="submit" class="btn btn-info btn-simple" ng-disabled="isLoading">Save
                            <div class="ld ld-ring ld-spin" ng-show="isLoading"></div>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ url('assets/js/image-picker.min.js') }}"></script>
    <script>
        var app = angular.module('app', []);
        app.controller('main', function main($scope, $http) {
            // variables
            $scope.isLoading = false
            $scope.img = '{{ url('assets/img/placeholder.svg') }}'

            //image upload thumbnail
            $scope.imageUpload = function (event) {
                files = event.target.files

                for (var i = 0; i < files.length; i++) {
                    var file = files[i]
                    var reader = new FileReader()
                    reader.onload = $scope.imageIsLoaded
                    reader.readAsDataURL(file)
                }
            }

            $scope.imageIsLoaded = function (e) {
                $scope.$apply(function () {
                    $scope.img = e.target.result
                });
            }

            //get all data
            $scope.getData = function () {
                $('#bannerImageSelect').empty()
                $('#newsImageSelect').empty()

                $scope.img = '{{ url('assets/img/placeholder.svg') }}'

                $http({
                    method: 'get',
                    url: "{{ url('/admin/get/welcome-banner') }}",
                    data: '',
                    headers: {
                        'Content-Type': undefined,
                    }
                }).then(function successCallback(response) {
                    $scope.bannerImages = response.data

                    $scope.bannerImages.forEach(function (bi) {
                        if (bi.isSelected == 1) {
                            option = "<option data-img-src='{{ url('') }}/assets/img/welcome/thumb/" + bi.filename + "' value = '" + bi.name + "' selected> </option>"
                        }
                        if (bi.isSelected == 0) {
                            option = "<option data-img-src='{{ url('') }}/assets/img/welcome/thumb/" + bi.filename + "' value = '" + bi.name + "'> </option>"
                        }
                        $('#bannerImageSelect').append(option)
                    })
                    $('.image-picker').imagepicker()
                })

                $http({
                    method: 'get',
                    url: "{{ url('/admin/get/news') }}",
                    data: '',
                    headers: {
                        'Content-Type': undefined,
                    }
                }).then(function successCallback(response) {
                    $scope.newsBanner = response.data

                    $scope.newsBanner.forEach(function (bi) {
                        if (bi.isSelected == 1) {
                            option = "<option data-img-src='{{ url('') }}/assets/img/news/thumb/" + bi.filename + "' value = '" + bi.name + "' selected> </option>"
                        }
                        if (bi.isSelected == 0) {
                            option = "<option data-img-src='{{ url('') }}/assets/img/news/thumb/" + bi.filename + "' value = '" + bi.name + "'> </option>"
                        }
                        $('#newsImageSelect').append(option)
                    })
                    $('.image-picker').imagepicker()
                })

                $http({
                    method: 'get',
                    url: "{{ url('/admin/get/landing') }}",
                    data: '',
                    headers: {
                        'Content-Type': undefined,
                    }
                }).then(function successCallback(response) {
                    $scope.landing_content = response.data
                    $("#landingContent").val(response.data.content)
                    new FroalaEditor('#landingContent', {
                        height: 300,
                        imageUploadURL: '{{ url('admin/upload-img') }}',

                        imageUploadParams: {
                            froala: 'true',
                            _token: "{{ csrf_token() }}"
                        },

                        imageUploadMethod: 'POST',

                        imageAllowedTypes: ['jpeg', 'jpg', 'png'],

                        events: {
                            'image.removed': function ($img) {
                                var xhttp = new XMLHttpRequest();
                                xhttp.open("get", "{{ url('admin/delete-img') }}/" + $img.attr('src').split("/").pop(), true);
                                xhttp.send(JSON.stringify({
                                    src: $img.attr('src')
                                }));
                            }
                        }
                    })
                })

            }

            //upload welcome image
            $scope.addBannerImage = function () {
                $scope.isLoading = true

                adata = new FormData
                adata.append('_token', "{{ csrf_token() }}")
                adata.append('name', $("#titleBanner").val())
                adata.append('image', document.getElementById("documentBanner").files[0])

                $http({
                    method: 'post',
                    url: "{{ url('/admin/add/welcome') }}",
                    data: adata,
                    params: {
                        adata
                    },
                    headers: {
                        'Content-Type': undefined,
                    }
                }).then(function successCallback(response) {

                    if (response.data['success'] == true) {
                        $("#addBannerImage")[0].reset()
                        $("#addBanner").modal('hide')
                        Swal.fire({
                            type: 'success',
                            title: response.data['header'],
                            text: response.data['message']
                        })
                        $scope.getData()
                    }

                    if (response.data['success'] == false) {
                        $scope.addBannerImageError = response.data['errors']
                        Swal.fire({
                            type: 'error',
                            title: response.data['header'],
                            text: response.data['message'],
                        })

                    }

                    $scope.isLoading = false
                })
            }

            //save banner image
            $scope.saveBannerImage = function () {
                Swal.fire({
                    title: 'Loading',
                    html: 'Updating.....',
                    timer: 20000,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                })

                adata = new FormData
                adata.append('_token', "{{ csrf_token() }}")
                adata.append('name', $('#bannerImageSelect').val())

                $http({
                    method: 'post',
                    url: "{{ url('/admin/select/welcome') }}",
                    data: adata,
                    params: {
                        adata
                    },
                    headers: {
                        'Content-Type': undefined,
                    }
                }).then(function successCallback(response) {
                    if (response.data['success'] == true) {
                        Swal.fire({
                            type: 'success',
                            title: response.data['header'],
                            text: response.data['message']
                        })
                        $scope.getData()
                    }

                    if (response.data['success'] == false) {
                        Swal.fire({
                            type: 'error',
                            title: response.data['header'],
                            text: response.data['message'],
                        })

                    }
                })
            }

            //upload news image
            $scope.addNewsImage = function () {
                $scope.isLoading = true

                adata = new FormData
                adata.append('_token', "{{ csrf_token() }}")
                adata.append('name', $("#titleNews").val())
                adata.append('image', document.getElementById("documentNews").files[0])

                $http({
                    method: 'post',
                    url: "{{ url('/admin/add/news') }}",
                    data: adata,
                    params: {
                        adata
                    },
                    headers: {
                        'Content-Type': undefined,
                    }
                }).then(function successCallback(response) {

                    if (response.data['success'] == true) {
                        $("#addNewsImage")[0].reset()
                        $("#addNews").modal('hide')
                        Swal.fire({
                            type: 'success',
                            title: response.data['header'],
                            text: response.data['message']
                        })
                        $scope.getData()
                    }

                    if (response.data['success'] == false) {
                        $scope.addNewsImageError = response.data['errors']
                        Swal.fire({
                            type: 'error',
                            title: response.data['header'],
                            text: response.data['message'],
                        })

                    }

                    $scope.isLoading = false
                })
            }

            //save save news
            $scope.saveNewsImage = function () {
                Swal.fire({
                    title: 'Loading',
                    html: 'Updating.....',
                    timer: 20000,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                })

                adata = new FormData
                adata.append('_token', "{{ csrf_token() }}")
                adata.append('name', $('#newsImageSelect').val())

                $http({
                    method: 'post',
                    url: "{{ url('/admin/select/news') }}",
                    data: adata,
                    params: {
                        adata
                    },
                    headers: {
                        'Content-Type': undefined,
                    }
                }).then(function successCallback(response) {
                    if (response.data['success'] == true) {
                        Swal.fire({
                            type: 'success',
                            title: response.data['header'],
                            text: response.data['message']
                        })
                        $scope.getData()
                    }

                    if (response.data['success'] == false) {
                        Swal.fire({
                            type: 'error',
                            title: response.data['header'],
                            text: response.data['message'],
                        })

                    }
                })
            }

            //save save content
            $scope.saveContent = function () {
                Swal.fire({
                    title: 'Loading',
                    html: 'Updating.....',
                    timer: 20000,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                })

                adata = new FormData
                adata.append('_token', "{{ csrf_token() }}")
                adata.append('id', $scope.landing_content.id)
                adata.append('content', $('#landingContent').val())

                $http({
                    method: 'post',
                    url: "{{ url('/admin/update/home-content') }}",
                    data: adata,
                    params: {
                        adata
                    },
                    headers: {
                        'Content-Type': undefined,
                    }
                }).then(function successCallback(response) {

                    if (response.data['success'] == true) {
                        Swal.fire({
                            type: 'success',
                            title: response.data['header'],
                            text: response.data['message']
                        })
                        $scope.getData()
                    }

                    if (response.data['success'] == false) {
                        Swal.fire({
                            type: 'error',
                            title: response.data['header'],
                            text: response.data['message'],
                        })

                    }
                })
            }

            $scope.getData();
        })
    </script>
@endsection
