@extends('coordinator::layouts.master')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Edit Coordinator</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                {{-- Categories/Add Category --}}
                            </div>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
                <div class="card">
                    <div class="card-inner">

                        <form method="POST" action="{{ route('coordinator.update', $coordinator->id) }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="name">Coordinator Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name" value="{{$coordinator->name}}" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Updated</button>

                        </form>
                    </div>
                </div><!-- card -->

            </div>
        </div>
    </div>

@endsection