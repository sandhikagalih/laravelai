<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Healthy Food Checker</title>
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

  @vite('resources/css/app.css')
</head>

<body class="bg-white">
  <div class="max-w-screen-md px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
    <form action="/img" method="post" enctype="multipart/form-data">
      @csrf
      <div class="relative border-2 border-gray-300 border-dashed rounded-lg p-6" id="dropzone">
        <input type="file" class="absolute inset-0 w-full h-full opacity-0 z-50" id="file-upload"
          name="file-upload" />
        <div class="text-center">
          <img class="mx-auto h-12 w-12" src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="">

          <h3 class="mt-2 text-sm font-medium text-gray-900">
            <label for="file-upload" class="relative cursor-pointer">
              <span>Click</span>
              {{-- <span class="text-indigo-600"> or browse</span> --}}
              <span>to upload</span>
              {{-- <input id="file-upload" name="file-upload" type="file" class="sr-only"> --}}
            </label>
          </h3>
          <p class="mt-1 text-xs text-gray-500">
            PNG, JPG, GIF up to 10MB
          </p>
        </div>
        <img src="{{ isset($img) ? asset('storage/' . $img) : '' }}" class="mt-4 mx-auto max-h-40" id="preview">
      </div>
      <div class="flex flex-col my-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
        <button type="submit"
          class="inline-flex justify-center items-center py-3 px-5 text-2xl font-medium text-center text-dark rounded-lg bg-primary-100 hover:bg-primary-200 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
          Describe!
        </button>
      </div>
    </form>
    <p class="text-3xl">{!! isset($result) ? $result : '' !!}</p>
  </div>




  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

  <script>
    var dropzone = document.getElementById('dropzone');

    dropzone.addEventListener('dragover', e => {
      e.preventDefault();
      dropzone.classList.add('border-indigo-600');
    });

    dropzone.addEventListener('dragleave', e => {
      e.preventDefault();
      dropzone.classList.remove('border-indigo-600');
    });

    dropzone.addEventListener('drop', e => {
      e.preventDefault();
      dropzone.classList.remove('border-indigo-600');
      var file = e.dataTransfer.files[0];
      displayPreview(file);
    });

    var input = document.getElementById('file-upload');

    input.onchange = e => {
      var file = e.target.files[0];
      displayPreview(file);
    };

    function displayPreview(file) {
      var reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = () => {
        var preview = document.getElementById('preview');
        preview.src = reader.result;
        preview.classList.remove('hidden');
      };
    }
  </script>

</body>

</html>
