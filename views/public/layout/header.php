<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal de noticias - Mantente informado con las últimas noticias">
    <meta name="keywords" content="noticias, información, actualidad">
    <meta name="author" content="Portal de Noticias">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Portal de Noticias">
    <meta property="og:description" content="Mantente informado con las últimas noticias">
    <meta property="og:image" content="/assets/images/logo-og.jpg">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Portal de Noticias">
    <meta name="twitter:description" content="Mantente informado con las últimas noticias">
    
    <title><?= isset($page_title) ? $page_title . ' - ' : '' ?>Portal de Noticias</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <?= isset($additional_css) ? $additional_css : '' ?>
</head>
<body>
