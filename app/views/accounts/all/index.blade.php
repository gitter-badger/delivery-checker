@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading clearfix">
                    {{ $title }}
                    <!-- <span class="pull-right">
					</span> -->
                </header>
                <div class="panel-body">
                    @if(count($accounts))
                        <table class="display table table-bordered table-striped" id="example">
                            <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Carrier</th>
                                <th>Username</th>
                                <th>Password</th>

                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td>{{ $account->customer->id }}</td>
                                    <td>{{ $account->customer->name }}</td>
                                    <td>{{ $account->customer->company_name}}</td>
                                    <td>{{ $account->customer->user->email }}</td>
                                    <td>{{ $account->carrier}}</td>
                                    <td>{{ $account->username}}</td>
                                    <td>{{ $account->password}}</td>


                                    <td class="text-center">

                                        <a class="btn btn-xs btn-success btn-edit" href="{{ URL::route('accounts.edit', ['account'=>$account->id]) }}">Edit</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        No Data Found
                    @endif
                </div>
            </section>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Are you sure to delete?
                </div>
                <div class="modal-footer">
                    {{ Form::open(array('route' => array('customer.accounts.delete', 0), 'method'=> 'delete', 'class' => 'deleteForm')) }}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    {{ Form::submit('Yes, Delete', array('class' => 'btn btn-success')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>


@stop


@section('style')
    {{ HTML::style('assets/data-tables/DT_bootstrap.css') }}

@stop


@section('script')
    {{ HTML::script('assets/data-tables/jquery.dataTables.js') }}
    {{ HTML::script('assets/data-tables/DT_bootstrap.js') }}

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#example').dataTable({
               
            });

      
        });
    </script>
@stop