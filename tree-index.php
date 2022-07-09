<?php foreach ($json["data"] as $modul) : ?>

    <tr class="bg-white border-b" data-filesection="<?= $modul['id']; ?>">
        <td class="px-2 py-3">
            <ul id="myUL">
                <li>
                    <span class="caret flex text-black font-semibold text-md p-2 items-center mr-2 mb-1" id="materi-1"><?= $modul["modul_name"]; ?>
                    </span>
                    <!--  Product Modal -->
                    <div id="authentication-modal<?= $modul["id"]; ?>">
                        <div class="relative">
                            <!-- Modal content -->
                        </div>
                    </div>


                    <ul class="nested">
                        <li>
                            <?php if (empty($modul["child"])) : ?>
                                <div class="bg-gray-100 shadow-sm p-2 rounded items-center ml-3 mt-2">Tidak ada SubModul</div>
                            <?php else : ?>
                                <?php foreach ($modul["child"] as $sub1) : ?>
                        <li>
                            <span class="caret flex bg-gray-100 shadow-sm p-2 rounded items-center ml-3 mt-2 mb-2">
                                <div class="flex-1">
                                    <a class="text-black text-md text-left font-semibold"><?= $sub1["modul_name"]; ?></a>
                                    <p class=" text-justify text-xs text-black p-1 "><?= $sub1["modul_desc"]; ?></p>
                                </div>
                                
                            </span>
                            <ul class="nested ml-3">
                                <?php if (empty($sub1["child"])) : ?>
                                    <a href="tambah.php?modulId=<?= $sub1["id"]; ?>" class="bg-gray-100 shadow-sm font-semibold p-2 rounded items-center ml-2 mt-2 mb-2"><i class="bi hover:text-blue-500 text-black text-md bi-file-earmark-plus-fill mr-2"></i>Tambah SubModul</a>
                                <?php else : ?>
                                    <?php foreach ($sub1["child"] as $sub2) : ?>

                                        <li>
                                            <span class="caret flex bg-gray-100 shadow-sm p-2 rounded items-center ml-3 mt-2 mb-2">
                                                <div class="flex-1">
                                                    <a class=" text-black text-md text-left font-semibold"><?= $sub2["modul_name"]; ?></a>
                                                </div>
                                               
                                            </span>
                                            <ul class="nested ml-3">
                                                <?php if (empty($sub2["child"])) : ?>
                                                    <a href="tambah.php?modulId=<?= $sub2["id"]; ?>" class="bg-gray-100 shadow-sm font-semibold p-2 rounded items-center ml-2 mt-1 mb-2"><i class="bi hover:text-blue-500 text-black text-xl bi-file-earmark-plus-fill mr-2"></i>Tambah SubModul</a>
                                                <?php else : ?>
                                                    <?php foreach ($sub2["child"] as $sub3) : ?>
                                                        <li>
                                                            <span class="caret flex bg-gray-100 shadow-sm p-2 rounded items-center ml-3 mt-2 mb-2">
                                                                <div class="flex-1">
                                                                    <a class=" text-black text-md font-semibold"><?= $sub3["modul_name"]; ?></a>
                                                                </div>
                                                               
                                                            </span>
                                                            <ul class="nested ml-3">
                                                                <?php if (empty($sub3["child"])) : ?>
                                                                    <a href="tambah.php?modulId=<?= $sub3["id"]; ?>" class="bg-gray-100 shadow-sm font-semibold p-2 rounded items-center ml-2 mt-1 mb-2 "><i class="bi hover:text-blue-500 text-black text-md bi-file-earmark-plus-fill mr- "></i>Tambah SubModul</a>
                                                                <?php else : ?>
                                                                    <?php foreach ($sub3["child"] as $sub4) : ?>
                                                                        <li>
                                                                            <span class="caret flex bg-gray-100 shadow-sm p-2 rounded items-center ml-3 mt-2 mb-2">
                                                                                <div class="flex-1">
                                                                                    <a class=" text-black  text-md font-semibold"><?= $sub4["modul_name"]; ?></a>
                                                                                </div>
                                                                              
                                                                            </span>
                                                                            <ul class="nested ml-3">
                                                                                <?php if (empty($sub4["child"])) : ?>
                                                                                    <a href="tambah.php?modulId=<?= $sub4["id"]; ?>" class="bg-gray-100 shadow-sm font-semibold p-2 rounded items-center ml-2 mt-1 mb-2 "><i class="bi hover:text-blue-500 text-black text-md bi-file-earmark-plus-fill mr- "></i>Tambah SubModul</a>
                                                                                <?php else : ?>
                                                                                    <?php foreach ($sub4["child"] as $sub5) : ?>
                                                                                        <li>
                                                                                            <span class="caret flex bg-gray-100 shadow-sm p-2 rounded items-center ml-3 mt-2 mb-2">
                                                                                                <div class="flex-1">
                                                                                                    <a class=" text-black text-md font-semibold"><?= $sub5["modul_name"]; ?></a>
                                                                                                </div>
                                                                                             
                                                                                            </span>
                                                                                        </li>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </ul>
                                                                        </li>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </li>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
                </li>
            </ul>
            </li>
            </ul>
        </td>

       

    </tr>
<?php endforeach; ?>
