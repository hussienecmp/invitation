<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">

    <style>
            @font-face {
            font-family: 'Cairo';
            src: url('{{ public_path('fonts/Cairo-Regular.ttf') }}') format('truetype');
            font-weight: normal;
        }
        body {
            font-family: 'Cairo';
            direction: rtl;
            text-align: right;
            margin: 0;
            padding: 0;
        }
        .container-fluid {
            width: 100%;
            margin: 0 auto;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0;
        }
        .col-md-6 {
            width: 50%;
            box-sizing: border-box;
        }
        .logo-header {
            display: grid;
            grid-template-columns: 60% 40%;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        .logo-header p {
            color: #4d5fa7;
            font-size: 1rem;
            font-weight: 600;
            margin: 0;
        }
        .name-cat-com-add{
            display: grid;
            grid-template-columns: 60% 40%;
            justify-content: space-between;
            align-items: center;
        }
        .logo img {
            width: 100%;
        }
        .name-cat-com {
            border-bottom: 1px dashed #4c5fa8;
            padding-bottom: 1rem;
            margin-bottom: 1rem;
            display: grid;
            grid-template-columns: 85% 15%;
            text-align:center;
            
        }
        .name-cat-com p{
            padding-bottom: 20px;
        }
      
    
        .half-circle-green {
           
            position: absolute;
            bottom: -5px;
            left: 100px;
       
        }
        .category {
            color: #80bf7e;
            font-weight: 500;
            font-size: 1rem;
        }
        .name {
            color: #4d5fa7;
            font-size: 1rem;
            font-weight: 500;
        }
        .name-add, .category-add {
            font-size: 1rem;
        }
        .name-add {
            color: #4d5fa7;
        }
        .category-add {
            color: #80bf7e;
            font-weight: 500;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <section class="container-fluid">
        <div class="row" style="border-bottom: 1px solid #80bf7e;">
            <div class="col-md-6" style="border: 1.5rem solid #80bf7e;">
                <div class="logo-header" style="border-bottom: 1rem solid #80bf7e;padding:0 10px">
                    <p>19 - 20 فبراير 2025<br>الوقت</p>
                    <div class="logo">
                        <img src="{{ public_path('images/logo.png') }}" alt="Logo">
                    </div>
                </div>
                <div class="name-cat-com">
                   <div>
                
                    <p class="name">{{ $name }}</p>
                    <p class="category">{{$cat}}</p>
                    <p class="company">{{ $org?? '' }}</p>
                  </div>
                  <div ><img src="{{ public_path('images/blue.png') }}" /></div>
                </div>
                <div style="position: relative; height: 20px; border-bottom: 1px dashed #4c5fa8;">
                    <div class="half-circle-green"><img src="{{ public_path('images/green.png') }}" />
                </div>
                </div>
                <div class="name-cat-com-add">
                    <div style="padding-top: 0.9rem;">
                        <p class="category-add">المؤتمر الدولي لحقوق النسخ في الإمارات</p>
                        <p class="name-add">الشارقة، دولة الإمارات العربية المتحدة</p>
                        <p class="name-add">19 - 20 فبراير 2025</p>
                    </div>
                    <div style="text-align: center;">
                        <img src="{{ public_path('images/qr.png') }}" alt="QR Code">
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img src="{{ public_path('images/footer1.png') }}" alt="Footer 1">
                <img src="{{ public_path('images/footer2.png') }}" alt="Footer 2">
            </div>
        </div>
    </section>
</body>
</html>
