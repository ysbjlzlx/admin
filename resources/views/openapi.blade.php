@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/static/Swagger-UI/swagger-ui.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/static/Swagger-UI/swagger-ui.js') }}"></script>
    <script src="{{ asset('/static/Swagger-UI/swagger-ui-bundle.js') }}"></script>
    <script src="{{ asset('/static/Swagger-UI/swagger-ui-standalone-preset.js') }}"></script>

    <script>
        window.onload = function() {
            // Build a system
            window.ui = SwaggerUIBundle({
                url: "{{ asset('/storage/openapi.yaml') }}",
                dom_id: '#swagger-ui',
                deepLinking: true,
                presets: [
                    SwaggerUIBundle.presets.apis,
                    SwaggerUIStandalonePreset
                ],
                plugins: [
                    SwaggerUIBundle.plugins.DownloadUrl
                ],

            })
        }
    </script>
@endpush

@section('content')
    <div id="swagger-ui">

    </div>
@endsection
