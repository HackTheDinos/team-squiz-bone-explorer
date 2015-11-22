<!DOCTYPE html>
<html ng-app="boneExplorer" ng-strict-di>
    <head>
        <title>Bone Explorer</title>
        <base href="/app/">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ elixir('css/vendor.css') }}" />
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

    <ui-view></ui-view>

    <script type="text/javascript" src="{{ elixir('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ elixir('js/app.tpl.js') }}"></script>
    </body>
</html>
