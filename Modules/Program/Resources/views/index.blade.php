@extends('program::layouts.master')

@section('content')
    <div class="nk-content " style="width: 100%;">
        <div class="">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview">

                        <div class="nk-block">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">All Programs
                                        @can('add_program')
                                            <a href="{{route('program.create')}}" class="btn btn-outline-success float-right"><em class="icon ni ni-plus"></em><span>Add Program</span></a>
                                        @endif
                                    </h4>
                                    <div class="nk-block-des">
                                        <!-- <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="card card-preview">

                                <div class="card-inner">
                                    <table style="width: 100%;" class="datatable-init-export nk-tb-list nk-tb-ulist" data-export-title="Export" data-auto-responsive="false">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">

                                            <th class="nk-tb-col"><span class="sub-text">ID</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($programs as $program)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <span>{{$program->id}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{$program->name}}</span>
                                                </td>

                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        @can('edit_program')
                                                            <a class="btn btn-trigger btn-icon" href="{{ route('program.edit',$program->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <em class="icon ni ni-edit-fill text-success"></em>
                                                            </a>

                                                        @endcan
                                                        @can('delete_program')

                                                            <form action="{{ route('program.delete',$program->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                    <em class="icon ni ni-trash-fill text-danger"></em>
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->

                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>

@endsection
