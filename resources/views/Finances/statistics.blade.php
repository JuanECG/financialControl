@extends('layouts.master')
 
@section('description')
<title>Estadísticas</title>
<meta name="description" content="Estadísticas de los ingresos">
@endsection

@section('content')
       

<h1>statistics content</h1>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $("#transfer, #me").removeClass("active");
        $("#stats").addClass("active");
    });
    
</script>

@stop