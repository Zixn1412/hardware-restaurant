<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Signin Template · Bootstrap v5.3</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
      body {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background: linear-gradient(135deg, #71b2e6, #71b2e6);
        font-family: Arial, sans-serif;
      }

      .form-signin {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        max-width: 400px;
        width: 100%;
      }

      .form-signin img {
        border-radius: 50%;
      }

      h1 {
        font-size: 1.75rem;
        font-weight: 700;
      }

      .form-floating .form-control {
        border-radius: 5px;
        margin-bottom: 1rem;
      }

      .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.2s;
      }

      .btn-primary:hover {
        background-color: #00FF7F;
      }

      .form-check-label {
        font-size: 0.9rem;
      }
    </style>
</head>
<body>
    <main class="form-signin">
      <form action="ampage2.php" method="POST">

        <h1 class="h3 mb-3 fw-normal text-center">เข้าสู่ระบบร้านอาหาร</h1>

        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@emaile.com" name="email" required>
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
        <input type="password" name="ad_pass" id="ad_pass" maxlength="8" required="">
          <label for="floatingPassword">รหัสผ่าน</label>
        </div>

        <div class="form-check text-start my-3">
          <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Remember me
          </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
      </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<!-- เด้งไปหน้า fuangfa.delivery.php -->