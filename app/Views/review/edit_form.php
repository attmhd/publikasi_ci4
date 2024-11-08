<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Review</title>
</head> 
<body>

<div class="absolute top-5 left-5">
  <a href="/dashboard/review">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-900 dark:text-black">
    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
  </svg>
  </a>
</div>

<form class="max-w-sm mx-auto mt-20" action="/dashboard/review/update/<?= $review['id_review']; ?>" method="POST" onsubmit="setHiddenValues()">

  <h1 class="text-2xl font-medium text-gray-900 dark:text-black">Edit Review</h1>

  <div class="mb-5">
  <label for="id_submit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select ID Submit</label>
  <select id="id_submit" name="id_submit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected disabled ><?= $review['id_submit'] ?></option>
    <?php foreach ($submit as $submit): ?>
    <option value="<?= $submit['id_submit']; ?>"><?= $submit['id_submit']; ?></option>
    <?php endforeach; ?>
  </select>
  </div>
  
  <div class="mb-5">
  <label for="id_editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select ID Editor</label>
  <select id="id_editor" name="id_editor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected disabled ><?= $review['id_editor'] ?></option>
    <?php foreach ($editor as $editor): ?>
    <option value="<?= $editor['id_editor']; ?>"><?= $editor['id_editor']; ?> - <?= $editor['nama_editor']; ?></option>
    <?php endforeach; ?>
  </select>
  </div>


  <div class="mb-5">
  <label for="id_reviewer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select ID Reviewer</label>
  <select id="id_reviewer" name="id_reviewer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected disabled ><?= $review['id_reviewer'] ?></option>
    <?php foreach ($reviewer as $reviewer): ?>
    <option value="<?= $reviewer['id_reviewer']; ?>"><?= $reviewer['id_reviewer']; ?> - <?= $reviewer['nama_reviewer']; ?></option>
    <?php endforeach; ?>
  </select>
  </div>

  <div class="relative max-w-sm my-5">
  <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
    </svg>
  </div>
  <input datepicker datepicker-format="yyyy-mm-dd" id="tgl_penugasan_reviewer" name="tgl_penugasan_reviewer" for="tgl_penugasan_reviewer" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" value="<?= $review['tgl_penugasan_reviewer']; ?>">
</div>


  
  <div class="mb-5">
  <label for="id_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Select ID Status</label>
  <select id="id_status" name="id_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected disabled ><?= $review['id_status'] ?></option>
    <?php foreach ($status as $status): ?>
    <option value="<?= $status['id_status']; ?>"><?= $status['id_status']; ?> - <?= $status['nama_status']; ?></option>
    <?php endforeach; ?>
  </select>
  </div>

  <!-- Hidden input to ensure id_author is always sent -->
  <input type="hidden" id="hidden_id_submit" name="id_submit" value="<?= $review['id_submit'] ?>">
  <input type="hidden" id="hidden_id_editor" name="id_editor" value="<?= $review['id_editor'] ?>">
  <input type="hidden" id="hidden_id_reviewer" name="id_reviewer" value="<?= $review['id_reviewer'] ?>">
  <input type="hidden" id="hidden_tgl_penugasan_reviewer" name="tgl_penugasan_reviewer" value="<?= $review['tgl_penugasan_reviewer'] ?>">
  <input type="hidden" id="hidden_id_status" name="id_status" value="<?= $review['id_status'] ?>">  


  <button type="submit" id="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>

</form>

<script>
  function setHiddenValues() {
    const idSubmit = document.getElementById('id_submit').value;
    const idEditor = document.getElementById('id_editor').value;
    const idReviewer = document.getElementById('id_reviewer').value;
    const tglPenugasanReviewer = document.getElementById('tgl_penugasan_reviewer').value;
    const idStatus = document.getElementById('id_status').value;

    if (idSubmit) {
      document.getElementById('hidden_id_submit').value = idSubmit;
    }
    if (idEditor) {
      document.getElementById('hidden_id_editor').value = idEditor;
    }
    if (idReviewer) {
      document.getElementById('hidden_id_reviewer').value = idReviewer;
    }
    if (tglPenugasanReviewer) {
      document.getElementById('hidden_tgl_penugasan_reviewer').value = tglPenugasanReviewer;
    }
    if (idStatus) {
      document.getElementById('hidden_id_status').value = idStatus;
    }
  }
</script>

</body>
</html>