<!DOCTYPE html>
<html>
<head>
    <title>Bone Explorer</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha256-sHwgyDk4CGNYom267UJX364ewnY4Bh55d53pxP5WDug= sha512-mkkeSf+MM3dyMWg3k9hcAttl7IVHe2BA1o/5xKLl4kBaP0bih7Mzz/DBy4y6cNZCHtE2tPgYBYH/KtEjOQYKxA==" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-k2/8zcNbxVIh5mnQ52A0r3a6jAgMGxFJFE2707UxGCk= sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
<div class="page-header">
    <h1>Bone Explorer</h1>
    <h1><small>Web API</small></h1>
</div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th width="15%">Name</th>
            <th width="20%">URL</th>
            <th>Params</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Search</td>
            <td><a href="http://localhost:3000/api/search">/api/search</a></td>
            <td>
                <ul class="list-unstyled">
                    <li><span>q</span> : <span class="label label-info">string</span></li>
                    <li><span>animalGroups</span> : <span class="label label-warning">array</span></li>
                    <li><span>authors</span> : <span class="label label-warning">array</span></li>
                    <li><span>mediaTypes</span> : <span class="label label-warning">array</span></li>
                    <li><span>museums</span> : <span class="label label-warning">array</span></li>
                </ul>
            </td>
        </tr>
        <tr>
            <td>Animal Groups</td>
            <td><a href="http://localhost:3000/api/animal-group">/api/animal-group</a></td>
            <td></td>
        </tr>
        <tr>
            <td>Authors</td>
            <td><a href="http://localhost:3000/api/Author">/api/author</a></td>
            <td></td>
        </tr>
        <tr>
            <td>Media Types</td>
            <td><a href="http://localhost:3000/api/media-type">/api/media-type</a></td>
            <td></td>
        </tr>
        <tr>
            <td>Museums</td>
            <td><a href="http://localhost:3000/api/museum">/api/museum</a></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
