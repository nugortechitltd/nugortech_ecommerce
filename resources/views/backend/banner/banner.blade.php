@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>Add banner</h1>
            <p class="breadcrumbs"><span><a href="{{route('home')}}">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>banner</p>
        </div>
        <div>
            {{-- <a href="{{route('banner.list')}}" class="btn btn-primary"> View All</a> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Add banner</h2>
                </div>

                <div class="card-body">
                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            <div class="ec-vendor-upload-detail">
                                <form class="row g-3" method="post" enctype="multipart/form-data" action="{{route('banner.store')}}">
                                    @csrf
                                    <div class="col-md-12 mt-3 m-auto">
                                        <label class="form-label">Heading</label>
                                        <input type="text" name="head" class="form-control" placeholder="Heading">
                                        @error('head')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3 m-auto">
                                        <label class="form-label">Title1</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title">
                                        @error('title')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3 m-auto">
                                        <label class="form-label">Title2</label>
                                        <input type="text" name="title2" class="form-control" placeholder="Title">
                                        @error('title2')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="desc" class="form-control" placeholder="Description"></textarea>
                                        @error('desc')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form_customer_profilr_img">
                                            <label for="" class="col-form-label">Banner image</label>
                                            <input type="file" name="image" class="form-control" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        @error('image')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                        <img width="100" class="mt-3 mb-3" id="image" height="auto" src="" alt="">
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <button type="submit" class="btn btn-primary">Add banner</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 ms-auto me-auto mt-5">
            <div class="ec-cat-list card card-default">
                <div class="card-header">
                    <h2>Banner</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Heading</th>
                                    <th>Title one</th>
                                    <th>Title two</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
    
                            <tbody>
                                @foreach ($banners as $sl=>$banner)
                                <tr>
                                    <td>{{$sl+1}}</td>
                                    <td>{{$banner->head}}</td>
                                    <td>{{$banner->title}}</td>
                                    <td>{{$banner->title2}}</td>
                                    <td>{{$banner->desc}}</td>
                                    <td><img width="60" src="{{asset('uploads/hero')}}/{{$banner->image}}" alt=""></td>
                                    <td>
                                        <a href="{{route('banner.delete', $banner->id)}}" class="badge badge-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection