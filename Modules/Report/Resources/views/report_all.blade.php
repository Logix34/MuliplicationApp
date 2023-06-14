@extends('coordinator::layouts.master')

@section('content')
    <div class="nk-content " style="width: 100%;">
        <div class="">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview">

                        <div class="nk-block">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">All Reports
                                        <a href="{{route('report.abc.create')}}" class="btn btn-outline-success float-right"><em class="icon ni ni-plus"></em><span>Add Report</span></a>

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

                                            <th class="nk-tb-col"><span class="sub-text">Month</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($reports as $report)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <span>{{$report->month}}</span>
                                                </td>

                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
{{--                                                        @can('edit_abc_report')--}}
                                                            <li class="">
                                                                <a href="{{ route('report.abc.view',$report->id) }}" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="View">
                                                                    <em class="icon ni ni-eye text-success"></em> View
                                                                </a>
                                                            </li>
{{--                                                        @endcan--}}
{{--                                                        @can('delete_abc_report')--}}
{{--                                                            <li class="">--}}
{{--                                                                <form action="{{ route('coordinator.delete',$coordinator->id) }}" method="POST">--}}
{{--                                                                    @csrf--}}
{{--                                                                    @method('DELETE')--}}
{{--                                                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Delete">--}}
{{--                                                                        <em class="icon ni ni-trash-fill text-danger"></em>--}}
{{--                                                                    </button>--}}
{{--                                                                </form>--}}
{{--                                                            </li>--}}
{{--                                                        @endcan--}}
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
