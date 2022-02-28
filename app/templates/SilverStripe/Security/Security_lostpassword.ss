<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>$SiteConfig.Title | Forgot password | devart admin interface</title>

  <link rel="icon" type="image/png" href="$ResourceFolder/images/favicon.png" />

</head>

<body>
  <div class="min-h-screen bg-white flex">
    <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
      <div class="mx-auto w-full max-w-sm lg:w-96">
        <div>
          <img class="h-14 w-auto" src="https://www.devart.nz/images/logo_devart.png" alt="Workflow">
          <h2 class="text-2xl  text-gray-700">
            Forgot password
          </h2>
        </div>

        <div class="mt-8">
          <% if not $Form %>

            <div class="text-2xl text-devart-orange">A password reset link has been sent, provided an account exists for your email address. <br><br>Please check your inbox.</div>
          
          <% else %>

            <div>
              <div class="mt-6 relative">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                  <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                  <span class="px-2 bg-white text-gray-500">
                    Please provide
                  </span>
                </div>
              </div>
            </div>


            <% with $Form %>
            
            

            <div class="mt-6">
              <form $AttributesHTML class="space-y-6">
                <div>
                  <label for="email" class="block text-sm font-medium text-gray-700">
                    Email address
                  </label>
                  <div class="mt-1">
                    <input $Fields.fieldByName("Email").addExtraClass("text-gray-700 appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-devart-teal focus:border-devart-teal sm:text-sm").AttributesHTML />
                  </div>
                </div>

                <div class="hidden">
                  <input $Fields.fieldByName("SecurityID").AttributesHTML>
                </div>

                <div>
                  <button name="action_forgotPassword" id="LostPasswordForm_lostPasswordForm_action_forgotPassword" type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-devart-teal hover:bg-devart-orange focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-devart-orange">
                    Send me the reset link
                  </button>
                </div>
              </form>
            </div>


            <% end_with %>

          <% end_if %>







        </div>
      </div>
    </div>
    <div class="hidden lg:block relative w-0 flex-1">
      <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1522794338816-ee3a17a00ae8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1567&q=80">
    </div>
  </div>

</body>

</html>