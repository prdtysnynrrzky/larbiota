@if (Session::has('success'))
<div class="pt-2">
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
</div>
@endif