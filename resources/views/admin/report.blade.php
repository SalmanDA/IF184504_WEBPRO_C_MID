@extends('partials.admin_partials')
@section('admin_content')
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="bar-chart-2"></i></div>
                                {{ __('Report') }}
                            </h1>
                            <div class="page-header-subtitle">{{ __('Employee Attendance App') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container mt-n10">
            <div class="card mb-4">
                <div class="card-header">
                    {{ __('Attendace Report') }}
                </div>
                <div class="card-body">
                    <div class="datatable">
                        <table class="table table-bordered table-hover" id="report_table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Check In Time') }}</th>
                                    <th>{{ __('Check Out Time') }}</th>
                                    <th>{{ __('Work Time') }}</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0;    
                                @endphp
                                @foreach ($reports as $report)
                                    <tr>
                                        <td>{{ $report->created_at->format('d F Y') }}</td>
                                        <td>{{ $report->name }}</td>
                                        <td>{{ Carbon\Carbon::parse($report->check_in)->format('H:i:s') }}</td>
                                        <td>{{ Carbon\Carbon::parse($report->check_out)->format('H:i:s') }}</td>
                                        <td>{{ $durations[$i++] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
