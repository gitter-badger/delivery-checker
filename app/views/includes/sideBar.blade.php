<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                <!-- dashboard -->

                  <li>

                      <a href="{{ URL::route('dashboard') }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  @if(Entrust::hasRole(Config::get('customConfig.roles.admin')|| Config::get('customConfig.roles.superAdmin')))
                  {{-- Task Manager --}}
                  <li>

                      <a href="#">
                          <i class="fa fa-tasks"></i>
                          <span>Task Manager</span>
                      </a>
                  </li>
                  {{-- Carrier Accounts --}}
                  <li>

                      <a href="{{route('accounts.index')}}">
                          <i class="fa fa-plane"></i>
                          <span>Carrier Accounts</span>
                      </a>
                  </li>

                  {{-- Shipments --}}
                  <li>

                      <a href="#">
                          <i class="fa fa-truck"></i>
                          <span>Shipments</span>
                      </a>
                  </li>

                  {{-- Customers --}}
                  <li>

                      <a href="{{route('customer.index')}}">
                          <i class="fa fa-user"></i>
                          <span>Customers</span>
                      </a>
                  </li>

                  {{-- Salespersons --}}
                  <li>

                      <a href="#">
                          <i class="fa fa-flash"></i>
                          <span>Sales persons</span>
                      </a>
                  </li>

                  {{-- Staff Users --}}
                  <li>

                      <a href="#">
                          <i class="fa fa-users"></i>
                          <span>Staff Users</span>
                      </a>
                  </li>

                  {{-- Roles & Permissions --}}
                  <li>

                      <a href="#">
                          <i class="fa fa-gears"></i>
                          <span>Roles & Permissions</span>
                      </a>
                  </li>



                  <li>

                      <a href="{{route('user.info')}}">
                          <i class="fa fa-bell"></i>
                          <span>User Statistics</span>
                      </a>
                  </li>
                  @endif


                  









              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>