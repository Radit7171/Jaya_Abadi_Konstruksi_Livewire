<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- PRIMARY META TAGS --}}
    <title>@yield('title', $title ?? 'Jaya Abadi Konstruksi - Spesialis Konstruksi Besi & Baja Profesional')</title>
    <meta name="title" content="@yield('title', $title ?? 'Jaya Abadi Konstruksi - Spesialis Konstruksi Besi & Baja Profesional')">
    <meta name="description" content="@yield('description', 'Jaya Abadi Konstruksi (JAK) - Kontraktor profesional ahli dalam konstruksi besi, baja, sipil, dan renovasi di Indonesia dengan standar kualitas tinggi.')">
    <meta name="keywords" content="konstruksi besi, jasa las, konstruksi baja, kontraktor bangunan, renovasi rumah, jaya abadi konstruksi, pembangunan gedung, jak, depok, jakarta">
    <meta name="author" content="Jaya Abadi Konstruksi">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- FAVICONS --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo-jaya-abadi-konstruksi.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/logo-jaya-abadi-konstruksi.png') }}">

    {{-- OPEN GRAPH / FACEBOOK --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', $title ?? 'Jaya Abadi Konstruksi - Spesialis Konstruksi Besi & Baja Profesional')">
    <meta property="og:description" content="@yield('description', 'Jaya Abadi Konstruksi (JAK) - Kontraktor profesional ahli dalam konstruksi besi, baja, sipil, dan renovasi dengan standar kualitas tinggi.')">
    <meta property="og:image" content="{{ asset('images/logo-jaya-abadi-konstruksi.png') }}">

    {{-- TWITTER --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', $title ?? 'Jaya Abadi Konstruksi - Spesialis Konstruksi Besi & Baja Profesional')">
    <meta property="twitter:description" content="@yield('description', 'Jaya Abadi Konstruksi (JAK) - Kontraktor profesional ahli dalam konstruksi besi, baja, sipil, dan renovasi dengan standar kualitas tinggi.')">
    <meta property="twitter:image" content="{{ asset('images/logo-jaya-abadi-konstruksi.png') }}">

    {{-- JSON-LD STRUCTURED DATA --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "LocalBusiness",
      "name": "Jaya Abadi Konstruksi",
      "image": "{{ asset('images/logo-jaya-abadi-konstruksi.png') }}",
      "@@id": "{{ url('/') }}",
      "url": "{{ url('/') }}",
      "telephone": "+6287817695973",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "Jl. Raya Tapos No.72 1, Cimpaeun",
        "addressLocality": "Depok",
        "postalCode": "16459",
        "addressCountry": "ID"
      },
      "geo": {
        "@@type": "GeoCoordinates",
        "latitude": -6.443315,
        "longitude": 106.87467
      },
      "openingHoursSpecification": {
        "@@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
          "Sunday"
        ],
        "opens": "08:00",
        "closes": "17:00"
      },
      "sameAs": [
        "https://www.facebook.com/jayaabadi",
        "https://www.instagram.com/jayaabadi"
      ]
    }
    </script>

    <!-- Google Fonts - Modern Typography System -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=Fira+Code:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Pro Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body class="bg-body text-body d-flex flex-column min-vh-100">

    <!-- ✅ LOADING OVERLAY -->
    <div wire:loading.flex wire:target="navigate"
        class="position-fixed top-0 start-0 w-100 h-100 bg-white bg-opacity-75
            align-items-center justify-content-center z-1050">
        <div class="spinner-border text-primary"></div>
    </div>

    <!-- Header -->
    <header>
        @include('components.navbar')
    </header>

    <!-- Main Content -->
    <main class="flex-fill page-transition">
        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('components.footer')

    @livewireScripts

</body>

</html>
