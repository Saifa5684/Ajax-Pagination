<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <title>Document</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-5">
                    <h1 class="text-center">PAGINATION WITH AJAX</h1>
                    <div id="table-data"></div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                function loadTable(page) {
                    $.ajax({
                        url: "ajax-pagination.php",
                        type: "POST",
                        data: { page_no: page },
                        success: function (data) {
                            $("#table-data").html(data);
                        },
                    });
                }

                loadTable();

                $(document).on("click", "#pagination li", function (e) {
                    e.preventDefault();
                    var pageId = $(this).attr("id");

                    loadTable(pageId);
                });
            });
        </script>
    </body>
</html>
