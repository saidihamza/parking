<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>إضافة مدير جديد</title>
    <!-- Inclure les fichiers CSS de Bootstrap (adaptés à la direction RTL) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Inclure SweetAlert via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .image-section {
            flex: 1;
            background: url('assets/img/defense.png') no-repeat center center;
            background-size: cover;
        }

        /* Styles personnalisés */
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: #ff8c00;
            /* Couleur orange */
            border-color: #ff8c00;
        }

        .btn-custom:hover {
            background-color: #e07b00;
            border-color: #e07b00;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body dir="rtl" class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg p-4 form-container">
                    <h2 class="text-center mb-4">
                        <img src="assets/img/logo_HMPIT3.png" alt="Logo" class="img-fluid" style="max-height: 100px;">
                    </h2>
                    <div class="row">
                        <div class="col-md-6">
                            <form id="adminForm" method="POST">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="adminName" name="adminName" placeholder="الاسم الكامل" required>
                                </div>

                                <div class="mb-3">
                                    <input type="text" class="form-control" id="userName" name="userName" placeholder="اسم المستخدم" required>
                                </div>

                                <div class="mb-3">
                                    <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" placeholder="رقم الهاتف المحمول" required>
                                </div>

                                <div class="mb-3">
                                    <input type="text" class="form-control" id="securityCode" name="securityCode" placeholder="رمز الأمان" required>
                                </div>

                                <div class="mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="البريد الإلكتروني" required>
                                </div>

                                <div class="mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="كلمة المرور" required>
                                </div>

                                <button type="submit" class="btn btn-custom w-100">إضافة</button>
                            </form>

                            <a href="index.php" class="back-link">العودة إلى صفحة تسجيل الدخول</a>
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-center image-section ">
                            <!-- Image or content here -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclure les fichiers JavaScript de Bootstrap (optionnel, pour les composants JavaScript) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('adminForm');

            form.addEventListener('submit', function(event) {
                event.preventDefault(); // منع الإرسال الافتراضي للنموذج

                // جمع بيانات النموذج
                const formData = new FormData(form);

                // إرسال البيانات عبر AJAX
                fetch('insert_admin.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('خطأ في الطلب.');
                        }
                        return response.json(); // نفترض أن سكريبت PHP يعيد JSON
                    })
                    .then(data => {
                        // عرض تنبيه SweetAlert للنتيجة
                        Swal.fire({
                            title: 'نجاح!',
                            text: 'تمت إضافة المدير بنجاح.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // إعادة تعيين النموذج بعد النجاح
                        form.reset();
                    })
                    .catch(error => {
                        // عرض تنبيه SweetAlert للخطأ
                        Swal.fire({
                            title: 'خطأ!',
                            text: 'حدث خطأ. يرجى المحاولة مرة أخرى.',
                            icon: 'error',
                            showConfirmButton: true
                        });
                    });
            });
        });
    </script>

</body>

</html>