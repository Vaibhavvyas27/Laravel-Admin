<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <main id="main" class="main">

            <div class="pagetitle">
              <h1>Blog Page </h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">SuperAdmin</a></li>
                  <li class="breadcrumb-item active">Blog</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
              @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{Session::get('message')}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <div class="row">
        
                <!-- Left side columns -->
                <div class="card mt-4 col-lg-11">
                    <div class="card-body">
                        <h5 class="card-title">Floating labels Form</h5>
          
                        <!-- Floating Labels Form -->
                        <form class="row g-3" method="POST" action="{{route('blog.post.update',$blog->id)}}" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="col-md-6">
                            <div class="form-floating">
                              <input type="text" class="form-control" id="floatingName" name="title" placeholder="Your Name" value="{{$blog->post_title}}">
                              <label for="floatingName">Blog Title</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                                <div class="form-floating">
                                    <input class="form-control" name="image" type="file" id="formFile">
                                    <label for="formFile pt-0" style="padding: 0.4rem 0.75rem 0; height:auto;">Uplode Image</label>
                                </div>
                          </div>
                          <div class="col-md-2">
                               <img src="{{ URL::asset('storage/' . $blog->image) }}" alt="Image" style="height: 100px">
                          </div>
                          <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Content</h5>
                    
                                  <!-- TinyMCE Editor -->
                                  <textarea class="tinymce-editor" name="text">
                                    {{$blog->description}}
                                  </textarea><!-- End TinyMCE Editor -->
                    
                                </div>
                              </div>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                          </div>
                        </form><!-- End floating Labels Form -->
          
                      </div>
                </div>  
              </div>    
            </section>
        </main>
    </div>
</x-admin-layout>
