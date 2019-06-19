<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">{{ env('APP_NAME') }}</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
      <li class="{{ Request::is('new-form') ? 'active' : '' }}"><a href="{{ route('newform') }}">Form</a></li>
      <li class="{{ Request::is('forms') ? 'active' : '' }}"><a href="{{ route('forms.index') }}">All submission</a></li>
    </ul>
  </div>
</nav>