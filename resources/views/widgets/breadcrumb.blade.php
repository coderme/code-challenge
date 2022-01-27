<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a>

   @foreach ($items as $k => $u)

    <li class="breadcrumb-item @if ($loop->last)active @endif" aria-current="page">
       @if (!empty($u))
          <a href="{{ $u }}">{{ $k }} </a>
          
          @else 
          
          {{ $k }}
       
       @endif
    
    @endforeach
  </ol>
</nav>