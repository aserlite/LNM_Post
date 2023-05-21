<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="images/nuitmmisite.png" href="images/nuitmmisite.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Nuit MMI</title>
    <link href="/css/normalize.css" rel="stylesheet">
    <link href="/css/public.css" rel="stylesheet">
    @section('css')

  @show
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

</head>

<body>
  <section class="content">
    @yield('content')
  </section>
  <section class="footer">
    <h1>La Nuit MMI</h1>
  </section>
</body>
</html>
