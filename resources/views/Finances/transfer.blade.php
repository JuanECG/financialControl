@extends('layouts.master')
 
@section('description')
<title>Transferencias</title>
<meta name="description" content="Resumen de Transferencias">
@endsection

@section('content')
       
<h1>transfer content</h1>

@endsection

@section('script')

<script type="text/javascript">
    $(document).ready(function() {
        $("#stats, #me").removeClass("active");
        $("#transfer").addClass("active");
    });
    
</script>

@stop