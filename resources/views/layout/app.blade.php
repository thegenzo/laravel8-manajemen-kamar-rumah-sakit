<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Rawat Inap RSUD Baubau</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    @include('include.style')

    @stack('addon-style')
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                @include('include.header')
                @include('include.navbar')
                
            </header>

            <div class="content-wrapper container">
                @yield('content')
                
            </div>

            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy; Universitas Dayanu Ikhsanuddin</p>
                        </div>
                        <div class="float-end">
                            
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('sweetalert::alert')
    @include('include.script')
    
    @stack('addon-script')
</body>

</html>
