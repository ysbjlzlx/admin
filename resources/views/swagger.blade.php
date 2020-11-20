<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <title>Swagger UI</title>
    <link rel="stylesheet" href="{{ asset('libs/normalize/8.0.1/normalize.min.css') }}" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('libs/swagger-ui/3.34.0/swagger-ui.min.css') }}" crossorigin="anonymous" />
</head>
<body>
<div id="swagger-ui"></div>
<script src="{{ asset('libs/swagger-ui/3.34.0/swagger-ui-bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('libs/swagger-ui/3.34.0/swagger-ui-standalone-preset.min.js') }}" crossorigin="anonymous"></script>
<script>
    window.onload = function () {
        window.ui = SwaggerUIBundle({
            dom_id: "#swagger-ui",
            deepLinking: true,
            presets: [SwaggerUIBundle.presets.apis],
            plugins: [SwaggerUIBundle.plugins.DownloadUrl],
            validatorUrl: "https://validator.swagger.io/validator",
            url: "{{ url('/storage/openapi.yaml') }}",
        });
    };
</script>
</body>
</html>
