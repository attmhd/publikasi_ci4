
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Review</title>
</head>
<body>

<!-- show flash message -->
<?php if (session()->getFlashdata('message')) : ?>
   
   <div id="flash-message" class="fixed top-4 right-1/2 z-50 flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 shadow-lg" role="alert">
      <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
         <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div>
         <?= session()->getFlashdata('message') ?>
      </div>
   </div>
   <script>
      // Automatically hide the flash message after 5 seconds
      setTimeout(function() {
         document.getElementById('flash-message').style.display = 'none';
      }, 5000);
   </script>
<?php endif; ?>
    

<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<?php include APPPATH . 'Views/components/sidebar.php'; ?>



<div class="p-4 sm:ml-64">


   <div class="my-4 flex justify-end">

   <!-- add button -->
      <a href="/dashboard/review/add_form">
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
         </svg>
      </a>
   </div>


    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID Review
                </th>
                <th scope="col" class="px-6 py-3">
                    ID Submit
                </th>
                <th scope="col" class="px-6 py-3">
                    ID Editor
                </th>
                <th scope="col" class="px-6 py-3">
                    ID Reviewer
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Penugasan
                </th>
                <th scope="col" class="px-6 py-3">
                    ID Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                
            </tr>
        </thead>
        <tbody>

            <?php foreach ($review as $key => $data) : ?>
                <tr class="bg-white border-b dark:border-gray-700">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $data['id_review']; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $data['id_submit']; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $data['id_editor']; ?>
                    </td>
                    <!-- <td class="px-6 py-4 flex justify-between"> -->
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $data['id_reviewer']; ?>
                    </td>
                    <!-- <td class="px-6 py-4 flex justify-between"> -->
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $data['tgl_penugasan_reviewer']; ?>
                    </td>
                    <!-- <td class="px-6 py-4 flex justify-between"> -->
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?= $data['id_status']; ?>
                    </td>
                    <td class="px-6 py-4 flex justify-between">

                    <!-- edit -->
                        <a href="/dashboard/review/edit/<?= $data['id_review']; ?>" class="text-blue-500 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        </a>

                        <!-- delete -->
                        <a href="/dashboard/review/delete/<?= $data['id_review']; ?>" class="text-red-500 hover:text-red-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                        </a>
                    </td>
                </tr>

             
                
            
            <?php endforeach; ?>
        </tbody>
    </table>




   <div class="mt-4">
      <?= $pager->links('default', 'custom_paginate'); ?>
   </div>
  




    




</div>
            </div>
</body>
</html>