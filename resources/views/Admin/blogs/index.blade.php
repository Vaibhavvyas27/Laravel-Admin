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
                        <div class="d-flex justify-content-between py-4">
                            <h5 class="card-title p-0 mb-3"># Blog Table</h5>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{route('blog.show.form')}}" class="btn btn-success">Write Blog</a>
                        </div>
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>
                                  Post Title
                                </th>
                                <th>
                                  Author name
                                </th>
                                <th>Date</th>
                                <th># Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                <td>{{$blog->post_title}}</td>
                                <td>{{$blog->auther}}</td>
                                <td>{{date('d-m-Y', strtotime($blog->created_at))}} </td>
                                <td>
                                  <div class="d-flex">
                                    <form method="POST" action="{{ route('blog.post.destroy',$blog->id) }}" onsubmit="return confirm('Are you sure?');">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{route('blog.post.edit',$blog->id)}}" class="btn btn-info ms-3">Edit</a>
                                  </div>
                                </td>
                                </tr>
                            @endforeach 
                            
                        </table>  
                    </div>
                </div>  
              </div>    
            </section>
        </main>
    </div>
</x-admin-layout>
