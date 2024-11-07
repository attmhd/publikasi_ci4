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

<form class="max-w-sm mx-auto mt-20" action="/dashboard/detailartikel/update/<?= $detail_artikel['id']; ?>" method="POST" onsubmit="setHiddenValues()">

  <h1 class="text-2xl font-medium text-gray-900 dark:text-white">Edit Detail Artikel</h1>

  <div class="mb-5">
  <label for="id_artikel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select ID Artikel</label>
  <select id="id_artikel" name="id_artikel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected disabled ><?= $detail_artikel['id_artikel'] ?></option>
    <?php foreach ($artikel as $artikel): ?>
    <option value="<?= $artikel['id_artikel']; ?>"><?= $artikel['id_artikel']; ?> - <?= $artikel['judul_artikel']; ?></option>
    <?php endforeach; ?>
  </select>
  </div>
  
  <div class="mb-5">
  <label for="id_author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select ID Author</label>
  <select id="id_author" name="id_author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected disabled ><?= $detail_artikel['id_author'] ?></option>
    <?php foreach ($author as $author): ?>
    <option value="<?= $author['id_author']; ?>"><?= $author['id_author']; ?> - <?= $author['nama_author']; ?></option>
    <?php endforeach; ?>
  </select>
  </div>

  <div class="mb-5">
  <label for="penulis_ke" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis Ke</label>
  <select id="penulis_ke" name="penulis_ke" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected disabled ><?= $detail_artikel['penulis_ke'] ?> </option>
    <?php for ($i = 1; $i <= 10; $i++): ?>
    <option value="<?= $i; ?>"><?= $i; ?></option>
    <?php endfor; ?>
  </select>
  </div>

  <!-- Hidden input to ensure id_author is always sent -->
  <input type="hidden" id="hidden_id_artikel" name="id_artikel" value="<?= $detail_artikel['id_artikel'] ?>">  
  <input type="hidden" id="hidden_id_author" name="id_author" value="<?= $detail_artikel['id_author'] ?>">
  <input type="hidden" id="hidden_penulis_ke" name="penulis_ke" value="<?= $detail_artikel['penulis_ke'] ?>">


  <button type="submit" id="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>

</form>

<script>
  function setHiddenValues() {
    const idArtikel = document.getElementById('id_artikel').value;
    const idAuthor = document.getElementById('id_author').value;
    const penulisKe = document.getElementById('penulis_ke').value;

    if (idArtikel) {
      document.getElementById('hidden_id_artikel').value = idArtikel;
    }
    if (idAuthor) {
      document.getElementById('hidden_id_author').value = idAuthor;
    }
    if (penulisKe) {
      document.getElementById('hidden_penulis_ke').value = penulisKe;
    }
  }
</script>

</body>
</html>