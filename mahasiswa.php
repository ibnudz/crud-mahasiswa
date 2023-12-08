<?php
require_once("include/session.php");
require_once("koneksi.php");

?>
<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <?php include("include/head.php"); ?>
    <!-- ========== Title ========== -->
    <title>Mahasiswa</title>
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
                                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Data Mahasiswa</h1>
                            </div>
                            <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                                <button type="button" data-modal-target="add-user-modal" data-modal-toggle="add-user-modal" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                    </svg>
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
                                                    Foto
                                                </th>
                                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    NIM
                                                </th>
                                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Nama Lengkap
                                                </th>
                                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Jenis Kelamin
                                                </th>
                                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Semester
                                                </th>
                                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Program Studi
                                                </th>
                                                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                            <?php
                                            $no = 1;
                                            $query = "SELECT *, prodi.nama_prodi, mahasiswa.id, mahasiswa.semester FROM mahasiswa
                                                        JOIN biodata ON mahasiswa.id_biodata = biodata.id
                                                        JOIN prodi ON mahasiswa.id_prodi = prodi.id";
                                            $query = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($query)) :
                                            ?>
                                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $no++; ?></td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <?php if (!empty($row['foto'])) : ?>
                                                            <img src="<?= $row['foto']; ?>" alt="Foto Profil" class="w-10 h-10 object-cover rounded-full">
                                                        <?php else : ?>
                                                            <p>Foto tidak tersedia</p>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['nim']; ?></td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['nama_lengkap']; ?></td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['jenis_kelamin']; ?></td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['semester']; ?></td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['nama_prodi']; ?></td>
                                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <button type="button" data-modal-target="edit-user-modal<?= $no ?>" data-modal-toggle="edit-user-modal<?= $no ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Edit user
                                                        </button>
                                                        <button type="button" data-modal-target="delete-user-modal<?= $no ?>" data-modal-toggle="delete-user-modal<?= $no ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Delete user
                                                        </button>
                                                    </td>
                                                </tr>

                                                <!-- Start Delete User Modal -->
                                                <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="delete-user-modal<?= $no ?>">
                                                    <div class="relative w-full h-full max-w-md px-4 md:h-auto">
                                                        <!-- Modal content -->
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                                            <!-- Modal header -->
                                                            <div class="flex justify-end p-2">
                                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-hide="delete-user-modal<?= $no ?>">
                                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <form action="mahasiswa_crud.php" method="POST">
                                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                                <div class="p-6 pt-0 text-center">
                                                                    <svg class="w-16 h-16 mx-auto text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                                    </svg>
                                                                    <h3 class="mt-5 mb-6 text-lg text-gray-500 dark:text-gray-400">Are you sure you want to delete this user?
                                                                        <span class="text-lg text-red-700"><?= $row['nama_lengkap'] ?></span>
                                                                    </h3>
                                                                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-800" name="hapus">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                    <button type="button" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700" data-modal-hide="delete-user-modal<?= $no ?>">
                                                                        No, cancel
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Start Delete User Modal -->

                                                <!-- Edit User Modal -->
                                                <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="edit-user-modal<?= $no ?>">
                                                    <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
                                                        <!-- Modal content -->
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                                            <!-- Modal header -->
                                                            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                                                                <h3 class="text-xl font-semibold dark:text-white">
                                                                    Edit user
                                                                </h3>
                                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="edit-user-modal<?= $no ?>">
                                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="p-6 space-y-6">
                                                                <form action="mahasiswa_crud.php" method="POST">
                                                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                                    <div class="grid grid-cols-6 gap-2">
                                                                        <div class="col-span-6 sm:col-span-3">
                                                                            <label for="nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                                                                            <input type="text" name="nim" id="nim" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= $row['nim'] ?>" disabled>
                                                                        </div>
                                                                        <div class="col-span-6 sm:col-span-3">
                                                                            <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                                                                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= $row['nama_lengkap'] ?>" required>
                                                                        </div>
                                                                        <div class="col-span-6 sm:col-span-3">
                                                                            <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                                                                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= $row['tempat_lahir'] ?>" required>
                                                                        </div>
                                                                        <div class="col-span-6 sm:col-span-3">
                                                                            <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                                                                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= $row['tanggal_lahir'] ?>" required>
                                                                        </div>
                                                                        <div class="col-span-6 sm:col-span-3">
                                                                            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                                                                            <select id="jenis_kelamin" name="jenis_kelamin" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                                <option value="<?= $row['jenis_kelamin'] ?>"><?= $row['jenis_kelamin'] ?></option>
                                                                                <option value="Laki-laki">Laki-laki</option>
                                                                                <option value="Perempuan">Perempuan</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-span-6 sm:col-span-3">
                                                                            <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                                                            <select id="agama" name="agama" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                                <option value="<?= $row['agama'] ?>"><?= $row['agama'] ?></option>
                                                                                <option value="Islam">Islam</option>
                                                                                <option value="Kristen">Kristen</option>
                                                                                <option value="Katolik">Katolik</option>
                                                                                <option value="Hindu">Hindu</option>
                                                                                <option value="Buddha">Buddha</option>
                                                                                <option value="Konghucu">Konghucu</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-span-6 sm:col-span-3">
                                                                            <label for="no_telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Telepon</label>
                                                                            <input type="text" name="no_telepon" id="no_telepon" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= $row['no_telepon'] ?>" required>
                                                                        </div>
                                                                        <div class="col-span-6 sm:col-span-3">
                                                                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                                                            <textarea name="alamat" id="alamat" rows="1" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"><?= $row['alamat'] ?></textarea>
                                                                        </div>
                                                                        <div class="col-span-6 sm:col-span-3">
                                                                            <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program Studi</label>
                                                                            <select id="prodi" name="prodi" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
                                                            </div>
                                                            <!-- Modal footer -->
                                                            <div class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700">
                                                                <button name="update" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Save all</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Start Add User Modal -->
                    <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="add-user-modal">
                        <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                                    <h3 class="text-xl font-semibold dark:text-white">
                                        Add new user
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="add-user-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 space-y-6">
                                    <form action="mahasiswa_crud.php" method="POST" enctype="multipart/form-data">
                                        <div class="grid grid-cols-6 gap-2">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                                                <input type="text" name="nim" id="nim" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NIM" required>
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap" required>
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required>
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                                                <select id="jenis_kelamin" name="jenis_kelamin" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                                <select id="agama" name="agama" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Buddha">Buddha</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                </select>
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="no_telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Telepon</label>
                                                <input type="text" name="no_telepon" id="no_telepon" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="08215678876" required>
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto</label>
                                                <input type="file" name="foto" id="foto" class="" accept="image/*" required>
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program Studi</label>
                                                <select id="prodi" name="prodi" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
                                            <div class="col-span-6">
                                                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                                <textarea name="alamat" id="alamat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="alamat"></textarea>
                                            </div>
                                        </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700">
                                    <button name="tambah" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Add user</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Add User Modal -->

                </div>
            </main>

            <?php include("include/footer.php"); ?>
        </div>
    </div>

    <?php include("include/script.php"); ?>
</body>

</html>