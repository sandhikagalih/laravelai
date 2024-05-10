<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Joke</title>
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

  @vite('resources/css/app.css')
</head>

<body class="bg-white dark:bg-gray-900">
  <section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
      <figure class="max-w-screen-xl mx-auto">
        <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <path
            d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
            fill="currentColor" />
        </svg>
        <blockquote>
          <p class="text-6xl font-light text-gray-900 dark:text-white">{{ $joke }}</p>
        </blockquote>
      </figure>
      <div class="flex flex-col my-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
        <a href="/"
          class="inline-flex justify-center items-center py-3 px-5 text-2xl font-medium text-center text-dark rounded-lg bg-primary-100 hover:bg-primary-200 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
          Give me more
        </a>

      </div>
    </div>
  </section>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>
