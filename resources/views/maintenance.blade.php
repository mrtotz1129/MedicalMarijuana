@extends('index')
@section('body')
<aside>
    <ul id="slide-out" class="side-nav fixed" style="width: 220px !important;">
    <li class="grey darken-4 white-text center">ADMINISTRATOR</li>
      <li class="user-details cyan darken-1" style="background-image: url({!! asset('img/user-bg.png') !!});">
          <div class="row">
              <div class="col s12">
                  <img src="{!! asset('img/jerald.jpg') !!}" alt="" class="circle center" width="60%" height="60%" align="center"
                  style="margin-left: 30px; margin-top:20px;">
              </div>
              <div class="col s12"> 
                  <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">Jerald John<i class="mdi-navigation-arrow-drop-down right"></i></a>
                  <ul style="width: 128px; position: absolute; top: 57px; left: 101.25px; opacity: 1; display: none;" id="profile-dropdown" class="dropdown-content">
                      <li style="margin-top: 10px;"><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                      </li>
                      <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                      </li>
                      <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                      </li>
                  </ul>
              </div>
          </div>
      </li>
       <li class="no-padding">
            <ul class="collapsible collapsible-accordion ">
                <li class="bold {!! strpos(Request::url(), 'employee') !== false || strpos(Request::url(), 'fee') !== false || strpos(Request::url(), 'equipment') !== false || 
                strpos(Request::url(), 'room') !== false || strpos(Request::url(), 'supplier') !== false || strpos(Request::url(), 'drug') !== false || strpos(Request::url(), 'discount')
                 !== false ? 'indigo lighten-2' : '' !!}"><a class="collapsible-header waves-effect waves-cyan"><img src="{!! asset('img/settings-icon.png') !!}" width="15%" height="15%" align="center" style="margin-bottom: 5px;"> Maintenance</a>
                    <div style="" class="collapsible-body">
                        <ul>
                             <li class="{!! strpos(Request::url(), 'building') !== false ? 'indigo lighten-3' : '' !!}"><a href="{!! url('building') !!}">Building</a>
                            </li>
                            <li class="{!! strpos(Request::url(), 'nurse-station') !== false ? 'indigo lighten-3' : '' !!}"><a href="{!! url('nurse-station') !!}" >Nurse Station</a>
                            </li>
                             <li class="{!! strpos(Request::url(), 'room') !== false ? 'indigo lighten-3' : '' !!}"><a href="{!! url('room') !!}" >Room</a>
                            </li>
                            <li class="{!! strpos(Request::url(), 'bed') !== false ? 'indigo lighten-3' : '' !!}"><a href="{!! url('bed') !!}" >Bed</a>
                            </li>
                             <li class="{!! strpos(Request::url(), 'supplier') !== false ? 'indigo lighten-3' : '' !!}"><a href="{!! url('supplier') !!}" >Supplier</a>
                            </li>
                            <li class="{!! strpos(Request::url(), 'equipment') !== false ? 'indigo lighten-3' : '' !!}"><a href="{!! url('equipment') !!}">Equipment</a>
                            </li>
                             <li class="{!! strpos(Request::url(), 'drug') !== false ? 'indigo lighten-3' : '' !!}"><a href="{!! url('drug') !!}" >Items</a>
                            </li>
                            <li class="{!! strpos(Request::url(), 'fee') !== false ? 'indigo lighten-3' : '' !!}"><a href="{!! url('fee') !!}">Fee</a>
                            </li>
                             <li class="{!! strpos(Request::url(), 'requirement') !== false ? 'indigo lighten-3' : '' !!}"><a href="{!! url('requirement') !!}">Requirements</a>
                            </li>
                            <li class="{!! strpos(Request::url(), 'discount') !== false ? 'indigo lighten-3' : '' !!}"><a href="{!! url('discount') !!}" >Discount</a>
                            </li>
                            <li class="{!! strpos(Request::url(), 'employee') !== false ? 'indigo lighten-3' : '' !!}"><a href="{!! url('employee') !!}">Employee</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
         <li class="li-hover"><div class="divider"></div></li>
        <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><img src="{!! asset('img/transaction-icon.png') !!}" width="15%" height="15%" align="center" style="margin-bottom: 5px;"> Transactions</a>
                            <div style="" class="collapsible-body">
                                <ul>
                                    <li><a href="{!! url('admission') !!}">Admission</a>
                                    </li>
                                    <li><a href="{!! url('checkup') !!}" >Check Up</a>
                                    </li>
                                    <li><a href="{!! url('cashier') !!}" >Cashier</a>
                                    </li>
                                    <li><a href="{!! url('laboratory') !!}" >Laboratory</a>
                                    </li>
                                    <li><a href="{!! url('pharmacy') !!}">Pharmacy</a>
                                    </li>
                                    <li><a href="{!! url('pharmacy') !!}"s>Rehab</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
           <li class="li-hover"><div class="divider"></div></li>
    </ul>
</aside>
<aside class="aside aside-1"></aside> 
    <div>
      @yield('article')
    </div>
@endsection