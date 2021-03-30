

  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
      <li class="nav-item">
          <div class="language" name="{{ $localeCode }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              
          <a id="lang"  class="nav-link"   rel="alternate"  hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
             
             {{ $properties['native'] }} 
          </a>
          </div>
         
      </li>
  @endforeach
    </ul>
   
        
            
        
        
    <!-- SEARCH FORM -->
  
   
  </nav>
  <!-- /.navbar -->
  @section('script1')
<script>



    $(document).ready(function() {
        $('.language').click(function(event){
            
          
    
    
          var val= $(this).attr('name');
        
            $.ajax({
                url: "{{ route('convert') }}",
                method: 'POST',
                async: false,
                data: {
                        '_token' : "{{ csrf_token() }}",
                        'key'    : val
                      },
                success: function(response){
                    $('.result').show();
                    $('.result').html(response);
               }
            });
        });
    });
    </script>



@endsection