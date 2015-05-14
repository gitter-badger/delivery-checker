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

                <ul class="nav nav-tabs">
                  <li class="active"><a href="#customer" data-toggle="tab">Customer</a></li>
                  <li><a href="#billing" data-toggle="tab">Billing</a></li>
                  <li><a href="#sales" data-toggle="tab">Sales/Affiliate</a></li>
                  <li><a href="#carriers_account" data-toggle="tab">Carrier Accounts</a></li>
              </ul>

              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="customer">

                    <div class="panel-body">
                      {{Form::model($customer,['route' => ['customer.update',$customer->id], 'class' => 'form-horizontal', 'method' => 'put' ])}}

                      <div class="form-group">
                        {{ Form::label('name', 'Customer Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('name', null, array('class' => 'form-control','disabled')) }}
                        </div>
                    </div>




                    <div class="form-group">
                        {{ Form::label('company_name', 'Company Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('company_name', null, array('class' => 'form-control')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        {{ Form::label('title', 'Title', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('title', null, array('class' => 'form-control')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        {{ Form::label('address_line_1', 'Address-1*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('address_line_1', null, array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('address_line_2', 'Address-2', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('address_line_2', null, array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', 'City*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('city', null, array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('state', 'State*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('state', null, array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('zip', 'Zip*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('zip', null, array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('country', 'Country*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('country', null, array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('telephone', 'Telephone*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('telephone', null, array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('fax', 'Fax', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('fax', null, array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('website', 'Website', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('website', null, array('class' => 'form-control')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Update Basic Information', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>

            <div class="tab-pane fade" id="billing">
                    <div class="panel-body">
                        {{Form::model($customer,['route' => ['customer.update.billing',$customer->id], 'class' => 'form-horizontal', 'method' => 'put' ])}}

                        <div class="form-group">
                            {{ Form::label('attn_name', 'Attn Name', array('class' => 'col-md-2 control-label')) }}
                            <div class="col-md-4">
                                {{ Form::text('attn_name', null, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('fee_percentage', 'Fee Percentage*', array('class' => 'col-md-2 control-label')) }}
                            <div class="col-md-4">
                                {{ Form::text('fee_percentage', null, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('fee_flat', 'Fee Flat', array('class' => 'col-md-2 control-label')) }}
                            <div class="col-md-4">
                                {{ Form::text('fee_flat', null, array('class' => 'form-control')) }}
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                {{ Form::submit('Update Billing Information', array('class' => 'btn btn-primary','')) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>

                <div class="tab-pane fade" id="sales">
                <div class="panel-body">
                        {{Form::model($customer,['route' => ['customer.update.sales',$customer->id], 'class' => 'form-horizontal', 'method' => 'put' ])}}

                        <div class="form-group">
                            {{ Form::label('sales_id', 'Sales ID', array('class' => 'col-md-2 control-label')) }}
                            <div class="col-md-4">
                                {{ Form::text('sales_id', null, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('sales_percentage', 'Sales Percentage', array('class' => 'col-md-2 control-label')) }}
                            <div class="col-md-4">
                                {{ Form::text('sales_percentage', null, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('affiliate_id', 'Affiliate ID', array('class' => 'col-md-2 control-label')) }}
                            <div class="col-md-4">
                                {{ Form::text('affiliate_id', null, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                {{ Form::submit('Update Sales Information', array('class' => 'btn btn-primary',)) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>

        </div>
    </div>
</section>
</div>
</div>

<script> 
$(document).ready(function(){

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      var target = $(e.target).attr("href") // activated tab
      $.cookie('last_tab', $(e.target).attr('href'));
    });

  //activate latest tab, if it exists:
  var lastTab = $.cookie('last_tab');
  if (lastTab) {
      $('ul.nav-tabs').children().removeClass('active');
      $('a[href='+ lastTab +']').parents('li:first').addClass('active');
      $('div.tab-content').children().removeClass('active');
      $(lastTab).addClass('active');
      var lastTabPanel = lastTab.replace('#','');
      $(lastTab).addClass('tab-pane fade active in');
      
  }
});
</script>

@stop

