@extends('layouts.master')

@section('description')
<title>Cuenta</title>
<meta name="description" content="Administración de cuenta">
@endsection


@section('content')


<h1>account content</h1>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $("#transfer, #stats").removeClass("active");
        $("#me").addClass("active");
    });
    
</script>
@stop