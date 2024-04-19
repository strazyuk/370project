<!DOCTYPE html>
<html data-theme="light" lang="en" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <!-- design plugs -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              <!--changed-->
              yellowPrimary: 'rgb(253 224 71)',
              redSecondary: 'rgb(220 38 38)',
              greenSecondary: 'rgb(34 197 94)',
            }
          }
        }
      }
    </script>
</head>
<body style="background-image: url(../ICON/login_singup_bg.jpeg); background-size: cover; background-position: center;">
  <section class="h-screen justify-center items-center flex mx-[15rem] -z-50">
    <div class="grid grid-cols-5 z-50 w-full h-[45rem] rounded-xl shadow-2xl border border-solid border-black">
    <div class="justify-center items-center flex bg-[#ffffff1e] backdrop-blur-[10px] col-span-3">
      <img src="../ICON/logo.png" alt="">
    </div>
    <div class="bg-yellowPrimary justify-start items-center flex px-10 border border-solid border-black col-span-2">
      <div class="flex flex-col">
      <h1 class="text-4xl font-bold mb-6">Sign Up</h1>
      <?php
        // PHP block to handle form submission
        require_once('handleSignup.php');

        // Check if account already exists message
        if (isset($account_exists_message)) {
            echo '<p style="color: red;">' . $account_exists_message . '</p>';
        }
      ?>
      <form action="handleSignup.php" method="post">
        <div>
        <select class="select w-full max-w-80 my-2" name="role" required>
                    <option disabled selected class="uppercase">Pick your Role</option>
                    <option class="uppercase">admin</option>
                    <option class="uppercase">student</option>
                </select>
                <input class="px-6 py-2 rounded-md border border-solid w-80 mb-3" type="text" name="username" placeholder="Enter your username......" required>
                <input class="px-6 py-2 rounded-md border border-solid w-80 mb-3" type="email" name="email" placeholder="Enter your email......" required>
                <input class="px-6 py-2 rounded-md border border-solid w-80 mb-3" type="password" name="password" placeholder="Enter your userpassword......" required>
              </div>
              <input type="submit" value="Sign up" class="px-6 py-2 bg-greenSecondary font-bold uppercase rounded-md text-white cursor-pointer transition duration-300 ease-in">
            </form>
          </div>
        </div>
      </div>
    </section>
</body>
</html>
