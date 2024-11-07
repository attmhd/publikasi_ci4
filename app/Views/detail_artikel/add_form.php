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
  <a href="/dashboard/detailartikel">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-900 dark:text-black">
      <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
  </a>
</div>

<form class="max-w-sm mx-auto mt-20" action="create" method="POST">
  <h1 class="text-2xl font-medium text-gray-900 dark:text-white">Add Detail Artikel</h1>
  
  <div class="my-5">
    <label for="id_artikel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select ID Artikel</label>
    <select id="id_artikel" name="id_artikel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option selected disabled>Choose a id artikel</option>
      <?php foreach ($artikel as $artikel): ?>
        <option value="<?= $artikel['id_artikel']; ?>"><?= $artikel['id_artikel']; ?> - <?= $artikel['judul_artikel']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  
  <div class="mb-5">
    <label for="id_author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select ID Author</label>
    <select id="id_author" name="id_author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option selected disabled>Choose a id author</option>
      <?php foreach ($author as $author): ?>
        <option value="<?= $author['id_author']; ?>"><?= $author['id_author']; ?> - <?= $author['nama_author']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-5">
    <label for="penulis_ke" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis Ke</label>
    <select id="penulis_ke" name="penulis_ke" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option selected disabled>Choose a penulis ke</option>
      <?php for ($i = 1; $i <= 10; $i++): ?>
        <option value="<?= $i; ?>"><?= $i; ?></option>
      <?php endfor; ?>
    </select>
  </div>
  
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>

  <!-- <script>
    function logFormData(event) {
      event.preventDefault();
      const form = event.target.closest('form');
      const formData = new FormData(form);
      const data = {};
      formData.forEach((value, key) => {
        data[key] = value;
      });
      console.log(data);
      // Optionally, you can submit the form after logging the data
      // form.submit();
    }
  </script> -->
</form>

</body>
</html>