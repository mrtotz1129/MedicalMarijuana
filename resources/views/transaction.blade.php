@extends('index')
@section('body')
<aside id="left-sidebar-nav" >
                <ul style="width: 240px;" id="slide-out" class="side-nav fixed leftside-navigation ps-container ps-active-y indigo darken-2 white-text">
                <li class="user-details cyan darken-1" style="background-image: url({!! asset('img/user-bg.png') !!});">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <img src="{!! asset('img/jerald.jpg') !!}" alt="" class="circle responsive-img valign profile-image">
                    </div>
                    <div class="col col s8 m8 l8">
                        
                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">Jerald John<i class="mdi-navigation-arrow-drop-down right"></i></a><ul style="width: 128px; position: absolute; top: 57px; left: 101.25px; opacity: 1; display: none;" id="profile-dropdown" class="dropdown-content">
                            <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                            </li>
                            <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                            </li>
                            <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                            </li>
                        </ul>
                        <p class="user-roal">Pharmacist</p>
                    </div>
                </div>
                </li>
                 <li class="no-padding">
                    <ul class="collapsible collapsible-accordion indigo darken-2">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan white-text"><i class="material-icons white-text">attach_money</i>Transactions</a>
                            <div style="" class="collapsible-body">
                                <ul class="indigo darken-1">
                                    <li><a href="{!! url('admission') !!}" class="white-text">Admission</a>
                                    </li>
                                    <li><a href="layout-horizontal-menu.html" class="white-text">Check Up</a>
                                    </li>
                                    <li><a href="layout-horizontal-menu.html" class="white-text">Cashier</a>
                                    </li>
                                    <li><a href="layout-horizontal-menu.html" class="white-text">Laboratory</a>
                                    </li>
                                    <li><a href="layout-horizontal-menu.html" class="white-text">Pharmacy</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="bold"><a href="app-email.html" class="waves-effect waves-cyan white-text"><i class="mdi-communication-email white-text"></i> Mailbox <span class="new badge">4</span></a>
                </li>
               
                <li class="li-hover"><div class="divider"></div></li>
                <li class="li-hover"><p class="ultra-small margin more-text">Daily Sales</p></li>
                
            <div style="left: 0px; bottom: 3px;" class="ps-scrollbar-x-rail"><div style="left: 0px; width: 0px;" class="ps-scrollbar-x"></div></div><div style="top: 0px; height: 591px; right: 3px;" class="ps-scrollbar-y-rail"><div style="top: 0px; height: 279px;" class="ps-scrollbar-y"></div></div></ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>

<div>
	@yield('article')
</div>
@endsection