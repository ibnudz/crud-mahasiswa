<?php

require_once("koneksi.php");

?>
<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <?php include("include/head.php"); ?>
    <!-- ========== Title ========== -->
    <title>Matakuliah</title>
</head>

<body class="dark:bg-gray-900 antialiased">
    <?php include("include/navbar.php"); ?>

    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        <?php include("include/sidebar.php"); ?>

        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main>
                <div class="px-4 pt-6">
                    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
                        <div class="w-full mb-1">
                            <div class="mb-4">
                                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Data Mata Kuliah</h1>
                            </div>
                            <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
                                <button id="createProductButton" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-create-data-default" data-drawer-show="drawer-create-data-default" aria-controls="drawer-create-data-default" data-drawer-placement="right">
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden shadow">
                                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                        <thead class="bg-gray-100 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    NO
                                                </th>
                                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Kode Matakuliah
                                                </th>
                                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Prodi
                                                </th>
                                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Mata Kuliah
                                                </th>
                                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Semester
                                                </th>
                                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Sks
                                                </th>
                                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                            <?php
                                            $no = 1;
                                            $query = "SELECT  matakuliah.id, matakuliah.kd_matakuliah, matakuliah.nama_matakuliah, matakuliah.id_prodi, 
                                                        matakuliah.semester, matakuliah.sks, prodi.id, prodi.nama_prodi FROM matakuliah
                                                        LEFT JOIN prodi ON matakuliah.id_prodi = prodi.id";
                                            $query = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($query)) :
                                            ?>
                                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $no++; ?></td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['kd_matakuliah']; ?></td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['nama_prodi']; ?></td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['nama_matakuliah']; ?></td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['semester']; ?></td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['sks']; ?></td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <button type="button" id="updatedataButton" data-drawer-target="drawer-update-data-default<?= $no ?>" data-drawer-show="drawer-update-data-default<?= $no ?>" aria-controls="drawer-update-data-default<?= $no ?>" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                                            </svg>Update</button>
                                                        <button type="button" id="deletedataButton" data-drawer-target="drawer-delete-data-default<?= $no ?>" data-drawer-show="drawer-delete-data-default<?= $no ?>" aria-controls="drawer-delete-data-default<?= $no ?>" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900"><svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                            </svg>Delete</button>
                                                    </td>
                                                </tr>

                                                <!-- Start Delete Data -->
                                                <div id="drawer-delete-data-default<?= $no ?>" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                                                    <h5 id="drawer-label" class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Delete item</h5>
                                                    <button type="button" data-drawer-dismiss="drawer-delete-data-default<?= $no ?>" aria-controls="drawer-delete-data-default<?= $no ?>" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close menu</span>
                                                    </button>
                                                    <form action="matakuliah_crud.php" method="POST">
                                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                        <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">Are you sure you want to delete this data?<br>
                                                            <span class="text-lg text-red-700"><?= $row['nama_matakuliah'] ?></span>
                                                        </h3>
                                                        <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900" name="hapus">
                                                            Yes, I'm sure
                                                        </button>
                                                        <button type="button" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700" data-drawer-hide="drawer-delete-data-default<?= $no ?>">
                                                            No, cancel
                                                        </button>
                                                    </form>
                                                </div>
                                                <!-- End Delete Data -->

                                                <!-- Start Edit Data -->
                                                <div id="drawer-update-data-default<?= $no ?>" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                                                    <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Update data</h5>
                                                    <button type="button" data-drawer-dismiss="drawer-update-data-default<?= $no ?>" aria-controls="drawer-update-data-default<?= $no ?>" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close menu</span>
                                                    </button>
                                                    <form action="matakuliah_crud.php" method="POST">
                                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                        <div class="space-y-4">
                                                            <div>
                                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Matakuliah</label>
                                                                <input type="text" name="kode_matakuliah" id="kode_matakuliah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= $row['kd_matakuliah'] ?>" required="">
                                                            </div>
                                                            <div>
                                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Matakuliah</label>
                                                                <input type="text" name="nama_matakuliah" id="nama_matakuliah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= $row['nama_matakuliah'] ?>" required="">
                                                            </div>
                                                            <div>
                                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                                                                <input type="number" name="semester" id="semester" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= $row['semester'] ?>" required="">
                                                            </div>
                                                            <div>
                                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKS</label>
                                                                <input type="number" name="sks" id="sks" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= $row['sks'] ?>" required="">
                                                            </div>
                                                            <div>
                                                                <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Prodi</label>
                                                                <select id="prodi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="prodi" required>
                                                                    <?php
                                                                    $query_prodi = "SELECT prodi.id, CONCAT(fakultas.nama_fakultas, ' - ', prodi.nama_prodi) as nama_prodi FROM prodi
                                                                                    LEFT JOIN fakultas ON fakultas.id = prodi.id_fakultas";
                                                                    $result = $conn->query($query_prodi);

                                                                    if ($result->num_rows > 0) {
                                                                        while ($row = $result->fetch_assoc()) : ?>
                                                                            <option value="<?= $row['id'] ?>"><?= $row['nama_prodi'] ?></option>
                                                                    <?php
                                                                        endwhile;
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="bottom-0 left-0 flex justify-center w-full pb-4 mt-4 space-x-4 sm:absolute sm:px-4 sm:mt-0">
                                                            <button type="submit" class="w-full justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="update">
                                                                Update
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- End Edit Data -->

                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Start Add Data -->
                    <div id="drawer-create-data-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Tambah Matakuliah</h5>
                        <button type="button" data-drawer-dismiss="drawer-create-data-default" aria-controls="drawer-create-data-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close menu</span>
                        </button>
                        <form action="matakuliah_crud.php" method="POST">
                            <div class="space-y-4">
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Matakuliah</label>
                                    <input type="text" name="kode_matakuliah" id="kode_matakuliah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Kode Matakuliah" required="">
                                </div>
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Matakuliah</label>
                                    <input type="text" name="nama_matakuliah" id="nama_matakuliah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Matakuliah" required="">
                                </div>
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                                    <input type="number" name="semester" id="semester" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                </div>
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKS</label>
                                    <input type="number" name="sks" id="sks" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                </div>
                                <div>
                                    <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Prodi</label>
                                    <select id="prodi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="prodi" required>
                                        <?php
                                        $query_prodi = "SELECT prodi.id, CONCAT(fakultas.nama_fakultas, ' - ', prodi.nama_prodi) as nama_prodi FROM prodi
                                                        LEFT JOIN fakultas ON fakultas.id = prodi.id_fakultas";
                                        $result = $conn->query($query_prodi);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) : ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['nama_prodi'] ?></option>
                                        <?php
                                            endwhile;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="bottom-0 left-0 flex justify-center w-full pb-4 space-x-4 md:px-4 md:absolute">
                                    <button type="submit" class="text-white w-full justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="tambah">
                                        Add
                                    </button>
                                    <button type="button" data-drawer-dismiss="drawer-create-data-default" aria-controls="drawer-create-data-default" class="inline-flex w-full justify-center text-gray-500 items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                        <svg aria-hidden="true" class="w-5 h-5 -ml-1 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Add Data -->

                </div>
            </main>

            <?php include("include/footer.php"); ?>
        </div>
    </div>

    <?php include("include/script.php"); ?>
</body>

</html>