<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>إدارة محطات التزود بالوقود</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datatable.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navigation.php'; ?>
    <?php include 'includes/sidebar.php'; ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">إضافة خطة جديدة</div>
                <div class="panel-body">
                    <form id="add-plan-form">
                        <div class="form-group">
                            <label for="plan-name">اسم الخطة:</label>
                            <input type="text" class="form-control" id="plan-name" name="planName">
                        </div>
                        <div class="form-group">
                            <label for="plan-price">السعر:</label>
                            <input type="number" class="form-control" id="plan-price" name="planPrice">
                        </div>
                        <div class="form-group">
                            <label for="plan-service">خدمة :</label>
                            <input type="text" class="form-control" id="plan-service" name="planService">
                        </div>
                        <button type="submit" class="btn btn-primary">إضافة الخطة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        $('#add-plan-form').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'api_plan.php',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطأ!',
                            text: 'حدث خطأ أثناء إضافة الخطة: ' + response.message,
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'نجاح!',
                            text: 'تمت إضافة الخطة بنجاح!',
                        }).then(function() {
                            location.reload();
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('خطأ:', error);
                }
            });
        });
    </script>
</body>
</html>
