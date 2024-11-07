<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head> 
<body>

<div class="absolute top-5 left-5">
  <a href="/dashboard/editor">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-900 dark:text-black">
      <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
  </a>
</div>

<form class="max-w-sm mx-auto mt-20" action="/dashboard/editor/update/<?= $id_editor; ?>" method="POST">


  <h1 class="text-2xl font-medium text-gray-900 dark:text-white">Edit Editor</h1>
  <!-- <div class="my-5">
    <label for="id_editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID Editor</label>
    <input type="text" id="id_editor" name="id_editor" value="<?= $id_editor; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required disabled />
  </div> -->
  <div class="mb-5">
    <label for="nama_editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Editor</label>
    <input type="text" id="nama_editor" name="nama_editor" value="<?= $nama_editor; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
  </div>
 
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
</form>

</body>
</html>