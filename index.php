<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>موقف سيارات المستشفى العسكري بتونس</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/assets/img/logo_HMPIT3.png" rel="icon" alt="رمز التبويب">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" alt="رمز اللمس لأبل">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename"><img src="assets/img/logo_HMPIT3.png" alt=""></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="">الصفحة الرئيسية</a></li>
          <li><a href="#about">من نحن</a></li>
          <li><a href="#services">الخدمات</a></li>
          <li><a href="#team">فريقنا</a></li>
          <li><a href="#pricing">التسعير</a></li>
          <li><a href="#contact">اتصل بنا</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="back/index.php">تسجيل الدخول</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1 class="">استمتع بخدماتنا المتميزة</h1>
            <p class="">نحن سعداء بترحيبكم في موقف سيارات المستشفى العسكري بتونس. هدفنا هو توفير خدمة وقوف السيارات الآمنة والفعالة لجميع مستخدمينا</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">ابدأ الآن</a>
              <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>شاهد الفيديو</span></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/hopital.gif" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container" data-aos="zoom-in">

        <div class="swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
          </div>
        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- About Section -->
    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>من نحن</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
              موقف سيارات المستشفى العسكري بتونس هو جزء أساسي من البنية التحتية للوزارة، حيث يُعتبر مكانًا مهمًا لوقوف السيارات لموظفي الوزارة والزوار. يتم تصميم الموقف بعناية لضمان توافر مواقف كافية في جميع الأوقات، بالإضافة إلى توفير خدمات الأمان والراحة للمستخدمين، مثل الإضاءة الجيدة وأنظمة المراقبة. كما يُطبق الرسوم المعقولة للاستخدام، مع توفير معلومات واضحة حول الأسعار وسياسات الاستخدام. تهدف خدمات الموقف إلى توفير تجربة مريحة وسهلة للمستخدمين، وهذا يتضمن توفير خدمات إضافية لتلبية احتياجاتهم.
            </p>
            <p>
              يشمل نطاق الخدمات المقدمة توفير مساحات وقوف آمنة وراحة للسيارات، وتقديم خدمات إضافية مثل الحجز المسبق عبر الإنترنت وخدمات الشحن الكهربائي للسيارات الكهربائية والهجينة. تعتبر مواقف السيارات جزءًا أساسيًا من التجهيزات الحكومية، وتقدم خدمات مهمة للموظفين والزوار، مما يجعل من الضروري توفيرها بشكل مريح وفعال لضمان سير العمليات بسلاسة وفعالية داخل الوزارة.
            </p>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>
              بالإضافة إلى ذلك، يتميز موقف سيارات المستشفى العسكري بتونس بتوفير خدمات تسهيلية متقدمة، مثل مناطق الانتظار المخصصة للأشخاص ذوي الاحتياجات الخاصة، وتوفير خيارات دفع متعددة لتلبية احتياجات مختلف الزوار. كما يتمتع الموقف بفريق متخصص في الصيانة لضمان أن المرافق تعمل بكفاءة عالية وبدون عوائق.
            </p>
            <p>
              يوفر موقف سيارات المستشفى العسكري بتونس خدمات تسهيلية إضافية مثل خدمة توصيل السيارات للمستخدمين ذوي الاحتياجات الخاصة، ومناطق انتظار مظللة لحماية السيارات من الظروف الجوية القاسية. كما يُقدم الموقف خدمات تطهير وتعقيم للمركبات بانتظام، مما يسهم في الحفاظ على نظافة وصحة البيئة داخل الموقف. تُعد هذه الخدمات جزءًا من التزامنا بتقديم بيئة آمنة وصحية لجميع المستخدمين، والمساهمة في الحفاظ على الصحة العامة والبيئة المحيطة.
            </p>
            <a href="about-details.php" class="read-more"><span>اقرأ المزيد</span><i class="bi bi-arrow-right"></i></a>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us" data-builder="section">

      <div class="container-fluid">

        <div class="row gy-4">

          <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

            <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
              <h3 class=""><span class=""><b>موقف سيارات المستشفى العسكري بتونس</b> </span>سبب اختيارنا وأهميتنا</h3>
              <p class="">
                يقدم موقف سيارات المستشفى العسكري خدمات استثنائية لضمان راحة وأمان جميع الزوار. نهدف إلى تقديم أفضل الحلول لإدارة وتنظيم مواقف السيارات لضمان تجربة سلسة ومريحة.

              </p>
            </div>

            <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

              <div class="faq-item faq-active">

                <h3><span>01</span> تعليمات وقوف السيارات</h3>
                <div class="faq-content">
                  <p>يُطلب من جميع الزوار والموظفين الالتزام بالتعليمات الموجودة في موقف السيارات. يُرجى اتباع الإرشادات الموجودة في اللافتات والتنبيهات لتحقيق تجربة وقوف آمنة ومنظمة.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span>02</span> القوانين واللوائح</h3>
                <div class="faq-content">
                  <p>
                    يتعين على جميع السائقين الالتزام بالقوانين واللوائح المتعلقة بوقوف السيارات في الموقف. من فضلك، تأكد من عدم الوقوف في الأماكن المحظورة والالتزام بتوجيهات موظفي الموقف.

                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span>03</span> روابط مفيدة</h3>
                <div class="faq-content">
                  <p>لمزيد من المعلومات حول قوانين وتعليمات وقوف السيارات، يُمكنك الاطلاع على الموارد التالية

                  <ul>
                    <li><a href="https://www.example.com/traffic-law" target="_blank">قانون المرور التونسي</a></li>
                    <li><a href="https://www.example.com/parking-instructions" target="_blank">تعليمات وزارة النقل حول وقوف السيارات</a></li>
                    <li><a href="https://www.example.com/parking-guide" target="_blank">معلومات مفيدة حول استخدام الموقف</a></li>
                  </ul>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->
            </div>
          </div>

          <div class="col-lg-5 order-1 order-lg-2 why-us-img">
            <img src="assets/img/hero-img.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>
        </div>
      </div>
    </section><!-- /Why Us Section -->

    <!-- Skills Section -->
    <section id="skills" class="skills section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">

          <div class="col-lg-6 d-flex align-items-center">
            <img src="assets/img/skills.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 pt-4 pt-lg-0 content">

            <h3>إدارة موقف سيارات المستشفى العسكري </h3>
            <p class="fst-italic">
              يتطلب إدارة موقف سيارات المستشفى العسكري مجموعة من المهارات والخبرات لضمان سير العمل بكفاءة وفعالية.
            </p>

            <div class="skills-content skills-animation">

              <div class="progress">
                <span class="skill"><span>إدارة المساحات للوقوف</span> <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>أنظمة الأمان</span> <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>إدارة حركة المرور</span> <i class="val">75%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>الصيانة</span> <i class="val">55%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

            </div>

          </div>
        </div>

      </div>

    </section><!-- /Skills Section -->


    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>خدماتنا</h2>
        <p>
          خدمات موقف وزارة الدفاع تشمل توفير مساحات مخصصة لوقوف السيارات لموظفي الوزارة والزوار، بالإضافة إلى تقديم خدمات الأمان والراحة مثل الإضاءة الجيدة وأنظمة المراقبة. كما يتم تطبيق رسوم معقولة للاستخدام، مع توفير معلومات شفافة حول الأسعار والسياسات. ولتحسين تجربة المستخدم، يتم توفير خدمات إضافية مثل خدمة التنظيف والصيانة للسيارات داخل الموقف. كما يُشجع على التواصل الفعّال لمعالجة أية مشاكل وتلبية احتياجات المستخدمين بشكل فعّال</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-activity icon"></i></div>
              <h4><a href="service-details.php" class="stretched-link">حالة المواقف</a></h4>
              <p>عرض معلومات في الوقت الحقيقي حول توافر الأماكن في المواقف، مما يساعد الزوار والموظفين على تحديد ما إذا كان هناك مساحة شاغرة لوقوف سياراتهم</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
              <h4><a href="service-details.php" class="stretched-link">معلومات الاتصال</a></h4>
              <p>توفير تفاصيل الاتصال بقسم إدارة الموقف للزوار للتواصل في حالة وجود أي استفسارات أو مشاكل</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
              <h4><a href="service-details.php" class="stretched-link">أخبار وتحديثات
                </a></h4>
              <p>توفير معلومات حول أي تحديثات أو تغييرات متعلقة بموقف السيارات، مثل ساعات العمل المحدثة أو أي تغييرات في السياسات</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-broadcast icon"></i></div>
              <h4><a href="service-details.php" class="stretched-link">سياسات وقوانين الوقوف</a></h4>
              <p>نشر سياسات وقوانين الوقوف بوضوح، بما في ذلك الرسوم والعقوبات المترتبة على الانتهاكات</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->
    <!-- Team Section -->
    <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>فريقنا</h2>
        <p>تعرف على الفريق الذي يعمل بجد لضمان توفير أفضل خدمة ممكنة في موقف سيارات المستشفى العسكري بتونس.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-1.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>أحمد بن علي</h4>
                <span>مدير المشروع</span>
                <p>أحمد يتولى مسؤولية الإشراف على كافة عمليات الموقف، وضمان سير العمل بكفاءة عالية.</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-2.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>فاطمة الزهراء</h4>
                <span>مديرة العمليات</span>
                <p>فاطمة تشرف على تنفيذ الخطط والإجراءات اليومية لضمان تقديم خدمة عالية الجودة.</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-3.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>محمد العابد</h4>
                <span>مسؤول الأمن</span>
                <p>محمد يضمن سلامة وأمن السيارات في الموقف على مدار الساعة من خلال نظام أمان متكامل.</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/team/team-4.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>سلمى الشواشي</h4>
                <span>مسؤولة خدمة العملاء</span>
                <p>سلمى تتولى مهمة مساعدة العملاء والإجابة على استفساراتهم لضمان رضاهم التام عن خدماتنا.</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Team Section -->

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

      <!-- Titre de la section -->
      <div class="container section-title" data-aos="fade-up">
        <h2>التسعير</h2>
        <p>توفر مواقف السيارات لدينا أسعار تنافسية ومعقولة لتلبية احتياجاتك</p>
      </div><!-- Fin du titre de la section -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="pricing-item">
              <h3>الخطة المجانية</h3>
              <h4><sup>$</sup>0<span> / الشهر</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>توفير خدمة وقوف السيارات مجانًا</span></li>
                <li><i class="bi bi-check"></i> <span>لا توجد رسوم شهرية</span></li>
                <li><i class="bi bi-check"></i> <span>مواقف متاحة بشكل محدود</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>توفير خدمات إضافية</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>توفير مساحات مخصصة</span></li>
              </ul>
              <a href="#" class="buy-btn">اشتري الآن</a>
            </div>
          </div><!-- Fin de l'élément de tarification -->

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="pricing-item featured">
              <h3>خطة الأعمال</h3>
              <h4><sup>$</sup>29<span> / الشهر</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>توفير خدمة وقوف السيارات بأسعار معقولة</span></li>
                <li><i class="bi bi-check"></i> <span>مواقف متاحة بشكل أوسع</span></li>
                <li><i class="bi bi-check"></i> <span>خدمة الدعم على مدار الساعة</span></li>
                <li><i class="bi bi-check"></i> <span>توفير خدمات إضافية</span></li>
                <li><i class="bi bi-check"></i> <span>توفير مساحات مخصصة</span></li>
              </ul>
              <a href="#" class="buy-btn">اشتري الآن</a>
            </div>
          </div><!-- Fin de l'élément de tarification -->

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="pricing-item">
              <h3>خطة المطورين</h3>
              <h4><sup>$</sup>49<span> / الشهر</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>توفير خدمة وقوف السيارات بأعلى مستوى</span></li>
                <li><i class="bi bi-check"></i> <span>توفير خدمات مخصصة للمطورين</span></li>
                <li><i class="bi bi-check"></i> <span>مواقف مخصصة للعملاء المميزين</span></li>
                <li><i class="bi bi-check"></i> <span>توفير خدمات إضافية</span></li>
                <li><i class="bi bi-check"></i> <span>توفير مساحات مخصصة</span></li>
              </ul>
              <a href="#" class="buy-btn">اشتري الآن</a>
            </div>
          </div><!-- Fin de l'élément de tarification -->

        </div>

      </div>

    </section><!-- /Section de tarification -->
    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>تجارب العملاء</h2>
        <p>اقرأ ما يقوله عملاؤنا عن خدمات موقف سيارات المستشفى العسكري بتونس</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.png" class="testimonial-img" alt="">
                <h3>محمد علي</h3>
                <h4>موظف حكومي</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>كانت تجربتي في استخدام موقف سيارات المستشفى العسكري رائعة. الخدمة ممتازة والأمان على أعلى مستوى.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.png" class="testimonial-img" alt="">
                <h3>فاطمة الزهراء</h3>
                <h4>ربة منزل</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>أنا ممتن جداً لوجود مثل هذا الموقف بجوار المستشفى. سهولة الوصول والنظام الممتاز جعلا حياتي أسهل بكثير.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.png" class="testimonial-img" alt="">
                <h3>علي بن سالم</h3>
                <h4>مهندس</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>مستوى الأمان والنظافة في الموقف فاق توقعاتي. أوصي الجميع باستخدام هذا الموقف.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.png" class="testimonial-img" alt="">
                <h3>مريم العابد</h3>
                <h4>طالبة</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>تجربة رائعة حقاً. فريق العمل ودود ومحترف، والنظام الإلكتروني مريح للغاية.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>تواصل معنا</h2>
        <p>لا تتردد في التواصل معنا لأي استفسار أو استفادة من خدماتنا</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>العنوان</h3>
                  <p>الطريق القديمة بالقرب من مطار تونس قرطاج، تونس</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>اتصل بنا</h3>
                  <p>+216 71 862 000</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>راسلنا</h3>
                  <p>info@hopitalmilitaire.tn</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d25513.077594090353!2d10.2235829!3d36.8447602!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x43edcecad66bfa6d!2sHopital%20Militaire%20de%20Tunis!5e0!3m2!1sen!2stn!4v1676964789869!5m2!1sen!2stn" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="process_form.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">
                <div class="col-md-6">
                  <label for="name-field" class="form-label pb-2">اسمك</label>
                  <input type="text" name="name" id="name-field" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label for="email-field" class="form-label pb-2">بريدك الإلكتروني</label>
                  <input type="email" class="form-control" name="email" id="email-field" required>
                </div>
                <div class="col-md-12">
                  <label for="subject-field" class="form-label pb-2">الموضوع</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required>
                </div>
                <div class="col-md-12">
                  <label for="message-field" class="form-label pb-2">الرسالة</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required></textarea>
                </div>
                <div class="col-md-12 text-center">
                  <div class="sent-message">تم إرسال رسالتك. شكراً لك!</div>
                  <button type="submit" class="btn btn-primary">إرسال الرسالة</button>
                </div>
              </div>
            </form>
          </div>


        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
          $(document).ready(function() {
            $('.php-email-form').submit(function(e) {
              e.preventDefault();
              var form = $(this);
              var formData = form.serialize();

              $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: formData,
                success: function(response) {
                  // Gérer la réponse de succès
                  form.find('.loading').hide();
                  form.find('.sent-message').show();
                  form.find('input, textarea, button').attr('disabled', 'disabled');
                },
                error: function(data) {
                  // Gérer les erreurs
                  form.find('.loading').hide();
                  form.find('.error-message').text('حدث خطأ أثناء معالجة الطلب. يرجى المحاولة مرة أخرى.');
                  form.find('.error-message').show();
                }
              });
            });
          });
        </script>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>انضم إلى قائمة البريد الإلكتروني الخاصة بنا</h4>
            <p>اشترك في قائمة بريدنا الإلكتروني لتصلك أحدث الأخبار حول منتجاتنا وخدماتنا!"
            </p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">مستشفى الدفاع العسكري</span>
          </a>
          <div class="footer-contact pt-3">
            <p>الطريق القديمة</p>
            <p>بالقرب من مطار تونس قرطاج، تونس</p>
            <p class="mt-3"><strong>الهاتف:</strong> <span>+216 71 862 000</span></p>
            <p><strong>البريد الإلكتروني:</strong> <span>info@hopitalmilitaire.tn</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>روابط مفيدة</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">الصفحة الرئيسية</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">من نحن</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">خدماتنا</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">شروط الخدمة</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-12">
          <h4>تابعنا</h4>
          <p>انضم إلينا على مواقع التواصل الاجتماعي للحصول على آخر الأخبار والتحديثات</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>حقوق النشر</span> <strong class="px-1 sitename">مستشفى الدفاع العسكري</strong> <span>جميع الحقوق محفوظة</span></p>
      <div class="credits">
        تصميم بواسطة <a href="">خولة هلال</a>
      </div>
    </div>


  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>