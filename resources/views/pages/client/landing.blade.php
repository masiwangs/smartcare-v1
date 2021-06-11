@extends('layouts.app')

@section('title')
  Halaman depan
@endsection

@section('content')
  <x-navbar/>
  <div class="container-fluid p-0 m-0" style="margin-bottom: 9rem">
    <div class="d-flex align-items-center" style="background: #fff url('top-view-stethoscope-min.jpg') no-repeat left; background-size: cover; width: 100%; height: 80vh">
      <div class="p-4 w-50">
        <h1 class="" style="font-size: 4rem">Smartcare RS K.M.R.T Wongsonegoro</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in orci diam. Ut venenatis vitae nisi nec molestie. Donec faucibus dolor sodales bibendum viverra. Integer ultrices eleifend purus sed ullamcorper. In velit tortor, commodo et facilisis eu, tristique vel risus. Maecenas vitae enim risus. Suspendisse id turpis sit amet ligula euismod rutrum. Morbi sit amet ornare tellus.</p>
        <div>
          <button class="btn btn-outline-primary rounded-pill">Pelajari lebih lanjut</button>
          <a href="/masuk" class="btn btn-primary rounded-pill">Gunakan sekarang</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-md-5 mt-4">
    <div class="row" style="margin-bottom: 9rem">
      <div class="col-4">
        <img src="https://images.unsplash.com/photo-1600443299762-7a743123645d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=851&q=80" style="width: 100%; border-radius: 2rem">
      </div>
      <div class="col-6">
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in orci diam. Ut venenatis vitae nisi nec molestie. Donec faucibus dolor sodales bibendum viverra. Integer ultrices eleifend purus sed ullamcorper. In velit tortor, commodo et facilisis eu, tristique vel risus. Maecenas vitae enim risus. Suspendisse id turpis sit amet ligula euismod rutrum. Morbi sit amet ornare tellus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam mattis felis odio, et blandit eros aliquet et. Praesent erat erat, ornare id gravida a, mollis non nunc. Pellentesque eu ipsum ac arcu dapibus finibus vel non libero."</p>
        <h1>&mdash; Dr. Lorem Ipsum</h1>
      </div>
    </div>
    <div class="row"  style="margin-bottom: 9rem">
      <div class="col-12">
        <h1 class="text-center mb-4" style="font-size: 4rem">Layanan dari kami</h1>
        <div class="row">
          <div class="col-3">
            <div class="card border-0 shadow h-100" style="border-radius: 2rem">
              <div class="card-body">
                <hr style="width: 6rem">
                <h2>Pelayanan terbaik dari kami</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in orci diam. Ut venenatis vitae nisi nec molestie. Donec faucibus dolor sodales bibendum viverra. Integer ultrices eleifend purus sed ullamcorper. In velit tortor, commodo et facilisis eu, tristique vel risus.</p>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card border-0 shadow h-100" style="border-radius: 2rem">
              <img src="https://images.unsplash.com/photo-1584362917137-56406a73241c?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8aG9zcGl0YWx8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" style="border-radius: 2rem 2rem 0 0" class="card-image-top" alt="">
              <div class="card-body">
                <h3>Lorep ipsum</h3>
                <p>Lorep ipsum dolor sit amet</p>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card border-0 shadow h-100" style="border-radius: 2rem">
              <img src="https://images.unsplash.com/photo-1604116395843-94f7b28a8080?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzB8fG1lZGljYWx8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" style="border-radius: 2rem 2rem 0 0" class="card-image-top" alt="">
              <div class="card-body">
                <h3>Lorep ipsum</h3>
                <p>Lorep ipsum dolor sit amet</p>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card border-0 shadow h-100" style="border-radius: 2rem">
              <img src="https://images.unsplash.com/photo-1611764461465-09162da6465a?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDV8fG1lZGljYWx8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" style="border-radius: 2rem 2rem 0 0" class="card-image-top" alt="">
              <div class="card-body">
                <h3>Lorep ipsum</h3>
                <p>Lorep ipsum dolor sit amet</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <x-footer/>
@endsection