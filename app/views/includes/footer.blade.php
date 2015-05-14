    <!--footer start-->
    <footer class="site-footer">
          <div class="text-center">
              {{Date('Y')}} &copy; LateRefunds
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
    <!--footer end-->

</section>

  	
  	{{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js') }}
  	{{ HTML::script('js/jquery.dcjqaccordion.2.7.js', array('class' => 'include')) }}
  	{{ HTML::script('js/jquery.scrollTo.min.js') }}
  	{{ HTML::script('js/jquery.nicescroll.js') }}
  	{{ HTML::script('js/respond.min.js') }}
    {{ HTML::script('js/slidebars.min.js') }}
  	{{ HTML::script('js/common-scripts.js') }}
  	@yield('script')
  	<!-- {{ HTML::script('js/custom.js') }} -->

    

