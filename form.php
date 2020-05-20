<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Jio Platforms Limited">
        <meta name="author" content="Jio Platforms Limited">
        <meta name="keywords" content="Jio Platforms Limited">

        <title>Campaign Delivery Ads Validation</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class='container-fluid'>
            <div class='row justify-content-md-center'>
                <div class='col-lg-12 col-md-6 col-sm-3'>
                    <table class="table table-striped table-dark table-bordered">
                        <thead class='thead-dark'>
                            <tr>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo empty($output['data']) ? $output['message'] : $output['data']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </body>
</html>
