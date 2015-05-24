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

                            <a class="btn btn-success btn-sm" href="{{ URL::route('accounts.index') }}"><span class="fa fa-chevron-left"></span>Carrier Accounts</a>

					</span>
                </header>
                <div class="panel-body">


                    {{Form::model($account,['route' => ['accounts.update','account'=>$account->id], 'class' => 'form-horizontal', 'method' => 'put' ])}}

                    <div class="form-group">
                        {{ Form::label('carrier', 'Carrier', array('class' => 'col-md-2 control-label required')) }}
                        <div class="col-md-4">
                            {{ Form::select('carrier', $carrier, null, array('class' => 'form-control', 'id' => 'carrier','disabled')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('username', 'User Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'User Name','disabled')) }}
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
                            {{ Form::submit('Edit Carrier Account', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </div>
@stop