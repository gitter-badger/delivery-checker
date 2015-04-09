@extends('layouts.default')
@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    {{ $title }}
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('customer.index') }}"><span class="fa fa-chevron-left"></span> Customers</a>

					</span>
                </header>
                <div class="panel-body">


                    {{Form::model($customer,['route' => ['customer.update',$customer->id], 'class' => 'form-horizontal', 'method' => 'put' ])}}



                    <div class="form-group">
                        {{ Form::label('name', 'Customer Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Customer Name')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        {{ Form::label('company_name', 'Company Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('company_name', null, array('class' => 'form-control', 'placeholder' => 'Company Name')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        {{ Form::label('title', 'Title', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Title')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('attn_name', 'Attn Name', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('attn_name', '', array('class' => 'form-control', 'placeholder' => 'Attn Name')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('address_line_1', 'Address-1', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('address_line_1', '', array('class' => 'form-control', 'placeholder' => 'Address-1')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('address_line_2', 'Address-2', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('address_line_2', '', array('class' => 'form-control', 'placeholder' => 'Address-2')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', 'City', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('city', '', array('class' => 'form-control', 'placeholder' => 'City')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('state', 'State', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('state', '', array('class' => 'form-control', 'placeholder' => 'State')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('zip', 'Zip', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('zip', '', array('class' => 'form-control', 'placeholder' => 'Zip')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('country', 'Country', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('country', '', array('class' => 'form-control', 'placeholder' => 'Country')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('telephone', 'Telephone', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('telephone', '', array('class' => 'form-control', 'placeholder' => 'Telephone')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('fax', 'Fax', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('fax', '', array('class' => 'form-control', 'placeholder' => 'Fax')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('website', 'Website', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('website', '', array('class' => 'form-control', 'placeholder' => 'Website')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('fee_percentage', 'Fee Percentage', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('fee_percentage', '', array('class' => 'form-control', 'placeholder' => 'Fee Percentage')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('fee_flat', 'Fee Flat', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('fee_flat', '', array('class' => 'form-control', 'placeholder' => 'Fee Flat')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('sales_id', 'Sales ID', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('sales_id', '', array('class' => 'form-control', 'placeholder' => 'Sales ID')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('sales_percentage', 'Sales Percentage', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('sales_percentage', '', array('class' => 'form-control', 'placeholder' => 'Sales Percentage')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('affiliate_id', 'Affiliate ID', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('affiliate_id', '', array('class' => 'form-control', 'placeholder' => 'Affiliate ID')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Edit Customer', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </div>
@stop