<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('categories.index') }}">{{ __('home') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">   
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('categories.index') }}">{{ __('category') }}</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('products.index') }}">{{ __('product') }}</a>
        </li>
    </ul>
    
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('change-language', ['en']) }}">{{ __('english') }}</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('change-language', ['vi']) }}">{{ __('vietnamese') }}</a>
        </li>
    </ul>
  </div>
</nav>
