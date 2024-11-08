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
  <a href="/dashboard/arsipterbitan">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-900 dark:text-black">
    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
  </svg>
  </a>
</div>

<form class="max-w-sm mx-auto mt-20" action="/dashboard/arsipterbitan/update/<?= $data['id']; ?>" method="POST" onsubmit="setHiddenValues()">

  <h1 class="text-2xl font-medium text-gray-900 dark:text-white">Edit Arsip Terbitan</h1>

  <div class="mb-5">
  <label for="id_issue" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select ID Issue</label>
  <select id="id_issue" name="id_issue" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected disabled ><?= $data['id_issue'] ?></option>
    <?php foreach ($issue as $issue): ?>
    <option value="<?= $issue['id_issue']; ?>"><?= $issue['id_issue']; ?> - <?= $issue['nama_issue']; ?></option>
    <?php endforeach; ?>
  </select>
  </div>
  
  <div class="mb-5">
  <label for="id_artikel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select ID Artikel</label>
  <select id="id_artikel" name="id_artikel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected disabled ><?= $data['id_artikel'] ?></option>
    <?php foreach ($artikel as $artikel): ?>
    <option value="<?= $artikel['id_artikel']; ?>"><?= $artikel['id_artikel']; ?> - <?= $artikel['judul_artikel']; ?></option>
    <?php endforeach; ?>
  </select>
  </div>


  <!-- Hidden input to ensure id_author is always sent -->
  <input type="hidden" id="hidden_id_issue" name="id_issue" value="<?= $data['id_issue'] ?>">     
  <input type="hidden" id="hidden_id_artikel" name="id_artikel" value="<?= $data['id_artikel'] ?>">  


  <button type="submit" id="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>

</form>

<script>
  function setHiddenValues() {
    const idIssue = document.getElementById('id_issue').value;
    const idArtikel = document.getElementById('id_artikel').value;

    if (idArtikel) {
      document.getElementById('hidden_id_artikel').value = idArtikel;
    }
    if (idIssue) {
      document.getElementById('hidden_id_issue').value = idIssue;
    }
  }
</script>

</body>
</html>