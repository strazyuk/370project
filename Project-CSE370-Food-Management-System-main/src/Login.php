<!DOCTYPE html>
<html data-theme="light" lang="en" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- design plugs -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              yellowPrimary: 'rgb(253 224 71)',
              redSecondary: 'rgb(220 38 38)',
              greenSecondary: 'rgb(34 197 94)',
            }
          }
        }
      }
    </script>
</head>
<body style="background-image: url(../ICON/login_singup_bg.jpeg); background-size: cover; background-position: center; background-repeat: no-repeat;">
  <section class="h-screen justify-center items-center flex mx-[15rem] -z-50">
    <div class="grid grid-cols-5 z-50 w-full h-[45rem] rounded-xl shadow-2xl">
    <div class="justify-center items-center flex bg-[#ffffff1e] backdrop-blur-[10px] col-span-3 rounded-l-xl">
      <img src="../ICON/logo.png" alt="">
    </div>
    <div class="bg-yellowPrimary justify-start items-center flex px-10 col-span-2 rounded-r-xl">
      <div class="flex flex-col">
      <h1 class="text-4xl font-bold mb-6">Login</h1>
      <!-- Display error message if exists -->
      <?php if(isset($_GET['error']) && $_GET['error'] == 'invalid'): ?>
        <p style="color: red;">Incorrect email or password. Please try again.</p>
      <?php endif; ?>
      <form action="handleLogin.php" method="post">
        <div>
        <!-- <h1 class="text-2xl font-semibold mb-3">User Name</h1> -->
        <input class="px-6 py-2 rounded-md border border-solid w-80 mb-3" type="email" name="email" placeholder="Enter your email......" required>
        <!-- <h1 class="text-2xl font-semibold mb-3">Password</h1> -->
        <input class="px-6 py-2 rounded-md border border-solid w-80 mb-3" type="password" name="password" placeholder="Enter your password......" required>
        </div>
        <input type="submit" value="Login" class="px-6 py-2 bg-greenSecondary font-bold uppercase rounded-md text-white cursor-pointer transition duration-300 ease-in">
      </form>
      <div class="my-2">
        <h1>Don't have an account? <span class="text-redSecondary hover:text-blue-700 hover:underline"><a href="signup.php">Sign up now!</a></span></h1>
      </div>
      </div>
    </div>
    </div>
  </section>
</body>
