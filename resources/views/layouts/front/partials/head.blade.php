<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="@yield('page_metadescription', config('app.name'))">
  <meta name="author" content="LaChris79">

  <!--<meta name="title" content="@yield('page_title', config('settings.site_title'))">-->

  <!-- Facebook Open Graph-->
  <meta property="og:type" content="@yield('og_type', 'website' )">
  <meta property="og:title" content="@yield('og_title', config('settings.site_name') )"/>
  <meta property="og:description" content="@yield('og_description', 'test og_description 1')"/>
  <meta property="og:url" content="@yield('og_url',  url('/'))" />
  <meta property="og:image" content="@yield('og_image', asset('storage/'.config('settings.site_logo')))">
  <meta property="og:image:width" content="800" />
  <meta property="og:image:height" content="400" />
  
  <!-- Title Page-->
  <title>@yield('page_title', config('settings.site_title'))</title>


