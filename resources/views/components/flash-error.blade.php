@if(session()->has('error'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
  class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
  <div class="alert alert-danger">
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i><strong>Danger! </strong>{{session('error')}}
  </div>
</div>
@endif