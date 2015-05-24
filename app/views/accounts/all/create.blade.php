@extends('layouts.default')

@section('content')
    <?php

    $carrier = [
            ''      => '--select--',
            'FedEx' => 'FedEx',
            'UPS'   => 'UPS'
    ];
    ?>
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    {{ $title }}
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('customer.edit',['id' => $customer_id]) }}"><span class="fa fa-chevron-left"></span> Accounts</a>

					</span>
                </header>
                <div class="panel-body">
                    {{ Form::open(['route' => ['customer.accounts.store',$customer_id], 'class' => 'form-horizontal']) }}

                    <div class="form-group">
                        {{ Form::label('carrier', 'Carrier', array('class' => 'col-md-2 control-label required')) }}
                        <div class="col-md-4">
                            {{ Form::select('carrier', $carrier, '', array('class' => 'form-control', 'id' => 'carrier')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('username', 'User Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'User Name')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'User Password*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('password', null,array('class' => 'form-control', 'placeholder' => 'User Password')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Create Carrier Account', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </div>
@stop

@section('style')
    {{ HTML::style('css/chosen_dropdown/chosen.css') }}
@stop

@section('script')

    {{ HTML::script('js/chosen_dropdown/chosen.jquery.min.js') }}
    {{ HTML::script('js/chosen_dropdown/chosen.proto.min.js') }}

    <script type="text/javascript">
        $(document).ready(function() {
            $("#carrier").chosen();
        });

    </script>
@stop