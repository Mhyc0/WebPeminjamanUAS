<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark mb-4 shadow-sm">
  <div class="container">
    <a class="navbar-brand font-weight-bold" href="<?= BASEURL; ?>/dashboard">
        🏦 TabunganKu
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link text-white mr-3" href="<?= BASEURL; ?>/profil">
                Halo, <b><?= $data['nama_user']; ?></b> <small>(Edit Profil)</small>
            </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-warning btn-sm mt-1 text-dark font-weight-bold" href="<?= BASEURL; ?>/auth/logout">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">