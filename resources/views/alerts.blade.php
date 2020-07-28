@if (session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

@if (session('delete'))
<div class="alert alert-danger" role="alert">
  {{ session('delete') }}
</div>
@endif