<!DOCTYPE html>
<html>
    <head>
        <title>Bone Explorer</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha256-sHwgyDk4CGNYom267UJX364ewnY4Bh55d53pxP5WDug= sha512-mkkeSf+MM3dyMWg3k9hcAttl7IVHe2BA1o/5xKLl4kBaP0bih7Mzz/DBy4y6cNZCHtE2tPgYBYH/KtEjOQYKxA==" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-k2/8zcNbxVIh5mnQ52A0r3a6jAgMGxFJFE2707UxGCk= sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100% ;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .table-container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }

            a, a:hover {
                text-decoration: none;
            }

            .search-container {
                width: 800px;
            }
        </style>
    </head>
    <body>
        <div class="table-container">
            <div class="content">
                <div class="title">Bone Explorer</div>

                <div class="search-container">
                    <form action="app/">
                        <div class="form-group" style="display:inline;">
                            <div class="input-group" style="display:table;">
                                <input class="form-control" name="q" autocomplete="off"
                                       autofocus="autofocus" type="text"
                                       placeholder="find bones">
                                <span class="input-group-btn" style="">
                                    <button class="btn btn-default" type="submit">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
