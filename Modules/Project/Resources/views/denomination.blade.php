@extends('rolepermission::layouts.master')

@section('content')
    <div class="">
        <div class="nk-block-head nk-block-head-lg wide-sm">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title fw-normal">Add Denomination</h3>
            </div>
        </div><!-- .nk-block -->
        <div class="nk-block nk-block-lg">
            <div class="row g-gs">
                <div class="col-lg-12">
                    <div class="card h-100">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">Denominations</h5>
                            </div>
                            <form method="post" action="{{ route('project.create.denomination') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label class="form-label" for="denomination">Denomination</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="denomination_name" name="name" placeholder="Enter Denomination name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-control-wrap my-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .components-preview -->

@endsection
