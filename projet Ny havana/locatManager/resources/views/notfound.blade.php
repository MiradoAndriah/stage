<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>404 - Page introuvable</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="text-center">
        <h1 class="display-1 fw-bold text-danger">404</h1>
        <h3 class="mb-3">Page introuvable</h3>
        <p class="text-muted mb-4">
            Désolé, la page que vous cherchez n’existe pas.
        </p>

        <a href="{{ route('hello') }}" class="btn btn-primary px-4 py-2">
            ⬅ Retour à l’accueil
        </a>
    </div>

</body>
</html>
