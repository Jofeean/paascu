@extends('master_admin')

@section('title')
    PAASCU - Commission Members
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
                    Commission Members</a>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="col-md-12">
                <h1>Contents</h1>
                <div class="col-md-12">
                    <h3>Title</h3>
                    <div class="row">
                        <div class="col-md-1 pull-right">
                            <button class="btn btn-info btn-round btn-fill pull-right" ng-click="saveTitle()">
                                <i class="fa fa-floppy-o"></i>
                                Save
                            </button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <textarea name="title" id="contentsTitle"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h3>Content Body</h3>
                    <div class="row">
                        <div class="col-md-1 pull-right" ng-click="saveContent()">
                            <button class="btn btn-info btn-round btn-fill pull-right">
                                <i class="fa fa-floppy-o"></i>
                                Save
                            </button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <textarea name="content" id="contentsContent"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>

        var app = angular.module('app', []);
        app.controller('main', function main($scope, $http) {

            //get all data
            $scope.getData = function () {
                $('#bannerImageSelect').empty()
                $('#newsImageSelect').empty()

                $scope.img = '{{ url('assets/img/placeholder.svg') }}'

                $http({
                    method: 'get',
                    url: "{{ url('/admin/get/commission') }}",
                    data: '',
                    headers: {
                        'Content-Type': undefined,
                    }
                }).then(function successCallback(response) {
                    $scope.landing_content = response.data
                    $("#contentsTitle").val(response.data.title)
                    $("#contentsContent").val(response.data.content)

                    new FroalaEditor('#contentsTitle', {
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
                    new FroalaEditor('#contentsContent', {
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

            //save save title
            $scope.saveTitle = function () {
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
                adata.append('title', $('#contentsTitle').val())

                $http({
                    method: 'post',
                    url: "{{ url('/admin/update/title') }}",
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
                adata.append('content', $('#contentsContent').val())

                $http({
                    method: 'post',
                    url: "{{ url('/admin/update/content') }}",
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

            $scope.getData()
        })
    </script>
@endsection
