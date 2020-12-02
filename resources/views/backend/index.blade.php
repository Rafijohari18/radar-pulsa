@extends('layouts.backend')
@section('content')

<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Dashboard</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
        
            </ol>
        </div>
    </div>
</div>     



<div class="row">

<div class="col-md-12">
    <form method="get">
        @csrf
        <div class="card mb-4">
          <h6 class="card-header">
            Filter Dashboard
        </h6>
        <div class="card-body demo-vertical-spacing">
            <!-- Range -->
            <div class=" input-group">
              <select class="form-control" name="name">
                <option value="today">Today</option>
                <option value="current-week">Current Week</option>
                <option value="latest-week">Last Week</option>
                <option value="current-month">Current Month</option>
                <option value="latest-month">Latest Month</option>
                <option value="current-year">Current Year</option>
                <option value="latest-year">Latest Year</option>
            </select>
            <button type="submit" class="btn btn-primary ml-2">Search</button>

            <!-- Inline -->
        </div>
    </div>
</form>
</div>

<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Session / Last Weeks</h5>
    </div>
        
        <div class="card-body">
            <table class="table table-hover ">
                <tr>
                    @foreach($data['n_visitor'] as $nv)
                    <th>{{ $nv['type']  }}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach($data['n_visitor'] as $nv)
                    <td>{{ $nv['sessions'] }}</td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>   

<div class="col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            <h5>Visitor</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive">
                <tr>
                    @foreach($data['total'] as $total)
                    <th>{{ Carbon\Carbon::parse($total['date'])->format('d F Y') }}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach($data['total'] as $total)
                    <td>{{ $total['visitors'] }}</td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="col-md-12 mt-2">
    <div class="card">
        <div class="card-header"><h4>Most Browser</h4></div>

        <div class="card-body">
            <table class="table table-hover ">
                <tr>
                    @foreach($data['browser'] as $bro)
                    <th>{{ $bro['browser'] }}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach($data['browser'] as $bro)
                    <td>{{ $bro['sessions'] }}</td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="col-md-12 mt-2">
    <div class="card">
        <div class="card-header"><h4>TOP Referrers</h4></div>

        <div class="card-body">
            <table class="table table-hover ">
                <tr>
                    @foreach($data['refe'] as $r)
                    <th>{{ $r['url'] }}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach($data['refe'] as $rf)
                    <td>{{ $rf['pageViews'] }}</td>
                    @endforeach
                </tr>
            </table>
        </div>

    </div>

</div>

<div class="col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            <h4>TOP Visited Page</h4>
        </div>
        <div class="card-body">
            <table class="table table responsive table-hover">
                <tr>
                    <th>Page Title</th>
                    <th>Page Views</th>
                    <th>Visitor</th>
                    <th>Date</th>
                </tr>
                @foreach($data['vp']->take(10)->sortbydesc('visitors') as $v)
                <tr>
                    <td>{{ $v['pageTitle'] }}</td>
                    <td>{{ $v['pageViews'] }} </td>
                    <td>{{ $v['visitors'] }} </td>
                    <td>{{ Carbon\Carbon::parse($v['date'])->format('d F Y') }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<div class="col-md-12 mt-2">
    <div class="card">
        <div class="card-header"><h4>TOP Visited Page</h4></div>
        <div class="card-body">
            <table class="table table->hover">
                <tr>
                    <th>URL</th>
                    <th>HITS</th>
                </tr>
                @foreach($data['top']->take(5) as $tt)
                <tr>
                    <td><a href="https://www.ihsanfirdaus.com{{ $tt['url'] }}">{{ $tt['url'] }}</a></td>
                    <td>{{ $tt['pageViews'] }} </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>



</div>


@endsection