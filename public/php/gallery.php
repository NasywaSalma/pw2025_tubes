 <?php
        require 'function.php';
        $cars = query("SELECT * FROM cars");
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', Arial, sans-serif;
    }
    .navbar {
      box-shadow: 0 2px 8px rgba(0,0,0,0.04);
      background: #fff;
    }
    .gallery-container {
      padding: 50px 0 30px 0;
    }
    .card {
      border: none;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 4px 16px rgba(60,72,88,0.09);
      transition: transform 0.2s, box-shadow 0.2s;
      background: #fff;
    }
    .card:hover {
      transform: translateY(-8px) scale(1.04);
      box-shadow: 0 8px 32px rgba(60,72,88,0.16);
    }
    .card-img-top {
      height: 210px;
      object-fit: cover;
      border-bottom: 1px solid #f0f0f0;
    }
    .card-title {
      font-weight: 600;
      color: #3b3b5c;
    }
    .card-text {
      color: #6c757d;
      font-size: 0.97rem;
    }
    .card-footer {
      background: none;
      border: none;
      text-align: right;
    }

    .card-footer .stars{
      font-size: 1.7rem;
      color: yellow;
      text-align: left;
    }
    .btn-view {
      background: linear-gradient(90deg, #6366f1 0%, #60a5fa 100%);
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 6px 18px;
      font-weight: 500;
      transition: background 0.2s;
    }
    .btn-view:hover {
      background: linear-gradient(90deg, #60a5fa 0%, #6366f1 100%);
      color: #fff;
    }
    .search-bar {
      max-width: 320px;
    }
    .gallery-title {
      font-size: 2.3rem;
      font-weight: 700;
      color: #6366f1;
      letter-spacing: 1px;
      margin-bottom: 18px;
      text-align: center;
    }
    @media (max-width: 576px) {
      .card-img-top {
        height: 140px;
      }
      .gallery-title {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold text-primary" href="#"><i class="fa-solid fa-image"></i> Gallery</a>
    <form class="d-flex ms-auto search-bar" role="search">
      <input class="form-control me-2" type="search" placeholder="Search images..." aria-label="Search"/>
      <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.querySelector('.search-bar input[type="search"]');
  const cards = document.querySelectorAll('.gallery-container .card');

  searchInput.addEventListener('input', function() {
    const query = this.value.toLowerCase();
    cards.forEach(card => {
      const title = card.querySelector('.card-title').textContent.toLowerCase();
      const desc = card.querySelector('.card-text').textContent.toLowerCase();
      if (title.includes(query) || desc.includes(query)) {
        card.parentElement.style.display = '';
      } else {
        card.parentElement.style.display = 'none';
      }
    });
  });

  // Prevent form submit to avoid page reload
  document.querySelector('.search-bar').addEventListener('submit', function(e) {
    e.preventDefault();
  });
});
</script>


<div class="container gallery-container">
  <div class="gallery-title">Explore Beautiful Moments</div>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
    <?php
    foreach ($cars as $mhs): ?>
    <div class="col">
      <div class="card h-100">
        <img src="../../img/<?= ($mhs['img']); ?>" class="card-img-top" alt="<?= htmlspecialchars($img['title']) ?>">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($mhs['name']) ?></h5>
          <p class="card-text">$<?= htmlspecialchars($mhs['price']) ?></p>
        </div>
        <div class="card-footer">
          <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
          <a href="<?= htmlspecialchars($img['src']) ?>" class="btn btn-view" target="_blank">
            <i class="fa fa-eye"></i> Read More
          </a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
</body>
</html>