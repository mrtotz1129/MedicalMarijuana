@extends('index')
@section('mainBody')
<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center white-text text-lighten-4">Hospital Management System</h1>
        <div class="row center">
          <h5 class="header col s12 light">A modern responsive Management System</h5>
        </div>
        	 <article class="center indigo z-depth-1" style="margin-right: 30%; margin-left: 30%; margin-bottom: 10%; border-radius: 10px;">
        	 		<br><h3 class="thin white-text text-darken-4 center">Log In</h3>
        			 	<div class="container" style="margin-bottom: 20px;">
        			      <div class="row container">
        			        <div class="input-field col s12">
        			          <input  id="username" type="text" class="validate white-text" name="strUsername">
        			          <label for="username" class="white-text">Username</label>
        			        </div>
        			        <div class="input-field col s12">
        			          <input id="password" type="password" class="validate white-text" name="strPassword">
        			          <label for="password" class="white-text">Password</label>
        			        </div>
        			      </div>

        			      <button class="btn waves-effect waves-light col s12" type="submit" name="action">Submit
        			          <i class="material-icons right">send</i>
        			      </button>
        			     </div>
        			     <br><br>
        	 </article>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="{!! url('img/background1.jpg') !!}" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center indigo-text text-darken-4"><i class="material-icons">flash_on</i></h2>
            <h5 class="center indigo-text">Speeds up development</h5>

            <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center indigo-text text-darken-4"><i class="material-icons">group</i></h2>
            <h5 class="center indigo-text ">User Experience Focused</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center indigo-text text-darken-4"><i class="material-icons">settings</i></h2>
            <h5 class="center indigo-text">Easy to work with</h5>

            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{!! asset('img/background2.jpg') !!}" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send indigo-text text-darken-2"></i></h3>
          <h4 class="indigo-text">Contact Us</h4>
          <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
        </div>
      </div>

    </div>
  </div>

  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{!! asset('img/background3.jpg') !!}" alt="Unsplashed background img 3"></div>
  </div>

@endsection